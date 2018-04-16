<?php

namespace CascadiaPHP\Site\Testing\HTTP;

use CascadiaPHP\Site\Testing\TestCase;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\SkippedTestError;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\DomCrawler\Crawler;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Uri;

class MockResponse extends HtmlResponse
{

    private static $ampValidatorExists = null;

    protected $crawler;
    protected $request;
    protected $testCase;
    protected $html;

    public function __construct(ServerRequestInterface $request, TestCase $testCase, string $html, int $status = 200, array $headers = [])
    {
        $this->request = $request;
        $this->testCase = $testCase;
        $this->html = $html;
        parent::__construct($html, $status, $headers);
    }

    /**
     * Get an instance of the crawler for testing
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    public function getCrawler(): Crawler
    {
        if (!$this->crawler) {
            $this->crawler = new Crawler($this->getBody()->getContents(), $this->request->getUri());
        }

        return $this->crawler;
    }

    public function shouldSucceed(): MockResponse
    {
        return $this->assert(function() {
            $code = $this->getStatusCode();
            return $code > 199 || $code < 300;
        }, sprintf('Response value should be a success code, got "%d"', $this->getStatusCode()));
    }

    public function shouldFail(): MockResponse
    {
        return $this->assert(function() {
            $code = $this->getStatusCode();
            return $code < 200 || $code > 399;
        }, sprintf('Response value should be a fail code, got "%d"', $this->getStatusCode()));
    }

    public function shouldHaveCode(int $code): MockResponse
    {
        return $this->assert(function() use ($code) {
            return $this->getStatusCode() === $code;
        }, sprintf('Response value should be a fail code, got "%d"', $this->getStatusCode()));
    }

    public function shouldContainHeader(string $header, string $search, string $message = ''): MockResponse
    {
        return $this->assert(function() use ($header, $search) {
            foreach ($this->getHeader($header) as $value) {
                if ($value === $search) {
                    return true;
                }
            }

            return false;
        }, $message ?: sprintf('The response should have the "%s" value for the "%s" header, but it wasn\'t found', $header, $search));
    }

    public function shouldNotContainHeader(string $header, string $search, string $message = ''): MockResponse
    {
        return $this->assert(function() use ($header, $search) {
            foreach ($this->getHeader($header) as $value) {
                if ($value === $search) {
                    return false;
                }
            }

            return true;
        }, $message ?: sprintf('The response should NOT have the "%s" value for the "%s" header, but it wasn\'t found', $header, $search));
    }

    public function shouldContainSelector(string $selector, string $message = ''): MockResponse
    {
        return $this->assert(function() use ($selector) {
            return $this->getCrawler()->filter($selector)->count() > 0;
        }, $message ?: sprintf('The response should contain the "%s" selector, but it wasn\'t found', $selector));
    }

    public function shouldNotContainSelector(string $selector, string $message = ''): MockResponse
    {
        return $this->assert(function() use ($selector) {
            return $this->getCrawler()->filter($selector)->count() === 0;
        }, $message ?: sprintf('The response should NOT contain the "%s" selector, but we noticed some', $selector));
    }

    public function shouldContain(string $string, bool $caseSensitive = false, string $message = ''): MockResponse
    {
        $html = $this->html;
        $testString = $string;

        if (!$caseSensitive) {
            $html = strtolower($html);
            $testString = strtolower($testString);
        }

        return $this->assert(function() use ($testString, $html) {
            return strpos($html, $testString) !== false;
        }, $message ?: sprintf('The response should contain "%s", but we couldn\'t find it.', $string));
    }

    public function shouldNotContain(string $string, bool $caseSensitive = false,  string $message = ''): MockResponse
    {
        $html = $this->html;
        $testString = $string;

        if (!$caseSensitive) {
            $html = strtolower($html);
            $testString = strtolower($testString);
        }

        return $this->assert(function() use ($testString, $html) {
            return strpos($html, $testString) === false;
        }, $message ?: sprintf('The response should NOT contain "%s", but we found it in the response.', $string));
    }

    public function shouldHaveCanonicalUrl(string $path = null, string $message = null)
    {
        return $this
            ->assert(function() {
                return $this->getCrawler()->filter('link[rel="canonical"]')->count();
            }, $message ?: sprintf('The response should have a canonical tag, but none was found'))
            ->assert(function() use ($path) {
                $canonicalUrl = $this->getCrawler()->filter('link[rel="canonical"]');
                return (new Uri($canonicalUrl->attr('href')))->getPath() === $path;
            }, $message ?: sprintf('The canonical tag should point to "%s", but it does not', $path));
    }

    public function shouldBeAMP()
    {
        return $this
            ->assert(function() {
                return $this->getCrawler()->filter('html[amp]')->count() === 1;
            }, 'The response should contain `<html amp>`')
            ->assert(function() {
                $cwd = getcwd();
                chdir(dirname(__DIR__, 3));

                if (!$this->ampValidatorExists()) {
                    throw new SkippedTestError('AmpValidator doesn\'t exist. Run `yarn install` to get node dependencies');
                }
                if (!is_dir('./build') && !mkdir('./build') && !is_dir('./build')) {
                    throw new SkippedTestError(sprintf('Unable to create %s directory', './build'));
                }

                // Write to a test file and validate using amp-validator
                file_put_contents('./build/response.html', $this->html);
                exec('node ./node_modules/amphtml-validator/index.js build/response.html', $output, $result);

                // Clean up
                unlink('./build/response.html');
                chdir($cwd);

                // Make sure we get a 0 result cod
                return $result === 0;
            }, 'This response doesn\'t look like valid amp');
    }

    private function assert(callable $test, string $failureMessage): MockResponse
    {
        if (!$test($this)) {
            throw new ExpectationFailedException($failureMessage);
        }

        // This marks the assertion successful
        $this->testCase->addSuccessfulAssert($failureMessage);

        return $this;
    }

    private function ampValidatorExists()
    {
        if (static::$ampValidatorExists === true) {
            return true;
        }

        if (static::$ampValidatorExists === false) {
            return false;
        }

        static::$ampValidatorExists = file_exists(dirname(__DIR__, 3) . '/node_modules/amphtml-validator/index.js');
        return static::$ampValidatorExists;
    }
}

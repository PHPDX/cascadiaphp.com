<?php

namespace CascadiaPHP\Site\Testing\HTTP;

use CascadiaPHP\Site\Testing\TestCase;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\SkippedTestError;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\DomCrawler\Crawler;
use Zend\Diactoros\Response\HtmlResponse;

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
                exec('./node_modules/amphtml-validator/index.js build/response.html', $output, $result);

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

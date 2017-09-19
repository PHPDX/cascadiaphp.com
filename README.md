# PHPDX Website

| Type | Vendor | Location | Usage |
| ---- | ------ | -------- | ------ |
| Templates | [PlatesPHP](http://platesphp.com) | [./templates](./templates) | To render `template/sample.php`: `$engine->render('sample')` |
| Content | [parsedown](http://parsedown.org/) | [./content](./content) | To render `content/sample.md`: `$template->markdown('sample')` |
| Routes | [FastRoute](http://github.com/nikic/fastroute) | [./bootstrap/router.php](./bootstrap/router.php) | `$r->get('path', $callable)` `->get` `->post` `->put` `->delete`
| Controllers | Custom | [./src/Controller](./src/Controller) | There is no defined structure to controllers |
| Container | [league/container](http://packagist.org/package/league/container) | Created in [./dispatcher.php](./dispatcher.php) | `$container->get($binding)` |
| Cache | [cache/filesystem-adapter](http://packagist.org/package/cache/filesystem-adapter) | N/a | PSR-16: `$container->get(\Psr\SimpleCache\CacheInterface::class)` |

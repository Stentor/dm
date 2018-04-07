Configuration
=============

**sfTwigPlugin** tries to follow the convention over configuration guidelines
where possible. Still there is the possibility of configuring `sfTwigView`
through standard symfony settings.

Settings
--------

Right now the configuration is kinda limited or not needed. `sfTwigView` uses
`sf_debug` to determine if Twig should automatically reload and cache the
templates.

### `settings.yml`

An `sf_twig_extensions` setting has been added to `settings.yml` that holds an
array of `Twig_Extension` classes. `sfTwigView` takes all those names and
tries to initiate them into `Twig_Environment::addExtension()`. If it cannot
do that, it will throw an `InvalidArgumentException`.

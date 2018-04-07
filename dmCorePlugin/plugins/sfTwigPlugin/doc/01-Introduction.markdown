Introduction
============

This is the [symfony](http://symfony-project.org) plugin for integrating Twig
into symfony 1.3 / 1.4. Symfony 1.2 may work but has not been tested.

About Twig
----------

[Twig](http://twig-project.org) is a template parser maintained by [Fabien
Potencier](http://fabien.potencier.org).

### From Twig's README

>Twig is a template language for PHP, released under the new BSD license (code
>and documentation). Twig uses a syntax similar to the Django and Jinja
>template languages which inspired the Twig runtime environment.

Installation
------------

To use this plugin, extract the contents into `plugins/sfTwigPlugin/` and
enabled it in `ProjectConfiguration.class.php`. After you have cloned the
repository you will need to init and update the submodules, which will
download the Twig project into `lib/vendor/Twig/`. A submodule is used because
some people may already have Twig installed globally on their machine.

Create `module.yml` in `config/` or `apps/frontend/config/` with the following
contents:

    all:
      view_class: sfTwig
      partial_view_class: sfTwig

You should disable the default layout of `view.yml` in `config/` or `apps/frontend/config/`:

    default:
      has_layout:     false
      layout:         null

It can also be enabled only at the module level, by putting the files into `apps/application/yourmodule/config`. This is also useful to revert to `sfPHPView` (the default view class) for a particular module.

Run the task `./symfony cache:clear` and you're done. All that is left now is
to create new templates that use the `.html` extension.

### PEAR

Whenever a new tag is created in the git repository a release will show up on
[pearhub.org/projects/sfTwigPlugin](http://pearhub.org/projects/sfTwigPlugin)
this makes it possible to use the standard `./symfony plugin:install
PATH_TO_RELEASE` command when installing the plugin.

In the future it will be possible to use `./symfony plugin:install -c
pearhub.org sfTwigPlugin` but a bug in the plugin installer task hinders it
from working with [pearhub.org](http://pearhub.org)

### Extra

If you plan on using global partials, e.g. "global/partial", You must set
`mod_global_partial_view_class` manually since it wont get populated
dynamically. This can be done in `ProjectConfiguration.class.php` with
`sfConfig::set('mod_global_partial_view_class', 'sfTwig')` This will force
`sfTwigPartialView` to be used for the global module.

Usage
-----

Please read the documentation on Twig's website. The docs explain how to use
templates, and create extensions and filters. You may also read the rest of
the documentation in this directory.

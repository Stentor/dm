Development directions
======================

This document is a list of development directions that we chosed to take. It's
subject to evolution.

Helpers implementation
----------------------

We need to implement all helpers that are available in symfony 1.4, that are
in these three categories:

 - Helpers that output text directly, without acting like "filtering" some
   other text.

   Implementation choice: {{ generate_lorem_ipsum(42) }} (still need to find how to
   do this, and if it is actually possible.)

 - Helpers that output text as a result of filtering other text.

   Implementation choice: {{ 'text' | cypher }} (filter)

 - Helpers that do not output anything.
 
   Implementation choice: {% use_javascript "something" %} (tag)

Some helpers may be obsolete because of other Twig functionnalities, but
there is no reason to forbid people from using them if they want to, so we will
implement them all.

Template decoration can be considered obsolete, but it can be handy in some
cases, and it's a symfony feature. It's not expensive to keep it, using
symfony 1 sf_data template context variable.

Code Conventions
----------------

We should use symfony 1 conventions everywhere.


Tests
-----

We will setup a sismo instance on symfony project.

We should set up a bit of tests (not much actually, but enough to have a nice
coverage on main classes).

Whenever an issue is fixed, it should have its own non regression test named
issue###Test.php (see ticketting below).

Ticketting
----------

We should use github ticketting system for now, we will switch if it becomes
unuseable at some point.


Template locations
------------------

We came to think that current locations should be possible, along with a gloal
project location. The path resolution order should be (first found, first
used):

 - Global project templates (default location still do decide, configurable)
 - Application module templates (as it is right now with applications)
 - Plugin module templates (as it is right now with plugins)


Documentation
-------------

We will setup a documentation website as soon as all features described above
are working.

It's useless to do more than markdown documentation before the plugin can be
used, and it won't be complicated i markdown documentation is already there.


Authors
-------

 - Henrik Bjørnskov (henrik(at)bearwoods(dot)dk)
 - Romain Dorgueil (romain(dot)dorgueil(at)symfony(dash)project(dot)com)


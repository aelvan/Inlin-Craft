Inlin for Craft
===========

A tiny plugin for inlining files in Craft templates.

*This is the Craft 2.x version of Inlin, for the Craft 3.x version see the [craft3 branch](https://github.com/aelvan/Inlin-Craft/tree/craft3).*

Usage
---
Use it like this:

    <script src="{{ craft.inlin.er('/build/svg/my.svg') }}"></script>

Why? [Sometimes](http://css-tricks.com/svg-sprites-use-better-icon-fonts/) it
[makes sense](http://www.yottaa.com/blog/bid/306224/Inlining-for-Performance-When-to-Let-the-Cache-Go),
performance or workflow wise, to inline resources instead of requesting them.

To include a remote file, pass in true as the second parameter:

	{{ craft.inlin.er('http://example.com/remote/path.svg', true) }}

By default, Inlin will store all remote files in cache for a default of 3600 seconds. You can modify this time on the Inlin settings page.

If you want to request a remote file but disallow caching, pass in false as the third parameter:

	{{ craft.inlin.er('http://example.com/remote/path.svg', true, false) }}

Warning
---
Understand that inserting filedata in your templates, especially when passing it through Twig's raw filter,
is a potential security risk. And the path is relative to your document root, so the path could point to a
file anywhere on your server. **Make sure you never, ever let a third party control what is inserted.**
In case you're thinking "meh", insert this into your template:

    {{ craft.inlin.er('/../craft/config/db.php') }}

*"With great power, comes great responsibility" -Voltaire*


Configuration
---
Inlin needs to know the public document root to know where your files are located. By default
Inlin will use `$_SERVER['DOCUMENT_ROOT']`, but on some server configurations this is not the correct
path.

You can set your public document root and cache duration by visiting the Inlin settings page.


Changelog
---
### Version 1.2
 - Added caching ability for remote files

### Version 1.1
 - Added ability to pull remote files

### Version 1.0
 - Initial release
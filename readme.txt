=== Sharebar ===
Contributors: mdolon
Donate link: https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=E_ejxa82MVvUSWzCZkBL2xfD6mnyGiKEA0cc5YBClN4jvZ3ldW6THFjhroq&dispatch=5885d80a13c0db1f8e263663d3faee8d66edfb0b39be7838e3b204755610594d
Tags: sharing, social networks, marketing, social media, sharebar, sharebox
Requires at least: 2.0
Tested up to: 3.0
Stable tag: 2.2.9

Sharebar adds a dynamic and fully customizable vertical box to the left of a blog post that contains links/buttons to popular social networking sites.


== Description ==

Sharebar adds a dynamic and fully customizable vertical box to the left of a blog post that contains links/buttons to popular social networking sites.  For wide blogs, a vertical bar with popular sharing icons appears on the left of your post.  If the page is resized below 1000px (default), the vertical bar disappears and a horizontal sharebar appears under the post title.

Big Buttons are used in the vertical Sharebar to the left of the post, while the Small Buttons are used in the horizontal Sharebar that appears under the post title (by default) if the width of the page is less than 1000px (or whatever value you set).

When Auto mode (enabled in settings) is ON, the Sharebars are added automatically.  When Auto mode is off, you must manually add the sharebar code to your template files:

* Vertical (next to post) Sharebar: `<?php sharebar(); ?>`
* Horizontal Sharebar: `<?php sharebar_horizontal(); ?>`

You can also call an individual button in any template by using the following code (where size is either big or small): `<?php sharebar_button('name','size'); ?>`

Full instructions and example can be found at: http://devgrow.com/sharebar-wordpress-plugin/
Follow me on Twitter: http://devgrow.com/ThinkDevGrow

Also, if you use and like the plugin, please rate it!  ->


== Installation ==

Upload the Sharebar plugin to your plugins directory, activate it and it should work out of the box.  Then tweak the buttons and settings to your likings!


== Screenshots ==

1. The plugin in action (vertical bar).  If page is resized to less than 1000px, a vertical share bar appears under title.
2. Main Plugin Page
3. Plugin Settings Page
4. Edit button page


== Frequently Asked Questions ==

= Why doesn't the vertical sharebar (next to post) work? =

First, make sure the plugin is properly installed and if you're using manual mode, the sharebar code has been added to your single.php template.  If you're using auto mode, verify that the sharebar list is being added to your post in the source code (look for `<ul class='sharebar'>`).  If it's not in the source, there is a problem with the plugin settings or implementation.  If it is there, chances are the error is CSS-based - make sure the parent container element of the post (or the post element itself) does not have the `overflow:hidden;` CSS property applied to it, as it may sometimes render the sharebar invisible.

= How do I get the sharebar to appear to the right of my blog? =

Play with the Right Offset in the settings page of the plugin - this should include the total width of your sidebar or whatever elements are between your post and the right most edge of your blog.


== Changelog ==

= 1.0.7 =
* Moved Sharebar JS function to header (from footer) since some themes are miss wp_footer hook

= 1.0.7 =
* Fixed E-mail link and added option to show Sharebar credit

= 1.0.6 =
* Fixed XAMPP and PHP compatibility issue (was caused by PHP short tag, changed now to full)

= 1.0.4 =
* You can now add Sharebar to posts or pages in the settings

= 1.0.1 =
* Fixed the_content so returns content properly
* Added screenshots, updated readme file
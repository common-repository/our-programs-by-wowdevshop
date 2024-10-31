=== Our Programs by WOWDevShop ===
Contributors: XicoOfficial, wowdevshop
Donate link: http://wowdevshop.com/
Tags: programs, company programs, program category, widget, organization programs
Requires at least: 3.8
Tested up to: 4.9
Stable tag: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display organization programs with descriptions and links as a post.

== Description ==

= Organization Programs Management =

"Our Programs by WOWDevShop" is a clean and easy-to-use organization programs management system for WordPress. Load in your programs and display them on a page as posts, with their own categories.

= Support =

Looking for a helping hand? [View plugin documentation](http://docs.wowdevshop.com/Wordpress/our-programs).

= Get Involved =

Looking to contribute code to this plugin? Go ahead and [fork the repository over at GitHub](https://github.com/wowdevshop/wp-our-programs).
(submit pull requests to the latest "release-" tag)

== Usage ==

To display your organization programs via a theme or a custom plugin, please use the following code:

Define your custom post type name in the arguments

`$args = array('post_type' => 'programs');`

Define the loop based on arguments

`$loop = new WP_Query( $args );`
 Display the contents


== Usage Examples ==

`<?php
$args = array('post_type' => 'bios');
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();
?>
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="entry-content">
<?php the_content(); ?>
</div>
<?php endwhile;?>`

== Installation ==

Installing "Our Programs by WOWDevShop" can be done either by searching for "Our Programs by WOWDevShop" via the "Plugins > Add New" screen in your WordPress dashboard, or by using the following steps:

1. Download the plugin via WordPress.org.
1. Upload the ZIP file through the "Plugins > Add New > Upload" screen in your WordPress dashboard.
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= The plugin looks unstyled when I activate it. Why is this? =

"Our Programs by WOWDevShop" is a lean plugin that aims to keep it's purpose as clean and clear as possible. Thus, we don't load any preset CSS styling, to allow full control over the styling within your theme or child theme.

= How do I contribute? =

We encourage everyone to contribute their ideas, thoughts and code snippets. This can be done by forking the [repository over at GitHub](https://github.com/wowdevshop/wp-our-programs).

== Screenshots ==

1. The organization program management screen within the WordPress admin.

2. The organization programs displayed on the front-end with a little CSS.

3. Single organization program displayed on the front-end with a little CSS.

== Changelog ==

= 1.2.0 =
* Tested up to WordPress 4.9

= 1.1.0 =
* Custom Single template
* Delete support for custom fields
* Plugin internationalized
* Bug fixes

== Upgrade Notice ==

= 1.1.0 =
 Plugin internationalized & with a custom single template!

= 1.0.0 =
* Initial release. Yeah!

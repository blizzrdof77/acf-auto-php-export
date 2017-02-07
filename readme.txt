=== Acf Auto Php Export ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: http://prankhut.com/
Tags: acf, advanced custom fields, auto-export, advanced custom fields pro
Requires at least: 3.7
Tested up to: 4.4.2
Stable tag: 0.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automagically Export Field Groups to PHP on Save/Update for Advanced Custom Fields

== Description ==

This plugin requires the Advanced Custom Fields Pro plugin to be present and activated

The purpose of this plugin is to avoid the tedious process of manually exporting
ACF field groups to PHP. Upon saving/updating a field group in the ACF editor
view, a PHP export of the field will automatically be generated and saved to a
directory.

The exports will be created in a folder called "acf/fields" in the active theme
directory.  To change this, you can define the constant in your wp-config.php
file - like this:

    `/** Directory is relative to theme root */`
    `define('ACF_CUSTOM_EXPORT_DIRECTORY', '/custom-folder/acf');`

Email me if you have any questions (blizzrdof77@gmail.com). Enjoy!

== Installation ==
1. Make sure Advanced Custom Fields Pro plugin is present and activated
2  Upload the `acf-auto-php-export` foler to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Default export directory is "acf/fields" in the theme root - see plugin derscription on how to customize this

== Requirements ==
* Advanced Custom Fields Pro (version 5) plugin

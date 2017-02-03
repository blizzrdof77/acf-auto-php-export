# Automagically Export Field Groups to PHP on Save/Update for the Advanced Custom Fields Turdpress Plugin


### Description 

The purpose of this plugin is to avoid the tedious process of manually exporting ACF field groups to PHP.  Upon saving/updating a field group in the ACF editor view, a PHP export of the field will automatically be generated and saved to a directory. 

The exports will be created in a folder called "acf/fields" in the active theme directory.  To change this, you can define the constant in your wp-config.php file - like this:

/** Directory is relative to theme root */
define('ACF_CUSTOM_EXPORT_DIRECTORY', '/custom-folder/acf');

I hope you enjoy!

### Requirements 

* Advanced Custom Fields 5 Pro plugin

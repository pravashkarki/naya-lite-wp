=== Naya Lite ===

Contributors: sampression
Requires at least: 5.2
Requires PHP: 5.6.20
Tested up to: 5.4
Stable tag: 3.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Minimal blog theme.

== Description ==

Naya Lite is a minimal, clean, lightweight, modern & typographic theme created with focus on content. Being both responsive and retina-ready with great user experience on majority of desktop and mobile devices. Naya Lite comes with user-friendly customization options making it very easy to customize and use. Get free support at https://www.sampression.com/supports and View live demo site at https://www.demo.sampression.com/naya-lite

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Changelog ==

#Version 3.0

* Compatibility with WordPress 5.4
* Improve accessibility
* Migration code removed
* Removed unused files and folders
* Removed redundant functions
* Minor CSS Tweaks

#Version 2.0

Added: All options to Customizer
Added: Improved in typography with new Meta text and widget section.
Added: Font Awesome icon set
Added: Footer Options for copyright text and credit text.
Added: Important link section
Removed: Theme Options page
Removed: Custom CSS section removed.
Removed: Sidebar option from page removed.
Improved: Social media has a colour option along with more social icons.
Improved: Genericons replaced with Font Awesome.

#Version 1.0.11

Fixed: Some CSS issues

#Version 1.0.10

Fixed: Audio player responsive css
Fixed: Some CSS issues
Removed: Sticky Post background color
Removed: SAM_FW_TIMTHUMB_DIR - Directory Location Constant
Removed: SAM_FW_WIDGETS_DIR - Directory Location Constant
Removed: SAM_FW_WIDGET_TPL_PART_DIR - Template Part Constants
Removed: SAM_FW_TIMTHUMB_URL - URL Location Constant
Removed: SAM_FW_WIDGETS_URL - URL Location Constant
Added: Script for do not submit search form if empty
Added: Open social media link on new tab
Added: SAM_NAYA_LITE_VERSION - Constant in init
Changed: Link of community forum on theme option page
Changed: screenshot.png

#Version 1.0.9

style.css enqueued from function instead of header
Added more options to add social medias : Google Plus, Vimeo and Flickr

#Version 1.0.8

Added some action hooks on header and footer.
Removed unwanted PHP funtions
Replaced deprecated live jQuery function by on function

#Version 1.0.7

Error occured while editing post fixed.

#Version 1.0.6

Theme option datas are now saved in a single array.

#Version 1.0.5

home_url() escaped with esc_url()
data sanitazation, validation and escape fuctions used
PHP fixes for sidebar
CSS fixes for table font size

#Version 1.0.4

get_stylesheet_uri() used instead of bloginfo() function for main stylesheet url.
google font path fixed
added prefix on userdefined functions
Escape functions added
home_url function added to output home page url
fonts with gpl license used
hooks sections removed that provided theme options for arbitrary header/footer scripts.

#Version 1.0.3

Removed: description and author removed from header.php
Removed: Dashboard widgets removed
Fixed: wp_title filter used for title tag
Fixed: Google fonts enqueued without the protocol (http:).
Fixed: Favicon icons disable by default
Fixed: admin_print_scripts and admin_print_styles changed to admin_enqueue_scripts
Fixed: scripts and styles files enqueued directly without registering
Fixed: output of data by using escape function
Fixed: used ‘theme_location’ parameter instead of ‘menu’ in wp_nav_menu
Fixed: register_nav_menu(), add_theme_support, add_image_size, add_nav_menu, register_nav_menus and load_theme_textdomain hooked into after_setup_theme action.

#Version 1.0.2

Added: License information added on readme.txt file of bundled js files and icons.

#Version 1.0.1

Fixed: Non-printable characters were replaced by web save special characters.
Fixed: Enqueued comment-reply script.
Fixed: wp_head() template tag placed immediately before the closing HTML head tag.
Fixed: wp_footer() template tag placed immediately before the closing HTML body tag.
Fixed: manage_options replaced by be edit_theme_options on setting page.
Fixed: Read more text field validated.
Fixed: sampression_right_sidebar() replaced by get_sidebar() function.
Added: Function for custom header preview on admin panel.

== Credits ==

* Font Awesome: http://fontawesome.io/, (c) Dave Gandy, CSS - [MIT](http://opensource.org/licenses/MIT) ; Fonts - [SIL OFL 1.1](http://scripts.sil.org/OFL)
* Skeleton: https://github.com/dhg/Skeleton/blob/master/LICENSE.md
* Selectivizr: https://github.com/keithclark/selectivizr - @license MIT license (https://opensource.org/licenses/MIT)

== Images ==

License: CCO

* https://stocksnap.io/photo/mill-mountain-ARAGQYVAYC
* https://stocksnap.io/photo/enchanting-forest-1CFKSWRR5X
* https://stocksnap.io/photo/old-barn-QVCLPGULUO

== Documentation ==

#Change Logo and Favicon

Login to your wp-admin area and go to Appearance -> Customize.
Select General "Settings -> Site Identity" Tab.
Upload the logo, favicon 512 pixels must be square.
Select for either Logo or website title to show.

#Layout
Login to your wp-admin area and go to Appearance -> Customize.
Select "Default Sidebar Layout" Tab.
Here you can select whether to show the right sidebar, left sidebar or no sidebar on the site.

#Typography
Login to your wp-admin area and go to Appearance -> Customize.
Select "Typography" Tab
Here you can change the Font Family, Font Size, Font Style, Color of Site Title, General Body Text, Widget Title, Meta Text

#Social Media
Login to your wp-admin area and go to Appearance -> Customize.
Select "Social Media" tab
Here you can add your Facebook, Twitter, Youtube and many more links to the social media which appears at the top right of the site.

#Additional CSS
Login to your wp-admin area and go to Appearance -> Customize.
Select "Additional CSS" Tab
Here you can add your own custom css to overwrite the default css of the theme.

#Blog
Login to your wp-admin area and go to Appearance -> Theme Options.
Select "Blog" Tab
Here you select the meta values to show/hide on the blog page.

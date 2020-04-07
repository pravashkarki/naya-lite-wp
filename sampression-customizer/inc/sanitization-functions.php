<?php 
/**
 * Sanitization callback for  type controls
 * @param  string $input Slug to sanitize.
 * @param  WP_Customize_Setting $setting Setting instance
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default
 */

//Sanitizes Fonts 
function sampression_sanitize_fonts($input)
{
    $valid = array(
        'Arial, sans-serif' => 'Arial',
        'Verdana, Geneva, sans-serif' => 'Verdana',
        'Playfair+Display:400,700,400italic,700italic=serif' => 'Playfair Display',
        'Work+Sans:400,700=sans-serif' => 'Work Sans',
        'Alegreya:400,400italic,700,700italic=serif' => 'Alegreya',
        'Alegreya+Sans:400,400italic,700,700italic=sans-serif' => 'Alegreya Sans',
        'Fira+Sans:400,400italic,700,700italic=sans-serif' => 'Fira Sans',
        'Droid+Sans:400,700=sans-serif' => 'Droid Sans',
        'Source+Sans+Pro:400,400italic,700,700italic=sans-serif' => 'Source Sans Pro',
        'Source+Serif+Pro:400,700=serif' => 'Source Serif Pro',
        'Lora:400,700=serif' => 'Lora',
        'Neuton:400,700=serif' => 'Neuton',
        'Poppins:400,700=sans-serif' => 'Poppins',
        'Karla:400,700=sans-serif' => 'Karla',
        'Merriweather:400,400italic,700,700italic=serif' => 'Merriweather',
        'Open+Sans:400,400italic,700,700italic=sans-serif' => 'Open Sans',
        'Roboto:400,400italic,700,700italic=sans-serif' => 'Roboto',
        'Roboto+Slab:400,700=serif' => 'Roboto Slab',
        'Lato:400,400italic,700,700italic=sans-serif' => 'Lato',
        'Droid Serif' => 'Droid Serif Normal',
        'Droid+Serif:400,400italic,700,700italic=serif' => 'Droid Serif',
        'Kreon' => 'Kreon',
        'Archivo+Narrow:400,400italic,700,700italic=sans-serif' => 'Archivo Narrow',
        'Libre+Baskerville:400,700,400italic=serif' => 'Libre Baskerville',
        'Crimson+Text:400,400italic,700,700italic=serif' => 'Crimson Text',
        'Montserrat:400,700=sans-serif' => 'Montserrat',
        'Chivo:400,400italic=sans-serif' => 'Chivo',
        'Old+Standard+TT:400,400italic,700=serif' => 'Old Standard TT',
        'Domine:400,700=serif' => 'Domine',
        'Varela+Round=sans-serif' => 'Varela Round',
        'Bitter:400,700=serif' => 'Bitter',
        'Cardo:400,700,400italic=serif' => 'Cardo',
        'Arvo:400,400italic,700,700italic=serif' => 'Arvo',
        'PT+Serif:400,400italic,700,700italic=serif' => 'PT Serif',
        'Passion+One:400,700=cursive' => 'Passion One',
        'Poiret+One=cursive' => 'Poiret One',
        'Pacifico=cursive' => 'Pacifico',
        'Georgia' => 'Georgia, serif',
        'Dancing+Script:400,700=cursive' => 'Dancing Script',
        'Kaushan+Script=cursive' => 'Kaushan Script',
        'Satisfy=cursive' => 'Satisfy',
        'Courgette=cursive' => 'Courgette',
        'Cookie=cursive' => 'Cookie',
        'Tangerine:400,700=cursive' => 'Tangerine',
        'Bad+Script=cursive' => 'Bad Script',
        'Calligraffitti=cursive' => 'Calligraffitti',
        'Sacramento=cursive' => 'Sacramento',
        'Trebuchet MS, Tahoma, sans-serif' => 'Trebuchet MS',
        'Times New Roman, serif' => 'Times New Roman',
        'Tahoma, Geneva, Verdana, sans-serif' => 'Tahoma',
        'Impact, Charcoal, sans-serif' => 'Impact',
        'Courier, Courier New, monospace' => 'Courier',
        'Century Gothic, sans-serif' => 'Century Gothic',
        'Nixie+One=cursive' => 'Nixie One',
        'Parisienne=cursive' => 'Parisienne',
        'Life+Savers:400,700=cursive' => 'Life Savers',
        'Special+Elite=cursive' => 'Special Elite',
        'Cutive=serif' => 'Cutive',
        'Cutive+Mono=serif' => 'Cutive Mono',
        'Josefin+Sans:400,400italic,700,700italic=sans-serif' => 'Josefin Sans',
        'Josefin+Slab:400,400italic,700,700italic=serif' => 'Josefin Slab',
    );

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

function sampression_sanitize_customcss($input)
{

    $allowed_html = array(
        'style' => array(
            'id' => array(),
            'type' => array()
        ),
        'script' => array(
            'src' => array(),
            'type' => array()
        ),
        'link' => array(
            'rel' => array(),
            'id' => array(),
            'href' => array(),
            'media' => array(),
            'type' => array()
        ),
    );
    return wp_kses($input, $allowed_html);

}

function sampression_sanitize_checkboxes($values)
{

    $multi_values = !is_array($values) ? explode(',', $values) : $values;

    return !empty($multi_values) ? array_map('sanitize_text_field', $multi_values) : array();
}

/**
 * Sanitization callback for 'select' and 'radio' type controls
 * @param  string $input Slug to sanitize.
 * @param  WP_Customize_Setting $setting Setting instance
 * @return string           Sanitized slug if it is a valid choice; otherwise, the setting default
 */
function sampression_sanitize_select_radio($input, $setting)
{

    // Ensure input is a slug.
    $input = sanitize_key($input);

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($setting->id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

/**
 * Sanitization callback for checkbox as a boolean value, either TRUE or FALSE.
 * @param  bool $checked Whether the checkbox is checked
 * @return bool          Whether the checkbox is checked
 */
function sampression_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Sanitazation callback for textarea as allowed HTML tags for post content
 * @param  string $input Content to filter
 * @return string        Filtered content
 */
function sampression_sanitize_text($input)
{
    return wp_kses_post(force_balance_tags($input));
}

/**
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default
 * @param  string $image Image File Path
 * @param  WP_Customize_Setting $setting Setting Instance
 * @return string                            Image file path if the extension is allowed; otherwise, the setting default
 */
function sampression_sanitize_image($image, $setting)
{
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        'bmp' => 'image/bmp',
        'tif|tiff' => 'image/tiff',
        'ico' => 'image/x-icon'
    );
    $file = wp_check_filetype($image, $mimes);
    return ($file['ext'] ? $image : $setting->default);
}

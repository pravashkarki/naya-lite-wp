<?php
/**
 * sidebar options sample.
 *
 * @since Sampression base customizer 1.0
 * @package sampression
 */
function sampression_customize_sidebar_layout( $wp_customize ) {

	class sampression_sidebar_Control extends WP_Customize_Control {

 		public function render_content() {
		    $defaults = sampression_get_default_options_value();

			if ( empty( $this->choices ) )
				return;

			$name = 'customize_sidebar';

			?>
			<style>
				#sampression-img-container .sampression-radio-img-img {
					border: 3px solid #DEDEDE;
					margin: 0 5px 5px 0;
					cursor: pointer;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				#sampression-img-container .sampression-radio-img-selected {
					border: 3px solid #AAA;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				input[type=checkbox]:before {
					content: '';
					margin: -3px 0 0 -4px;
				}
			</style>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<ul class="controls" id = 'sampression-img-container'>
			<?php $selected = get_theme_mod( 'sampression_sidebar_layout', $defaults['home_sidebar'] );
				foreach ( $this->choices as $value => $label ) :
					$class = ($selected == $value)?'sampression-radio-img-selected sampression-radio-img-img':'sampression-radio-img-img';
				    //echo $value;
					?>
					<li style="display: inline;">
					<label>
						<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
					</label>
					</li>
					<?php
				endforeach;
			?>
			</ul>
			<script type="text/javascript">

				jQuery(document).ready(function($) {
					$('.controls#sampression-img-container li img').click(function(){
						$('.controls#sampression-img-container li').each(function(){
							$(this).find('img').removeClass ('sampression-radio-img-selected') ;
						});
						$(this).addClass ('sampression-radio-img-selected') ;
					});
				});

			</script>
			<?php
		}
	}


	//migration code
         if(get_theme_mod('sampression_sidebar_layout') == '' && sampression_options_theme_option("sidebar_active") != '') {
            $sidebar_layout = array('sanitize_callback' => 'esc_url_raw', 'default' => sampression_options_theme_option("sidebar_active"));
        } else {
            $sidebar_layout = array('sanitize_callback' => 'esc_url_raw');

        }
        //migration code end
	// default layout setting
	$wp_customize->add_section('sampression_default_layout_setting', array(
		'priority' => 50,
		//'description' => 'Previously added as "'.sampression_options_theme_option("sidebar_active").'"',
		'title' => __('Default Sidebar Layout', 'naya-lite'),
		//'panel'=> 'sampression_general_setting_panel'
	));

	$wp_customize->add_setting('sampression_sidebar_layout', array(
		'default' => sampression_options_theme_option("sidebar_active"),
	    'sanitize_callback' => 'sampression_sanitize_text'
	));

	$wp_customize->add_control(
		new sampression_sidebar_Control(
			$wp_customize,
			'sampression_sidebar_layout',
			 array(
				'type' => 'radio',
				'label' => __('Website Sidebar', 'naya-lite'),

				'section' => 'sampression_default_layout_setting',
				'settings' => 'sampression_sidebar_layout',
				'choices' => array(
					'right' => get_template_directory_uri(). '/sampression-customizer/images/right-sidebar.png',
					'left'  => get_template_directory_uri(). '/sampression-customizer/images/left-sidebar.png',
					'none'  => get_template_directory_uri(). '/sampression-customizer/images/no-sidebar-full-width-layout.png',
				)
	)));

}
add_action( 'customize_register', 'sampression_customize_sidebar_layout' );

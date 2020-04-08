<?php

/**
 * Contains methods for custom controls for Sampression Theme
 *
 * @since Sampression 2.0
 */

if( class_exists( 'WP_Customize_Control' ) ) :

    class Sampression_Checkboxes_Control extends WP_Customize_Control {

        public $type = 'checkboxes';

        protected function render_content() {
            if ( empty( $this->choices ) )
                return;

            $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value();
            ?>
            <div>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <ul>
                    <?php foreach( $this->choices as $value => $label ) { ?>
                        <li>
                            <label>
                                <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?>>
                                <?php echo esc_html( $label ); ?>
                            </label>
                        </li>
                    <?php } ?>
                </ul>
                <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
            </div>
            <?php
        }
    }

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
			<?php
				$selected = $this->value();
				foreach ( $this->choices as $value => $label ) :
					$class = ($selected == $value)?'sampression-radio-img-selected sampression-radio-img-img':'sampression-radio-img-img';
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


endif;

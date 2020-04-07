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

endif;

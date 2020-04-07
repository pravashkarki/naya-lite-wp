<?php

/**
 * Contains methods for custom controls for Sampression Theme
 * 
 * @since Sampression 2.0
 */

if( class_exists( 'WP_Customize_Control' ) ) :

    class Sampression_CSS_Control extends WP_Customize_Control {

        public $type = 'customcss';

        protected function render_content() {

            ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <textarea rows="25" <?php $this->link(); ?> style="width: 100%"><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }

    class Sampression_Categories_Control extends WP_Customize_Control {

        public $type = 'categories';

        protected function render_content() {
            $data = array();
            ?>
            <div class="sampression-cat-lists">
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
                <ul>
                    <?php
                    wp_list_categories(
                        array(
                            'title_li' => '',
                            'walker' => new Sampression_Categories_Walk//( $this->value() )
                        )
                    );
                    ?>
                </ul>
                <?php /* <textarea class="sampression-control-cat" style="width:100%;" <?php $this->link(); ?> rows="20"><?php echo $this->value(); ?></textarea> */ ?>
                <input class="sampression-control-cat" type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
            </div>
            <?php
        }
    }

    class Sampression_Categories_Walk extends Walker_Category {

        public $cats;

        // function __construct( $val ) {
        //     $this->cats = $val;
        // }

        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $depth++;
            $indent = str_repeat("-", $depth);
            $output .= "";//"$indent";
        }

        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $depth++;
            $indent = str_repeat("-", $depth);
            $output .= "";//"$indent";
        }

        public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
            $options = get_option( 'sampression_theme_options', array() );
            if( get_theme_mod( 'categories_post_display' ) ) {
                $value = get_theme_mod( 'categories_post_display' );
                if(is_array($value)) {
                    parse_str($value[0], $cat_display_count);
                } else {
                    if(!empty($options['category_posts_display'])) {
                        $value = $options['category_posts_display'];
                        parse_str($value, $cat_display_count);
                    } else {
                        parse_str($value, $cat_display_count);
                    }
                }
                $count_value = $cat_display_count[$category->slug];
            } else {
                if(!empty($options['category_posts_display'])) {
                    $value = $options['category_posts_display'];
                    parse_str($value, $cat_display_count);
                    $count_value = $cat_display_count[$category->slug];
                } else {
                    $count_value = $category->count;
                }
            }

            $output .= "<li>";
            $indent = str_repeat("- ", $depth);
            $output .= '<input class="cat-checked" id="cat-'.$category->slug.'" type="checkbox" value="'.esc_attr( $category->slug ).'"'.checked( $count_value, 0, false ).'>';
            $output .= '<label for="cat-'.$category->slug.'">'.$indent.esc_html( $category->name ).'</label>';
            $output .= '<input type="number" value="'.$count_value.'" name="'.$category->slug.'" class="sam-number-input" max="'.$category->count.'" min="-1">';
            //$output .= '<input type="number" value="'.$category->count.'" name="'.$category->slug.'" class="sam-number-input" max="'.$category->count.'" min="-1">';
        }

        public function end_el( &$output, $page, $depth = 0, $args = array() ) {
            $output .= "</li>";
        }

    }

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

    class Sampression_Fontsize_Control extends WP_Customize_Control {
        public $type = 'range';

        public function render_content() {
        ?>
        <label>
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif;
            if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>
            <input type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> data-reset_value="<?php echo esc_attr( $this->setting->default ); ?>" />
            <input type="number" <?php $this->input_attrs(); ?> class="et-pb-range-input" value="<?php echo esc_attr( $this->value() ); ?>" />
            <span class="et_divi_reset_slider"></span>
        </label>
        <?php
        }
    }

endif;

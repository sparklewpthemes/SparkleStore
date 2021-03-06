<?php
/**
 ** Adds sparklestore_full_promo widget.
**/
add_action('widgets_init', 'sparklestore_full_promo');
function sparklestore_full_promo() {
    register_widget('sparklestore_full_promo_area');
}

class sparklestore_full_promo_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'sparklestore_full_promo_area', __('SP: Full Promo Widget','sparklestore'), array(
            'description' => __('A widget that promote you busincess', 'sparklestore')
        ));
    }
    
    private function widget_fields() {
       
        $fields = array( 

            'sparklestore_full_promo_bg_image' => array(
                'sparklestore_widgets_name' => 'sparklestore_full_promo_bg_image',
                'sparklestore_widgets_title' => __('Uplaod Promo Background Image', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'upload',
            ),
            
            'sparklestore_full_promo_title' => array(
                'sparklestore_widgets_name' => 'sparklestore_full_promo_title',
                'sparklestore_widgets_title' => __('Title', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'title',
            ),

            'sparklestore_full_promo_desc' => array(
                'sparklestore_widgets_name' => 'sparklestore_full_promo_desc',
                'sparklestore_widgets_title' => __('Short Description', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'textarea',
                'sparklestore_widgets_row'    => 4,
            ),

            'sparklestore_full_promo_button_link' => array(
                'sparklestore_widgets_name' => 'sparklestore_full_promo_button_link',
                'sparklestore_widgets_title' => __('Promo Button Link', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'url',
            ),

            'sparklestore_full_promo_button_text' => array(
                'sparklestore_widgets_name' => 'sparklestore_full_promo_button_text',
                'sparklestore_widgets_title' => __('Promo Button Text', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'text',
            ),
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        $promo_bg_image  = esc_url( $instance['sparklestore_full_promo_bg_image'] );
        $title           = esc_attr( $instance['sparklestore_full_promo_title'] );
        $short_desc      = esc_textarea( $instance['sparklestore_full_promo_desc'] );
        $button_link     = esc_url( $instance['sparklestore_full_promo_button_link'] );
        $button_text     = esc_attr( $instance['sparklestore_full_promo_button_text'] );

        echo $before_widget; 
    ?>
    <div class="fullpromowrap">
        <div class="container">
            <div class="row">
                   <div class="promoimage" <?php if ( !empty( $promo_bg_image ) ) { ?>style="background-image:url(<?php echo $promo_bg_image; ?>); background-size:cover;"<?php } ?>>
                        <div class="fullwrap">                            
                            <?php if ( !empty( esc_attr( $title ) ) ) { ?>
                                <h4><?php echo esc_attr( $title ); ?></h4>
                            <?php } ?>

                            <?php if ( !empty( esc_attr( $short_desc ) ) ) { ?>
                                <span><?php echo $short_desc; ?></span>
                            <?php } ?> 

                            <?php if ( !empty( esc_attr( $button_text ) ) ) { ?>
                                <a href="<?php echo esc_url($button_link); ?>">
                                  <button class="btn promolink"><?php echo esc_attr( $button_text ); ?></button>
                                </a>
                            <?php } ?>
                        </div> 
                   </div>
            </div>
        </div>
    </div> 

    <?php         
        echo $after_widget;
    }
   
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $instance[$sparklestore_widgets_name] = sparklestore_widgets_updated_field_value($widget_field, $new_instance[$sparklestore_widgets_name]);
        }
        return $instance;
    }

    public function form($instance) {
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $sparklestore_widgets_field_value = !empty($instance[$sparklestore_widgets_name]) ? $instance[$sparklestore_widgets_name] : '';
            sparklestore_widgets_show_widget_field($this, $widget_field, $sparklestore_widgets_field_value);
        }
    }
}
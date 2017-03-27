<?php
/**
 ** Adds sparklestore_video_section widget.
**/
add_action('widgets_init', 'sparklestore_video_section');
function sparklestore_video_section() {
    register_widget('sparklestore_video_section_area');
}

class sparklestore_video_section_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'sparklestore_video_section_area', esc_html__('SP: Promo Video Section','sparklestore'), array(
            'description' => esc_html__('A widget that promote you busincess video', 'sparklestore')
        ));
    }
    
    private function widget_fields() {
             
        
        $fields = array(
                      
            'sparklestore_promo_video' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_video',
                'sparklestore_widgets_title' => esc_html__('Enter Very Short Description', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'textarea',
                'sparklestore_widgets_row' => 3,
            ),
          
            'sparklestore_promo_video_url' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_video_url',
                'sparklestore_widgets_title' => esc_html__('Enter Youtube Video Url', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'url'
            )
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $desc             = esc_textarea( $instance['sparklestore_promo_video'] );
        $video_url        = esc_url( $instance['sparklestore_promo_video_url'] );
       
        echo $before_widget; 
    ?>
   
        <div class="sparkle-video-wrap">            
            <div class="sparkle-video">
                <?php if($video_url){ 
                  $vidarr = explode('?v=', $video_url); 
                  $vid_id = $vidarr[1];
                ?>
                    <div vid="<?php echo esc_attr( $vid_id ); ?>"  class="background-video"></div>
                <?php } ?>
            </div>            
            <div class="promovideoinfo">
                <div class="container">
                    <div class="row"> 
                        <?php if(!empty( $desc )) { ?>
                            <p class="promovidoedesc"><?php echo esc_attr( $desc ); ?></p>
                        <?php } ?>
                        <a class="play-bnt"><i class="fa fa-play-circle"></i> </a>
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
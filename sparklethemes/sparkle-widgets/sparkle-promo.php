<?php
/**
 ** Adds sparklestore_promo_pages widget.
**/
add_action('widgets_init', 'sparklestore_promo_pages');
function sparklestore_promo_pages() {
    register_widget('sparklestore_promo_pages_area');
}
class sparklestore_promo_pages_area extends WP_Widget {
    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'sparklestore_promo_pages_area', esc_html__('SP: Promo Widget Section','sparklestore'), array(
            'description' => esc_html__('A widget that promote you busincess visual way', 'sparklestore')
        ));
    }
    
    private function widget_fields() {
             
        
        $fields = array( 
            
            'sparklestore_promo_one_image' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_one_image',
                'sparklestore_widgets_title' => esc_html__('Upload Promo One Image', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'upload',
            ),

            'banner_start_group_left' => array(
                'sparklestore_widgets_name' => 'banner_start_group_left',
                'sparklestore_widgets_title' => esc_html__('Promo Section One', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'group_start',
            ),
            
            'sparklestore_promo_one_title' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_one_title',
                'sparklestore_widgets_title' => esc_html__('Enter Promo One Title', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'title',
            ),
            
            'sparklestore_promo_one_desc' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_one_desc',
                'sparklestore_widgets_title' => esc_html__('Enter Very Short Promo One Description', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'textarea',
                'sparklestore_widgets_row' => 3,
            ),
           
            'sparklestore_promo_one_button_link' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_one_button_link',
                'sparklestore_widgets_title' => esc_html__('Promo One Button Link', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'url',
            ),
            
            'banner_end_group_left' => array(
                'sparklestore_widgets_name' => 'banner_end_group_left',
                'sparklestore_widgets_field_type' => 'group_end',
            ),
            
            // Promo two Area
            
            'sparklestore_promo_two_image' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_two_image',
                'sparklestore_widgets_title' => esc_html__('Upload Promo Two Image', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'upload',
            ),

            'banner_start_group_left_two' => array(
                'sparklestore_widgets_name' => 'banner_start_group_left_two',
                'sparklestore_widgets_title' => esc_html__('Promo Section Two', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'group_start',
            ),
            
            'sparklestore_promo_two_title' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_two_title',
                'sparklestore_widgets_title' => esc_html__('Enter Promo Two Title', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'title',
            ),
            
            'sparklestore_promo_two_desc' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_two_desc',
                'sparklestore_widgets_title' => esc_html__('Enter Very Short Promo Two Description', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'textarea',
                'sparklestore_widgets_row' => 3,
            ),
           
            'sparklestore_promo_two_button_link' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_two_button_link',
                'sparklestore_widgets_title' => esc_html__('Promo Two Button Link', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'url',
            ),
            
            'banner_end_group_left_two' => array(
                'sparklestore_widgets_name' => 'banner_end_group_left_two',
                'sparklestore_widgets_field_type' => 'group_end',
            ),
            
            // Promo three Area


            'sparklestore_promo_three_image' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_three_image',
                'sparklestore_widgets_title' => esc_html__('Upload Promo Three Image', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'upload',
            ),

            'banner_start_group_left_three' => array(
                'sparklestore_widgets_name' => 'banner_start_group_left_three',
                'sparklestore_widgets_title' => esc_html__('Promo Section Three', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'group_start',
            ),
            
            'sparklestore_promo_three_title' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_three_title',
                'sparklestore_widgets_title' => esc_html__('Enter Promo Three Title', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'title',
            ),
            
            'sparklestore_promo_three_desc' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_three_desc',
                'sparklestore_widgets_title' => esc_html__('Enter Very Short Promo Three Description', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'textarea',
                'sparklestore_widgets_row' => 3,
            ),          
           
            'sparklestore_promo_three_button_link' => array(
                'sparklestore_widgets_name' => 'sparklestore_promo_three_button_link',
                'sparklestore_widgets_title' => esc_html__('Promo Three Button Link', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'url',
            ),

            'banner_end_group_left_three' => array(
                'sparklestore_widgets_name' => 'banner_end_group_left_three',
                'sparklestore_widgets_field_type' => 'group_end',
            ),

        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        $promo_one_title          = empty( $instance['sparklestore_promo_one_title'] ) ? '' : $instance['sparklestore_promo_one_title'];
        $promo_one_desc           = empty( $instance['sparklestore_promo_one_desc'] ) ? '' : $instance['sparklestore_promo_one_desc'];
        $promo_one_image          = empty( $instance['sparklestore_promo_one_image'] ) ? '' : $instance['sparklestore_promo_one_image'];
        $promo_one_button_link    = empty( $instance['sparklestore_promo_one_button_link'] ) ? '' : $instance['sparklestore_promo_one_button_link'];
        
        $promo_two_title          = empty( $instance['sparklestore_promo_two_title'] ) ? '' : $instance['sparklestore_promo_two_title'];
        $promo_two_desc           = empty( $instance['sparklestore_promo_two_desc'] ) ? '' : $instance['sparklestore_promo_two_desc'];
        $promo_two_image          = empty( $instance['sparklestore_promo_two_image'] ) ? '' : $instance['sparklestore_promo_two_image'];
        $promo_two_button_link    = empty( $instance['sparklestore_promo_two_button_link'] ) ? '' : $instance['sparklestore_promo_two_button_link'];
        
        $promo_three_title        = empty( $instance['sparklestore_promo_three_title'] ) ? '' : $instance['sparklestore_promo_three_title'];
        $promo_three_desc         = empty( $instance['sparklestore_promo_three_desc'] ) ? '' : $instance['sparklestore_promo_three_desc'];
        $promo_three_image        = empty( $instance['sparklestore_promo_three_image'] ) ? '' : $instance['sparklestore_promo_three_image'];
        $promo_three_button_link  = empty( $instance['sparklestore_promo_three_button_link'] ) ? '' : $instance['sparklestore_promo_three_button_link'];

        echo $before_widget; 
    ?>
        <div class="promosection">            
            <div class="container">
              <div class="row">
                    <div class="promoarea-div">
                      <div class="promoarea">
                          <?php if(!empty( $promo_one_image )) { ?>
                              <a href="<?php echo esc_url($promo_one_button_link ); ?>">
                                  <figure class="promoimage">
                                      <img src="<?php echo esc_url( $promo_one_image ); ?>"/>
                                  </figure>
                              </a>
                          <?php } ?>
                          <div class="textwrap">
                              <?php if(!empty( $promo_one_desc )) { ?><span><?php echo esc_attr( $promo_one_desc ); ?></span><?php } ?>
                              <?php if(!empty( $promo_one_title )) { ?><h2><?php echo esc_attr( $promo_one_title ); ?></h2><?php } ?>
                          </div>
                      </div>
                    </div>
                    
                    <div class="promoarea-div">
                      <div class="promoarea">                       
                          <?php if(!empty( $promo_two_image )) { ?>
                              <a href="<?php echo esc_url($promo_two_button_link ); ?>">
                                  <figure class="promoimage">
                                      <img src="<?php echo esc_url( $promo_two_image ); ?>"/>
                                  </figure>
                              </a>
                          <?php } ?>                      
                          <div class="textwrap">
                               <?php if(!empty( $promo_two_desc )) { ?><span><?php echo esc_attr( $promo_two_desc ); ?></span><?php } ?>
                              <?php if(!empty( $promo_two_title )) { ?><h2><?php echo esc_attr( $promo_two_title ); ?></h2><?php } ?>
                          </div>
                      </div>            
                    </div>            
                    
                    <div class="promoarea-div">
                      <div class="promoarea">
                          <?php if(!empty( $promo_three_image )) { ?>
                              <a href="<?php echo esc_url($promo_three_button_link ); ?>">
                                  <figure class="promoimage">
                                      <img src="<?php echo esc_url( $promo_three_image ); ?>"/>
                                  </figure>
                              </a>
                          <?php } ?>
                          <div class="textwrap">
                              <?php if(!empty( $promo_three_desc )) { ?><span><?php echo esc_attr( $promo_three_desc ); ?></span><?php } ?>
                              <?php if(!empty( $promo_three_title )) { ?><h2><?php echo esc_attr( $promo_three_title ); ?></h2><?php } ?>
                          </div>                     
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
<?php
/**
 ** Adds sparklestore_contact_info widget.
**/
add_action('widgets_init', 'sparklestore_contact_info');
function sparklestore_contact_info() {
    register_widget('sparklestore_contact_info_area');
}

class sparklestore_contact_info_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'sparklestore_contact_info_area', __('SP: Quick Contact Info','sparklestore'), array(
            'description' => __('A widget that shows quick contact information', 'sparklestore')
        ));
    }
    
    private function widget_fields() {        
        
        $fields = array( 
            
            'sparklestore_quick_contact_title' => array(
                'sparklestore_widgets_name' => 'sparklestore_quick_contact_title',
                'sparklestore_widgets_title' => __('Title', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'title',
            ),
            'sparklestore_quick_address' => array(
                'sparklestore_widgets_name' => 'sparklestore_quick_address',
                'sparklestore_widgets_title' => __('Contact Address', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'textarea',
                'sparklestore_widgets_row'    => 4,
            ),
            'sparklestore_quick_phone' => array(
                'sparklestore_widgets_name' => 'sparklestore_quick_phone',
                'sparklestore_widgets_title' => __('Contact Number', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'text',
            ),
            'sparklestore_quick_email' => array(
                'sparklestore_widgets_name' => 'sparklestore_quick_email',
                'sparklestore_widgets_title' => __('Contact Email Address', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'text',
            )                   
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        $title           = esc_attr( $instance['sparklestore_quick_contact_title'] );
        $contact_address = esc_textarea( $instance['sparklestore_quick_address'] );
        $contact_number  = esc_attr( $instance['sparklestore_quick_phone'] );
        $contact_email   = esc_attr( $instance['sparklestore_quick_email'] );
        
        echo $before_widget; 
        
        if(!empty($title)) {
          echo '<h4 class="quick-store spstore widget-title">'.$title.'</h4>';
        }
    ?>
      <div class="contacts-info">
        <?php if(!empty( $contact_address )) { ?>
          <address>
          <i class="add-icon">&nbsp;</i> <?php echo $contact_address; ?>
          </address>
        <?php }  if(!empty( $contact_number )) { ?>
          <div class="phone-footer">
            <i class="phone-icon">&nbsp;</i> <?php echo $contact_number; ?>
          </div>
        <?php }  if(!empty( $contact_email )) { ?>
          <div class="email-footer">
            <i class="email-icon">&nbsp;</i> 
            <a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo $contact_email; ?></a>
          </div>
        <?php } ?>
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
            $sparklestore_widgets_field_value = !empty($instance[$sparklestore_widgets_name]) ? esc_attr($instance[$sparklestore_widgets_name]) : '';
            sparklestore_widgets_show_widget_field($this, $widget_field, $sparklestore_widgets_field_value);
        }
    }
}
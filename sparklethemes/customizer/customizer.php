<?php
/**
 * Sparkle Store Theme Customizer.
 *
 * @package Sparkle_Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sparklestore_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

/**
 * Top Header Quick Contact Information Options 
*/
  $wp_customize->add_section( 'sparklestore_header_quickinfo', array(
      'priority'       => 25,
      'capability'     => 'edit_theme_options',
      'title'          => __( 'Quick Contact Info', 'sparklestore' )
  ) );

      $wp_customize->add_setting('sparklestore_email_icon', array(
          'default' => 'fa fa-envelope',
          'sanitize_callback' => 'sparklestore_text_sanitize', // done
      ));
      
      $wp_customize->add_control('sparklestore_email_icon',array(
          'type' => 'text',
          'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-truck','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
          'label' => __('Enter Email Icon', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_email_icon',
      ));
      
      $wp_customize->add_setting('sparklestore_email_title', array(
          'default' => 'sparklewpthemes@gmail.com',
          'sanitize_callback' => 'sparklestore_text_sanitize',  // done
      ));
      
      $wp_customize->add_control('sparklestore_email_title',array(
          'type' => 'text',
          'label' => __('Email Address', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_email_title',
      ));
      
      
      $wp_customize->add_setting('sparklestore_phone_icon', array(
          'default' => 'fa fa-phone',
          'sanitize_callback' => 'sparklestore_text_sanitize', // done
      ));
      
      $wp_customize->add_control('sparklestore_phone_icon',array(
          'type' => 'text',
          'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-truck','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
          'label' => __('Phone Icon', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_phone_icon',
      ));
      
      $wp_customize->add_setting('sparklestore_phone_number', array(
          'default' => '+1 800 467 1980',
          'sanitize_callback' => 'sparklestore_text_sanitize',  // done
      ));
      
      $wp_customize->add_control('sparklestore_phone_number',array(
          'type' => 'text',
          'label' => __('Phone Number', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_phone_number',
      ));

      $wp_customize->add_setting('sparklestore_address_icon', array(
          'default' => 'fa fa-map-marker',
          'sanitize_callback' => 'sparklestore_text_sanitize', // done
      ));
      
      $wp_customize->add_control('sparklestore_address_icon',array(
          'type' => 'text',
          'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-truck','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
          'label' => __('Address Icon', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_address_icon',
      ));
      
      $wp_customize->add_setting('sparklestore_map_address', array(
          'default' => '123 Main Street, Anytown, CA 78564 USA',
          'sanitize_callback' => 'sparklestore_text_sanitize',  // done
      ));
      
      $wp_customize->add_control('sparklestore_map_address',array(
          'type' => 'text',
          'label' => __('Address', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_map_address',
      ));    
      
      
      $wp_customize->add_setting('sparklestore_start_open_icon', array(
          'default' => 'fa fa-clock-o',
          'sanitize_callback' => 'sparklestore_text_sanitize', // done
      ));
      
      $wp_customize->add_control('sparklestore_start_open_icon',array(
          'type' => 'text',
          'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-truck','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
          'label' => __('Start Time Icon', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_start_open_icon',
      ));
      
      $wp_customize->add_setting('sparklestore_start_open_time', array(
          'default' => 'Mon - Fri : 08:00 - 17:00',
          'sanitize_callback' => 'sparklestore_text_sanitize',  // done
      ));
      
      $wp_customize->add_control('sparklestore_start_open_time',array(
          'type' => 'text',
          'label' => __('Opening Time', 'sparklestore'),
          'section' => 'sparklestore_header_quickinfo',
          'setting' => 'sparklestore_start_open_time',
      ));
      
/**
 * General Settings Panel
*/
$wp_customize->add_panel('sparklestore_general_settings', array(
   'capabitity' => 'edit_theme_options',
   'priority' => 25,
   'title' => __('General Settings', 'sparklestore')
));

    $wp_customize->get_section('title_tagline')->panel = 'sparklestore_general_settings';
    $wp_customize->get_section('title_tagline' )->priority = 1;

    $wp_customize->get_section('header_image')->panel = 'sparklestore_general_settings';
    $wp_customize->get_section('header_image' )->priority = 2;

    $wp_customize->get_section('colors')->title = __( 'Themes Colors', 'sparklestore' );
    $wp_customize->get_section('colors')->panel = 'sparklestore_general_settings';
    $wp_customize->get_section('header_image' )->priority = 3;

    $wp_customize->get_section('background_image')->panel = 'sparklestore_general_settings';
    $wp_customize->get_section('header_image' )->priority = 4;

    /**
     * Web Page Layout Section
    */
    $wp_customize->add_section( 'sparklestore_web_page_layout', array(
        'title'           =>      __('WebLayout Options', 'sparklestore'),
        'panel'           =>     'sparklestore_general_settings'
    ));

      $wp_customize->add_setting('sparklestore_web_page_layout_options', array(
          'default' => 'disable',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'sparklestore_radio_enable_disable_sanitize',
          //'transport' => 'postMessage'
      ));

      $wp_customize->add_control('sparklestore_web_page_layout_options', array(
          'type' => 'radio',
          'label' => __('Enable / Disable Top Header', 'sparklestore'),
          'section' => 'sparklestore_web_page_layout',
          'settings' => 'sparklestore_web_page_layout_options',
          'choices' => array(
            'enable' => __('Boxed Layout', 'sparklestore'),
            'disable' => __('Full Width Layout', 'sparklestore')
          )
      ));

/**
 * Services Section
*/
	$wp_customize->add_section( 'sparklestore_services_area', array(
		'title'           =>      __('Services Area Settings', 'sparklestore'),
		'priority'        =>      '61',
  ));

      $wp_customize->add_setting('sparklestore_services_area_settings', array(
          'default' => 'enable',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'sparklestore_radio_enable_disable_sanitize',
          'transport' => 'postMessage'
    	));

    	$wp_customize->add_control('sparklestore_services_area_settings', array(
    		'type' => 'radio',
    		'label' => __('Enable/Disable Section', 'sparklestore'),
    		'section' => 'sparklestore_services_area',
    		'settings' => 'sparklestore_services_area_settings',
    		'choices' => array(
             'enable' => __('Enable', 'sparklestore'),
             'disable' => __('Disable', 'sparklestore')
            )
    	));

    	$wp_customize->add_setting('sparklestore_services_section', array(
            'default' => 'enable',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sparklestore_radio_enable_disable_sanitize'  //done
    	));

    	$wp_customize->add_control('sparklestore_services_section', array(
    		'type' => 'radio',
    		'label' => __('Manage Services Area Location', 'sparklestore'),
    		'section' => 'sparklestore_services_area',
    		'settings' => 'sparklestore_services_section',
    		'description' => __('Options to Manage Service Area Below the Header or Abote the Footer Area', 'sparklestore'),
    		'choices' => array(
             'enable' => __('Below the Header', 'sparklestore'),
             'disable' => __('Abover the Footer', 'sparklestore')
            )
    	));

	 // Services Area One
    	$wp_customize->add_setting('sparklestore_services_icon_one', array(
            'default' => 'fa-truck',
            'sanitize_callback' => 'sparklestore_text_sanitize', 
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_services_icon_one',array(
            'type' => 'text',
            'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-truck','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            'label' => __('Service Icon One', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_services_icon_one',
        ));
    	
    	  $wp_customize->add_setting('sparklestore_service_title_one', array(
            'default' => 'FREE SHIPPING WORLDWIDE',
            'sanitize_callback' => 'sparklestore_text_sanitize',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_title_one',array(
            'type' => 'text',
            'label' => __('Service One Title', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_title_one',
        ));

        $wp_customize->add_setting('sparklestore_service_desc_one', array(
            'default' => 'Lorem ipsum dolor sit amet.',
           	'sanitize_callback' => 'esc_textarea',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_desc_one',array(
            'type' => 'textarea',
            'label' => __('Service Area Description', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_desc_one',
        ));

    // Services Area Two
        $wp_customize->add_setting('sparklestore_services_icon_two', array(
            'default' => 'fa-headphones',
            'sanitize_callback' => 'sparklestore_text_sanitize',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_services_icon_two',array(
            'type' => 'text',
            'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-headphones','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
           'label' => __('Service Icon Two', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_services_icon_two',
        ));
    	
    	  $wp_customize->add_setting('sparklestore_service_title_two', array(
            'default' => '24X7 CUSTOMER SUPPORT',
            'sanitize_callback' => 'sparklestore_text_sanitize',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_title_two',array(
            'type' => 'text',
            'label' => __('Service Two Title', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_title_two',
        ));

        $wp_customize->add_setting('sparklestore_service_desc_two', array(
            'default' => 'Lorem ipsum dolor sit amet.',
           	'sanitize_callback' => 'esc_textarea',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_desc_two',array(
            'type' => 'textarea',
            'label' => __('Service Area Description', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_desc_two',
        ));

    // Services Area Three
        $wp_customize->add_setting('sparklestore_services_icon_three', array(
            'default' => 'fa-dollar',
            'sanitize_callback' => 'sparklestore_text_sanitize',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_services_icon_three',array(
            'type' => 'text',
            'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-dollar','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            'label' => __('Service Icon Three', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_services_icon_three',
        ));
    	
    	  $wp_customize->add_setting('sparklestore_service_title_three', array(
            'default' => 'MONEY BACK GUARANTEE',
            'sanitize_callback' => 'sparklestore_text_sanitize',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_title_three',array(
            'type' => 'text',
            'label' => __('Service Three Title', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_title_three',
        ));

        $wp_customize->add_setting('sparklestore_service_desc_three', array(
            'default' => 'Lorem ipsum dolor sit amet.',
           	'sanitize_callback' => 'esc_textarea',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_desc_three',array(
            'type' => 'textarea',
            'label' => __('Service Area Description', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_desc_three',
        ));

     // Services Area Four
        $wp_customize->add_setting('sparklestore_services_icon_four', array(
            'default' => 'fa-mobile',
            'sanitize_callback' => 'sparklestore_text_sanitize',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_services_icon_four',array(
            'type' => 'text',
            'description' => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'sparklestore' ), 'fa fa-mobile','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            'label' => __('Service Icon Four', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_services_icon_four',
        ));
    	
    	  $wp_customize->add_setting('sparklestore_service_title_four', array(
            'default' => 'HOTLINE +(888) 123-4567',
            'sanitize_callback' => 'sparklestore_text_sanitize',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_title_four',array(
            'type' => 'text',
            'label' => __('Service Four Title', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_title_four',
        ));

        $wp_customize->add_setting('sparklestore_service_desc_four', array(
            'default' => 'Lorem ipsum dolor sit amet.',
           	'sanitize_callback' => 'esc_textarea',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control('sparklestore_service_desc_four',array(
            'type' => 'textarea',
            'label' => __('Service Area Description', 'sparklestore'),
            'section' => 'sparklestore_services_area',
            'setting' => 'sparklestore_service_desc_four',
        ));

$imagepath =  get_template_directory_uri() . '/assets/images/';
class sparklestore_Image_Radio_Control extends WP_Customize_Control {
    public function render_content() {
        if ( empty( $this->choices ) )
            return;
        $name = '_customize-radio-' . $this->id;
    ?>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <ul class="controls" id = 'sparklestore-img-container'>
        <?php
            foreach ( $this->choices as $value => $label ) :
                $class = ($this->value() == $value)?'sparklestore-radio-img-selected sparklestore-radio-img-img':'sparklestore-radio-img-img';
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
            $('.controls#sparklestore-img-container li img').click(function(){
                $('.controls#sparklestore-img-container li').each(function(){
                    $(this).find('img').removeClass ('sparklestore-radio-img-selected') ;
                });
                $(this).addClass ('sparklestore-radio-img-selected') ;
            });
        });
    </script>
    <?php }
}

/**
 * Start of the WooCommerce Design panel
*/
$wp_customize->add_panel('sparklestore_woocommerce_design_options', array(
  'capabitity' => 'edit_theme_options',
  'description' => __('Mange products and singel product page settings', 'sparklestore'),
  'priority' => 62,
  'title' => __('WooCommerce Settings', 'sparklestore')
));
     
        // Site archive layout setting
        $wp_customize->add_section('sparklestore_woocommerce_products_settings', array(
          'priority' => 2,
          'title' => __('Products Pages Settings', 'sparklestore'),
          'panel' => 'sparklestore_woocommerce_design_options'
        ));

            $wp_customize->add_setting('sparklestore_woocommerce_products_page_layout', array(
              'default' => 'rightsidebar',
              'capability' => 'edit_theme_options',
              'sanitize_callback' => 'sparklestore_page_layout_sanitize'  //done
            ));

            $wp_customize->add_control(new sparklestore_Image_Radio_Control($wp_customize, 'sparklestore_woocommerce_products_page_layout', array(
              'type' => 'radio',
              'label' => __('Select Products pages Layout', 'sparklestore'),
              'section' => 'sparklestore_woocommerce_products_settings',
              'settings' => 'sparklestore_woocommerce_products_page_layout',
              'choices' => array( 
                      'leftsidebar' => $imagepath.'left-sidebar.png',  
                      'rightsidebar' => $imagepath.'right-sidebar.png',
                      'onsidebar' => $imagepath.'no-sidebar.png ',                      
                    )
            )));

            $wp_customize->add_setting('sparklestore_woocommerce_product_row', array(
              'default' => '3',
              'capability' => 'edit_theme_options',
              'sanitize_callback' => 'sparklestore_row_layout_sanitize'  //done
            ));

            $wp_customize->add_control('sparklestore_woocommerce_product_row', array(
              'type' => 'select',
              'label' => __('Select Products Pages Row', 'sparklestore'),
              'section' => 'sparklestore_woocommerce_products_settings',
              'settings' => 'sparklestore_woocommerce_product_row',
              'choices' => array( 
                      '2' => '2',  
                      '3' => '3', 
                      '4' => '4',
            )));

            $wp_customize->add_setting('sparklestore_woocommerce_display_product_number', array(
              'default' => 12,
              'capability' => 'edit_theme_options',
              'sanitize_callback' => 'sparklestore_number_sanitize'  // done
            ));

            $wp_customize->add_control('sparklestore_woocommerce_display_product_number', array(
              'type' => 'number',
              'label' => __('Enter Products Display Per Page', 'sparklestore'),
              'section' => 'sparklestore_woocommerce_products_settings',
              'settings' => 'sparklestore_woocommerce_display_product_number'
            ));

    

        // WooCommerce Singel Product Page Settings
        $wp_customize->add_section('sparklestore_woocommerce_single_products_page_settings', array(
          'priority' => 2,
          'title' => __('Single Products Page Settings', 'sparklestore'),
          'panel' => 'sparklestore_woocommerce_design_options'
        ));

        $wp_customize->add_setting('sparklestore_woocommerce_single_products_page_layout', array(
          'default' => 'rightsidebar',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'sparklestore_page_layout_sanitize'  //done
        ));

        $wp_customize->add_control(new sparklestore_Image_Radio_Control($wp_customize, 'sparklestore_woocommerce_single_products_page_layout', array(
          'type' => 'radio',
          'label' => __('Select Single Products Page Layout', 'sparklestore'),
          'section' => 'sparklestore_woocommerce_single_products_page_settings',
          'settings' => 'sparklestore_woocommerce_single_products_page_layout',
          'choices' => array( 
                  'leftsidebar' => $imagepath.'left-sidebar.png',  
                  'rightsidebar' => $imagepath.'right-sidebar.png',
                  'onsidebar' => $imagepath.'no-sidebar.png ', 
                )
        )));        

/**
 * Footer Settings Area 
*/
$wp_customize->add_panel('sparklestore_footer_settings', array(
   'capabitity' => 'edit_theme_options',
   'priority' => 63,
   'title' => __('Footer Settings', 'sparklestore')
));

        // Start of the Social Link Options
        $wp_customize->add_section('sparklestore_social_link_activate_settings', array(
            'priority' => '1',
            'title'    => __('Social Media Options', 'sparklestore'),
            'panel'    => 'sparklestore_footer_settings'
        ));

            $wp_customize->add_setting('sparklestore_social_link_activate', array(
                'default' => 1,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sparklestore_checkbox_sanitize'  //done
            ));

            $wp_customize->add_control('sparklestore_social_link_activate', array(
                'type' => 'checkbox',
                'label' => __('Check to activate social links area', 'sparklestore'),
                'section' => 'sparklestore_social_link_activate_settings',
                'settings' => 'sparklestore_social_link_activate'
            ));

            $sparklestore_social_links = array( 
                'sparklestore_social_facebook' => array(
                    'id' => 'sparklestore_social_facebook',
                    'title' => __('Facebook', 'sparklestore'),
                    'default' => esc_url( home_url( '/' ) ).'#facebook',
                ),
                'sparklestore_social_twitter' => array(
                    'id' => 'sparklestore_social_twitter',
                    'title' => __('Twitter', 'sparklestore'),
                    'default' => esc_url( home_url( '/' ) ).'#twitter',
                ),
                'sparklestore_social_googleplus' => array(
                    'id' => 'sparklestore_social_googleplus',
                    'title' => __('Google-Plus', 'sparklestore'),
                    'default' => esc_url( home_url( '/' ) ).'#googleplus',
                ),
                'sparklestore_social_pinterest' => array(
                    'id' => 'sparklestore_social_pinterest',
                    'title' => __('Pinterest', 'sparklestore'),
                    'default' => esc_url( home_url( '/' ) ).'#pinterest',
                ),
                'sparklestore_social_linkedin' => array(
                    'id' => 'sparklestore_social_linkedin',
                    'title' => __('Linkedin', 'sparklestore'),
                    'default' => esc_url( home_url( '/' ) ).'#linkedin',
                ),
                'sparklestore_social_youtube' => array(
                    'id' => 'sparklestore_social_youtube',
                    'title' => __('YouTube', 'sparklestore'),
                    'default' => esc_url( home_url( '/' ) ).'#youtube',
                )
            );

            $i = 20;
            foreach($sparklestore_social_links as $sparklestore_social_link) {
                $wp_customize->add_setting($sparklestore_social_link['id'], array(
                    'default' => $sparklestore_social_link['default'],
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw'
                ));

                $wp_customize->add_control($sparklestore_social_link['id'], array(
                    'label' => $sparklestore_social_link['title'],
                    'section'=> 'sparklestore_social_link_activate_settings',
                    'settings'=> $sparklestore_social_link['id'],
                    'priority' => $i
                ));

                $wp_customize->add_setting($sparklestore_social_link['id'].'_checkbox', array(
                    'default' => 0,
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'sparklestore_checkbox_sanitize'  // done
                ));
                $wp_customize->add_control($sparklestore_social_link['id'].'_checkbox', array(
                    'type' => 'checkbox',
                    'label' => __('Check to show in new tab', 'sparklestore'),
                    'section'=> 'sparklestore_social_link_activate_settings',
                    'settings'=> $sparklestore_social_link['id'].'_checkbox',
                    'priority' => $i
                ));
                $i++;

            }
        
        // Payment Logo Section    
        $wp_customize->add_section( 'paymentlogo_images', array(
            'title'           =>      __('Payment Logo Images', 'sparklestore'),
            'priority'        =>      '2',
            'panel'           =>      'sparklestore_footer_settings'
        ));
        
            $wp_customize->add_setting( 'paymentlogo_image_one', array(
                'default'       =>      '',
                'sanitize_callback' => 'esc_url_raw'
            ));
           
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_one', array(
                'section'       =>      'paymentlogo_images',
                'label'         =>      __('Upload Payment Logo Image', 'sparklestore'),
                'type'          =>      'image',
            )));

            $wp_customize->add_setting( 'paymentlogo_image_two', array(
                'default'       =>      '',
                'sanitize_callback' => 'esc_url_raw'  // done
            ));
           
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_two', array(
                'section'       =>      'paymentlogo_images',
                'label'         =>      __('Upload Payment Logo Image', 'sparklestore'),
                'type'          =>      'image',
            )));

            $wp_customize->add_setting( 'paymentlogo_image_three', array(
                'default'       =>      '',
                'sanitize_callback' => 'esc_url_raw'  // done
            ));
           
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_three', array(
                'section'       =>      'paymentlogo_images',
                'label'         =>      __('Upload Payment Logo Image', 'sparklestore'),
                'type'          =>      'image',
            )));

            $wp_customize->add_setting( 'paymentlogo_image_four', array(
                'default'       =>      '',
                'sanitize_callback' => 'esc_url_raw'   // done
            ));
           
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_four', array(
                'section'       =>      'paymentlogo_images',
                'label'         =>      __('Upload Payment Logo Image', 'sparklestore'),
                'type'          =>      'image',
            )));

            $wp_customize->add_setting( 'paymentlogo_image_five', array(
                'default'       =>      '',
                'sanitize_callback' => 'esc_url_raw'   // done
            ));
           
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_five', array(
                'section'       =>      'paymentlogo_images',
                'label'         =>      __('Upload Payment Logo Image', 'sparklestore'),
                'type'          =>      'image',
            )));

            $wp_customize->add_setting( 'paymentlogo_image_six', array(
                'default'       =>      '',
                'sanitize_callback' => 'esc_url_raw'  // done
            ));
           
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_six', array(
                'section'       =>      'paymentlogo_images',
                'label'         =>      __('Upload Payment Logo Image', 'sparklestore'),
                'type'          =>      'image',
            )));

        $wp_customize->add_section( 'sparklestore_copyright', array(
            'title'           =>      __('Copyright Message Area', 'sparklestore'),
            'priority'        =>      '3',
            'panel'           =>      'sparklestore_footer_settings'
        ));

            $wp_customize->add_setting('sparklestore_footer_copyright', array(
                 'default' => '',
                 'capability' => 'edit_theme_options',
                 'sanitize_callback' => 'esc_textarea'  //done
            ));

            $wp_customize->add_control('sparklestore_footer_copyright', array(
             'type' => 'textarea',
             'label' => __('Copyright', 'sparklestore'),
             'section' => 'sparklestore_copyright',
             'settings' => 'sparklestore_footer_copyright'
            ));


/**
  * Custom Css Panel
*/
$wp_customize->add_section('sparklestore_custom_css_setting', array(
   'priority' => 64,
   'title' => __('Custom CSS', 'sparklestore'),
));

        $wp_customize->add_setting('sparklestore_custom_css', array(
           'default' => '',
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'wp_filter_nohtml_kses',
        ));

        $wp_customize->add_control('sparklestore_custom_css', array(
            'type' => 'textarea',
           'label' => __('Write your custom css', 'sparklestore'),
           'section' => 'sparklestore_custom_css_setting',
           'settings' => 'sparklestore_custom_css'
        ));

    function sparklestore_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return 0;
      }
    }

    function sparklestore_radio_enable_disable_sanitize($input) {
       $valid_keys = array(
         'enable' => __('Enable', 'sparklestore'),
         'disable' => __('Disable', 'sparklestore')
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }
    }

    function sparklestore_text_sanitize( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    function sparklestore_page_layout_sanitize($input) {
        $imagepath =  get_template_directory_uri() . '/images/';
        $valid_keys = array(
          'leftsidebar' => $imagepath.'left-sidebar.png',  
          'rightsidebar' => $imagepath.'right-sidebar.png',
          'onsidebar' => $imagepath.'no-sidebar.png ',
        );
        if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
        } else {
         return '';
        }
    }

    function sparklestore_row_layout_sanitize($input) {
      $valid_keys = array(
         '2' => '2',  
         '3' => '3', 
         '4' => '4',
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
    }

    function sparklestore_number_sanitize( $int ) {
        return absint( $int );
    } 

}
add_action( 'customize_register', 'sparklestore_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function sparklestore_customize_preview_js() {
	wp_enqueue_script( 'sparklestore_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sparklestore_customize_preview_js' );

/**
 * Binds JS handlers to load Theme Customizerjs
*/
function sparklestore_registers_customizer() {

    wp_enqueue_script( 'sparklestore-customizer', get_template_directory_uri() . '/assets/js/sparklestore-customizer.js', array("jquery"), '20151215', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'sparklestore_registers_customizer' );

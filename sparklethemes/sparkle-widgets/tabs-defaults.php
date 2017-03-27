<?php
/**
 ** Adds sparklestore_tab_with_product_widget widget.
*/
add_action('widgets_init', 'sparklestore_tab_with_product_widget');
function sparklestore_tab_with_product_widget() {
    register_widget('sparklestore_tab_with_product_widget_area');
}

class sparklestore_tab_with_product_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'sparklestore_tab_with_product_widget_area', __('SP: Woo Product Tab','sparklestore'), array(
            'description' => __('A widget that shows woocommerce product in tab format (Latest, Feature, On Sale, Up Sale).', 'sparklestore')
        ));
    }
    
    private function widget_fields() {

        $fields = array(  

            'sparklestore_tab_title' => array(
                'sparklestore_widgets_name' => 'sparklestore_tab_title',
                'sparklestore_widgets_title' => __('Title', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'text',
            ),          
            
            'sparklestore_latest_product' => array(
              'sparklestore_widgets_name' => 'sparklestore_latest_product',
              'sparklestore_widgets_title' => __('Latest Products', 'sparklestore'),
              'sparklestore_widgets_field_type' => 'checkbox'
            ),

            'sparklestore_feature_product' => array(
              'sparklestore_widgets_name' => 'sparklestore_feature_product',
              'sparklestore_widgets_title' => __('Feature Products', 'sparklestore'),
              'sparklestore_widgets_field_type' => 'checkbox'
            ),

            'sparklestore_upsell_product' => array(
              'sparklestore_widgets_name' => 'sparklestore_upsell_product',
              'sparklestore_widgets_title' => __('UpSell Products', 'sparklestore'),
              'sparklestore_widgets_field_type' => 'checkbox'
            ),

            'sparklestore_on_sale' => array(
              'sparklestore_widgets_name' => 'sparklestore_on_sale',
              'sparklestore_widgets_title' => __('On Sale Products', 'sparklestore'),
              'sparklestore_widgets_field_type' => 'checkbox'
            ),

            'sparklestore_product_number' => array(
                'sparklestore_widgets_name' => 'sparklestore_product_number',
                'sparklestore_widgets_title' => __('Enter Number of Products Show', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'number',
            ), 
                                          
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        /**
        ** wp query for first block
        **/  
        $title             = esc_attr( $instance['sparklestore_tab_title'] );
        $latest_product    =   $instance['sparklestore_latest_product'];
        $feature_product   =   $instance['sparklestore_feature_product'];
        $upsell_product    =   $instance['sparklestore_upsell_product'];
        $on_sale           =   $instance['sparklestore_on_sale'];
        $product_number    = intval( $instance['sparklestore_product_number'] );        

        echo $before_widget; 
    ?>

        <div class="content-page">
            <div class="container"> 
              <!-- featured category -->
                <div class="category-product">
                    <div class="navbar nav-menu">
                        <div class="navbar-collapse">
                            <ul class="nav navbar-nav">
                              <li>
                                <?php if(!empty( $title )) { ?>
                                    <div class="new_title">
                                      <h2><?php echo $title; ?></h2>
                                    </div>
                                <?php } ?>
                              </li>
                              <?php if($latest_product == '1') { ?>
                                <li class="active">
                                  <a data-toggle="tab" href="#splatest_product">
                                    <?php _e('Latest Products','sparklestore'); ?>
                                  </a>
                                </li>
                              <?php } ?>

                              <?php if($feature_product == '1') { ?>
                                <li>
                                  <a data-toggle="tab" href="#spfeature_product">
                                    <?php _e('Feature Products','sparklestore'); ?>
                                  </a>
                                </li>
                              <?php } ?>

                              <?php if($upsell_product == '1') { ?>
                                <li>
                                  <a data-toggle="tab" href="#spon_sale">
                                    <?php _e('On Sale Products','sparklestore'); ?>
                                  </a>
                                </li>
                              <?php } ?>

                              <?php if($on_sale == '1') { ?>
                                <li>
                                  <a data-toggle="tab" href="#spupsell_product">
                                    <?php _e('Up Sell Products','sparklestore'); ?>
                                  </a>
                                </li>
                              <?php } ?>
                            </ul>
                        </div>
                      <!-- /.navbar-collapse --> 
                    </div>

                    <div class="product-bestseller">
                        <div class="product-bestseller-content">
                            <div class="product-bestseller-list">
                                <div class="tab-container"> 
                                  <?php if($latest_product == '1') { ?>
                                    <div class="tab-panel active" id="splatest_product">
                                      <div id="featured-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 products-grid">                                        
                                          <?php
                                            $latest_product = array(
                                              'post_type' => 'product',
                                              'posts_per_page' => $product_number
                                            );                        
                                              $query = new WP_Query($latest_product);
                                              if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                          ?>
                                              <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                                              
                                          <?php } } wp_reset_query(); ?>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  <?php if($feature_product == '1') { ?>
                                    <div class="tab-panel" id="spfeature_product">
                                      <div id="featured-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 products-grid">                                        
                                          <?php
                                            $feature_product = array(
                                             'post_type'        => 'product',  
                                             'meta_key'         => '_featured',  
                                             'meta_value'       => 'yes',  
                                             'posts_per_page'   => '-1'   
                                            );                       
                                            $query = new WP_Query($feature_product);
                                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                          ?>
                                              <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                                              
                                          <?php } } wp_reset_query(); ?>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  <?php if($upsell_product == '1') { ?>
                                    <div class="tab-panel" id="spon_sale">
                                      <div id="featured-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 products-grid">                                        
                                          <?php
                                            $upsell_product = array(
                                              'post_type'         => 'product',
                                              'meta_key'          => 'total_sales',
                                              'orderby'           => 'meta_value_num',
                                              'posts_per_page'    => $product_number
                                            );                       
                                              $query = new WP_Query($upsell_product);
                                              if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                          ?>
                                              <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                                              
                                          <?php } } wp_reset_query(); ?>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  <?php if($on_sale == '1') { ?>
                                    <div class="tab-panel" id="spupsell_product">
                                      <div id="featured-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 products-grid">                                        
                                          <?php                                            
                                            $on_sale = array(
                                              'post_type'      => 'product',
                                              'meta_query'     => array(
                                                'relation' => 'OR',
                                                  array( // Simple products type
                                                    'key'           => '_sale_price',
                                                    'value'         => 0,
                                                    'compare'       => '>',
                                                    'type'          => 'numeric'
                                                    ),
                                                  array( // Variable products type
                                                    'key'           => '_min_variation_sale_price',
                                                    'value'         => 0,
                                                    'compare'       => '>',
                                                    'type'          => 'numeric'
                                                    )
                                                  )
                                            );                        
                                            $query = new WP_Query($on_sale);
                                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                                          ?>
                                              <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                                              
                                          <?php } } wp_reset_query(); ?>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                </div>
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
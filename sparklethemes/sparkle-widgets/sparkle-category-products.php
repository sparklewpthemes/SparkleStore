<?php
/**
 ** Adds sparklestore_cat_with_product_widget widget.
**/
add_action('widgets_init', 'sparklestore_cat_with_product_widget');
function sparklestore_cat_with_product_widget() {
    register_widget('sparklestore_cat_with_product_widget_area');
}

class sparklestore_cat_with_product_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'sparklestore_cat_with_product_widget_area', __('SP: Woo Category With Product','sparklestore'), array(
            'description' => __('A widget that shows woocommerce category feature image with selected category products', 'sparklestore')
        ));
    }
    
    private function widget_fields() {
        
          $prod_type = array(
            'rightalign' => __('Right Align Category Image', 'sparklestore'),
            'leftalign' => __('Left Align Category Image', 'sparklestore'),
          );

          $taxonomy     = 'product_cat';
          $empty        = 1;
          $orderby      = 'name';  
          $show_count   = 0;      // 1 for yes, 0 for no
          $pad_counts   = 0;      // 1 for yes, 0 for no
          $hierarchical = 1;      // 1 for yes, 0 for no  
          $title        = '';  
          $empty        = 0;
          $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
          );

          $woocommerce_categories = array();
          $woocommerce_categories_obj = get_categories($args);
          $woocommerce_categories[''] = 'Select Product Category';
          foreach ($woocommerce_categories_obj as $category) {
            $woocommerce_categories[$category->term_id] = $category->name;
          }


        $fields = array( 
            
            'sparklestore_cat_product_title' => array(
                'sparklestore_widgets_name' => 'sparklestore_cat_product_title',
                'sparklestore_widgets_title' => __('Title', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'title',
            ),
            'sparklestore_cat_product_short_desc' => array(
                'sparklestore_widgets_name' => 'sparklestore_cat_product_short_desc',
                'sparklestore_widgets_title' => __('Very Short Description', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'textarea',
                'sparklestore_widgets_row'    => 4,
            ),
            'sparklestore_cat_image_aligment' => array(
                'sparklestore_widgets_name' => 'sparklestore_cat_image_aligment',
                'sparklestore_widgets_title' => __('Select Display Style (Image Alignment)', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'select',
                'sparklestore_widgets_field_options' => $prod_type
            ),
            'sparklestore_woo_category' => array(
                'sparklestore_widgets_name' => 'sparklestore_woo_category',
                'sparklestore_widgets_title' => __('Select Product Category', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'select',
                'sparklestore_widgets_field_options' => $woocommerce_categories
            ),
            'sparklestore_cat_product_number' => array(
                'sparklestore_widgets_name' => 'sparklestore_cat_product_number',
                'sparklestore_widgets_title' => __('Enter Number of Products Show', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'number',
            ),
            'sparklestore_cat_cat_product_info' => array(
                'sparklestore_widgets_name' => 'sparklestore_cat_cat_product_info',
                'sparklestore_widgets_title' => __('Checked to Display Category Info', 'sparklestore'),
                'sparklestore_widgets_field_type' => 'checkbox',
            ),                                 
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        /**
         * wp query for first block
        */  
        $title            = esc_attr( $instance['sparklestore_cat_product_title'] ); 
        $shot_desc        = esc_textarea( $instance['sparklestore_cat_product_short_desc'] );
        $cat_aligment     = esc_attr( $instance['sparklestore_cat_image_aligment'] );
        $product_category = intval( $instance['sparklestore_woo_category'] );
        $product_number   = intval( $instance['sparklestore_cat_product_number'] );
        $cat_info         = intval( $instance['sparklestore_cat_cat_product_info'] );

        if(!empty($product_category)){
          $cat_id = get_term($product_category,'product_cat');
          $category_id = $cat_id->term_id;
          $category_link = get_term_link( $category_id,'product_cat' );
        }
        else{
          $category_link = get_permalink( woocommerce_get_page_id( 'shop' ) );
        } 

        echo $before_widget; 
    ?>  

        <div class="categorproducts">
            <div class="container">                
            <div class="row">                
                <div id="categoryproductslider" class="categoryproductslider <?php echo $cat_aligment; ?>">
                    
                    <div class="blocktitlewrap">
                        <div class="blocktitle">
                          <?php if(!empty( $title )) { ?><h2><?php echo $title; ?></h2><?php } ?>
                          <?php if(!empty( $shot_desc )) { ?><p><?php echo $shot_desc; ?></p><?php } ?>
                        </div>
                        <div class="SparkleStoreAction">
                            <div class="sparkle-lSPrev"></div>
                            <div class="sparkle-lSNext"></div>
                        </div>
                    </div>
                    <div class="clear">
                    <div class="homeblockinner"> 
                        <?php 
                            $taxonomy = 'product_cat';                                
                            $terms = term_description( $product_category, $taxonomy );
                            $terms_name = get_term( $product_category, $taxonomy );
                            $thumbnail_id = get_woocommerce_term_meta($product_category, 'thumbnail_id', true);
                            if (!empty($thumbnail_id)) {
                              $image = wp_get_attachment_image_src($thumbnail_id, 'sparklestore-cat-image');
                            } else{ 
                                $no_image = 'https://placeholdit.imgix.net/~text?txtsize=33&txt=285%C3%97370&w=285&h=370';
                            }  
                        ?>
                        <div class="catblockwrap" <?php if (!empty($thumbnail_id)) {  ?>style="background-image:url(<?php echo esc_url($image[0]); ?>);"<?php } else{ ?>style="background-image:url(<?php echo esc_url($no_image); ?>);"<?php } ?>>
                            <a href="<?php echo esc_url($category_link); ?>" class="sparkle-overlay"></a>
                            <div class="block-title-desc">                                
                        <div class="table-outer">
                        <div class="table-inner">
                                <h2><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_attr( $terms_name->name ); ?></a></h2>
                                <?php echo $terms; ?>
                                <a href="<?php echo esc_url($category_link); ?>" class="view-bnt"><?php _e('Shop Now','sparklestore'); ?></a>
                            </div>
                        </div>                        
                        </div>                        
                        </div>                        
                    </div>
                    
                    <ul class="catwithproduct cS-hidden">                        
                        <?php 
                            $product_args = array(
                                'post_type' => 'product',
                                'tax_query' => array(
                                    array(
                                        'taxonomy'  => 'product_cat',
                                        'field'     => 'id', 
                                        'terms'     => $product_category                                                                 
                                    )),
                                'posts_per_page' => $product_number
                            );
                            $query = new WP_Query($product_args);

                            if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                        ?>
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                            
                        <?php } } wp_reset_query(); ?>                          
                    </ul>                    
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
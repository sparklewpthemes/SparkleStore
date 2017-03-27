<?php
/**
 * WooCommerce Section Start Here
*/
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
}

/**
 * Limit word function 
*/
if ( ! function_exists( 'sparklestore_word_count' ) ) {
    function sparklestore_word_count($string, $limit) {
        $stringtags = strip_tags($string);
        $stringtags = strip_shortcodes($stringtags);
        $words = explode(' ', $stringtags);
        return implode(' ', array_slice($words, 0, $limit));
    }
}

/**
 * Schema type
*/
function sparklestore_html_tag_schema() {
    $schema     = 'http://schema.org/';
    $type       = 'WebPage';

    // Is single post
    if ( is_singular( 'post' ) ) {
        $type   = 'Article';
    }

    // Is author page
    elseif ( is_author() ) {
        $type   = 'ProfilePage';
    }

    // Is search results page
    elseif ( is_search() ) {
        $type   = 'SearchResultsPage';
    }

    echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}

/**
 * Home page blog meta info
*/
if(! function_exists('sparklestore_meta_options')) {
  function sparklestore_meta_options($meta_options = array()){
      if(empty($meta_options)) { ?>
      <ul class="post-meta">
        <li><i class="fa fa-user"></i><?php _e('by','sparklestore'); ?> <?php the_author_posts_link(); ?> </li>
        <li><i class="fa fa-comments"></i><?php comments_popup_link( '0 comments', '1 comments', '% comments' ); ?> </li>
        <li><i class="fa fa-clock-o"></i><a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a></li>
      </ul>
      <?php } else {
        echo '<ul>';
          if(in_array('author', $meta_options)){ ?>
              <li><i class="fa fa-user"></i><?php _e('by','sparklestore'); ?> <?php the_author_posts_link(); ?> </li>
          <?php }        
          if(in_array('comments', $meta_options)){ ?>
            <li><i class="fa fa-comments"></i><?php comments_popup_link( '0 comments', '1 comments', '% comments' ); ?> </li>
          <?php }
          if(in_array('time', $meta_options)){ ?>
            <li><i class="fa fa-clock-o"></i><a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a></li>
          <?php } 
        echo '</ul>';      
      }     
  }
}


/**
 * Sparkle Store social links
*/
if ( ! function_exists( 'sparklestore_social_links' ) ) {
  function sparklestore_social_links() {
    if( intval(get_theme_mod('sparklestore_social_link_activate', 1 ) ) == 1 ) { ?>
      <div class="social">
        <ul>
          <?php if (esc_url(get_theme_mod('sparklestore_social_facebook'))) { ?>
              <li class="fb">
                <a href="<?php echo esc_url(get_theme_mod('sparklestore_social_facebook')); ?>" <?php if (esc_attr(get_theme_mod('sparklestore_social_facebook_checkbox', 0 )) == 1){ echo "target=_blank"; } ?>></a></li>
          <?php } ?>
          <?php if (esc_url(get_theme_mod('sparklestore_social_twitter'))) { ?>
              <li class="tw">
                <a href="<?php echo esc_url(get_theme_mod('sparklestore_social_twitter')); ?>" <?php if (esc_attr(get_theme_mod('sparklestore_social_twitter_checkbox', 0 )) == 1){ echo "target=_blank"; } ?>></a></li>
          <?php } ?>
          <?php if (esc_url(get_theme_mod('sparklestore_social_googleplus'))) { ?>
              <li class="googleplus">
                <a href="<?php echo esc_url(get_theme_mod('sparklestore_social_googleplus')); ?>" <?php if (esc_attr(get_theme_mod('sparklestore_social_googleplus_checkbox', 0 )) == 1){ echo "target=_blank"; } ?>></a></li>
          <?php } ?>
          <?php if (esc_url(get_theme_mod('sparklestore_social_pinterest'))) { ?>
              <li class="pintrest">
                <a href="<?php echo esc_url(get_theme_mod('sparklestore_social_pinterest')); ?>" <?php if (esc_attr(get_theme_mod('sparklestore_social_pinterest_checkbox', 0 )) == 1){ echo "target=_blank"; } ?>></a></li>
          <?php } ?>
          <?php if (esc_url(get_theme_mod('sparklestore_social_linkedin'))) { ?>
              <li class="linkedin">
                <a href="<?php echo esc_url(get_theme_mod('sparklestore_social_linkedin')); ?>" <?php if (esc_attr(get_theme_mod('sparklestore_social_linkedin_checkbox', 0 )) == 1){ echo "target=_blank"; } ?>></a></li>
          <?php } ?>
          <?php if (esc_url(get_theme_mod('sparklestore_social_youtube'))) { ?>
              <li class="youtube">
                <a href="<?php echo esc_url(get_theme_mod('sparklestore_social_youtube')); ?>" <?php if (esc_attr(get_theme_mod('sparklestore_social_youtube_checkbox', 0 )) == 1){ echo "target=_blank"; } ?>></a></li>
          <?php } ?>
        </ul>
      </div>
    <?php }
  } 
}
add_filter( 'sparklestore_social_links', 'sparklestore_social_links', 5 );

/**
 * Sparkle Store payment logo section
*/
if ( ! function_exists( 'sparklestore_payment_logo' ) ) {
  function sparklestore_payment_logo() { 
      $payment_logo_one = esc_url( get_theme_mod('paymentlogo_image_one') );
      $payment_logo_two = esc_url( get_theme_mod('paymentlogo_image_two') );
      $payment_logo_three = esc_url( get_theme_mod('paymentlogo_image_three') );
      $payment_logo_four = esc_url( get_theme_mod('paymentlogo_image_four') );
      $payment_logo_five = esc_url( get_theme_mod('paymentlogo_image_five') );
      $payment_logo_six = esc_url( get_theme_mod('paymentlogo_image_six') ); ?>
      <div class="payment-accept">
        <?php if(!empty($payment_logo_one)) { ?>
            <img src="<?php echo esc_url($payment_logo_one)?>" alt="" />
        <?php } ?>
        <?php if(!empty($payment_logo_two)) { ?>
            <img src="<?php echo esc_url($payment_logo_two)?>" alt="" />
        <?php } ?>
        <?php if(!empty($payment_logo_three)) { ?>
            <img src="<?php echo esc_url($payment_logo_three)?>" alt="" />
        <?php } ?>
        <?php if(!empty($payment_logo_four)) { ?>
            <img src="<?php echo esc_url($payment_logo_four)?>" alt="" />
        <?php } ?>
        <?php if(!empty($payment_logo_five)) { ?>
            <img src="<?php echo esc_url($payment_logo_five)?>" alt="" />
        <?php } ?>
        <?php if(!empty($payment_logo_six)) { ?>
            <img src="<?php echo esc_url($payment_logo_six)?>" alt="" />
        <?php } ?>
      </div>
      <?php
  }
}
add_filter( 'sparklestore_payment_logo', 'sparklestore_payment_logo', 10 );


/**
 * Sparkle Store footer menu
*/
if ( ! function_exists( 'sparklestore_footer_menu' ) ) {
  function sparklestore_footer_menu() {
    wp_nav_menu( array( 
        'container' => '', 
        'menu_class' => '', 
        'theme_location' => 'sparklefootermenu', 
        'depth' => 1  
    ) );
  }
}
add_filter( 'sparklestore_footer_menu', 'sparklestore_footer_menu', 5 );


/**
 * Sparkle Store Service section
*/
if ( ! function_exists( 'sparklestore_service_section' ) ) {
  function sparklestore_service_section() {  

      $services_icon_one = esc_attr( get_theme_mod( 'sparklestore_services_icon_one', 'fa-truck' ) );
      $service_title_one = esc_attr( get_theme_mod( 'sparklestore_service_title_one','FREE SHIPPING WORLDWIDE' ) );
      $service_desc_one = esc_attr( get_theme_mod( 'sparklestore_service_desc_one', 'Lorem ipsum dolor sit amet.' ) );

      $services_icon_two = esc_attr( get_theme_mod( 'sparklestore_services_icon_two', 'fa-headphones' ) );
      $service_title_two = esc_attr( get_theme_mod( 'sparklestore_service_title_two', '24X7 CUSTOMER SUPPORT' ) );
      $service_desc_two = esc_attr( get_theme_mod( 'sparklestore_service_desc_two', 'Lorem ipsum dolor sit amet.' ) );

      $services_icon_three = esc_attr( get_theme_mod( 'sparklestore_services_icon_three', 'fa-dollar' ) );
      $service_title_three = esc_attr( get_theme_mod( 'sparklestore_service_title_three', 'MONEY BACK GUARANTEE' ) );
      $service_desc_three = esc_attr( get_theme_mod( 'sparklestore_service_desc_three', 'Lorem ipsum dolor sit amet.' ) );

      $services_icon_four = esc_attr( get_theme_mod( 'sparklestore_services_icon_four', 'fa-mobile' ) );
      $service_title_four = esc_attr( get_theme_mod( 'sparklestore_service_title_four', 'HOTLINE +(440) 984-3157' ) );
      $service_desc_four = esc_attr( get_theme_mod( 'sparklestore_service_desc_four', 'Lorem ipsum dolor sit amet.' ) );

      $service_area = esc_attr( get_theme_mod( 'sparklestore_services_area_settings','enable' ) );

      if(!empty($service_area) && $service_area == 'enable') { ?>
        <div class="our-features-box">
          <div class="container">
            <div class="row">
              <div class="features-block">

                  <div class="feature-box-div">
                    <div class="feature-box first one"> <span class="fa <?php if(!empty( $services_icon_one )) { echo $services_icon_one; } ?>">&nbsp;</span>
                      <div class="content">
                        <?php if(!empty( $service_title_one )) { ?>
                        <h3><?php echo $service_title_one; ?></h3>
                        <?php }  if(!empty( $service_desc_one )) { ?>
                          <p><?php echo $service_desc_one; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  
                  <div class="feature-box-div">
                    <div class="feature-box first two"> <span class="fa <?php if(!empty( $services_icon_two )) { echo $services_icon_two; } ?>">&nbsp;</span>
                      <div class="content">
                        <?php if(!empty( $service_title_two )) { ?>
                        <h3><?php echo $service_title_two; ?></h3>
                        <?php }  if(!empty( $service_desc_two )) { ?>
                          <p><?php echo $service_desc_two; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>

                  <div class="feature-box-div">
                    <div class="feature-box first three"> <span class="fa <?php if(!empty( $services_icon_three )) { echo $services_icon_three; } ?>">&nbsp;</span>
                      <div class="content">
                        <?php if(!empty( $service_title_three )) { ?>
                        <h3><?php echo $service_title_three; ?></h3>
                        <?php }  if(!empty( $service_desc_three )) { ?>
                          <p><?php echo $service_desc_three; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>

                  <div class="feature-box-div">
                    <div class="feature-box first last"> <span class="fa <?php if(!empty( $services_icon_four )) { echo $services_icon_four; } ?>">&nbsp;</span>
                      <div class="content">
                        <?php if(!empty( $service_title_four )) { ?>
                        <h3><?php echo $service_title_four; ?></h3>
                        <?php }  if(!empty( $service_desc_four )) { ?>
                          <p><?php echo $service_desc_four; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
            
              </div>
            </div>
          </div>
        </div>
      <?php  } 
  } 
}
add_action('sparklestore_services_area','sparklestore_service_section', 5);
 

/**
 *Comment Callback function
*/
if ( ! function_exists( 'sparklestore_comment' ) ) {
  function sparklestore_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment-body" id="comment-<?php comment_ID(); ?>">
              <div class="img-thumbnail">
                <?php echo get_avatar($comment,$size='100'); ?>
              </div>             

              <div class="comment-block">

                  <div class="comment-arrow"></div>

                  <span class="comment-by">
                    <?php printf(__('<strong>%s</strong>','sparklestore'), get_comment_author_link()) ?>
                    <span class="pt-right">
                      <span> </span>
                      <span><i class="fa fa-reply"></i><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                    </span>
                  </span>

                  <div>

                      <?php if ($comment->comment_approved == '0') : ?>
                           <em><?php _e('Your comment is awaiting moderation.','sparklestore') ?></em>
                           <br />
                      <?php endif; ?>

                      <?php comment_text() ?>
                  </div>
                  
                  <span class="date pt-right">
                      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                        <?php printf(__('%1$s at %2$s','sparklestore'), get_comment_date(),  get_comment_time()) ?>
                      </a>
                  </span>

              </div>
        </div>
  <?php
  }
}


/**
 * Page and Post Page Display Layout Metabox function
*/
add_action('add_meta_boxes', 'sparklestore_metabox_section');
if ( ! function_exists( 'sparklestore_metabox_section' ) ) {
    function sparklestore_metabox_section(){   
        add_meta_box('sparklestore_display_layout', 
            __( 'Display Layout Options', 'sparklestore' ), 
            'sparklestore_display_layout_callback', 
            array('page','post'), 
            'normal', 
            'high'
        );
    }
}

$sparklestore_page_layouts =array(

    'leftsidebar' => array(
        'value'     => 'leftsidebar',
        'label'     => __( 'Left Sidebar', 'sparklestore' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
    ),
    'rightsidebar' => array(
        'value'     => 'rightsidebar',
        'label'     => __( 'Right (Default)', 'sparklestore' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
    ),
     'nosidebar' => array(
        'value'     => 'nosidebar',
        'label'     => __( 'Full width', 'sparklestore' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
    ),
    'bothsidebar' => array(
        'value'     => 'bothsidebar',
        'label'     => __( 'Both Sidebar', 'sparklestore' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/both-sidebar.png',
    )
);

/**
 * Function for Page layout meta box
*/
if ( ! function_exists( 'sparklestore_display_layout_callback' ) ) {
    function sparklestore_display_layout_callback(){
        global $post, $sparklestore_page_layouts;
        wp_nonce_field( basename( __FILE__ ), 'sparklestore_settings_nonce' ); ?>
        <table>
            <tr>
              <td>            
                <?php
                  $i = 0;  
                  foreach ($sparklestore_page_layouts as $field) {  
                  $sparklestore_page_metalayouts = esc_attr( get_post_meta( $post->ID, 'sparklestore_page_layouts', true ) ); 
                ?>            
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo $i; ?>" style="float:left; margin-right:30px;">
                    <label class="description">
                        <span>
                          <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </span></br>
                        <input type="radio" name="sparklestore_page_layouts" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], 
                            $sparklestore_page_metalayouts ); if(empty($sparklestore_page_metalayouts) && $field['value']=='rightsidebar'){ echo "checked='checked'";  } ?>/>
                         <?php echo $field['label']; ?>
                    </label>
                  </div>
                <?php  $i++; }  ?>
              </td>
            </tr>            
        </table>
    <?php
    }
}

/**
 * Save the custom metabox data
*/
if ( ! function_exists( 'sparklestore_save_page_settings' ) ) {
    function sparklestore_save_page_settings( $post_id ) { 
        global $sparklestore_page_layouts, $post; 
        if ( !isset( $_POST[ 'sparklestore_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'sparklestore_settings_nonce' ], basename( __FILE__ ) ) )
            return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;        
        if ('page' == $_POST['post_type']) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;  
        }    
        foreach ($sparklestore_page_layouts as $field) {  
            $old = get_post_meta( $post_id, 'sparklestore_page_layouts', true); 
            $new = sanitize_text_field($_POST['sparklestore_page_layouts']);
            if ($new && $new != $old) {  
                update_post_meta($post_id, 'sparklestore_page_layouts', $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id,'sparklestore_page_layouts', $old);  
            } 
         } 
    }
}
add_action('save_post', 'sparklestore_save_page_settings');



/**
 * Sparklestore_breadcrumbs
*/
if ( ! function_exists( 'sparklestore_breadcrumbs' ) ) {
    function sparklestore_breadcrumbs(){ ?>
        <div class="breadcrumbs">
          <div class="container">
            <?php if( is_archive() || is_category() ) {
                    the_archive_title( '<h1 class="entry-title">', '</h1>' );
                }elseif( is_search() ){ ?>
                    <h1 class="entry-title"><?php printf( esc_html__( 'Search Results for : %s', 'sparklestore' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                <?php }else{
                    the_title( '<h1 class="entry-title">', '</h1>' ); 
                }
            ?>
            <ul>
              <?php sparkle_store_breadcrumbs(); ?>
            </ul>
          </div>
        </div>
      <?php 
    } 
}
add_action( 'sparklestore-breadcrumbs', 'sparklestore_breadcrumbs' );


/**
 * WooCommerce product and product single apge breadcrumbs
*/
if ( ! function_exists( 'sparklestore_breadcrumb_woocommerce' ) ) {
    function sparklestore_breadcrumb_woocommerce(){ ?>
      <div class="breadcrumbs">
        <div class="container">
          <?php if( is_product() ) {
                  the_title( '<h1 class="entry-title">', '</h1>' ); 
              }elseif( is_search() ){ ?>
                    <h1 class="entry-title"><?php printf( esc_html__( 'Search Results for : %s', 'sparklestore' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
              <?php }else{
                  the_archive_title( '<h1 class="entry-title">', '</h1>' );
              }
          ?>
          <ul>
            <?php woocommerce_breadcrumb(); ?>
          </ul>
        </div>
      </div>
    <?php 
    } 
}
add_action( 'breadcrumb-woocommerce', 'sparklestore_breadcrumb_woocommerce' );


/**
 * Sparklestore breadcrumbs function area
*/
if (!function_exists('sparkle_store_breadcrumbs')) {

  function sparkle_store_breadcrumbs() {
      global $post;
        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '/';      
        $home = __('Home', 'sparklestore'); // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        $homeLink = esc_url( home_url() );
        if ( is_home() || is_front_page() ) {

          if ($showOnHome == 1)
            echo '<li><a href="' . $homeLink . '">' . $home . '</a></li></li>';
        } else {
          echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if ( is_category() ) {
          $thisCat = get_category(get_query_var('cat'), false);
          if ($thisCat->parent != 0)
            echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
          echo $before . __('Archive by category','sparklestore').' "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
          echo $before . __('Search results for','sparklestore'). '"' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
          echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
          echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
          echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
          echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
          if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
            if ($showCurrent == 1)
              echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
          } else {
            $cat = get_the_category();
            $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            if ($showCurrent == 0)
              $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
            echo $cats;
            if ($showCurrent == 1)
              echo $before . get_the_title() . $after;
          }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
          $post_type = get_post_type_object(get_post_type());
          echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
          $parent = get_post($post->post_parent);
          $cat = get_the_category($parent->ID);
          $cat = $cat[0];
          echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a>';
          if ($showCurrent == 1)
            echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
          if ($showCurrent == 1)
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
          $parent_id = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . esc_url( get_permalink($page->ID) ) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo $breadcrumbs[$i];
            if ($i != count($breadcrumbs) - 1)
              echo ' ' . $delimiter . ' ';
          }
          if ($showCurrent == 1)
            echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif (is_tag()) {
          echo $before . __('Posts tagged','sparklestore').' "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
          global $author;
          $userdata = get_userdata($author);
          echo $before . __('Articles posted by ','sparklestore'). $userdata->display_name . $after;
        } elseif (is_404()) {
          echo $before . 'Error 404' . $after;
        }

        if (get_query_var('paged')) {
          if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
              echo __('Page', 'sparklestore') . ' ' . get_query_var('paged');
              if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo ')';
      }
      echo '</li>';
    }
  }

}

/**
 * Sparklestore pagination function area
*/
if (!function_exists('sparklestore_pagination')) {

  function sparklestore_pagination($pages = '', $range = 1){  
       $showitems = ($range * 2)+1;
       global $paged;
       if(empty($paged)) $paged = 1;   
       if($pages == ''){
           global $wp_query;
           $pages = $wp_query->max_num_pages;
           if(!$pages){
               $pages = 1;
           }
       }   
   
      if(1 != $pages){
         echo "<div class=\"pagination\"><span>".__('Page','sparklestore')." ".$paged." ".__('of','sparklestore')." ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; ".__('First','sparklestore')."</a>";
          if($paged > 1 && $showitems < $pages) echo "<a href='".esc_url( get_pagenum_link($paged - 1) )."'>&lsaquo; ".__('Previous','sparklestore')."</a>";
  
          for ($i=1; $i <= $pages; $i++){
              if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
              {
                  echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
              }
          }    
          if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">".__('Next','sparklestore')." &rsaquo;</a>";  
          if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>".__('Last','sparklestore')." &raquo;</a>";
          echo "</div>\n";
      }
  }
}


/**
 * Themes required Plugins Install Section
*/
if ( ! function_exists( 'sparklestore_root_register_required_plugins' ) ) {
  function sparklestore_root_register_required_plugins() {

      $plugins = array(
        
          array(
              'name' => 'WooCommerce',
              'slug' => 'woocommerce',
              'required' => false,
          ),

          array(
              'name' => 'YITH WooCommerce Quick View',
              'slug' => 'yith-woocommerce-quick-view',
              'required' => false,
          ),

           array(
              'name' => 'YITH WooCommerce Compare',
              'slug' => 'yith-woocommerce-compare',
              'required' => false,
          ),

          array(
              'name' => 'YITH WooCommerce Wishlist',
              'slug' => 'yith-woocommerce-wishlist',
              'required' => false,
          ),

          array(
            'name' => 'WooCommerce Grid / List toggle',
            'slug' => 'woocommerce-grid-list-toggle',
            'required' => false,
          )            
      );

      $config = array(
          'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
          'default_path' => '', // Default absolute path to pre-packaged plugins.
          'menu' => 'tgmpa-install-plugins', // Menu slug.
          'parent_slug' => 'themes.php', // Parent menu slug.
          'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
          'has_notices' => true, // Show admin notices or not.
          'dismissable' => true, // If false, a user cannot dismiss the nag message.
          'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
          'is_automatic' => true, // Automatically activate plugins after installation or not.
          'message' => '', // Message to output right before the plugins table.
          'strings' => array(
              'page_title' => __('Install Required Plugins', 'sparklestore'),
              'menu_title' => __('Install Plugins', 'sparklestore'),
              'installing' => __('Installing Plugin: %s', 'sparklestore'), // %s = plugin name.
              'oops' => __('Something went wrong with the plugin API.', 'sparklestore'),
              'notice_can_install_required' => _n_noop(
                      'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_can_install_recommended' => _n_noop(
                      'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_cannot_install' => _n_noop(
                      'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update' => _n_noop(
                      'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update_maybe' => _n_noop(
                      'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_cannot_update' => _n_noop(
                      'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_can_activate_required' => _n_noop(
                      'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_can_activate_recommended' => _n_noop(
                      'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'notice_cannot_activate' => _n_noop(
                      'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'sparklestore'
              ), // %1$s = plugin name(s).
              'install_link' => _n_noop(
                      'Begin installing plugin', 'Begin installing plugins', 'sparklestore'
              ),
              'update_link' => _n_noop(
                      'Begin updating plugin', 'Begin updating plugins', 'sparklestore'
              ),
              'activate_link' => _n_noop(
                      'Begin activating plugin', 'Begin activating plugins', 'sparklestore'
              ),
              'return' => __('Return to Required Plugins Installer', 'sparklestore'),
              'plugin_activated' => __('Plugin activated successfully.', 'sparklestore'),
              'activated_successfully' => __('The following plugin was activated successfully:', 'sparklestore'),
              'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'sparklestore'), // %1$s = plugin name(s).
              'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'sparklestore'), // %1$s = plugin name(s).
              'complete' => __('All plugins installed and activated successfully. %1$s', 'sparklestore'), // %s = dashboard link.
              'contact_admin' => __('Please contact the administrator of this site for help.', 'sparklestore'),
              'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
          )
      );
      tgmpa($plugins, $config);
  }
}
add_action('tgmpa_register', 'sparklestore_root_register_required_plugins');

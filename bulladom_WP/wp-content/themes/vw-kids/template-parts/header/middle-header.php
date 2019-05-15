<?php
/**
 * The template part for header
 *
 * @package VW Kids 
 * @subpackage vw_kids
 * @since VW Kids 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="logo">
          <?php if( has_custom_logo() ){ vw_kids_the_custom_logo();
            }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html($description); ?></p>
          <?php endif; } ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <?php if(function_exists(get_product_search_form)){ get_product_search_form(); } ?>
      </div>
      <div class="col-lg-2 col-md-6">
        <div class="account">
          <?php if(class_exists('woocommerce')){ ?>
            <?php if ( is_user_logged_in() ) { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('My Account','vw-kids'); ?>"><i class="fas fa-sign-in-alt"></i><?php esc_html_e('My Account','vw-kids'); ?></a>
            <?php }
            else { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('Login / Register','vw-kids'); ?>"><i class="fas fa-user"></i><?php esc_html_e('Login / Register','vw-kids'); ?></a>
            <?php } ?>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-1 col-md-6">
        <?php if(class_exists('woocommerce')){ ?>
            <span class="cart_no">
              <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_html_e( 'shopping cart','vw-kids' ); ?>"><i class="fas fa-shopping-basket"></i></a>
              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
            </span>
          <?php } ?>
      </div>
    </div>
  </div>
</div>
<div id="menu-box">
  <div class="container">
    <?php get_template_part( 'template-parts/header/navigation' ); ?>
  </div>
</div>

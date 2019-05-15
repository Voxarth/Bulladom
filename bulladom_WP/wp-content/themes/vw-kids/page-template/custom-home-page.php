<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php do_action( 'vw_kids_before_slider' ); ?>

<section id="cate_slider">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="categry-title">
          <h4><i class="fa fa-bars" aria-hidden="true"></i><?php echo esc_html_e('ALL CATEGORIES','vw-kids'); ?></h4>
        </div>
        <?php if(class_exists('woocommerce')){ ?>
          <div class="product-cat" id="style-2">
            <?php
              $args = array(
                //'number'     => $number,
                'orderby'    => 'title',
                'order'      => 'ASC',
                'hide_empty' => 0,
                'parent'  => 0
                //'include'    => $ids
              );
              $product_categories = get_terms( 'product_cat', $args );
              $count = count($product_categories);
              if ( $count > 0 ){
                  foreach ( $product_categories as $product_category ) {
                    $cat_id   = $product_category->term_id;
                    $cat_link = get_category_link( $cat_id );
                    if ($product_category->category_parent == 0) { ?>
                  <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                  <?php
                }
                  echo esc_html( $product_category->name ); ?></a><i class="fas fa-caret-right"></i></li>
                  <?php
                  }
                }
            ?>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-9 col-md-9">
        <?php if( get_theme_mod( 'vw_kids_slider_arrows') != '') { ?>
          <section id="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
              <?php $pages = array();
                for ( $count = 1; $count <= 4; $count++ ) {
                  $mod = intval( get_theme_mod( 'vw_kids_slider_page' . $count ));
                  if ( 'page-none-selected' != $mod ) {
                    $pages[] = $mod;
                  }
                }
                if( !empty($pages) ) :
                  $args = array(
                    'post_type' => 'page',
                    'post__in' => $pages,
                    'orderby' => 'post__in'
                  );
                  $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    $i = 1;
              ?>     
              <div class="carousel-inner" role="listbox">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                    <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                    <div class="carousel-caption">
                      <div class="inner_carousel">
                        <h2><?php the_title(); ?></h2>
                        <hr>
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_kids_string_limit_words( $excerpt,15 ) ); ?></p>
                        <div class="more-btn">
                          <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'SHOP NOW','vw-kids' ); ?><i class="fa fa-angle-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php $i++; endwhile; 
                wp_reset_postdata();?>
              </div>
              <?php else : ?>
                  <div class="no-postfound"></div>
              <?php endif;
              endif;?>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
              </a>
            </div>
            <div class="clearfix"></div>
          </section>
        <?php } ?>
      </div>
    </div>    
  </div>
</section>

<?php do_action( 'vw_kids_after_slider' ); ?>

<section id="popular-toys">
  <div class="container">
    <?php $pages = array();
      $mod = absint( get_theme_mod( 'vw_kids_popular_product','vw-kids'));
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $count = 0;
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <hr>
            <?php the_content(); ?>
          <?php $count++; endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;
      wp_reset_postdata()
    ?>
  </div>  
</section>

<?php do_action( 'vw_kids_after_popular_toys' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>
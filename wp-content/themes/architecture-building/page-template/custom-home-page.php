<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <section id="slider">
    <div class="owl-carousel">
      <?php
        $slider_category=  get_theme_mod('architecture_building_post_setting');if($slider_category){
        $page_query = new WP_Query(array( 'category_name' => esc_html($slider_category ,'architecture-building')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="slide-box">
            <?php the_post_thumbnail(); ?>
            <div class="slide-inner-box">
              <h2 class="slider-title"><?php the_title();?></h2>
              <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'20') );?></p>
              <div class="home-btn text-center my-4">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Get a Quote','architecture-building'); ?></a>
              </div>
            </div>
          </div>
          <?php endwhile;
        wp_reset_postdata();
      }?>
    </div>
  </section>

  <section id="home-services" class="py-5">
    <div class="container">
      <?php if( get_theme_mod('architecture_building_services_heading') != ''){ ?>
        <div class="text-center">
          <h3><?php echo esc_html(get_theme_mod('architecture_building_services_heading','')); ?></h3>
        </div>
      <?php }?>
      <?php if( get_theme_mod('architecture_building_services_heading_text') != ''){ ?>
        <div class="service-text">
          <p class="text-center"><?php echo esc_html(get_theme_mod('architecture_building_services_heading_text','')); ?></p>
        </div>
      <?php }?>
      <div class="row pt-4">
        <?php
          $project_category=  get_theme_mod('architecture_building_services_category_setting');if($project_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html($project_category ,'architecture-building')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="box mb-4">
                  <?php the_post_thumbnail(); ?>
                  <div class="box-content">
                    <h4 class="title"><?php the_title();?></h4>
                    <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'20') );?></p>
                    <div class="home-btn my-2">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Get a Quote','architecture-building'); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
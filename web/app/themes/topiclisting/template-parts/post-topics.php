<section class="explore-section section-padding" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="mb-4">Browse Topics</h2>
      </div>
    </div>
  </div>

  <?php
  $categories = get_categories([
    'orderby' => 'name',
    'order'   => 'ASC',
    'exclude' => [1],
  ]);
  ?>

  <div class="container-fluid">
    <div class="row">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php foreach ($categories as $index => $cat) :
          $cat_slug = $cat->slug;
          $cat_name = $cat->name;
          $is_active = $index === 0 ? 'active' : '';
        ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $is_active; ?>" id="<?php echo $cat_slug; ?>-tab"
              data-bs-toggle="tab"
              data-bs-target="#<?php echo $cat_slug; ?>-tab-pane"
              type="button" role="tab"
              aria-controls="<?php echo $cat_slug; ?>-tab-pane"
              aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>">
              <?php echo esc_html($cat_name); ?>
            </button>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="tab-content" id="myTabContent">
          <?php foreach ($categories as $index => $cat) :
            $cat_slug  = $cat->slug;
            $cat_name  = $cat->name;
            $is_active = $index === 0 ? 'show active' : '';
            $query = new WP_Query([
              'category_name'  => $cat_slug,
              'posts_per_page' => 3,
            ]);
            $post_count = $query->post_count;
          ?>
            <div class="tab-pane fade <?php echo $is_active; ?>" id="<?php echo $cat_slug; ?>-tab-pane" role="tabpanel" aria-labelledby="<?php echo $cat_slug; ?>-tab" tabindex="0">
              <div class="row">
                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                  $is_featured = get_post_meta(get_the_ID(), '_is_featured_post', true);
                  $col_class = $is_featured ? 'col-lg-6 col-md-6 col-12' : ($post_count === 2 ? 'col-lg-6 col-md-6 col-12 mb-4 mb-lg-3' : 'col-lg-4 col-md-6 col-12 mb-4');
                  $block_class = $is_featured ? 'custom-block custom-block-overlay' : 'custom-block bg-white shadow-lg';
                ?>
                  <div class="<?php echo esc_attr($col_class); ?>">
                    <div class="<?php echo esc_attr($block_class); ?>">
                      <?php if ($is_featured): ?>
                        <div class="d-flex flex-column h-100">
                          <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="custom-block-image img-fluid" alt="">
                          <?php endif; ?>
                          <div class="custom-block-overlay-text d-flex">
                            <div>
                              <h5 class="text-white mb-2"><?php the_title(); ?></h5>
                              <p class="text-white"><?php the_excerpt(); ?></p>
                              <a href="<?php the_permalink(); ?>" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>
                            <span class="badge bg-<?php echo esc_attr($cat_slug); ?> rounded-pill ms-auto">
                              <?php echo get_comments_number(); ?>
                            </span>
                          </div>
                          <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>
                            <ul class="social-icon">
                              <li class="social-icon-item"><a href="#" class="social-icon-link bi-twitter"></a></li>
                              <li class="social-icon-item"><a href="#" class="social-icon-link bi-facebook"></a></li>
                              <li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li>
                            </ul>
                            <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                          </div>
                          <div class="section-overlay"></div>
                        </div>
                      <?php else: ?>
                        <a href="<?php the_permalink(); ?>">
                          <div class="d-flex">
                            <div>
                              <h5 class="mb-2"><?php the_title(); ?></h5>
                              <p class="mb-0"><?php the_excerpt(); ?></p>
                            </div>
                            <span class="badge bg-<?php echo esc_attr($cat_slug); ?> rounded-pill ms-auto">
                              <?php echo get_comments_number(); ?>
                            </span>
                          </div>
                          <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="custom-block-image img-fluid" alt="">
                          <?php endif; ?>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endwhile; wp_reset_postdata(); else : ?>
                  <p class="text-muted">No posts found in <?php echo esc_html($cat_name); ?>.</p>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="featured-section">
  <div class="container">
    <div class="row justify-content-center">

      <?php if (get_field('fc_small_title')): ?>
      <div class="col-lg-4 col-12 mb-4 mb-lg-0">
        <div class="custom-block custom-block-featured bg-white shadow-lg">
          <a href="<?php the_field('fc_small_link'); ?>">
            <div class="content-area">
              <div class="d-flex justify-content-between">
                <div>
                  <h5 class="mb-2"><?php the_field('fc_small_title'); ?></h5>
                  <p class="mb-0"><?php the_field('fc_small_text'); ?></p>
                </div>
                <span class="badge bg-design rounded-pill ms-auto">
                  <?php the_field('fc_small_badge_text'); ?>
                </span>
              </div>
            </div>
            <div class="image-area">
              <img src="<?php echo esc_url(get_field('fc_small_image')['url']); ?>" class="custom-block-image img-fluid" alt="">
            </div>
          </a>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_field('fc_large_title')): ?>
      <div class="col-lg-6 col-12">
        <div class="custom-block custom-block-featured custom-block-overlay">
          <img src="<?php echo esc_url(get_field('fc_large_image')['url']); ?>" class="custom-block-image img-fluid" alt="">
          <div class="custom-block-overlay-text d-flex">
            <div>
              <h5 class="text-white mb-2"><?php the_field('fc_large_title'); ?></h5>
              <p class="text-white"><?php the_field('fc_large_text'); ?></p>
              <a href="<?php the_field('fc_large_link'); ?>" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
            </div>
            <span class="badge bg-finance rounded-pill ms-auto"><?php the_field('fc_large_badge_text'); ?></span>
          </div>
          <div class="social-share d-flex">
              <p class="text-white me-4">Share:</p>
              <!-- You can hardcode or optionally make social links dynamic -->
              <ul class="social-icon">
                <li class="social-icon-item"><a href="#" class="social-icon-link bi-twitter"></a></li>
                <li class="social-icon-item"><a href="#" class="social-icon-link bi-facebook"></a></li>
                <li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li>
              </ul>
              <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
            </div>
            <div class="section-overlay"></div>
          </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php

/**
 * Timeline Section Template
 * Displays a vertical timeline with icon + text blocks
 * ACF fields expected: ts_title_1..5, ts_text_1..5, ts_icon_1..5, timeline_title, timeline_cta_*
 */

// Optional: Helper function to get ACF icon with fallback and bi- prefix
function topiclisting_get_bi_icon($field_name, $default = 'check')
{
  $icon = get_field($field_name);

  if (!$icon) return 'bi-' . $default;

  // Normalize: trim, lowercase, and enforce prefix
  $icon = strtolower(trim($icon));
  if (!str_starts_with($icon, 'bi-')) {
    $icon = 'bi-' . $icon;
  }

  return esc_attr($icon);
}


?>

<section class="timeline-section section-padding" id="howitworks">
  <div class="section-overlay"></div>

  <div class="container">
    <div class="row">

      <!-- Section Title -->
      <div class="col-12 text-center">
        <h2 class="text-white mb-4">
          <?php echo esc_html(get_field('timeline_title')); ?>
        </h2>
      </div>

      <!-- Timeline Content -->
      <div class="col-lg-10 col-12 mx-auto">
        <div class="timeline-container">
          <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
            <div class="list-progress">
              <div class="inner"></div>
            </div>

            <?php for ($i = 1; $i <= 5; $i++) :
              $title = get_field("ts_title_$i");
              $text  = get_field("ts_text_$i");
              $icon  = topiclisting_get_bi_icon("ts_icon_$i");

              if ($title && $text) : ?>
                <li>
                  <h4 class="text-white mb-3"><?php echo esc_html($title); ?></h4>
                  <p class="text-white"><?php echo esc_html($text); ?></p>
                  <div class="icon-holder">
                    <i class="<?php echo topiclisting_get_bi_icon("ts_icon_$i"); ?>"></i>
                  </div>

                </li>
            <?php endif;
            endfor; ?>

          </ul>
        </div>
      </div>

      <!-- Call to Action -->
      <div class="col-12 text-center mt-5">
        <p class="text-white">
          <?php echo esc_html(get_field('timeline_cta_text')); ?>

          <?php if (get_field('timeline_cta_button_text')) : ?>
            <a href="<?php echo esc_url(get_field('timeline_cta_link')); ?>" class="btn custom-btn custom-border-btn ms-3">
              <?php echo esc_html(get_field('timeline_cta_button_text')); ?>
            </a>
          <?php endif; ?>

          <?php if (get_field('timeline_cta_button_show_2')) : ?>
            <a href="<?php echo esc_url(get_field('timeline_cta_link_2')); ?>" class="btn custom-btn custom-border-btn ms-3">
              <?php echo esc_html(get_field('timeline_cta_button_text_2')); ?>
            </a>
          <?php endif; ?>
        </p>
      </div>


    </div>
  </div>
</section>
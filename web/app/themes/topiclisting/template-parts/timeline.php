<?php
/**
 * Timeline Section Template
 * Displays a vertical timeline from hardcoded ACF fields (not repeater)
 */

function topiclisting_get_bi_icon($field_name, $post_id = null, $default = 'check') {
  $icon = get_field($field_name, $post_id);
  if (!$icon) return 'bi-' . $default;
  $icon = strtolower(trim($icon));
  return str_starts_with($icon, 'bi-') ? esc_attr($icon) : 'bi-' . esc_attr($icon);
}

// Get timeline page by slug
$timeline_page = get_page_by_path('timeline');
$timeline_id = $timeline_page ? $timeline_page->ID : null;

// Fetch ACF fields
$section_title = get_field('timeline_title', $timeline_id);
$cta_text = get_field('timeline_cta_text', $timeline_id);
$cta_btn_text_1 = get_field('timeline_cta_button_text', $timeline_id);
$cta_btn_link_1 = get_field('timeline_cta_link', $timeline_id);
$cta_btn_text_2 = get_field('timeline_cta_button_text_2', $timeline_id);
$cta_btn_link_2 = get_field('timeline_cta_link_2', $timeline_id);
$cta_btn_2_show = get_field('timeline_cta_button_show_2', $timeline_id);

// Check for at least one title + text field to proceed
$has_content = false;
for ($i = 1; $i <= 5; $i++) {
  if (get_field("ts_title_$i", $timeline_id) && get_field("ts_text_$i", $timeline_id)) {
    $has_content = true;
    break;
  }
}

if (!$has_content) {
  echo '<div class="text-white text-center py-5">No timeline items found. Please add them in the "Timeline" page.</div>';
  return;
}
?>

<section class="timeline-section section-padding" id="howitworks">
  <div class="section-overlay"></div>
  <div class="container">
    <div class="row">

      <div class="col-12 text-center">
        <h2 class="text-white mb-4"><?php echo esc_html($section_title); ?></h2>
      </div>

      <div class="col-lg-10 col-12 mx-auto">
        <div class="timeline-container">
          <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
            <div class="list-progress"><div class="inner"></div></div>

            <?php for ($i = 1; $i <= 5; $i++):
              $title = get_field("ts_title_$i", $timeline_id);
              $text = get_field("ts_text_$i", $timeline_id);
              $icon = topiclisting_get_bi_icon("ts_icon_$i", $timeline_id);

              if ($title && $text): ?>
                <li>
                  <h4 class="text-white mb-3"><?php echo esc_html($title); ?></h4>
                  <p class="text-white"><?php echo esc_html($text); ?></p>
                  <div class="icon-holder">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                  </div>
                </li>
            <?php endif; endfor; ?>
          </ul>
        </div>
      </div>

      <?php if ($cta_text): ?>
        <div class="col-12 text-center mt-5">
          <p class="text-white">
            <?php echo esc_html($cta_text); ?>

            <?php if ($cta_btn_text_1): ?>
              <a href="<?php echo esc_url($cta_btn_link_1); ?>" class="btn custom-btn custom-border-btn ms-3">
                <?php echo esc_html($cta_btn_text_1); ?>
              </a>
            <?php endif; ?>

            <?php if ($cta_btn_2_show && $cta_btn_text_2): ?>
              <a href="<?php echo esc_url($cta_btn_link_2); ?>" class="btn custom-btn custom-border-btn ms-3">
                <?php echo esc_html($cta_btn_text_2); ?>
              </a>
            <?php endif; ?>
          </p>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php
/**
 * FAQ Section Template
 * Displays a section with title, image, and accordion from ACF fields.
 */

$faq_page = get_page_by_path('faq');
$faq_id   = $faq_page ? $faq_page->ID : null;

if (!$faq_id) return;

$section_title = get_field('faq_title', $faq_id);
$faq_image = get_field('faq_image', $faq_id);
?>
<section class="faq-section section-padding" id="faq">
  <div class="container">
    <div class="row">

      <!-- Title -->
      <div class="col-lg-6 col-12">
        <h2 class="mb-4"><?php echo esc_html($section_title); ?></h2>
      </div>

      <div class="clearfix"></div>

      <!-- Image -->
      <div class="col-lg-5 col-12">
        <?php if ($faq_image): ?>
          <img src="<?php echo esc_url($faq_image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($faq_image['alt']); ?>">
        <?php endif; ?>
      </div>

      <!-- Accordion -->
      <div class="col-lg-6 col-12 m-auto">
        <div class="accordion" id="accordionExample">
          <?php for ($i = 1; $i <= 3; $i++):
            $question = get_field("faq_question_$i", $faq_id);
            $answer   = get_field("faq_answer_$i", $faq_id);

            if ($question && $answer):
              $heading_id  = "heading$i";
              $collapse_id = "collapse$i";
              $is_first    = $i === 1;
          ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                <button class="accordion-button <?php echo $is_first ? '' : 'collapsed'; ?>" type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                  aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                  aria-controls="<?php echo esc_attr($collapse_id); ?>">
                  <?php echo esc_html($question); ?>
                </button>
              </h2>
              <div id="<?php echo esc_attr($collapse_id); ?>"
                class="accordion-collapse collapse <?php echo $is_first ? 'show' : ''; ?>"
                aria-labelledby="<?php echo esc_attr($heading_id); ?>"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php echo wp_kses_post($answer); ?>
                </div>
              </div>
            </div>
          <?php endif; endfor; ?>
        </div>
      </div>

    </div>
  </div>
</section>

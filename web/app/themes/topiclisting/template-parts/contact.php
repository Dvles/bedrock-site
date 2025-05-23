<?php

/**
 * Contact page
 */



// Get contact page by slug
$contact_page = get_page_by_path('contact');
$contact_id = $contact_page ? $contact_page->ID : null;

?>

<section class="contact-section section-padding section-bg" id="contact">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-5"><?php the_field('contact_title', $contact_id  ); ?></h2>
      </div>

      <div class="col-lg-5 col-12 mb-4 mb-lg-0">
        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
        <h4 class="mb-3"><?php the_field('hq1_city', $contact_id ); ?></h4>

        <p><?php the_field('hq1_address', $contact_id ); ?></p>

        <hr>

        <p class="d-flex align-items-center mb-1">
          <span class="me-2">Phone</span>

          <a href="tel: 305-240-9671" class="site-footer-link">
            <?php the_field('hq1_phone', $contact_id ); ?>
          </a>
        </p>

        <p class="d-flex align-items-center">
          <span class="me-2">Email</span>

          <a href="mailto:info@company.com" class="site-footer-link">
            <?php the_field('hq1_email', $contact_id ); ?>
          </a>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 col-12 mx-auto">
        <h4 class="mb-3"><?php the_field('hq2_city'); ?></h4>

        <p><?php the_field('hq2_address', $contact_id ); ?></p>

        <hr>

        <p class="d-flex align-items-center mb-1">
          <span class="me-2">Phone</span>

          <a href="tel: 305-240-9671" class="site-footer-link">
            <?php the_field('hq2_phone', $contact_id ); ?>
          </a>
        </p>

        <p class="d-flex align-items-center">
          <span class="me-2">Email</span>

          <a href="mailto:info@company.com" class="site-footer-link">
            <?php the_field('hq2_email', $contact_id ); ?>
          </a>
        </p>
      </div>

    </div>
  </div>
</section>
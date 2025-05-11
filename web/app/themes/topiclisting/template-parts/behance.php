<?php

/**
 * Behance Section Template
 * Displays a slider of behance projects (splide and GS Behance plugin)*
 */

?>
<?php
// Capture the shortcode output
ob_start();
echo do_shortcode('[[gs_behance id=1]');
$behance_output = ob_get_clean();

// Load DOMDocument to parse
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($behance_output);
$xpath = new DOMXPath($doc);
$projects = $xpath->query('//div[contains(@class, "beh-projects")]');
?>
<div class="container section-padding" id="projects">
  <div class="row">
    <div class="col-12 text-center">
      <h2 class="mb-4">Latest Projects</h2>
    </div>

    <div class="col-12">
      <div class="splide" id="splide-latest-projects">
        <div class="splide__track">
          <ul class="splide__list">
            <?php foreach ($projects as $project):
              $link  = $project->getElementsByTagName('a')->item(0)->getAttribute('href');
              $imgEl = $project->getElementsByTagName('img')->item(0);
              $img   = $imgEl->getAttribute('data-src-img');

              if (empty($img)) {
                $img = $imgEl->getAttribute('src');
              }

              $title = html_entity_decode($imgEl->getAttribute('alt'), ENT_QUOTES | ENT_HTML5, 'UTF-8');
            ?>
              <li class="splide__slide">
                <div class="custom-block bg-white shadow-lg rounded-xl">
                  <a href="<?= esc_url($link) ?>" class="d-block" target="_blank" rel="noopener">
                    <div class="p-3">
                      <h5 class="mb-2"><?= $title ?></h5>
                      <p class="mb-0">Behance Projects</p>
                    </div>
                    <img src="<?= esc_url($img) ?>" class="custom-block-image img-fluid" alt="<?= esc_attr($title) ?>">

                  </a>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
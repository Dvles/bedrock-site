<?php if (have_posts()): while (have_posts()): the_post(); ?>
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-12 mx-auto">
        <h1 class="text-white text-center"><?php the_title(); ?></h1>
        <h6 class="text-center"><?php echo esc_html(get_the_author());?> | <?php echo esc_html(get_the_date());?></h6>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>

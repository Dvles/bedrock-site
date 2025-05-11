<section class="featured-section">
  <div class="container">
    <div class="row justify-content-center">

      <div>
        <?php


        if (have_posts()) {


          while (have_posts()) {
            the_post();
            the_content();
          }
        }


        ?>

        <?php echo the_content();

        ?>

      </div>


    </div>
  </div>
</section>
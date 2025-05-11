<?php get_header(); ?>

<main>
    <?php get_template_part('template-parts/navigation'); ?>
    <?php get_template_part('template-parts/hero-post'); ?>

    <section class="featured-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <?php if (have_posts()): while (have_posts()): the_post(); ?>

                            <?php if (has_post_thumbnail()): ?>
                                <div class="container mb-5">
                                    <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid rounded" alt="<?php the_title_attribute(); ?>">
                                </div>
                            <?php endif; ?>

                            <div class="white-content">
                                <?php the_content(); ?>
                            </div>

                    <?php endwhile;
                    endif; ?>

                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
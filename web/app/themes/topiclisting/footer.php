<footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.html">
                        <i class="bi-back"></i>
                        <span>Topic</span>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>
                        <?php
                            wp_nav_menu([
                                'theme_location'  => 'footer',
                                'container'       => false,
                                'menu_class'      => 'site-footer-links',
                                'fallback_cb'     => false,
                                'depth'           => 1, // No dropdowns in the footer
                            ]);
                        ?>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>

                    <?php if ($phone = get_option('topiclisting_phone')): ?>
                        <p class="text-white d-flex mb-1">
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="site-footer-link">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <?php if ($email = get_option('topiclisting_email')): ?>
                        <p class="text-white d-flex">
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="site-footer-link">
                                <?php echo esc_html($email); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>


                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        English</button>

                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Thai</button></li>

                            <li><button class="dropdown-item" type="button">Myanmar</button></li>

                            <li><button class="dropdown-item" type="button">Arabic</button></li>
                        </ul>
                    </div>

                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2048 Topic Listing Center. All rights reserved.
                    <br><br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                    
                </div>

            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
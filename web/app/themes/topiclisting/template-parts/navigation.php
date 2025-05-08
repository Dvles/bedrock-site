<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <i class="bi-back"></i>
            <span>Topic</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <?php
wp_nav_menu([
    'theme_location'  => 'primary',
    'container'       => false,
    'menu_class'      => 'navbar-nav ms-lg-5 me-lg-auto',
    'fallback_cb'     => '__return_false',
    'depth'           => 2,
    'walker' => new WP_Bootstrap_Navwalker()


]);
?>


            <div class="d-none d-lg-block">
                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav>
        

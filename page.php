<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="page-shell">
    <header class="site-header">
        <a class="wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Inicio">
            <span>VALENTINA</span><em>ROSE</em>
        </a>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-menu">
            <span></span><span></span>
            <span class="screen-reader-text">Abrir menu</span>
        </button>

        <nav class="main-navigation" id="main-menu" aria-label="Navegacion principal">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'menu-list',
                ) );
                ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/#sobre-mi' ) ); ?>">Sobre mi</a>
                <a href="<?php echo esc_url( home_url( '/#colecciones' ) ); ?>">Looks</a>
                <a href="<?php echo esc_url( home_url( '/#journal' ) ); ?>">Journal</a>
                <a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>">Contacto</a>
            <?php endif; ?>
        </nav>

        <a class="social-link" href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram <span>&nearr;</span></a>
    </header>

    <main class="page-main">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class( 'content-page' ); ?>>
                <header class="page-hero">
                    <p class="eyebrow">Valentina Rose</p>
                    <?php the_title( '<h1>', '</h1>' ); ?>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="page-featured-image">
                        <?php the_post_thumbnail( 'full', array( 'loading' => 'eager' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="page-content entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </main>

    <footer class="site-footer">
        <a class="wordmark footer-mark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>VALENTINA</span><em>ROSE</em></a>
        <div class="footer-links">
            <a href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram</a>
            <a href="https://www.tiktok.com/" target="_blank" rel="noopener">TikTok</a>
            <a href="https://www.youtube.com/" target="_blank" rel="noopener">YouTube</a>
        </div>
        <p>&copy; <?php echo date( 'Y' ); ?> Valentina Rose</p>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>

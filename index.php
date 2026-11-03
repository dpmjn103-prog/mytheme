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
            <img src="https://www.sofiahegel.com/wp-content/uploads/2020/03/cropped-ICONO_RRSS.png" alt="Sofía Hegel">
            <span class="wordmark-name">Sofía Hegel</span>
        </a>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-menu">
            <span></span><span></span>
            <span class="screen-reader-text">Abrir menu</span>
        </button>

        <nav class="main-navigation" id="main-menu" aria-label="Navegacion principal">
            <a href="#sobre-mi">Sobre mi</a>
            <a href="#colecciones">Aliados</a>
            <a href="#journal">Libro</a>
            <a href="#contacto">Contacto</a>
        </nav>

        <a class="social-link" href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram <span>&nearr;</span></a>
    </header>

    <main>
        <section class="hero" id="inicio">
            <div class="hero-copy reveal">
                <p class="eyebrow">Emprendedora / México, Guatemala y Tel-Aviv</p>
                <h1>Hola, soy Sofía Hegel.<br><i>Creo y emprendo.</i></h1>
                <p class="hero-intro">Impulso ideas y proyectos con una visión creativa, creando conexiones auténticas entre personas, marcas y oportunidades.</p>
                <a class="text-link" href="#sobre-mi">Conoce mi mundo <span>&darr;</span></a>
            </div>

            <div class="hero-image reveal">
                <img src="https://www.sofiahegel.com/wp-content/uploads/2025/12/Sofia-Abril_0-10-scaled.jpg" alt="Retrato editorial de moda en tonos neutros">
                <span class="image-caption">EDITORIAL / 01</span>
            </div>

            <div class="hero-note reveal">
                <strong>10,000</strong>
                <span>seguidores en<br>mi comunidad</span>
            </div>
        </section>

        <section class="manifesto" id="sobre-mi">
            <div class="section-label reveal">01 / Sobre mi</div>
            <div class="manifesto-copy reveal">
                <p>Creando conexiones reales entre personas, marcas e ideas.</p>
                <h2>Ideas con alma,<br><i>proyectos con futuro.</i></h2>
                <div class="manifesto-body">
                    <p>Soy Sofía Hegel, emprendedora. Creo en el poder de las ideas y en construir proyectos con propósito, creatividad y relaciones auténticas!</p>
                    <a class="text-link" href="#contacto">Trabajemos juntos <span>&nearr;</span></a>
                </div>
            </div>
        </section>

        <section class="portfolio" id="colecciones">
            <div class="portfolio-heading reveal">
                <div>
                    <span class="section-label">02 / Colaboraciones</span>
                </div>
                <p>Proyectos y colaboraciones con propósito.</p>
            </div>

            <div class="project-grid">
                <a class="project-card project-large reveal" href="#contacto">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1400&q=88" alt="Equipo emprendedor colaborando en un proyecto">
                        <span class="project-arrow">&nearr;</span>
                    </div>
                    <div class="project-meta"><h3>Emprendimiento</h3><span>01</span></div>
                </a>
                <a class="project-card reveal" href="#contacto">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=1200&q=88" alt="Diseño y estilo de moda editorial">
                        <span class="project-arrow">&nearr;</span>
                    </div>
                    <div class="project-meta"><h3>Arte Moda y Diseño</h3><span>02</span></div>
                </a>
                <a class="project-card reveal" href="#contacto">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1200&q=88" alt="Retrato de una mujer">
                        <span class="project-arrow">&nearr;</span>
                    </div>
                    <div class="project-meta"><h3>Mujeres</h3><span>03</span></div>
                </a>
            </div>
        </section>

        <section class="numbers" aria-label="Estadisticas">
            <div class="reveal"><strong>10,000</strong><span>Instagram / seguidores</span></div>
            <div class="reveal"><strong>10,000</strong><span>TikTok / seguidores</span></div>
            <div class="reveal"><strong>10,000</strong><span>YouTube / seguidores</span></div>
        </section>

        <section class="journal" id="journal">
            <div class="journal-heading reveal">
                <span class="section-label">03 / Libro</span>
                <h2>Notas recientes</h2>
                <a class="text-link" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Ver todas <span>&nearr;</span></a>
            </div>
            <div class="journal-grid">
                <?php
                $journal_query = new WP_Query( array(
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ) );

                if ( $journal_query->have_posts() ) :
                    while ( $journal_query->have_posts() ) :
                        $journal_query->the_post();
                        ?>
                        <article class="journal-card reveal">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                            <?php else : ?>
                                <a class="journal-placeholder" href="<?php the_permalink(); ?>">VR</a>
                            <?php endif; ?>
                            <p><?php echo esc_html( get_the_date( 'j F Y' ) ); ?> / Libro</p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    $journal_items = array(
                        array( 'Ideas que se convierten en proyectos', '8 Nov 2026' ),
                        array( 'Emprender con propósito', '26 Oct 2026' ),
                        array( 'Construir una marca con visión', '12 Oct 2026' ),
                    );
                    foreach ( $journal_items as $index => $item ) :
                        ?>
                        <article class="journal-card reveal">
                            <a class="journal-placeholder" href="#contacto" aria-label="<?php echo esc_attr( $item[0] ); ?>">0<?php echo $index + 1; ?></a>
                            <p><?php echo esc_html( $item[1] ); ?> / Libro</p>
                            <h3><a href="#contacto"><?php echo esc_html( $item[0] ); ?></a></h3>
                        </article>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </section>

        <section class="contact" id="contacto">
            <div class="contact-inner reveal">
                <p class="eyebrow">Colaboraciones &amp; prensa</p>
                <h2>Hagamos algo<br><i>inolvidable.</i></h2>
                <a href="mailto:hola@sofiahegel.com">hola@sofiahegel.com</a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <a class="wordmark footer-mark" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Inicio"><img src="https://www.sofiahegel.com/wp-content/uploads/2020/03/cropped-ICONO_RRSS.png" alt="Sofía Hegel"></a>
        <div class="footer-links">
            <a href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram</a>
            <a href="https://www.tiktok.com/" target="_blank" rel="noopener">TikTok</a>
            <a href="https://www.youtube.com/" target="_blank" rel="noopener">YouTube</a>
        </div>
        <p>&copy; <?php echo date( 'Y' ); ?> Sofía Hegel</p>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
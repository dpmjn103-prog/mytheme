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
            <a href="#sobre-mi">Sobre mi</a>
            <a href="#colecciones">Looks</a>
            <a href="#journal">Journal</a>
            <a href="#contacto">Contacto</a>
        </nav>

        <a class="social-link" href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram <span>&nearr;</span></a>
    </header>

    <main>
        <section class="hero" id="inicio">
            <div class="hero-copy reveal">
                <p class="eyebrow">Fashion creator / Barcelona</p>
                <h1>Estilo que<br><i>se siente.</i></h1>
                <p class="hero-intro">Exploro moda, viajes y belleza a traves de historias honestas. Color, movimiento y una mirada siempre personal.</p>
                <a class="text-link" href="#sobre-mi">Conoce mi mundo <span>&darr;</span></a>
            </div>

            <div class="hero-image reveal">
                <img src="https://www.sofiahegel.com/wp-content/uploads/2025/12/Sofia-Abril_0-10-scaled.jpg" alt="Retrato editorial de moda en tonos neutros">
                <span class="image-caption">EDITORIAL / 01</span>
            </div>

            <div class="hero-note reveal">
                <strong>2.4M</strong>
                <span>personas inspiradas<br>cada mes</span>
            </div>
        </section>

        <section class="manifesto" id="sobre-mi">
            <div class="section-label reveal">01 / Sobre mi</div>
            <div class="manifesto-copy reveal">
                <p>Creando una conexion real entre las personas y las marcas.</p>
                <h2>Moda con alma,<br><i>vida con historia.</i></h2>
                <div class="manifesto-body">
                    <p>Soy Valentina, creadora de contenido y estilista. Acompano marcas con una estetica cuidada y audiencias que confian en mi criterio.</p>
                    <a class="text-link" href="#contacto">Trabajemos juntos <span>&nearr;</span></a>
                </div>
            </div>
        </section>

        <section class="portfolio" id="colecciones">
            <div class="portfolio-heading reveal">
                <div>
                    <span class="section-label">02 / Seleccion</span>
                    <h2>Mis mundos</h2>
                </div>
                <p>Tres mundos, una misma forma de mirar.</p>
            </div>

            <div class="project-grid">
                <a class="project-card project-large reveal" href="#contacto">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1400&q=88" alt="Editorial de moda urbana">
                        <span class="project-arrow">&nearr;</span>
                    </div>
                    <div class="project-meta"><h3>Moda</h3><span>01</span></div>
                </a>
                <a class="project-card reveal" href="#contacto">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=88" alt="Costa mediterranea al atardecer">
                        <span class="project-arrow">&nearr;</span>
                    </div>
                    <div class="project-meta"><h3>Viajes</h3><span>02</span></div>
                </a>
                <a class="project-card reveal" href="#contacto">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=1200&q=88" alt="Maquillaje editorial colorido">
                        <span class="project-arrow">&nearr;</span>
                    </div>
                    <div class="project-meta"><h3>Belleza</h3><span>03</span></div>
                </a>
            </div>
        </section>

        <section class="numbers" aria-label="Estadisticas">
            <div class="reveal"><strong>1.8M</strong><span>Instagram</span></div>
            <div class="reveal"><strong>650K</strong><span>TikTok</span></div>
            <div class="reveal"><strong>98%</strong><span>Engagement real</span></div>
            <div class="reveal"><strong>42</strong><span>Paises alcanzados</span></div>
        </section>

        <section class="journal" id="journal">
            <div class="journal-heading reveal">
                <span class="section-label">03 / Journal</span>
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
                            <p><?php echo esc_html( get_the_date( 'j F Y' ) ); ?> / Journal</p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    $journal_items = array(
                        array( 'La ciudad despues de la lluvia', '8 Nov 2026' ),
                        array( 'Mi guia de verano en Ibiza', '26 Oct 2026' ),
                        array( 'Cinco piezas que cambian todo', '12 Oct 2026' ),
                    );
                    foreach ( $journal_items as $index => $item ) :
                        ?>
                        <article class="journal-card reveal">
                            <a class="journal-placeholder" href="#contacto" aria-label="<?php echo esc_attr( $item[0] ); ?>">0<?php echo $index + 1; ?></a>
                            <p><?php echo esc_html( $item[1] ); ?> / Journal</p>
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
                <a href="mailto:hola@valentinarose.com">hola@valentinarose.com</a>
            </div>
        </section>
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
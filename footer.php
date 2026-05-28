<footer style="background-color: #172859; padding: 50px 0 30px;">
    <div class="container">
        <div class="row align-items-start g-4">

            <div class="col-12 col-sm-6 col-lg-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-cops.png"
                         alt="<?php bloginfo('name'); ?>"
                         class="img-fluid"
                         style="max-height: 80px;">
                </a>

                <div class="d-flex gap-2 flex-wrap mt-3">

                    <a href="<?php echo esc_url(get_field('lien_instagram', 'option') ?: '#'); ?>">
                        <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/insta.svg"
                             width="20"
                             height="20"
                             alt="Instagram">
                    </a>

                    <a href="<?php echo esc_url(get_field('lien_facebook', 'option') ?: '#'); ?>">
                        <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/Facebook.svg"
                             width="20"
                             height="20"
                             alt="Facebook">
                    </a>

                    <a href="<?php echo esc_url(get_field('lien_linkedin', 'option') ?: '#'); ?>">
                        <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/Linkedin.svg"
                             width="20"
                             height="20"
                             alt="LinkedIn">
                    </a>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <ul class="list-unstyled" style="color: white;">
                    <li>
                        <a href="#conseil" style="color:white; text-decoration:none;">
                            À propos
                        </a>
                    </li>

                    <li>
                        <a href="#accompagnement" style="color:white; text-decoration:none;">
                            Conseil & Accompagnement
                        </a>
                    </li>

                    <li>
                        <a href="#form-contact" style="color:white; text-decoration:none;">
                            Partenariat Talvora
                        </a>
                    </li>

                    <li>
                        <a href="#partenaires" style="color:white; text-decoration:none;">
                            Références
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column gap-3">

                <a class="telephone btn" href="tel:0683818751">
                    <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/icone-appel.svg"
                         alt="Téléphone">

                    <strong>06 83 81 87 51</strong>
                </a>

                <a class="btn contacter" href="#form-contact">

                    <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/icone-contact.svg"
                         alt="Contact">

                    <strong>Contact</strong>

                </a>

            </div>

            <div class="col-12 col-sm-6 col-lg-3 legale" style="color: white;">

                <p>
                    <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"
                       style="color:white; text-decoration:none;">

                        Mentions légales

                    </a>
                </p>

                <p>
                    <a href="#"
                       style="color:white; text-decoration:none;">

                        Réalisation Prospectiv*

                    </a>
                </p>

            </div>

        </div>
    </div>
</footer>

<div id="lightbox" class="lightbox-overlay">

    <button class="lightbox-close" id="lightbox-close">
        &times;
    </button>

    <button class="lightbox-arrow lightbox-prev" id="lightbox-prev">
        &#8249;
    </button>

    <div class="lightbox-content">
        <img id="lightbox-img" src="" alt="">
    </div>

    <button class="lightbox-arrow lightbox-next" id="lightbox-next">
        &#8250;
    </button>

</div>

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // MENU MOBILE
    // =========================
    var menu = document.getElementById('menuMobile');

    if (menu) {
        menu.addEventListener('show.bs.collapse', function () {
            document.body.style.overflow = 'hidden';
        });

        menu.addEventListener('hide.bs.collapse', function () {
            document.body.style.overflow = '';
        });

        menu.querySelectorAll('.nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                var bsCollapse = bootstrap.Collapse.getInstance(menu);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            });
        });
    }

    // =========================
    // CAROUSEL PARTENAIRES
    // =========================
    const carousel = document.querySelector('#image-carousel');

    if (
        carousel &&
        carousel.querySelector('.splide__track') &&
        carousel.querySelector('.splide__list')
    ) {
        new Splide('#image-carousel', {
            perPage: 6,
            gap: '16px',
            breakpoints: {
                1024: { perPage: 4 },
                768:  { perPage: 3 },
                480:  { perPage: 2 },
            },
            arrows: false,
            pagination: true,
            type: 'loop',
            autoplay: true,
            interval: 2500,
            pauseOnHover: false,
        }).mount();
    }

    // =========================
    // GALERIE PLATS
    // =========================
    const galerie = document.querySelector('#galerie-plats-carousel');

    if (
        galerie &&
        galerie.querySelector('.splide__track') &&
        galerie.querySelector('.splide__list')
    ) {
        new Splide('#galerie-plats-carousel', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            gap: '20px',
            arrows: true,
            pagination: false,
            breakpoints: {
                768: { perPage: 1 }
            }
        }).mount();
    }

    // =========================
    // LIGHTBOX (CORRIGÉ)
    // =========================
    var lightbox    = document.getElementById('lightbox');
    var lightboxImg = document.getElementById('lightbox-img');

    var closeBtn = document.getElementById('lightbox-close');
    var prevBtn  = document.getElementById('lightbox-prev');
    var nextBtn  = document.getElementById('lightbox-next');

    var currentSet   = [];
    var currentIndex = 0;

    function openLightbox(index, imagesArray) {
        currentSet   = imagesArray;
        currentIndex = index;
        updateLightbox();
        lightbox.classList.add('active');
    }

    function updateLightbox() {
        if (currentSet[currentIndex]) {
            lightboxImg.src = currentSet[currentIndex].src;
            lightboxImg.alt = currentSet[currentIndex].alt;
        }
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + currentSet.length) % currentSet.length;
            updateLightbox();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % currentSet.length;
            updateLightbox();
        });
    }

    // Ciblage de toutes les images à l'intérieur des diapositives de la galerie
    var imagesGalerie = Array.from(
        document.querySelectorAll('#galerie-plats-carousel .splide__slide img')
    );

    imagesGalerie.forEach(function (img) {
        img.style.cursor = 'pointer'; // Curseur main au survol de l'image
        
        img.addEventListener('click', function () {
            // Recalcul au moment du clic pour exclure les clones générés par Splide
            var imagesFiltrees = Array.from(
                document.querySelectorAll('#galerie-plats-carousel .splide__slide:not(.splide__slide--clone) img')
            );
            
            // Trouver l'index de l'image cliquée par sa source URL
            var indexFiltre = imagesFiltrees.findIndex(i => i.src === img.src);
            
            if (indexFiltre !== -1) {
                openLightbox(indexFiltre, imagesFiltrees);
            }
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closeLightbox);
    }

    if (lightbox) {
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (!lightbox || !lightbox.classList.contains('active')) {
            return;
        }

        if (e.key === 'Escape') {
            closeLightbox();
        }

        if (e.key === 'ArrowLeft' && prevBtn) {
            prevBtn.click();
        }

        if (e.key === 'ArrowRight' && nextBtn) {
            nextBtn.click();
        }
    });

});
</script>

</body>
</html>
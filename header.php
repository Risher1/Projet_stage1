<?php
/**
 * Header - CONSEIL OPS
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header style="background-color: #172859; padding: 20px 0;">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-lg-3 text-start">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-cops.png"
                    alt="<?php bloginfo('name'); ?>"
                    class="img-fluid"
                    style="max-height: 80px;">
                </a>
            </div>

            <div class="col-6 col-lg-6">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-0">
                    <div class="container-fluid justify-content-end justify-content-lg-center">
                        <button class="navbar-toggler" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#menuMobile"
                                aria-controls="menuMobile"
                                aria-expanded="false"
                                aria-label="Menu">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="menuMobile">
                            <ul class="navbar-nav mx-auto gap-3">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#conseil">À propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#accompagnement">Conseil & Accompagnement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#form-contact">Partenariat Talvora</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#partenaires">Références</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-3 bouton-header d-none d-lg-flex gap-3 align-items-center justify-content-end">
                <a class="telephone btn" href="tel:0683818751">
                    <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/icone-appel.svg" alt="Téléphone">
                    <strong>06 83 81 87 51</strong>
                </a>
                <a class="btn contacter" href="#form-contact">
                    <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/icone-contact.svg" alt="Contact">
                    <strong>Contact</strong>
                </a>
            </div>

        </div>
    </div>
</header>
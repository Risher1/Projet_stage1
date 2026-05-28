<?php
/*
   Template Name: home
   Description: Page d'accueil
*/
get_header();
?>

<main>

 <?php // ══ SECTION 1 : HERO BANNER ══ ?>
<div class="container-fluid hero-banner text-center">

   <?php
   $image = get_field('image_arriere_plan');
   $size = 'full';

   if ( $image ) {
      // Si ACF renvoie un tableau (Image Array)
      if ( is_array($image) ) {
         echo wp_get_attachment_image( $image['ID'], $size, false, array('class' => 'img-fluid w-100', 'id' => 'img-bg') );
      } 
      // Si ACF renvoie directement l'ID (Format attendu à la base)
      elseif ( is_numeric($image) ) {
         echo wp_get_attachment_image( $image, $size, false, array('class' => 'img-fluid w-100', 'id' => 'img-bg') );
      } 
      // Si ACF renvoie une simple URL (Format URL)
      else {
         echo '<img src="' . esc_url($image) . '" alt="Fond Hero" class="img-fluid w-100" id="img-bg">';
      }
   }
   ?>
   
   <div class="row hero d-flex align-items-center g-3">

      <div class="col-12 col-lg-6 hero-left">

         <?php if ( get_field('nom_de_lentreprise') ) : ?>
            <p>
               <?php echo esc_html( get_field('nom_de_lentreprise') ); ?>
            </p>
         <?php endif; ?>

         <?php if ( get_field('titre_h1') ) : ?>
            <h1>
               <?php echo esc_html( get_field('titre_h1') ); ?>
            </h1>
         <?php endif; ?>

         <?php if ( get_field('paragraphe_sous_le_h1') ) : ?>
            <p>
               <?php echo esc_html( get_field('paragraphe_sous_le_h1') ); ?>
            </p>
         <?php endif; ?>

         <?php 
         $link_hero = get_field('cta');
         if ( $link_hero ) : 
            $url_hero = is_array($link_hero) ? $link_hero['url'] : $link_hero;
            $texte_bouton_hero = get_field('heading') ? get_field('heading') : (is_array($link_hero) ? $link_hero['title'] : 'Prendre RDV');
         ?>
            <a class="btn contacter" href="#form-contact">
               <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/icone-contact.svg" alt="Contact">
               <strong><?php echo esc_html( $texte_bouton_hero ); ?></strong>
            </a>
         <?php endif; ?>

      </div>

   </div>

</div>


 
<?php // ══ SECTION 2 : À PROPOS ══ ?>
<?php 
// Déclaration sécurisée de la fonction d'affichage d'image
if ( ! function_exists('get_Img') ) {
   function get_Img(string $field_name, string $text_alter) {
      $image = get_field($field_name);
      $size = 'full';

      if ( $image ) {
         if ( is_array($image) ) {
            echo wp_get_attachment_image( $image['ID'], $size, false, array('class' => 'img-fluid') );
         } 
         elseif ( is_numeric($image) ) {
            echo wp_get_attachment_image( $image, $size, false, array('class' => 'img-fluid w-100') );
         } 
         else {
            echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($text_alter) . '" class="img-fluid">';
         }
      }
   }
}
?>


<section id="conseil" style="background-color: #172859;">

   <div class="container-fluid p-0">

      <div class="row d-flex flex-column flex-lg-row align-items-start justify-content-lg-start m-0">

         <div class="col-12 col-lg-6 ps-5 about-left">

            <div class="row g-4">

               <div class="col-4">
                  
                  <div class="img-1 me-2">
                     <?php get_Img('a_propos_01', "À propos 1"); ?>
                  </div>

                  <div class="img-2 me-2">
                     <?php get_Img('a_propos_02', "À propos 2"); ?>
                  </div>

               </div>

               <div class="col-8">

                  <div class="img-3">
                    <?php get_Img('a_propos_03', "À propos 3"); ?>
                  </div>

               </div>

            </div>

         </div>

         <div class="col-12 col-lg-5 d-flex align-items-center position-relative" style="z-index: 10;">

            <div class="text text-white p-4 ps-lg-0">

               <p>
                  <strong class="minititre">
                     À PROPOS
                  </strong>
               </p>

               <?php if ( get_field('a-propos-titre_h2') || get_field('titre_h2') ) : 
                  $titre_h2 = get_field('a-propos-titre_h2') ? get_field('a-propos-titre_h2') : get_field('titre_h2');
               ?>
                  <h2>
                     <?php echo esc_html( $titre_h2 ); ?>
                  </h2>
               <?php endif; ?>

               <hr>

               <?php if ( get_field('a_propos_paragraphe_1') ) : ?>
                  <p>
                     <?php echo esc_html( get_field('a_propos_paragraphe_1') ); ?>
                  </p>
               <?php endif; ?>

               <?php if ( get_field('a_propos_paragraphe_2') ) : ?>
                  <p>
                     <?php echo esc_html( get_field('a_propos_paragraphe_2') ); ?>
                  </p>
               <?php endif; ?>

               <?php if ( get_field('a_propos_paragraphe_3') ) : ?>
                  <p>
                     <?php echo esc_html( get_field('a_propos_paragraphe_3') ); ?>
                  </p>
               <?php endif; ?>

            </div>

         </div>

      </div>

   </div>

</section>


   <?php // ══ SECTION 3 : CONSEIL & ACCOMPAGNEMENT ══ ?>
   <section id="accompagnement" style="background-color: #EED9C4;">

      <div class="container-fluid text-center">

         <div class="row align-items-center talvora m-auto">

            <div class="col-12 col-lg-6 talvora-left">

               <p class="talvora-logo">
                  <?php get_Img('logo', "CONSEIL OPS"); ?>
               </p>

               <strong class="minititre">
                  CONSEIL & ACCOMPAGNEMENT
               </strong>

               <h2 class="talvora-title">
                        <?php echo esc_html( get_field('cs-titre_h2') ); ?>
               </h2>

               <hr>

               <p>
                  <?php echo esc_html( get_field('cs-paragraphe_1') ); ?>
               </p>

               <div class="row mt-4">

                  <div class="col-12 col-md-6 text-start">

                     <p>
                        <strong><?php echo esc_html( get_field('cs-paragraphe_2') ); ?></strong>
                     </p>

                    <ul>
                        <?php 
                           $texte_creation = get_field('liste_creation_entreprise'); 
                           
                           if ( !empty($texte_creation) ) :
                              $lignes = explode("\n", str_replace("\r", "", $texte_creation));
                              
                              foreach ( $lignes as $ligne ) : 
                                 $ligne_propre = trim($ligne);
                                 if ( !empty($ligne_propre) ) : 
                                 ?>
                                    <li><strong><?php echo esc_html($ligne_propre); ?></strong></li>
                                 <?php 
                                 endif;
                              endforeach;
                           endif; 
                        ?>
                     </ul>

                  </div>

                  <div class="col-12 col-md-6 text-start">

                     <p>
                        <strong><?php echo esc_html( get_field('cs-paragraphe_3') ); ?></strong>
                     </p>

                     <ul>
                        <?php 
                           $texte_chef = get_field('liste_chef_entreprise'); 
                           
                           if ( !empty($texte_chef) ) :
                              $lignes = explode("\n", str_replace("\r", "", $texte_chef));
                              
                              foreach ( $lignes as $ligne ) : 
                                 $ligne_propre = trim($ligne);
                                 if ( !empty($ligne_propre) ) : 
                                 ?>
                                    <li><strong><?php echo esc_html($ligne_propre); ?></strong></li>
                                 <?php 
                                 endif;
                              endforeach;
                           endif; 
                        ?>
                     </ul>

                  </div>

               </div>

               <?php 
               // On utilise un fallback propre si le CTA global n'est pas dispo
               if ( $link_hero ) : 
               ?>
                  <p class="mt-4">
                     <a class="btn contacter" href="#form-contact">
                        <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/icone-contact.svg" alt="Contact">
                        <strong><?php echo esc_html( $texte_bouton_hero ); ?></strong>
                     </a>
                  </p>
               <?php endif; ?>

            </div>

            <div class="col-12 col-lg-6 talvora-rigth">

               <div class="img-4" style="border-radius: 50px; overflow: hidden;">
                  <?php get_Img('conseil-accompagnement', "Conseil & accompagnement"); ?>
               </div>

            </div>

         </div>

      </div>


      <?php // ══ PHRASE FORTE ══ ?>
      <div class="container-fluid text-center">

         <div class="row">

            <div class="col-12">

               <p>
                  <span class="citation">
                     <?php echo esc_html( get_field('citation') ); ?>
                  </span>
               </p>

            </div>

         </div>

      </div>


      <?php // ══ CAROUSEL VIDÉOS ══ ?>
      <section id="galerie-plats-carousel" class="splide" aria-label="Conseils vidéos">

         <div class="container text-center mb-5">

            <strong class="minititre">
               CONSEILS & RESSOURCES
            </strong>

            <div class="galerie">
                  <?php echo esc_html( get_field('carousel-titre') ); ?>
            </div>
            

            <hr>

         </div>

         <div class="splide__track">

            <ul class="splide__list">

               <li class="splide__slide">
                  <img 
                     src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img1.jpg" 
                     alt="Vidéo conseil" 
                     class="galerie-img-grande"
                  >
               </li>

               <li class="splide__slide">
                  <img 
                     src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img2.jpg" 
                     alt="Vidéo conseil" 
                     class="galerie-img-grande"
                  >
               </li>

               <li class="splide__slide">
                  <img 
                     src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img3.jpg" 
                     alt="Vidéo conseil" 
                     class="galerie-img-grande"
                  >
               </li>

            </ul>

         </div>

      </section>

   </section>


   <?php // ══ SECTION 4 : PARTENARIAT ══ ?>
   <div class="container-fluid" style="background-color: #172859;">

      <div class="row align-items-center justify-content-center">

         <div class="col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center py-5">

            <div class="d-flex justify-content-center align-items-center gap-4 bloc-partenariat">
               <?php
                  get_Img('partenariat-01', "Partenariat 01");
                  get_Img('partenariat-02', "Partenariat 02");
               ?>
               <style>
                  .bloc-partenariat img {
                        max-height: 380px ;
                        width: auto ; 
                        object-fit: cover ;
                        border-radius: 25px ; 
                  }
               </style>
            </div>

         </div>

         <div class="col-12 col-lg-6 py-5 px-5">

            <div class="about-chef">
               <div class="img-fluid mb-3" style="overflow :hidden;">
                  <?php get_Img('partenariat-logo', "Logo partenariat"); ?>
               </div>


               <strong class="minititre">
                  PARTENARIAT & COMPLÉMENTARITÉ
               </strong>

               <h2 class="py-3" style="color: white;" id="title-chef">
                   <?php echo esc_html( get_field('partenariat_titre_h2') ); ?>
               </h2>

               <hr>

               <p>
                   <?php echo esc_html( get_field('partenariat_p1') ); ?>
               </h2>

               <p>
                  <?php echo esc_html( get_field('partenariat_p2') ); ?>
               </p>

               <p>
                   <?php echo esc_html( get_field('partenariat_p3') ); ?>
               </p>

               <a class="btn contacter mt-3" href="#form-contact" id="contact">
                  <img src="https://www.loganlaug.fr/wp-content/uploads/2025/08/icone-contact.svg" alt="Contact">
                  <strong>Parlons de votre projet</strong>
               </a>

            </div>

         </div>

      </div>

   </div>


   <?php // ══ SECTION 5 : FORMULAIRE ══ ?>
   <section id="form-contact" style="background-color: #172859;">

      <div class="container formulaire">

         <div class="row">

            <div class="col-12">

               <strong class="minititre">
                  CONTACTEZ-NOUS
               </strong>

               <h2 style="font-weight:500;">
                   <?php echo esc_html( get_field('form-h2') ); ?>
               </h2>

               <p>
                   <?php echo esc_html( get_field('form-p') ); ?>
               </p>

               <hr style="color: black;">

            </div>

         </div>
         <?php echo(gravity_form( 1, false, false, false, '', false ));?>

      </div>

   </section>


   <?php // ══ SECTION 6 : CAROUSEL PARTENAIRES ══ ?>
   <section id="partenaires">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <strong class="minititre">
                     ILS ME FONT CONFIANCE
                </strong><br>

                <h2 class="mb-4">
                    <?php echo esc_html(get_field('carousel-partenaire_h2')); ?>
                </h2>

                <hr>

            </div>

        </div>

    </div>

    <?php

    $images = get_field('carousel-partenaire-img');

    if ($images) :

        if (count($images) < 6) {
            $images = array_merge($images, $images, $images);
        }

    ?>

    <section class="splide" id="image-carousel" aria-label="Nos partenaires">

      <div class="splide__track">

         <ul class="splide__list">

            <?php foreach ($images as $image) :

               // SI ACF RETOURNE IMAGE ARRAY
               $image_id = isset($image['id']) ? $image['id'] : (is_numeric($image) ? $image : null);

               if ($image_id) :

               $img_url = wp_get_attachment_image_url($image_id, 'full');

               $img_alt = get_post_meta(
                     $image_id,
                     '_wp_attachment_image_alt',
                     true
               );

            ?>

            <li class="splide__slide">
               <img
                  src="<?php echo esc_url($img_url); ?>"
                  alt="<?php echo esc_attr($img_alt); ?>"
               >
            </li>

            <?php endif; endforeach; ?>
         </ul>
      </div>

   </section>

      <?php else : ?>

         <p style="text-align:center; color:red; padding:20px;">
               Aucune image trouvée.
         </p>

      <?php endif; ?>

   </section>
   
   <style>
    main section#form-contact {
        padding-bottom: 120px !important;
        margin-bottom: 120px !important;
    }
    main section#form-contact div.container.formulaire {
        padding-bottom: 100px !important;
    }
</style>

</main>

<?php get_footer(); ?>
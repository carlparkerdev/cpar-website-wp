<?php

/*
 *   MAIN INDEX TEMPLATE
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<?php get_header(); ?>

<div data-cpar-layout="default">

     <?php get_template_part( CPAR_LAYOUTS . 'header' ); ?>

     <main data-cpar-region="main">

          <?php the_content(); ?>

     </main>

     <?php get_template_part( CPAR_LAYOUTS . 'footer' ); ?>

</div>

<?php get_footer(); ?>
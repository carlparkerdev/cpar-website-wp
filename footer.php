<?php

/*
 *   WORDPRESS FOOTER
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<?php get_template_part( CPAR_LAYOUTS . 'panel' ); ?>

<?php wp_footer(); ?>

<?php do_action( 'cpar_footer' ); ?>

</body>

</html>
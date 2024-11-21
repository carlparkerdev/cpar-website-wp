<?php

/*
 *   LAYOUTS (Default Header)
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<footer data-cpar-region="footer">

     <div class="footer-copyright">

          <?php echo '    &copy; '. date( 'Y' ) .' ' . get_bloginfo( 'name' ); ?>

     </div>

     <div class="footer-credits">

          <a href="https://carlparker.dev" target="_blank">

               <?php echo __( 'a Carl Parker website', 'cpar-website-wp' ); ?>

          </a>

     </div>

</footer>
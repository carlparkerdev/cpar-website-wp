<?php

/*
 *   WORDPRESS FUNCTIONALITY
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   DEFINITIONS
 *   define values needed for website usage
*/

     define( 'CPAR_DOMAIN', $_SERVER[ 'SERVER_NAME' ] );

     define( 'CPAR_THEME', 'cpar-website-wp' );
     define( 'CPAR_THEME_PATH', trailingslashit( get_template_directory() ) );
     define( 'CPAR_THEME_URL', trailingslashit( get_template_directory_uri() ) );

     define( 'CPAR_ASSETS', trailingslashit( 'assets' ) );
     define( 'CPAR_COMPONENTS', trailingslashit( 'components' ) );
     define( 'CPAR_INCLUDES', trailingslashit( 'includes' ) );
     define( 'CPAR_LAYOUTS', trailingslashit( 'layouts' ) );


/*
 *   THEME SETUP
 *   configure theme settings
*/

     add_action( 'after_setup_theme', 'cpar_theme_setup' );

     function cpar_theme_setup() {

          // FEATURES

          add_post_type_support( 'page', 'excerpt' );

          add_theme_support( 'align-wide' );
          add_theme_support( 'automatic-feed-links' );
          add_theme_support( 'block-template-parts' );
          add_theme_support( 'custom-units', 'rem' );
          add_theme_support( 'editor-styles' );
          add_theme_support( 'html5' , array(

               'search-form',
               'comment-form',
               'comment-list',
               'caption',
               'style',
               'script'

          ) );

          add_theme_support( 'post-thumbnails' );
          add_theme_support( 'responsive-embeds' );
          add_theme_support( 'title-tag' );

          remove_theme_support( 'core-block-patterns' );

          // NAV MENUS

          register_nav_menus( array(

               'cpar-menu-footer-default'    => 'Default Footer',
               'cpar-menu-header-default'    => 'Default Header',
               'cpar-menu-panel-default'     => 'Default Panel'

          ) );

          // POST THUMBNAIL

          set_post_thumbnail_size( 1920, 1080 );

          // FRAMEWORK

          require_once CPAR_INCLUDES . 'cpar-wordpress.php';
          require_once CPAR_INCLUDES . 'cpar-acf.php';

          foreach ( glob( CPAR_THEME_PATH . CPAR_INCLUDES . '*/init.php' ) as $feature ) :

               require_once $feature;

          endforeach;

     }


/*
 *   THEME COMPONENTS
 *   initialize theme components
*/

     add_action( 'after_setup_theme', 'cpar_theme_components' );

     function cpar_theme_components() {

          // HELPERS

          foreach ( glob( CPAR_THEME_PATH . CPAR_COMPONENTS . 'helpers/helper-*.php' ) as $helper ) :

               require_once $helper;

          endforeach;

          // FORMS

          foreach ( glob( CPAR_THEME_PATH . CPAR_COMPONENTS . 'forms/form-*.php' ) as $form ) :

               require_once $form;

          endforeach;

          // REPORTS

          foreach ( glob( CPAR_THEME_PATH . CPAR_COMPONENTS . 'reports/report-*.php' ) as $report ) :

               require_once $report;

          endforeach;

          // BLOCKS

          foreach ( glob( CPAR_THEME_PATH . CPAR_COMPONENTS . 'blocks/*/block.php' ) as $block ) :

               require_once $block;

          endforeach;


     }


/*
 *   THEME ASSETS
 *   initialize theme assets
*/

     // MAIN

     add_action( 'wp_enqueue_scripts', 'cpar_theme_assets_main', 999999999 );

     function cpar_theme_assets_main() {

          // STYLESHEET

          wp_enqueue_style(

               'CPar Website (Main)',
               CPAR_THEME_URL . CPAR_ASSETS . 'css/main.css',
               array(),
               null,
               'all'

          );

          // SCRIPTS

          wp_enqueue_script(

               'CPar Website (Main)',
               CPAR_THEME_URL . CPAR_ASSETS . 'js/main.js',
               array( 'jquery' ),
               null,
               true

          );

     }

     // PRINT

     add_action( 'wp_enqueue_scripts', 'cpar_theme_assets_print', 999999999 );

     function cpar_theme_assets_print() {

          // STYLESHEET

          wp_enqueue_style(

               'CPar Website (Print)',
               CPAR_THEME_URL . CPAR_ASSETS . 'css/print.css',
               array( 'CPar Website (Main)' ),
               null,
               'all'

          );

     }

     // ADMIN AREA

     add_action( 'admin_enqueue_scripts', 'cpar_theme_assets_admin', 999999999 );

     function cpar_theme_assets_admin() {

          // STYLESHEET

          wp_enqueue_style(

               'CPar Website (Admin)',
               CPAR_THEME_URL . CPAR_ASSETS . 'css/admin.css',
               array(),
               null,
               'all'

          );

     }
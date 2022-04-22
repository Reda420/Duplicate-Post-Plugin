<?php
    /*
        Plugin Name: DUPLICATE POST
        Plugin URI: https://wordpress.com
        Description: Permet de dupliquer les articles de WordPress !
        Version: 0.1
        Author: DuplicatePost .inc
        Author URI: https://wordpress.com
    */
    use Duplicatepost\DuplicatePost\DuplicatePostPlugin;
    if ( ! defined( 'ABSPATH' ) ) 
        exit;

     define('DPost_PLUGIN_DIR', plugin_dir_path(__FILE__));

    require DPost_PLUGIN_DIR . 'vendor/autoload.php';
 
    $plugin = new DuplicatePostPlugin(__FILE__);
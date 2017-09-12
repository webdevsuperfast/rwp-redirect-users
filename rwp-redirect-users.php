<?php
/*
Plugin Name: Redirect Users
Plugin URI: https://github.com/webdevsuperfast/recommendwp-redirect-users
Description: Redirect subscribers user group to certain page
Version: 1.0
Author: RecommendWP
Author URI: https://recommendwp.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: rwp-redirect-users
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( esc_html_e( 'With great power comes great responsibility.', 'rwp-redirect-users' ) );

function rwpru_redirect_users_by_role() {
    if ( ! defined( 'DOING_AJAX' ) ) {
        $current_user = wp_get_current_user();
        $role_name = $current_user->roles[0];

        if ( 'subscriber' === $role_name ) {
            wp_redirect( esc_url( home_url( '/welcome' ) ) );
        }
    }
}

add_action( 'admin_init', 'rwpru_redirect_users_by_role' );
<?php
/*
    Plugin Name: felina-app
    description: felina-app
    Version: 0.1
    Author: felina
    License: GPL2
*/

define('FELINA_APP_ROLE', 'team');
define('FELINA_APP_ROLE_DISPLAY', 'Team');
define('FELINA_APP_ROUTE', 'team');

add_role(FELINA_APP_ROLE, FELINA_APP_ROLE_DISPLAY, []);

add_action('init', function () {
    add_rewrite_endpoint(FELINA_APP_ROUTE, EP_PERMALINK);
});

add_action('template_redirect', function () {
    global $wp_query;
    if ($wp_query->query_vars['name'] == FELINA_APP_ROUTE && is_user_logged_in()) {
        $user = wp_get_current_user();
        if (in_array(FELINA_APP_ROLE, $user->roles)) {
            $show_admin_bar_front = get_user_option('show_admin_bar_front', $user);
            if ($show_admin_bar_front) update_user_option($user->ID, 'show_admin_bar_front', 'false');
            require __DIR__ . '/felina-class.php';
            $felina = new Felina();
        }
    }
});

add_filter('login_redirect', function ($url, $request, $user) {
    if (isset($user->data)) {
        if (in_array(FELINA_APP_ROLE, $user->roles)) {
            return site_url(FELINA_APP_ROUTE);
        }
    }
    return $url;
}, 10, 3);

add_action('admin_init', function () {
    if (is_admin() && !current_user_can('administrator') && !(defined('DOING_AJAX') && DOING_AJAX)) {
        wp_safe_redirect(site_url(FELINA_APP_ROUTE));
        exit;
    }
});

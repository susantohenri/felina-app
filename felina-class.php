<?php

class Felina
{
    static $params = [
        'page_name' => 'dashboard',
        'page_title' => 'Felina App',
        'fonts' => [
            'https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap',
            'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap',
        ],
        'css' => [
            'https://use.fontawesome.com/releases/v5.0.13/css/all.css?ver=5.0.2'
        ],
        'js' => [
            'https://code.jquery.com/jquery-3.6.0.min.js',
            'https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',
            'https://unpkg.com/@popperjs/core@2',
            'https://unpkg.com/tippy.js@6',
            'https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/jquery.nicescroll.min.js',
            'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js'
        ],
        'js_var' => [],
        'sidebar_menu' => [
            [
                'page_name' => 'dashboard',
                'display_name' => 'Dashboard',
                'icon' => 'dashboard'
            ],
            [
                'page_name' => 'reports',
                'display_name' => 'Reports',
                'icon' => 'test'
            ],
            [
                'page_name' => 'uploads',
                'display_name' => 'Uploads',
                'icon' => 'loud'
            ]
        ],
        'body_class' => 'regular-wrapper'
    ];

    function __construct()
    {
        self::run_process();
        self::show_page();
    }

    protected function run_process()
    {
    }

    protected function show_page()
    {
        if (isset($_GET['p'])) self::$params['page_name'] = sanitize_text_field($_GET['p']);

        self::$params['css'] = array_merge(self::$params['css'], [
            plugin_dir_url(__FILE__) . 'booknetic/bootstrap.min.css',
            plugin_dir_url(__FILE__) . 'booknetic/main.css',
            plugin_dir_url(__FILE__) . 'booknetic/page.css',
        ]);

        self::$params['js'] = array_merge(self::$params['js'], [
            plugin_dir_url(__FILE__) . 'booknetic/booknetic.js',
            plugin_dir_url(__FILE__) . 'script.js',
        ]);

        self::$params['js_var'] = array_merge(self::$params['js_var'], [
            'ajaxurl' => esc_js(admin_url('admin-ajax.php', 'relative'))
        ]);

        self::$params['logo_src'] = plugin_dir_url(__FILE__) . 'booknetic/logo/lingoni_logo.svg';

        switch (self::$params['page_name']) {
            case 'dashboard':
                self::load_dashboard();
                break;
            case 'reports':
                self::load_reports();
                break;
            case 'uploads':
                self::load_uploads();
                break;
        }

        $params = self::$params;
        require __DIR__ . '/template.php';
    }

    protected function load_dashboard()
    {
    }

    protected function load_reports()
    {
    }

    protected function load_uploads()
    {
    }
}

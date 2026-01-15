<?php
/**
 * Plugin Name: Doctor Schedule Calendar
 * Description: Manage doctor availability with calendar view.
 * Version: 1.1
 * Author: ChatGPT
 */
if (!defined('ABSPATH')) exit;

add_action('init', function () {
    register_post_type('doctor', [
        'labels' => [
            'name' => 'Doctors',
            'singular_name' => 'Doctor',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => ['title'],
    ]);
});

require_once plugin_dir_path(__FILE__) . 'admin/meta-box.php';
require_once plugin_dir_path(__FILE__) . 'public/shortcode.php';

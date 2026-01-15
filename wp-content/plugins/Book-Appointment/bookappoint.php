<?php
/*
Plugin Name: Book Appointment
Version: 1.0.0
Author: Lim Nimol
*/

add_action('admin_menu', 'book_appointment_setup_menu');

function book_appointment_setup_menu() {
    add_menu_page(
        'Appointment Page',      // Page title
        'Appointment',           // Menu title in admin
        'manage_options',        // Capability
        'book-appointment',      // Menu slug
        'book_appointment',      // Callback function
        'dashicons-calendar',    // Icon (optional)
        6                        // Position (optional)
    );
}

function book_appointment() {
    echo "<h1>Hello World!</h1>";
}




<?php
/*
Plugin Name: Book Appointment
Version: 1.0.0
Author: Lim Nimol
*/

add_action('admin_menu', 'book_appointment_setup_menu');

function book_appointment_setup_menu() {

    add_menu_page(
        'Book Appointment',      // Page title
        'Book Appointment',      // Menu title
        'manage_options',
        'book-appointment',
        '__return_null',         // IMPORTANT: no page content
        'dashicons-calendar',
        6
    );

    add_submenu_page(
        'book-appointment',
        'Patient',
        'Patient',
        'manage_options',
        'patient',
        'patient_page'
    );

    add_submenu_page(
        'book-appointment',
        'Doctor',
        'Doctor',
        'manage_options',
        'doctor',
        'doctor_page'
    );

    add_submenu_page(
        'book-appointment',
        'Appointment',
        'Appointment',
        'manage_options',
        'appointment',
        'appointment_page'
    );

    remove_submenu_page('book-appointment', 'book-appointment');
}


function patient_page() {
    echo "<h1>Patient</h1>";
}

function doctor_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . "doctors";

    // Handle form submission
    if (isset($_POST['submit_doctor'])) {
        $name = sanitize_text_field($_POST['name']);
        $specialty = sanitize_text_field($_POST['specialty']);
        $email = sanitize_email($_POST['email']);

        $wpdb->insert(
            $table_name,
            [
                'name' => $name,
                'specialty' => $specialty,
                'email' => $email
            ]
        );

        echo "<div class='updated'><p>Doctor added successfully!</p></div>";
    }

    // Form to add doctor
    echo '<h1>Doctor</h1>';
    echo '<form method="post">';
    echo '<table class="form-table">';
    echo '<tr><th>Name</th><td><input type="text" name="name" required></td></tr>';
    echo '<tr><th>Specialty</th><td><input type="text" name="specialty" required></td></tr>';
    echo '<tr><th>Email</th><td><input type="email" name="email" required></td></tr>';
    echo '</table>';
    echo '<p><input type="submit" name="submit_doctor" value="Add Doctor" class="button button-primary"></p>';
    echo '</form>';

    // Show existing doctors
    $doctors = $wpdb->get_results("SELECT * FROM $table_name");
    if ($doctors) {
        echo '<h2>All Doctors</h2>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<tr><th>ID</th><th>Name</th><th>Specialty</th><th>Email</th></tr>';
        foreach ($doctors as $doc) {
            echo "<tr>
                    <td>{$doc->id}</td>
                    <td>{$doc->name}</td>
                    <td>{$doc->specialty}</td>
                    <td>{$doc->email}</td>
                  </tr>";
        }
        echo '</table>';
    }
}


function appointment_page() {
    echo "<h1>Appointment</h1>";
}

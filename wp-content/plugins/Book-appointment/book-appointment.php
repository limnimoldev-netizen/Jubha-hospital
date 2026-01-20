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
    // ... (previous logic for saving to database) ...
    ?>
    <div class="registration-form-container">
        <h2>Patient Registration</h2>
        <form method="post">
            <?php wp_nonce_field('patient_reg_action', 'patient_reg_nonce'); ?>
            
            <!-- Section 1: Personal Information -->
            <h3>1. Personal Information</h3>
            <div class="form-field">
                <label>Full Name</label>
                <input type="text" name="p_name" required>
            </div>
            <div class="form-field">
                <label>Date of Birth</label>
                <input type="date" name="p_dob" required>
            </div>
            <div class="form-field">
                <label>Gender</label>
                <select name="p_gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Section 2: Contact & Emergency -->
            <h3>2. Contact & Emergency</h3>
            <div class="form-field">
                <label>Home Address</label>
                <textarea name="p_address"></textarea>
            </div>
            <div class="form-field">
                <label>Emergency Contact Name</label>
                <input type="text" name="p_emergency_name">
            </div>

            <!-- Section 3: Medical & Insurance -->
            <h3>3. Medical & Insurance</h3>
            <div class="form-field">
                <label>Insurance Provider</label>
                <input type="text" name="p_insurance">
            </div>
            <div class="form-field">
                <label>Known Allergies</label>
                <textarea name="p_allergies" placeholder="List any drug or food allergies"></textarea>
            </div>

            <button type="submit" name="register_patient" class="button button-primary">Register Patient</button>
        </form>
    </div>
    <?php
}


function doctor_page() {
    global $wpdb;
    $patient_table = $wpdb->prefix . 'patients';
    $appointment_table = $wpdb->prefix . 'appointments';
    $message = '';

    // 1. Handle the "Link to Patient" Submission
    if (isset($_POST['schedule_appointment'])) {
        if (check_admin_referer('doctor_link_action', 'doctor_link_nonce')) {
            $wpdb->insert($appointment_table, [
                'patient_id'       => intval($_POST['patient_id']),
                'doctor_name'      => sanitize_text_field($_POST['doctor_name']),
                'appointment_date' => sanitize_text_field($_POST['app_date']),
                'notes'            => sanitize_textarea_field($_POST['app_notes']),
            ]);
            $message = '<div class="updated"><p>Patient linked to doctor successfully!</p></div>';
        }
    }

    // 2. Get list of registered patients for the dropdown
    $patients = $wpdb->get_results("SELECT id, name FROM $patient_table");

    echo '<div class="wrap">';
    echo '<h1>Doctor Panel: Schedule Patient</h1>';
    echo $message;
    ?>

    <div style="background: #fff; padding: 20px; border: 1px solid #ccc; max-width: 500px;">
        <form method="post">
            <?php wp_nonce_field('doctor_link_action', 'doctor_link_nonce'); ?>

            <p>
                <label><strong>Select Patient:</strong></label><br>
                <select name="patient_id" style="width:100%;" required>
                    <option value="">-- Select Registered Patient --</option>
                    <?php foreach ($patients as $p) : ?>
                        <option value="<?php echo $p->id; ?>"><?php echo esc_html($p->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label><strong>Doctor Name:</strong></label><br>
                <input type="text" name="doctor_name" style="width:100%;" required placeholder="Dr. Smith">
            </p>

            <p>
                <label><strong>Appointment Date:</strong></label><br>
                <input type="date" name="app_date" style="width:100%;" required>
            </p>

            <p>
                <label><strong>Reason/Notes:</strong></label><br>
                <textarea name="app_notes" style="width:100%;" rows="3"></textarea>
            </p>

            <input type="submit" name="schedule_appointment" class="button button-primary" value="Connect Doctor to Patient">
        </form>
    </div>
    <?php
    echo '</div>';
}






function appointment_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . "doctor_appointments";

    // Handle form submission
    if (isset($_POST['first_name'])) {
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $dob_day = intval($_POST['dob_day']);
        $dob_month = sanitize_text_field($_POST['dob_month']);
        $dob_year = intval($_POST['dob_year']);
        $gender = sanitize_text_field($_POST['gender']);
        $phone = sanitize_text_field($_POST['phone']);
        $address = sanitize_text_field($_POST['address']);
        $city = sanitize_text_field($_POST['city']);
        $state = sanitize_text_field($_POST['state']);
        $zip = sanitize_text_field($_POST['zip']);
        $email = sanitize_email($_POST['email']);
        $applied_before = sanitize_text_field($_POST['applied_before']);
        $department = sanitize_text_field($_POST['department']);
        $procedure = sanitize_text_field($_POST['procedure']);
        $preferred_date = sanitize_text_field($_POST['preferred_date']);

        $wpdb->insert(
            $table_name,
            [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'dob_day' => $dob_day,
                'dob_month' => $dob_month,
                'dob_year' => $dob_year,
                'gender' => $gender,
                'phone' => $phone,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'email' => $email,
                'applied_before' => $applied_before,
                'department' => $department,
                'procedure' => $procedure,
                'preferred_date' => $preferred_date
            ]
        );

        echo '<div class="notice notice-success"><p>Appointment submitted successfully!</p></div>';
    }

    // Form HTML
    ?>
    <div class="wrap">
        <h1>Doctor Appointment Form</h1>
        <form method="post">
            <h2>Personal Information</h2>
            <table class="form-table">
                <tr>
                    <th>First Name</th>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>
                        <select name="dob_day" required>
                            <?php for ($d=1;$d<=31;$d++){echo "<option value='$d'>$d</option>";} ?>
                        </select>
                        <select name="dob_month" required>
                            <?php 
                            $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                            foreach ($months as $m){echo "<option value='$m'>$m</option>";}
                            ?>
                        </select>
                        <select name="dob_year" required>
                            <?php for ($y=1920;$y<=2026;$y++){echo "<option value='$y'>$y</option>";} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        <select name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Not willing to disclose">Not willing to disclose</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><input type="text" name="phone" required></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <input type="text" name="address" placeholder="Street Address" required><br>
                        <input type="text" name="city" placeholder="City" required><br>
                        <input type="text" name="state" placeholder="State / Province" required><br>
                        <input type="text" name="zip" placeholder="Postal / Zip Code" required>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <th>Applied Before?</th>
                    <td>
                        <select name="applied_before" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td><input type="text" name="department" required></td>
                </tr>
                <tr>
                    <th>Procedure</th>
                    <td>
                        <select name="procedure" required>
                            <option value="Medical Examination">Medical Examination</option>
                            <option value="Doctor Check">Doctor Check</option>
                            <option value="Result Analysis">Result Analysis</option>
                            <option value="Check-up">Check-up</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Preferred Appointment Date</th>
                    <td><input type="date" name="preferred_date" required></td>
                </tr>
            </table>
            <?php submit_button('Submit Appointment'); ?>
        </form>

        <h2>All Appointments</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Procedure</th>
                    <th>Preferred Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $appointments = $wpdb->get_results("SELECT * FROM $table_name");
                if ($appointments) {
                    foreach ($appointments as $appt) {
                        echo "<tr>
                            <td>{$appt->id}</td>
                            <td>{$appt->first_name} {$appt->last_name}</td>
                            <td>{$appt->dob_day}-{$appt->dob_month}-{$appt->dob_year}</td>
                            <td>{$appt->gender}</td>
                            <td>{$appt->phone}</td>
                            <td>{$appt->email}</td>
                            <td>{$appt->department}</td>
                            <td>{$appt->procedure}</td>
                            <td>{$appt->preferred_date}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No appointments yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}

/* ---------------------- CREATE TABLE ---------------------- */
add_action('admin_init', 'create_doctor_appointments_table');
function create_doctor_appointments_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . "doctor_appointments";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        first_name varchar(255) NOT NULL,
        last_name varchar(255) NOT NULL,
        dob_day int NOT NULL,
        dob_month varchar(50) NOT NULL,
        dob_year int NOT NULL,
        gender varchar(50) NOT NULL,
        phone varchar(50) NOT NULL,
        address varchar(255) NOT NULL,
        city varchar(100) NOT NULL,
        state varchar(100) NOT NULL,
        zip varchar(20) NOT NULL,
        email varchar(255) NOT NULL,
        applied_before varchar(10) NOT NULL,
        department varchar(255) NOT NULL,
        procedure varchar(100) NOT NULL,
        preferred_date date NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}




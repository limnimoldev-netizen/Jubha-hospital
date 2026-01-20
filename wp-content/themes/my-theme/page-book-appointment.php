<?php get_header(); ?>


<div class="appointment-form">
    <h1>Doctor Appointment Form</h1>
    <form id="doctor-appointment-form" method="post">
        <fieldset>
            <legend>Personal Information</legend>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form-group dob-group">
                <label>Date of Birth:</label>
                <select name="dob_day" required>
                    <option value="">Day</option>
                    <!-- JS will fill 1-31 -->
                </select>
                <select name="dob_month" required>
                    <option value="">Month</option>
                    <!-- JS will fill months -->
                </select>
                <select name="dob_year" required>
                    <option value="">Year</option>
                    <!-- JS will fill years -->
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Not willing to disclose">Not willing to disclose</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
        </fieldset>

        <fieldset>
            <legend>Address</legend>
            <div class="form-group">
                <label for="address">Street Address:</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>
            </div>
            <div class="form-group">
                <label for="state">State / Province:</label>
                <input type="text" name="state" id="state" required>
            </div>
            <div class="form-group">
                <label for="zip">Postal / Zip Code:</label>
                <input type="text" name="zip" id="zip" required>
            </div>
        </fieldset>

        <fieldset>
            <legend>Appointment Details</legend>
            <div class="form-group">
                <label for="applied_before">Applied Before?</label>
                <select name="applied_before" id="applied_before" required>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" name="department" id="department" required>
            </div>
            <div class="form-group">
                <label for="procedure">Procedure:</label>
                <select name="procedure" id="procedure" required>
                    <option value="Medical Examination">Medical Examination</option>
                    <option value="Doctor Check">Doctor Check</option>
                    <option value="Result Analysis">Result Analysis</option>
                    <option value="Check-up">Check-up</option>
                </select>
            </div>
            <div class="form-group">
                <label for="preferred_date">Preferred Appointment Date:</label>
                <input type="date" name="preferred_date" id="preferred_date" required>
            </div>
        </fieldset>

        <button type="submit" class="submit-btn">Submit Appointment</button>
    </form>
</div>


<?php get_footer(); ?>

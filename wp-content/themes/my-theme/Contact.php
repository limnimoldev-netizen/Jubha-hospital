<?php get_header(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

  <section class="contact-section">
    <div class="contact-container">

      <!-- Left Image -->
      <div class="contact-image">
        <img src="https://i.ibb.co/3Fx8S7W/dental-patient.jpg" alt="Dentist patient">
      </div>

      <!-- Right Form -->
      <div class="contact-form">
        <h2>Contact Us</h2>

        <form>
          <label>Name</label>
          <input type="text" placeholder="Enter your Name" required>

          <label>Email</label>
          <input type="email" placeholder="Enter a valid email address" required>

          <label>Message</label>
          <textarea placeholder="Your Message" rows="4" required></textarea>

          <div class="terms">
            <input type="checkbox" id="terms">
            <label for="terms">I accept the <a href="#">Terms of Service</a></label>
          </div>

          <button type="submit">Submit</button>
        </form>
      </div><!--  -->

    </div>

    <!-- Contact Info Cards -->
    <div class="contact-info">
      <div class="info-box">
        <i class="fa fa-phone"></i>
        <h3>Call Us</h3>
        <p>1 (234) 567-891<br>1 (234) 987-654</p>
      </div>

      <div class="info-box">
        <i class="fa fa-map-marker"></i>
        <h3>Location</h3>
        <p>121 Rock Street, 21 Avenue<br>New York, NY 92103-9000</p>
      </div>

      <div class="info-box">
        <i class="fa fa-clock-o"></i>
        <h3>Hours</h3>
        <p>Mon–Fri: 11am–8pm<br>Sat–Sun: 6am–8pm</p>
      </div>
    </div>
  </section>

  <!-- Font Awesome icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>

<?php get_footer(); ?>
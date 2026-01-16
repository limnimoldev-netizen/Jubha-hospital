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

      <div class="contact-image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/profile doll.jpg" alt="Hero Banner">
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


  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
<main id="main-content">
  <section class="contact-section">
    <!-- <h2>Contact Us</h2>
    <p>Welcome to Jubha Hospital. We’re here to help you.</p> -->

    <div class="contact-info">
      <h1>Map For Location .</h1>
      <!-- <p><strong>Address:</strong> Phnom Penh, Cambodia</p> -->
      
    </div>

<div class="map-container">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.449285142884!2d104.8838144!3d11.5408896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951d5e9b0c9f7%3A0xabcdef123456789!2sJubha%20Hospital!5e0!3m2!1sen!2skh!4v1700000000000!5m2!1sen!2skh"
    width="100%"
    height="400"
    style="border:0;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

  </section>
</main>
</html>
<?php get_footer(); ?>
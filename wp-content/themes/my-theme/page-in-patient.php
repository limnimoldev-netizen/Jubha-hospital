<?php get_header(); ?>

<section class="hero-banner">
  <div class="banner-content">
    <h1>Visitor Information</h1>
    <nav class="breadcrumb">
      <a href="#">Home</a> / 
      <a href="#">Patient Information</a> / 
      <span>Visitor Information</span>
    </nav>
  </div>
</section>

<section class="visitor-section">
  <div class="visitor-container">
    <div class="visitor-text">
      <h2>Visitor Information</h2>
      <ul>
        <li>From 7 am to 10 pm daily in coordination with the patient’s care team.</li>
        <li>Children under the age of 14 must be accompanied by an adult.</li>
        <li>All visitors must follow the hospital visitation guidelines.</li>
      </ul>
    </div>
    <div class="visitor-image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/doctor-patient.jpg" alt="Visitor at reception">
    </div>
  </div>
</section>

<?php get_footer(); ?>

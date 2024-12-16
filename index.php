<?php session_start(); ?>



<?php require_once('./controller/CMSController.php'); ?>
<?php
$heroaria = new CMSController();
$Response = [];
$active = $heroaria->active;
$index = $heroaria->getheroaria();
$about = $heroaria->getabout();
$resume = $heroaria->getresume();
$services = $heroaria->getservices();
$Counter = $heroaria->getCounter();
$portfolio = $heroaria->getportfolio();
$Pricing = $heroaria->getPricing();
$FAQ = $heroaria->getquestions();
$testimonial = $heroaria->gettestimonials();
$settings = $heroaria->getsettings();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portfolio</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?php echo $settings[0]['description']; ?>" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between hair-now">

      <a href="index.php" class="logo d-flex align-items-center">

        <h1 class="sitename">MAHMUDUR</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a href="<?php echo $settings[1]['description']; ?>" class="btn-visit align-self-start">Hire Now</a>
    </div>
  </header>

  <main class="main dark-background">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <?php

      foreach ($index[0] as $items) {
      ?>
      <img  src="<?php echo ($items['image']); ?>"  alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
        <h2><?php echo ($items['Title']); ?></h2>
        <p><span class="typed" data-typed-items="Designer, Developer, Freelancer"></span></p>
          <div class="social-link d-flex justify-content-center">
          <a href="<?php echo $settings[3]['description']; ?>"><i class="bi bi-whatsapp"></i></a>
          <a href="<?php echo $settings[4]['description']; ?>"><i class="bi bi-facebook"></i></a>
          <a href="<?php echo $settings[5]['description']; ?>"><i class="bi bi-instagram"></i></a>
          <a href="<?php echo $settings[6]['description']; ?>"><i class="bi bi-linkedin"></i></a>
      </div>
      </div>
      <?php
      }
      ?>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-md-6">
        <?php

        foreach ($about[0] as $items) {
        ?>

            <div class="row justify-content-between gy-4">
              <div class="col-lg-5">
                <img src="<?php echo ($items['image']); ?>" class="img-fluid" alt="">
              </div>
              <div class="col-lg-7 about-info">
                <p><strong>Name: </strong> <span><?php echo ($items['name']); ?></span></p>
                <p><strong>Profile: </strong> <span><?php echo ($items['profile']); ?></span></p>
                <p><strong>Email: </strong> <span><?php echo ($items['email']); ?></span></p>
                <p><strong>Phone: </strong> <span><?php echo ($items['phone']); ?></span></p>
              </div>
            </div>

            <?php
            }
            ?>

            <div class="skills-content skills-animation">

              <h5>Skills</h5>

              <div class="progress">
                <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>PHP</span> <i class="val">65%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->
              <div class="progress">
                <span class="skill"><span>MY SQL</span> <i class="val">95%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->
              <div class="progress">
                <span class="skill"><span>WORDPRESS</span> <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->
              <div class="progress">
                <span class="skill"><span>SHOPIFY</span> <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

            </div>
          </div>

          <div class="col-md-6">
            <div class="about-me">
            <?php

            foreach ($about[0] as $items) {
            ?>

              <h4><?php echo ($items['Title']); ?></h4>
              <p>
              <?php echo ($items['description']); ?>
              </p>
              <?php
              }
              ?>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p><?php echo $settings[7]['description']; ?></p>
      </div><!-- End Section Title -->

      <div class="container">
        
        <div class="row">
          <?php

            foreach ($resume[0] as $items) {
          ?>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title"><?php echo ($items['shortTitle']);?></h3>
            <div class="resume-item">
              <h4><?php echo ($items['Title']); ?></h4>
              <h5><?php echo ($items['year']); ?></h5>
              <p><em><?php echo ($items['description']); ?></em></p>
              <h4 class=""><?php echo ($items['location']);?></h4>
            </div><!-- Edn Resume Item -->

          </div>
              <?php 
            }
            ?>
        </div>

      </div>

    </section><!-- /Resume Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p><?php echo $settings[8]['description']; ?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
            <?php 
            
            foreach ($services[0] as $items) {
             

            ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <!-- <div class="icon">
                <i class="bi bi-activity"></i>
              </div> -->
              <img src="<?php echo ($items['image']); ?>" class="img-fluid" alt="" hight="100" width="100">
                <h3><?php echo ($items['Title']) ?></h3>
              </a>
              <p><?php echo ($items['description']) ?></p>
            </div>
          </div><!-- End Service Item -->
              <?php 
                }
              ?>
        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background">

      <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
        <?php

        foreach ($Counter[0] as $items) {
        ?>
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo ($items['number']); ?>" data-purecounter-duration="0" class="purecounter"><?php echo ($items['number']); ?></span>
              <p><?php echo ($items['Title']); ?></p>
            </div>
          </div><!-- End Stats Item -->
          <?php 
           }
          ?>
        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p><?php echo $settings[9]['description']; ?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
          </ul>

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php

            foreach ($portfolio[0] as $items) {
            ?>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="<?php echo ($items['image']); ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo ($items['Title']); ?></h4>
                <p><?php echo ($items['shortTitle']); ?></p>
                <a href="<?php echo ($items['image']); ?>" title="<?php echo ($items['Title']); ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.php?id=<?php echo $items['id']; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->
              <?php 
                }
              ?>
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p><?php echo $settings[10]['description']; ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 gx-lg-5">
              <?php 
                foreach ($Pricing[0] as $items) {
                  
              
              ?>
          <div class="col-lg-6">
            <div class="pricing-item d-flex justify-content-between">
              <h3><?php echo ($items['Title']); ?></h3>
              <h4><?php echo ($items['Pricing']); ?></h4>
            </div>
          </div><!-- End Pricing Item -->
              <?php 
                }
              ?>
        </div>

      </div>

    </section><!-- /Pricing Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              <p><?php echo $settings[11]['description']; ?> </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
              <?php 
                foreach ($FAQ[0] as $items) {
                  
              
              
              ?>
              <div class="faq-item faq-active">
                <h3><span class="num"></span> <span><?php echo ($items['Title']); ?></span></h3>
                <div class="faq-content">
                  <p><?php echo ($items['description']); ?></p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
                <?php 
                }
                
                ?>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

      <img src="assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">
              <?php 
              foreach ($testimonial[0] as $items) {
                
              
              
              ?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo ($items['image']); ?>" class="testimonial-img" alt="">
                <h3><?php echo ($items['name']); ?></h3>
                <h4><?php echo ($items['Title']); ?></h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <span><?php echo ($items['description']); ?></span>
                </p>
              </div>
            </div><!-- End testimonial item -->
                <?php 
                 }
                
                ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><?php echo $settings[14]['description']; ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="info-wrap" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-5">

            <div class="col-lg-4">
              <div class="info-item d-flex align-items-center">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p><?php echo $settings[12]['description']; ?></p>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-4">
              <div class="info-item d-flex align-items-center">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p><?php echo $settings[13]['description']; ?></p>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-4">
              <div class="info-item d-flex align-items-center">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p><?php echo $settings[15]['description']; ?></p>
                </div>
              </div>
            </div><!-- End Info Item -->

          </div>
        </div>

        <form action="contact.php" method="post" class="php-email-form">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject"  placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" name="submit">Send Message</button>
            </div>
          </div>
        </form><!-- End Contact Form -->

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Mahmudur Rahman</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

  <script>

    var massageText = "<?= $_SESSION['status'] ?? ''; ?>"

    if(massageText != ''){

   
      Swal.fire({
      title: "Thank you!",
      text: massageText,
      icon: "success"
      });
      <?php unset($_SESSION['status']); ?>
    }
            
  </script>

</body>

</html>
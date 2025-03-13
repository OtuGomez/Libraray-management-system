
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> {{ env("APP_NAME") }} | Welcome </title>
    <meta property="og:title" content="Simple &amp; Beautiful Admin Theme">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Library Management System">

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ asset("/images/logo.png") }}">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ asset("/vendor/aos/aos.css") }}"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset("/stylesheets/theme.min.css") }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset("/stylesheets/theme-dark.min.css") }}" data-skin="dark">
    <link rel="stylesheet" href="{{ asset("/stylesheets/custom.css") }}">
    <script>
      var skin = localStorage.getItem('skin') || 'default';
      var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      // Disable unused skin immediately
      disabledSkinStylesheet.setAttribute('rel', '');
      disabledSkinStylesheet.setAttribute('disabled', true);
      // add loading class to html immediately
      document.querySelector('html').classList.add('loading');
    </script>
  </head>
  <body>




    <main class="app app-site">
        <nav class="navbar navbar-expand-lg navbar-light py-4 bg-dark" data-aos="fade-in">
          <div class="container">
      
            <button class="hamburger hamburger-squeeze hamburger-light d-flex d-lg-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> 
           
            
            <a class="navbar-brand ml-auto mr-0 text-white" href="{{ route("welcome") }}">
                <img src="{{ asset("/images/logo.png") }}" alt="logo" width="50">
             Library Management System
          </a>
            <div class="navbar-collapse collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item mr-lg-3 active">
                  <a class="nav-link py-2 text-white" href="{{ route("welcome") }}">Home</a>
                </li>
  
                <li class="nav-item mr-lg-3">
                  <a class="nav-link py-2 text-white" href="{{ route("login") }}">User Account Login</a>
                </li>
  
                <li class="nav-item mr-lg-3">
                  <a class="nav-link py-2 text-white" href="{{ route("register") }}">Member Registration</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
  
        
        
        <section class="py-5">
          <div class="container">
            <div class="row text-center text-md-left text-center" style="text-align: center !important">
              <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="0">
                <img class="mb-4" src="/images/illustration/lab.svg" alt="" height="72">
                <h2 class="lead"> Efficient and User-Friendly </h2>
              </div>
              <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="100">
                <img class="mb-4" src="/images/illustration/easy-config.svg" alt="" height="72">
                <h2 class="lead"> Easily Customizable </h2>
              </div>
              <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="200">
                <img class="mb-4" src="/images/illustration/scale.svg" alt="" height="72">
                <h2 class="lead"> Fast and Scalable </h2>
              </div>
              <div class="col-6 col-md-3 py-4" data-aos="fade-up" data-aos-delay="300">
                <img class="mb-4" src="/images/illustration/support.svg" alt="" height="72">
                <h2 class="lead"> Reliable Support </h2>
              </div>
            </div>
          </div>
        </section>
  
        <section class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-12 col-md-8 offset-md-2 text-center">
                <h2> Your Ultimate Library Companion </h2>
                <p class="lead text-muted"> Designed to streamline book lending, cataloging, and member management. </p>
              </div>
            </div>
          </div>
        </section>
  
        <section class="position-relative pb-5 bg-light pt-5">
          <div class="container position-relative">
            <h2 class="text-center text-sm-left"> Explore the Benefits </h2>
            <p class="lead text-muted text-center text-sm-left mb-5"> Simplifying library operations for a seamless experience. </p>
            <div class="card-deck-lg">
              <div class="card shadow" data-aos="fade-up" data-aos-delay="0">
                <div class="card-body p-4">
                  <div class="d-sm-flex align-items-start text-center text-sm-left">
                    <img src="/images/illustration/rocket.svg" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                    <div class="flex-fill">
                      <h5 class="mt-0"> Quick Setup </h5>
                      <p class="text-muted font-size-lg"> Get started in no time with intuitive tools and easy configuration. </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card shadow" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body p-4">
                  <div class="d-sm-flex align-items-start text-center text-sm-left">
                    <img src="/images/illustration/setting.svg" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                    <div class="flex-fill">
                      <h5 class="mt-0"> Robust Features </h5>
                      <p class="text-muted font-size-lg"> Manage books, track lending, and handle memberships with ease. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-deck-lg">
              <div class="card shadow" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body p-4">
                  <div class="d-sm-flex align-items-start text-center text-sm-left">
                    <img src="/images/illustration/brain.svg" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                    <div class="flex-fill">
                      <h5 class="mt-0"> Smart Organization </h5>
                      <p class="text-muted font-size-lg"> Categorize and retrieve books effortlessly with advanced search options. </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card shadow" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body p-4">
                  <div class="d-sm-flex align-items-start text-center text-sm-left">
                    <img src="/images/illustration/horse.svg" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                    <div class="flex-fill">
                      <h5 class="mt-0"> Seamless Workflow </h5>
                      <p class="text-muted font-size-lg"> Manage borrowing, returns, and overdue alerts efficiently. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

    </main>
  

    <!-- BEGIN BASE JS -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/popper.js/umd/popper.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="/vendor/aos/aos.js"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="/javascript/theme.min.js"></script> <!-- END THEME JS -->
</html>
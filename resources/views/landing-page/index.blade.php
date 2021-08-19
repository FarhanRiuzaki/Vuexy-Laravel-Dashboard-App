@extends('layouts.landingPage')

@section('title', 'Bankmega API')

@section('content')
<body>
    
  <!--[if lt IE 8]>
										<p class="browserupgrade">You are using an 
											<strong>outdated</strong> browser. Please 
											<a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
										</p>
										<![endif]-->
  <!-- ./Making stripe menu navigation -->
  <nav class="st-nav navbar main-nav navigation fixed-top" id="main-nav">
    <div class="container">
      <ul class="st-nav-menu nav navbar-nav">
        <li class="st-nav-section nav-item">
          <a href="#main" class="navbar-brand">
            <img src="{{ asset('landingPage/img/logo.png') }}" alt="Hamid" class="logo logo-sticky d-inline-block d-md-none">
            <img src="{{ asset('landingPage/img/logo-light.png') }}" alt="Hamid" class="logo d-none d-md-inline-block">
          </a>
        </li>
        <li class="st-nav-section st-nav-primary nav-item">
          <a class="st-root-link nav-link" href="index.html">Produk</a>
          <a class="st-root-link nav-link" href="index.html">Mulai Sekarang</a>
          <a class="st-root-link nav-link" href="index.html">Dokumentasi</a>
          <a class="st-root-link nav-link" href="index.html">FAQ</a>
          <a class="st-root-link nav-link" href="index.html">Berita</a>
          <a class="st-root-link nav-link" href="index.html">Studi Kasus</a>
        </li>
        <li class="st-nav-section st-nav-secondary nav-item">
          <a class="btn btn-rounded btn-outline me-3 px-3" href="{{ url('/login') }}" target="_blank">
            {{-- <i class="fas fa-sign-in-alt d-none d-md-inline me-md-0 me-lg-2"></i> --}}
            <span class="d-md-none d-lg-inline">Login</span>
          </a>
          <a class="btn btn-rounded btn-solid px-3" href="{{ url('/register') }}" target="_blank">
            {{-- <i class="fas fa-user-plus d-none d-md-inline me-md-0 me-lg-2"></i> --}}
            <span class="d-md-none d-lg-inline">Signup</span>
          </a>
        </li>
        <!-- Mobile Navigation -->
        <li class="st-nav-section st-nav-mobile nav-item">
          <button class="st-root-link navbar-toggler" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="st-popup">
            <div class="st-popup-container">
              <a class="st-popup-close-button">Close</a>
              <div class="st-dropdown-content-group">
                <h4 class="text-uppercase regular">Pages</h4>
                <a class="regular text-primary" href="about.html">
                  <i class="far fa-building me-2"></i> About </a>
                <a class="regular text-success" href="contact.html">
                  <i class="far fa-envelope me-2"></i> Contact </a>
                <a class="regular text-warning" href="pricing.html">
                  <i class="fas fa-hand-holding-usd me-2"></i> Pricing </a>
                <a class="regular text-info" href="faqs.html">
                  <i class="far fa-question-circle me-2"></i> FAQs </a>
              </div>
              <div class="st-dropdown-content-group border-top bw-2">
                <h4 class="text-uppercase regular">Components</h4>
                <div class="row">
                  <div class="col me-4">
                    <a target="_blank" href="components/alert.html">Alerts</a>
                    <a target="_blank" href="components/badge.html">Badges</a>
                    <a target="_blank" href="components/button.html">Buttons</a>
                    <a target="_blank" href="components/color.html">Colors</a>
                    <a target="_blank" href="components/accordion.html">Accordion</a>
                    <a target="_blank" href="components/cookie-law.html">Cookielaw</a>
                  </div>
                  <div class="col me-4">
                    <a target="_blank" href="components/overlay.html">Overlay</a>
                    <a target="_blank" href="components/progress.html">Progress</a>
                    <a target="_blank" href="components/lightbox.html">Lightbox</a>
                    <a target="_blank" href="components/tab.html">Tabs</a>
                    <a target="_blank" href="components/tables.html">Tables</a>
                    <a target="_blank" href="components/typography.html">Typography</a>
                  </div>
                </div>
              </div>
              <div class="st-dropdown-content-group bg-light b-t">
                <a href="login.html">Sign in <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="st-dropdown-root">
      <div class="st-dropdown-bg">
        <div class="st-alt-bg"></div>
      </div>
      <div class="st-dropdown-arrow"></div>
      <div class="st-dropdown-container">
        <div class="st-dropdown-section" data-dropdown="blocks">
          <div class="st-dropdown-content">
            <div class="st-dropdown-content-group">
              <div class="row">
                <div class="col me-4">
                  <a class="dropdown-item" target="_blank" href="blocks/call-to-action.html">Call to actions</a>
                  <a class="dropdown-item" target="_blank" href="blocks/contact.html">Contact</a>
                  <a class="dropdown-item" target="_blank" href="blocks/counter.html">Counters</a>
                  <a class="dropdown-item" target="_blank" href="blocks/faqs.html">FAQs</a>
                </div>
                <div class="col me-4">
                  <a class="dropdown-item" target="_blank" href="blocks/footer.html">Footers</a>
                  <a class="dropdown-item" target="_blank" href="blocks/form.html">Forms</a>
                  <a class="dropdown-item" target="_blank" href="blocks/navbar.html">Navbar</a>
                  <a class="dropdown-item" target="_blank" href="blocks/navigation.html">Navigation</a>
                </div>
                <div class="col">
                  <a class="dropdown-item" target="_blank" href="blocks/pricing.html">Pricing</a>
                  <a class="dropdown-item" target="_blank" href="blocks/slider.html">Sliders</a>
                  <a class="dropdown-item" target="_blank" href="blocks/team.html">Team</a>
                  <a class="dropdown-item" target="_blank" href="blocks/testimonial.html">Testimonials</a>
                </div>
              </div>
            </div>
            <div class="st-dropdown-content-group">
              <h3 class="link-title">
                <i class="fas fa-long-arrow-alt-right icon"></i> Coming soon
              </h3>
              <div class="ms-5">
                <span class="dropdown-item text-secondary">Dividers </span>
                <span class="dropdown-item text-secondary">Gallery </span>
                <span class="dropdown-item text-secondary">Screenshots</span>
              </div>
            </div>
          </div>
        </div>
        <div class="st-dropdown-section" data-dropdown="pages">
          <div class="st-dropdown-content">
            <div class="st-dropdown-content-group">
              <div class="mb-4">
                <h3 class="text-darker light text-nowrap">
                  <span class="bold regular">Useful pages</span> you'll need
                </h3>
                <p class="text-secondary mt-0">Get a complete design stack</p>
              </div>
              <div class="row">
                <div class="col">
                  <ul class="me-4">
                    <li>
                      <h4 class="text-uppercase regular">Error</h4>
                    </li>
                    <li>
                      <a target="_blank" href="403.html">403 Error</a>
                    </li>
                    <li>
                      <a target="_blank" href="404.html">404 Error</a>
                    </li>
                    <li>
                      <a target="_blank" href="500.html">500 Error</a>
                    </li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="me-4">
                    <li>
                      <h4 class="text-uppercase regular">User</h4>
                    </li>
                    <li>
                      <a target="_blank" href="login.html">Login</a>
                    </li>
                    <li>
                      <a target="_blank" href="register.html">Register</a>
                    </li>
                    <li>
                      <a target="_blank" href="forgot.html">Forgot</a>
                    </li>
                  </ul>
                </div>
                <div class="col">
                  <ul>
                    <li>
                      <h4 class="text-uppercase regular">Extra</h4>
                    </li>
                    <li>
                      <a target="_blank" href="pricing.html">Pricing</a>
                    </li>
                    <li>
                      <a target="_blank" href="terms.html">Terms</a>
                    </li>
                    <li>
                      <a target="_blank" href="faqs.html">FAQ</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="st-dropdown-content-group">
              <a class="dropdown-item bold" href="about.html">
                <i class="far fa-building icon"></i> About </a>
              <a class="dropdown-item bold" href="contact.html">
                <i class="far fa-envelope icon"></i> Contact </a>
              <a class="dropdown-item bold" href="pricing.html">
                <i class="fas fa-hand-holding-usd icon"></i> Pricing </a>
            </div>
          </div>
        </div>
        <div class="st-dropdown-section" data-dropdown="components">
          <div class="st-dropdown-content">
            <div class="st-dropdown-content-group">
              <a class="dropdown-item" target="_blank" href="components/color.html">
                <div class="d-flex align-items-center mb-3">
                  <div class="bg-dark text-contrast icon-md center-flex rounded-circle me-2">
                    <i class="fas fa-palette"></i>
                  </div>
                  <div class="flex-fill">
                    <h3 class="link-title m-0">Colors</h3>
                    <p class="m-0 text-secondary">Get to know Hamid color options</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" target="_blank" href="components/form-controls.html">
                <div class="d-flex align-items-center mb-3">
                  <div class="bg-secondary text-contrast icon-md center-flex rounded-circle me-2">
                    <i class="fab fa-wpforms"></i>
                  </div>
                  <div class="flex-fill">
                    <h3 class="link-title m-0">Forms</h3>
                    <p class="m-0 text-secondary">All forms elements</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" target="_blank" href="components/accordion.html">
                <div class="d-flex align-items-center mb-3">
                  <div class="bg-success text-contrast icon-md center-flex rounded-circle me-2">
                    <i class="fas fa-bars"></i>
                  </div>
                  <div class="flex-fill">
                    <h3 class="link-title m-0">Accordion</h3>
                    <p class="m-0 text-secondary">Useful accordion elements</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" target="_blank" href="components/cookie-law.html">
                <div class="d-flex align-items-center mb-4">
                  <div class="bg-info text-contrast icon-md center-flex rounded-circle me-2">
                    <i class="fas fa-cookie-bite"></i>
                  </div>
                  <div class="flex-fill">
                    <h3 class="link-title m-0">CookieLaw</h3>
                    <p class="m-0 text-secondary">Comply with the hideous EU Cookie Law</p>
                  </div>
                </div>
              </a>
              <h4 class="text-uppercase regular">Huge components list</h4>
              <div class="row">
                <div class="col me-4">
                  <a class="dropdown-item" target="_blank" href="components/alert.html">Alerts</a>
                  <a class="dropdown-item" target="_blank" href="components/badge.html">Badges</a>
                  <a class="dropdown-item" target="_blank" href="components/button.html">Buttons</a>
                </div>
                <div class="col me-4">
                  <a class="dropdown-item" target="_blank" href="components/overlay.html">Overlay</a>
                  <a class="dropdown-item" target="_blank" href="components/progress.html">Progress</a>
                  <a class="dropdown-item" target="_blank" href="components/lightbox.html">Lightbox</a>
                </div>
                <div class="col me-4">
                  <a class="dropdown-item" target="_blank" href="components/tab.html">Tabs</a>
                  <a class="dropdown-item" target="_blank" href="components/tables.html">Tables</a>
                  <a class="dropdown-item" target="_blank" href="components/typography.html">Typography</a>
                </div>
              </div>
            </div>
            <div class="st-dropdown-content-group">
              <a class="dropdown-item" target="_blank" href="components/wizard.html">Wizard </a>
              <span class="dropdown-item d-flex align-items-center text-muted">Timeline <i
                  class="fas fa-ban ms-auto"></i>
              </span>
              <span class="dropdown-item d-flex align-items-center text-muted">Process <i
                  class="fas fa-ban ms-auto"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="st-dropdown-section" data-dropdown="blog">
          <div class="st-dropdown-content">
            <div class="st-dropdown-content-group">
              <div class="row">
                <div class="col me-4">
                  <h4 class="regular text-uppercase">Full width</h4>
                  <a class="dropdown-item" target="_blank" href="blog/blog-post.html">Single post</a>
                  <a class="dropdown-item" target="_blank" href="blog/blog-grid.html">Posts Grid</a>
                </div>
                <div class="col me-4">
                  <h4 class="regular text-uppercase">Sidebar left</h4>
                  <a class="dropdown-item" target="_blank" href="blog/blog-post-sidebar-left.html">Single post</a>
                  <a class="dropdown-item" target="_blank" href="blog/blog-grid-sidebar-left.html">Posts Grid</a>
                </div>
                <div class="col me-4">
                  <h4 class="regular text-uppercase">Sidebar right</h4>
                  <a class="dropdown-item" target="_blank" href="blog/blog-post-sidebar-right.html">Single post</a>
                  <a class="dropdown-item" target="_blank" href="blog/blog-grid-sidebar-right.html">Posts Grid</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="st-dropdown-section" data-dropdown="shop">
          <div class="st-dropdown-content">
            <div class="st-dropdown-content-group">
              <a class="dropdown-item mb-4" target="_blank" href="shop/index.html">
                <div class="d-flex align-items-center">
                  <div class="bg-success text-contrast icon-md center-flex rounded-circle me-2">
                    <i class="fas fa-shopping-basket"></i>
                  </div>
                  <div class="flex-fill">
                    <h3 class="link-title m-0">Home</h3>
                    <p class="m-0 text-secondary">Online store home with an outstanding UX</p>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" target="_blank" href="shop/cart.html">
                <div class="d-flex align-items-center">
                  <div class="bg-info text-contrast icon-md center-flex rounded-circle me-2">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                  <div class="flex-fill">
                    <h3 class="link-title m-0">Cart</h3>
                    <p class="m-0 text-secondary">Online store shopping cart</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="st-dropdown-content-group">
              <h3 class="link-title">
                <i class="fas fa-money-check-alt icon"></i> Checkout
              </h3>
              <div class="ms-5">
                <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-customer.html">Customer <i
                    class="fas fa-angle-right ms-2"></i>
                </a>
                <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-shipping.html">Shipping
                  Information <i class="fas fa-angle-right ms-2"></i>
                </a>
                <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-payment.html">Payment
                  Methods <i class="fas fa-angle-right ms-2"></i>
                </a>
                <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-confirmation.html">Order
                  Review <i class="fas fa-angle-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <main class="overflow-hidden">
    <!-- ./Page header -->
    <header class="header section parallax image-background overlay overlay-primary alpha-8 text-contrast"
      style="background-image: url({{ asset('landingPage/img/bg/grid.jpg') }})">
      <div class="container overflow-hidden">
        <div class="row">
          <div class="col-md-8">
            <p class="lead bold">Welcome Developers!</p>
            <h1 class="display-4 text-contrast light">Tools for your day-to-day</h1>
            <h1 class="text-contrast">
              <span class="typed bold display-4 display-md-3"
                data-strings='["Transfer", "SKN", "Cek Saldo", "Cek Mutasi"]'></span>
            </h1>
            <nav class="nav mt-5">
              <a href="{{ url('docs') }}" class="btn btn-rounded btn-contrast btn-lg px-5">Review full docs</a>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div class="position-relative">
      <div class="shape-divider shape-divider-bottom shape-divider-fluid-x text-darker">
        <svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z"></path>
        </svg>
      </div>
    </div>
    <!-- ./ New Integration API -->
    <section class="section bg-darker">
      <div class="container text-center pt-4 pb-7">
        <p class="text-contrast">We're proud to announce the completion of the New Integration API. <a
            href="blog-post.html" class="bold d-inline-flex align-items-center text-contrast ms-3">Learn more <i
              data-feather="chevron-right"></i>
          </a>
        </p>
      </div>
    </section>
    <!-- ./Integration API -->
    <section class="section mt-n6">
      <div class="container pt-0">
        <div class="row g-3 text-center text-md-start">
          <div class="col-md-4">
            <div class="card shadow-sm shadow-hover lift-hover h-100">
              <div class="card-body bg-contrast p-4">
                <a href="javascript:;" class="text-darker">
                  <h4 class="bold me-3">Transfer API</h4>
                </a>
                <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur.</p>
                <a href="javascript:;" class="d-block d-md-flex align-items-center mt-auto">Learn more <i
                    class="fas fa-long-arrow-alt-right ms-3"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm shadow-hover lift-hover h-100">
              <div class="card-body bg-contrast p-4">
                <a href="javascript:;" class="text-darker">
                  <h4 class="bold me-3">SKN API</h4>
                </a>
                <p class="mt-4">Consequuntur fugit minima natus optio quisquam sint sunt? Earum harum in laudantium
                  nobis obcaecati odio.</p>
                <a href="javascript:;" class="d-block d-md-flex align-items-center mt-auto">Learn more <i
                    class="fas fa-long-arrow-alt-right ms-3"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm shadow-hover lift-hover h-100">
              <div class="card-body bg-contrast p-4">
                <a href="javascript:;" class="text-darker">
                  <h4 class="bold me-3">Cek Saldo API</h4>
                </a>
                <p class="mt-4">Earum harum in laudantium nobis obcaecati odio, praesentium, quis sequi soluta vel
                  veniam.</p>
                <a href="javascript:;" class="d-block d-md-flex align-items-center mt-auto">Learn more <i
                    class="fas fa-long-arrow-alt-right ms-3"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-3 text-center text-md-start" style="margin-top:10px">
          <div class="col-md-4">
            <div class="card shadow-sm shadow-hover lift-hover h-100">
              <div class="card-body bg-contrast p-4">
                <a href="javascript:;" class="text-darker">
                  <h4 class="bold me-3">Cek Mutasi API</h4>
                </a>
                <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur.</p>
                <a href="javascript:;" class="d-block d-md-flex align-items-center mt-auto">Learn more <i
                    class="fas fa-long-arrow-alt-right ms-3"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ./Counters -->
    <section class="bg-contrast edge bottom-right">
      <div class="container">
        <div class="row align-items-center text-center text-lg-left">
          <div class="col-12 col-md-7 col-lg-6 ms-lg-auto text-center text-md-start">
            <i data-feather="activity" width="36" height="36" class="stroke-primary"></i>
            <p class="small text-primary bold">Amazing stats</p>
            <h2 class="bold">Get the very best of us by doing the best of you</h2>
            <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis dolores
              dolorum, error est excepturi exercitationem hic iusto minus nam officia optio quasi tempore voluptatibus.
              Aut dolore in nostrum quae voluptatem!</p>
          </div>
          <div class="col-12 col-md-5 col-lg-5">
            <div class="row g-3">
              <div class="col-6">
                <div
                  class="rounded border shadow-box shadow-hover p-2 p-sm-3 d-flex align-items-center flex-wrap bg-contrast">
                  <i data-feather="user" width="36" height="36" class="me-4 stroke-secondary"></i>
                  <div class="text-start">
                    <p class="counter font-md bold m-0 text-dark">954</p>
                    <p class="m-0">Users</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div
                  class="rounded border shadow-box shadow-hover p-2 p-sm-3 d-flex align-items-center flex-wrap bg-contrast">
                  <i data-feather="download-cloud" width="36" height="36" class="me-4 stroke-secondary"></i>
                  <div class="text-start">
                    <p class="counter font-md bold m-0 text-dark">37</p>
                    <p class="m-0">Downloads</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div
                  class="rounded border shadow-box shadow-hover p-2 p-sm-3 d-flex align-items-center flex-wrap bg-contrast">
                  <i data-feather="box" width="36" height="36" class="me-4 stroke-secondary"></i>
                  <div class="text-start">
                    <p class="counter font-md bold m-0 text-dark">19</p>
                    <p class="m-0">Plugins</p>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div
                  class="rounded border shadow-box shadow-hover p-2 p-sm-3 d-flex align-items-center flex-wrap bg-primary text-contrast">
                  <i data-feather="star" width="36" height="36" class="me-4 stroke-contrast"></i>
                  <div class="text-start">
                    <p class="counter font-md bold m-0">31</p>
                    <p class="m-0">Projects</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ./Bring to life - Swiper -->
    <section class="section bg-light">
      <div class="container bring-to-front">
        <div class="row gap-y">
          <div class="col-md-6">
            <div class="rounded bg-primary-gradient shadow">
              <div class="d-flex flex-column align-items-center py-3">
                <img src="{{ asset('landingPage/img/bg/asset-1.svg') }}" class="img-responsive w-50" alt="">
              </div>
            </div>
            <div class="rounded shadow-box bg-contrast mt-4">
              <div class="d-flex align-items-center px-3">
                <i data-feather="bar-chart" class="stroke-primary me-3" width="36" height="36"></i>
                <div class="flex-fill my-3 ps-3 b-l">
                  <p class="bold text-primary my-0">Admin template included</p>
                  <p class="my-0 text-secondary">We've included a fully functional starter admin dashboard</p>
                </div>
              </div>
            </div>
            <div class="rounded shadow-box bg-contrast mt-4">
              <div class="d-flex align-items-center px-3">
                <i data-feather="smartphone" width="36" height="36" class="stroke-primary me-3"></i>
                <div class="flex-fill my-3 ps-3 b-l">
                  <p class="bold text-primary my-0">Powered with multiple starter apps</p>
                  <p class="my-0 text-secondary">It's awesome you to have a nice feature to show up</p>
                  <hr class="my-3">
                  <nav id="sw-nav-1" class="nav nav-tabs tabs-clean border-bottom-0">
                    <a href="javascript:;"
                      class="nav-item nav-link ps-md-0 py-0 d-flex flex-column align-items-center border-bottom-0 active"
                      data-step="1">
                      <i data-feather="mail" class="icon"></i>
                      <span class="d-none small">Inbox</span>
                    </a>
                    <a href="javascript:;"
                      class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0"
                      data-step="2">
                      <i data-feather="calendar" class="icon"></i>
                      <span class="d-none small">Calendar</span>
                    </a>
                    <a href="javascript:;"
                      class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0"
                      data-step="3">
                      <i data-feather="file" class="icon"></i>
                      <span class="d-none small">Invoice</span>
                    </a>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 ms-md-auto text-center text-md-start">
            <div class="mb-5">
              <span class="badge bg-info text-contrast rounded-pill shadow-box bold py-2 px-4">Simple and
                transparent</span>
              <h2 class="mt-3">Bring your application to life</h2>
              <p class="lead text-secondary">Hamid includes an outstanding starter Admin Dashboard. You can start
                developing right away your web application.</p>
            </div>
            <div class="swiper-container" data-sw-navigation="#sw-nav-1" data-sw-navigation-active="active">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <figure class="shadow-box">
                    <img src="{{ asset('landingPage/img/screens/dash/inbox.png') }}" alt="" class="img-responsive rounded">
                  </figure>
                </div>
                <div class="swiper-slide">
                  <figure class="shadow-box">
                    <img src="{{ asset('landingPage/img/screens/dash/calendar.png') }}" alt="" class="img-responsive rounded">
                  </figure>
                </div>
                <div class="swiper-slide">
                  <figure class="shadow-box">
                    <img src="{{ asset('landingPage/img/screens/dash/invoice.png') }}" alt="" class="img-responsive rounded">
                  </figure>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ./Developers - Code snippets -->
    <section class="section b-b bg-light">
      <div class="container">
        <div class="section-heading text-center">
          <i data-feather="box" width="36" height="36" class="stroke-primary"></i>
          <h2 class="bold">Developer tools</h2>
          <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, assumenda
            autem consequatur cum dignissimos dolores doloribus eius eum iusto laborum quasi quidem sapiente sit.</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-lg-3 ms-lg-auto order-md-2">
            <nav id="sw-nav-developers"
              class="nav flex-md-column justify-content-between justify-content-md-start nav-pills nav-pills-light nav-fill">
              <a class="nav-item nav-link bold text-md-start active" href="#" data-step="1">
                <i class="icon fas fa-code"></i> HTML Structure </a>
              <a class="nav-item nav-link bold text-md-start" href="#" data-step="2">
                <i class="icon fab fa-sass"></i> SASS compiler </a>
              <a class="nav-item nav-link bold text-md-start" href="#" data-step="3">
                <i class="icon fas fa-retweet fa-rotate-90"></i> Ajax enabled </a>
              <a class="nav-item nav-link bold text-md-start" href="#" data-step="4">
                <i class="icon fas fa-exclamation-triangle"></i> Form validation </a>
            </nav>
            <hr class="mt-5">
            <a href="javascript:;" class="nav-link text-primary">All Resources <i
                class="icon fas fa-long-arrow-alt-right"></i>
            </a>
          </div>
          <div class="col-md-8">
            <div class="swiper-container mt-4 mt-md-0" data-sw-navigation="#sw-nav-developers">
              <div class="swiper-wrapper line-numbers">
                <div class="swiper-slide">
                  <pre class="language-html">
																											<code>
&lt;header class="main-header"&gt;
    ...
&lt;/header&gt;

&lt;div class="main-body"&gt;
    &lt;nav class="side-nav"&gt;
        ...
    &lt;/div&gt;

    &lt;main&gt;
        ...
    &lt;/main&gt;

    &lt;aside class="quick-view"&gt;
        ...
    &lt;/div&gt;
&lt;/div&gt;

&lt;footer class="main-footer"&gt;
    ...
&lt;/footer&gt;</code>
																										</pre>
                </div>
                <div class="swiper-slide">
                  <pre class="language-javascript">
																											<code>
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function () {
    return gulp
        .src('../sass/*.scss')
        .pipe(sass({
            includePaths: ['./bower_components']
        }))
        .pipe(autoprefixer({
            browsers: ['last 2 version', '> 5%']
        }))
        .pipe(gulp.dest('./css'));
});

gulp.task('default', ['scss']);</code>
																										</pre>
                </div>
                <div class="swiper-slide">
                  <pre class="language-javascript">
																											<code>
var apiUrl = 'https://api.5studios.net/';

this.getLoggedUser = function() {
    return $.ajax({
        url: apiUrl + 'user/login?inc=name,location,email,picture',
        dataType: 'json'
    });
};

this.getPendingTasks = function () {
    return $.getJSON(apiUrl + 'data/tasks/pending', function() {
        console.log("Tasks loaded");
    });
};</code>
																										</pre>
                </div>
                <div class="swiper-slide">
                  <pre class="language-javascript">
																											<code>
$("#register-form").validate({
  rules: {
    username: {
      required: true,
      minLength: 2,
      remote: "register.php"
    }
  },
  messages: {
    username: {
      required: "Enter your username",
      minLength: "At least 2 characters are necessary",
      remote: String.format("The name {0} is already in use")
    }
  }
});</code>
																										</pre>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ./Integration tools -->
    <section class="section">
      <div class="shape-wrapper">
        <img src="{{ asset('landingPage/img/shps/shape-2.svg') }}" class="shape-right" alt="...">
      </div>
      <div class="container bring-to-front">
        <div class="row gap-y align-items-center">
          <div class="col-12 col-md-5 col-lg-5 me-md-auto text-center text-lg-start">
            <i data-feather="box" width="36" height="36" class="stroke-primary"></i>
            <p class="small text-primary bold">Integration tools</p>
            <h2 class="bold">Easy integrations for your convenience</h2>
            <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis dolores
              dolorum, error est excepturi exercitationem hic iusto minus nam officia optio quasi tempore voluptatibus.
              Aut dolore in nostrum quae voluptatem!</p>
          </div>
          <div class="col-12 col-md-7 col-lg-6">
            <div class="row gap-y">
              <div class="col-6 col-sm-5 col-md-6 col-lg-5 mt-6 ms-lg-auto">
                <div class="bg-primary-gradient rounded text-contrast p-2 p-sm-4 shadow text-center" data-aos="fade-up">
                  <img src="{{ asset('landingPage/img/logos/2.svg') }}" class="img-responsive op-8 px-0 px-sm-4" alt="...">
                  <p class="bold mt-5">jQuery</p>
                  <p class="op-5 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <a href="javascript:;" class="btn btn-rounded btn-contrast mt-4">
                    <i class="d-inline-block d-sm-none fas fa-long-arrow-alt-right"></i>
                    <span class="d-none d-sm-inline-block">Integrate</span>
                  </a>
                </div>
              </div>
              <div class="col-6 col-sm-5 col-md-6 col-lg-5 me-lg-auto">
                <div class="bg-info-gradient rounded text-contrast p-2 p-sm-4 shadow text-center" data-aos="fade-up">
                  <img src="{{ asset('landingPage/img/logos/1.svg') }}" class="img-responsive op-8 px-0 px-sm-4" alt="...">
                  <p class="bold mt-5">Codebase</p>
                  <p class="op-5 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <a href="javascript:;" class="btn btn-rounded btn-contrast mt-4">
                    <i class="d-inline-block d-sm-none fas fa-long-arrow-alt-right"></i>
                    <span class="d-none d-sm-inline-block">Integrate</span>
                  </a>
                </div>
              </div>
              <div class="col-6 col-sm-5 col-md-6 col-lg-5 ms-lg-auto">
                <div class="bg-danger-gradient rounded text-contrast p-2 p-sm-4 shadow text-center" data-aos="fade-up">
                  <img src="{{ asset('landingPage/img/logos/3.svg') }}" class="img-responsive op-8 px-0 px-sm-4" alt="...">
                  <p class="bold mt-5">OpenCart</p>
                  <p class="op-5 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <a href="javascript:;" class="btn btn-rounded btn-contrast mt-4">
                    <i class="d-inline-block d-sm-none fas fa-long-arrow-alt-right"></i>
                    <span class="d-none d-sm-inline-block">Integrate</span>
                  </a>
                </div>
              </div>
              <div class="col-6 col-sm-5 col-md-6 col-lg-5 mt-n6 me-lg-auto">
                <div class="bg-success-gradient rounded text-contrast p-2 p-sm-4 shadow text-center" data-aos="fade-up">
                  <img src="{{ asset('landingPage/img/logos/4.svg') }}" class="img-responsive op-8 px-0 px-sm-4" alt="...">
                  <p class="bold mt-5">Morpheus</p>
                  <p class="op-5 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <a href="javascript:;" class="btn btn-rounded btn-contrast mt-4">
                    <i class="d-inline-block d-sm-none fas fa-long-arrow-alt-right"></i>
                    <span class="d-none d-sm-inline-block">Integrate</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ./Brands -->
    <section class="section bg-light">
      <div class="container">
        <h4 class="bold text-center mb-5">They trust us</h4>
        <div class="row gap-y">
          <div class="col-md-3 col-xs-4 col-6 px-md-5">
            <img src="{{ asset('landingPage/img/logos/1.png') }}" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;">
          </div>
          <div class="col-md-3 col-xs-4 col-6 px-md-5">
            <img src="{{ asset('landingPage/img/logos/2.png') }}" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;">
          </div>
          <div class="col-md-3 col-xs-4 col-6 px-md-5">
            <img src="{{ asset('landingPage/img/logos/3.png') }}" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;">
          </div>
          <div class="col-md-3 col-xs-4 col-6 px-md-5">
            <img src="{{ asset('landingPage/img/logos/4.png') }}" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;">
          </div>
        </div>
      </div>
    </section>
    <!-- ./Join - As Developer/Designer -->
    <section class="section bg-light">
      <div class="container bring-to-front py-0">
        <div class="shadow bg-contrast p-5 rounded">
          <div class="row gap-y align-items-center text-center text-lg-start">
            <div class="col-12 col-md-6 py-4 px-5 b-md-r">
              <i data-feather="star" width="36" height="36" class="stroke-primary"></i>
              <a href="javascript:;" class="mt-4 text-primary d-flex align-items-center">
                <h4 class="me-3">Join as Designer</h4>
                <i class="fas fa-long-arrow-alt-end"></i>
              </a>
              <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur fugit
                minima natus optio quisquam sint sunt? Earum harum in laudantium nobis obcaecati odio, praesentium, quis
                sequi soluta vel veniam.</p>
            </div>
            <div class="col-12 col-md-6 py-4 px-5">
              <i data-feather="code" width="36" height="36" class="stroke-info"></i>
              <a href="javascript:;" class="mt-4 text-info d-flex align-items-center">
                <h4 class="me-3">Join as Developer</h4>
                <i class="fas fa-long-arrow-alt-end"></i>
              </a>
              <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur fugit
                minima natus optio quisquam sint sunt? Earum harum in laudantium nobis obcaecati odio, praesentium, quis
                sequi soluta vel veniam.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ./CTA - Create Account -->
    <section class="section bg-contrast edge top-left b-b">
      <div class="container">
        <div class="d-flex align-items-center flex-column flex-md-row">
          <div class="text-center text-md-start">
            <p class="light mb-0 text-primary lead">Ready to get started?</p>
            <h2 class="mt-0 bold">Create an account now</h2>
          </div>
          <a href="register.html" class="btn btn-primary btn-rounded mt-3 mt-md-0 ms-md-auto">Register App</a>
        </div>
      </div>
    </section>
    <!-- ./Footer - Four Columns -->
    <footer class="site-footer section bg-light">
      <div class="container pb-3">
        <div class="row gap-y text-center text-md-start">
          <div class="col-md-2">
            <img src="{{ asset('landingPage/img/logo.png') }}" alt="" class="logo" style="padding-top: 0.75rem;">
            <p><strong>PT. Bank Mega Tbk. </strong></p>
          </div>
          <div class="col-md-4 me-auto">
            <p><strong>Kantor Pusan Bank Mega</strong></p>
            <!--<p>Menara Bank Mega<br> Jl. Kapten Tendean 12-14A <br> Jakarta Selatan, JK 12790</p>
                  <p>TEL. 021. 7917 5000&nbsp;(hunting)<br> FAX. 021. 7918 7100</p>-->
            <nav class="nav flex-column medium">
              <div class="d-flex align-items-center">
                <i class="fas fa-map-marker me-2"></i> Menara Bank Mega Jl. Kapten Tendean 12-14A <br> Jakarta Selatan,
                JK 12790
              </div>
              <div class="mt-2 d-flex align-items-center">
                <i class="fas fa-phone me-2"></i> (021) 7917 5000&nbsp;(hunting)
              </div>
              <div class="mt-2 d-flex align-items-center">
                <i class="fas fa-envelope me-2"></i>
                <a href="">021. 7918 7100</a>
              </div>
            </nav>
          </div>
          <div class="col-md-2">
            <p><strong>Site Map</strong></p>
            <nav class="nav flex-column">
              <a class="nav-item py-2" href="#">Features</a>
              <a class="nav-item py-2" href="#">API</a>
              <a class="nav-item py-2" href="#">Customers</a>
            </nav>
          </div>
          <div class="col-md-4">
            <img src="{{ asset('landingPage/img/sbdk.png') }}" alt="" class="logo" style="padding-top: 0.75rem;">
            <img src="{{ asset('landingPage/img/logo_inklusi_keuangan.png') }}" alt="" class="logo" style="padding-top: 0.75rem;">
            <img src="{{ asset('landingPage/img/logo_sahabat_konsumen_bank.png') }}" alt="" class="logo" style="padding-top: 0.75rem;">
            <img src="{{ asset('landingPage/img/logo_lps.png') }}" alt="" class="logo" style="padding-top: 0.75rem; min-height: 120px;">
          </div>
        </div>
        <hr class="mt-5">
        <div class="row small align-items-center">
          <div class="col-md-4">
            <p class="mt-2 mb-md-0 text-secondary text-center text-md-start">Copyrights © 2021 PT Bank Mega Tbk, All
              Rights Reserved</p>
          </div>
          <div class="col-md-8">
            <nav class="nav justify-content-center justify-content-md-end">
              <a href="#" class="btn btn-circle btn-sm btn-secondary me-3 op-4">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="#" class="btn btn-circle btn-sm btn-secondary me-3 op-4">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-circle btn-sm btn-secondary op-4">
                <i class="fab fa-instagram"></i>
              </a>
            </nav>
          </div>
        </div>
      </div>
    </footer>

  </main>
</body>
@endsection


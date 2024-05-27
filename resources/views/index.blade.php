@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <!-- main-banner-section -->
    <section class="main-banner bg-img">
        <div class="container p-5">
            <div class="banner-content text-center my-5">
                <h4 class="text-white text-uppercase">Find A Job</h4>
                <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ip'sum has been the industry's standard dummy text ever since the 1500s.</p>
                <a href="#" class="pink-btn read-more">read more</a>
            </div>
            {{-- <div class="row text-justify">
            <div class="col service-card">
              <span><i class="fa fa-briefcase"></i></span>
              <h5 class="text-dark text-capitalize my-3">Join With Us</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <div class="col service-card">
              <span><i class="fa fa-briefcase"></i></span>
              <h5 class="text-dark text-capitalize my-3">Join With Us</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div> --}}
        </div>
    </section>

    <!-- two-column-section -->
    <section>
        <div class="container">
            <h4 class="section-title">Experience</h4>
            <div class="row my-5">
                <div class="col-lg-6 col-md-12">
                    <div class="image-wrap">
                        <img src="../assets/img/laptop2.jpg" alt="cafe-inner" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 align-self-center">
                    <div class="two-col-content">
                        <h5 class="inner-title mt-3">Homely atmosphere</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ip'sum has been
                            the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the
                            printing and typesetting
                            industry. Lorem Ip'sum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <a href="#" class="text-capitalize pink-btn"> view more </a>
                    </div>
                </div>
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-6 col-md-12">
                    <div class="image-wrap">
                        <img src="../assets/img/service.jpg" alt="cafe-service" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 align-self-center">
                    <div class="two-col-content">
                        <h5 class="inner-title mt-3">Excellent service</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ip'sum has been
                            the industry's standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the
                            printing and typesetting
                            industry. Lorem Ip'sum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <a href="#" class="text-capitalize pink-btn"> view more </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- visit-us-section -->
    <section class="visit-us-wrap bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="each-reason">
                                <h6 class="title-sm txt-bg">our service</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ip'sum
                                    has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="each-reason">
                                <h6 class="title-sm txt-bg">our skill</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ip'sum
                                    has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p class="text-white mb-2">And that's not all...</p>
                    <h4 class="section-title text-capitalize text-white text-left">2 reasons to join us</h4>
                    <p class="text-white mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ip'sum has been the industry's standard.</p>
                    <a href="#" class="pink-btn text-capitalize">visit us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- meet-team-section -->
    {{-- <section>
        <div class="container">
          <h4 class="section-title">Meet our team</h4>
          <p class="text-secondary text-center">We make the world's best Product</p>
          <div class="row my-5">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="image-wrap mb-4">
                <img src="../assets/img/hero.jpg" alt="team1" />
              </div>
              <div class="each-detail">
                <h6 class="title-sm text-capitalize">amanda adams</h6>
                <span class="text-secondary">Lorem Ipsum</span>
                <p class="text-secondary mt-2">Lorem Ip'sum has been the industry's standard dummy text ever since the 1500s.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="image-wrap mb-4">
                <img src="../assets/img/laptop2.jpg" alt="team2" />
              </div>
              <div class="each-detail">
                <h6 class="title-sm text-capitalize">amanda adams</h6>
                <span class="text-secondary">Lorem Ipsum</span>
                <p class="text-secondary mt-2">Lorem Ip'sum has been the industry's standard dummy text ever since the 1500s.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="image-wrap mb-4">
                <img src="../assets/img/hero.jpg" alt="team3" />
              </div>
              <div class="each-detail">
                <h6 class="title-sm text-capitalize">amanda adams</h6>
                <span class="text-secondary">Lorem Ipsum</span>
                <p class="text-secondary mt-2">Lorem Ip'sum has been the industry's standard dummy text ever since the 1500s.</p>
              </div>
            </div>
          </div>
        </div>
      </section> --}}

    <!-- proud-section -->
    {{-- <section class="proud-section bg-img py-5 mb-0">
        <div class="container py-5">
          <h4 class="section-title text-white">We are poud of our skill</h4>
          <p class="text-center text-white">There is nothing to write here!</p>
        </div>
      </section> --}}

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 footer-column">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <p class="footer-title">Product</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Plans & Prices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Frequently asked questions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 footer-column">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <p class="footer-title">Company</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Job postings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">News and articles</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 footer-column">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <p class="footer-title">Contact & Support</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tel:+91 9876543210"><i class="fas fa-phone mr-2"></i>+91
                                9876543210</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-comments mr-2"></i>Live chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-envelope mr-2"></i>Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-star mr-2"></i>Give feedback</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-4 text-left">
                    <ul class="list-inline social-buttons mb-0">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-left">
                    <span class="copyright quick-links">Copyright &copy; Your Website
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </span>
                </div>
                <div class="col-md-4 text-left">
                    <ul class="list-inline quick-links mb-0">
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection

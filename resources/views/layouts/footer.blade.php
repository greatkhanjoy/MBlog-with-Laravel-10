
<div class="container-fluid">
    <div class="footer-wrap">
      <div class="row align-items-center">
        <div class="col-lg-4">
          <p class="copyright-text">© <span>M Blog</span></p>
        </div>
        <div class="col-lg-4 text-center">
          <ul class="social-profile list-style">
            <li>
              <a href="https://www.fb.com/" target="_blank">
                <i class="flaticon-facebook-1"></i>
              </a>
            </li>
            <li>
              <a href="https://www.twitter.com/" target="_blank">
                <i class="flaticon-twitter-1"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/" target="_blank">
                <i class="flaticon-instagram-2"></i>
              </a>
            </li>
            <li>
              <a href="https://www.linkedin.com/" target="_blank">
                <i class="flaticon-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4">
          <div class="footer-right">
            <button class="subscribe-btn" data-bs-toggle="modal" data-bs-target="#newsletter-popup">Become a subscriber <i class="flaticon-right-arrow"></i>
            </button>
            <p>Get all the latest posts delivered straight to your inbox.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
    <i class="ri-arrow-up-line"></i>
  </button>

    {{-- modals  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script data-cfasync="false" src="{{asset('assets/js/email-decode.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/swiper.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/aos.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    @stack('scripts')
</body>

</html>
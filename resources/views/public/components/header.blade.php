  <!-- Navbar. Remove 'fixed-top' class to make the navigation bar scrollable with the page -->
  <header class="navbar navbar-expand-lg fixed-top">
      <div class="container">



          <a class="navbar-brand pe-sm-3" href="{{ route('home') }}">
              <span class="text-primary flex-shrink-0 me-2">
                  <!-- Replace the SVG with your ICBT IT Society logo -->
                  <svg version="1.1" width="35" height="32" viewBox="0 0 36 33" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor"
                          d="M35.6,29c-1.1,3.4-5.4,4.4-7.9,1.9c-2.3-2.2-6.1-3.7-9.4-3.7c-3.1,0-7.5,1.8-10,4.1c-2.2,2-5.8,1.5-7.3-1.1c-1-1.8-1.2-4.1,0-6.2l0.6-1.1l0,0c0.6-0.7,4.4-5.2,12.5-5.7c0.5,1.8,2,3.1,3.9,3.1c2.2,0,4.1-1.9,4.1-4.2s-1.8-4.2-4.1-4.2c-2,0-3.6,1.4-4,3.3H7.7c-0.8,0-1.3-0.9-0.9-1.6l5.6-9.8c2.5-4.5,8.8-4.5,11.3,0L35.1,24C36,25.7,36.1,27.5,35.6,29z">
                      </path>
                  </svg>
              </span>
              <span class="text-nav">ICBT IT Society</span>
          </a>

          <a class="btn btn-primary btn-sm fs-sm order-lg-3 d-none d-sm-inline-flex" href="{{ route('login') }}"
              rel="noopener">
              <i class="ai-user fs-lg me-2"></i>
              Sign in
          </a>

          <!-- Mobile menu toggler (Hamburger) -->
          <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar collapse (Main navigation) -->
          <nav class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('society.members') }}">Members</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('society.events') }}">Events</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('society.blogs') }}">Blogs</a>
                  </li>
              </ul>
              <div class="d-sm-none p-3 mt-n3">
                  <a class="btn btn-primary w-100 mb-1" href="{{ route('login') }}" rel="noopener">
                      <i class="ai-user fs-lg me-2"></i>
                      Sign in
                  </a>
              </div>
          </nav>
      </div>
  </header>

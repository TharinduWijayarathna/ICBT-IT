<header class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <!-- Navbar brand (Logo) -->
        <a class="navbar-brand pe-sm-3" href="index.html">
            <span class="text-primary flex-shrink-0 me-2">
                <svg width="35" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21 6H9C8.20435 6 7.44129 6.31607 6.87868 6.87868C6.31607 7.44129 6 8.20435 6 9V31C6 31.7956 6.31607 32.5587 6.87868 33.1213C7.44129 33.6839 8.20435 34 9 34H39C39.7956 34 40.5587 33.6839 41.1213 33.1213C41.6839 32.5587 42 31.7956 42 31V21M24 34V42"
                        stroke="#FF0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M32 6L28 10L32 14M38 6L42 10L38 14M14 42H34" stroke="#FF0000" stroke-width="4"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </span>
            TechHive
        </a>

        <a class="btn btn-danger btn-sm fs-sm order-lg-3 d-none d-sm-inline-flex" href="{{ route('login') }}"
            rel="noopener">
            <i class="ai-login fs-xl me-2 ms-n1"></i>
            Signin
        </a>


        <!-- Mobile menu toggler (Hamburger) -->
        <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar collapse (Main navigation) -->
        <nav class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll" style="--ar-scroll-height: 520px;">
                <li class="nav-item">
                    <a class="nav-link" href="signup.html" aria-expanded="false">Memberships</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link " href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">Contact us</a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="docs/getting-started.html">About us</a>
                </li>
            </ul>
            <div class="d-sm-none p-3 mt-n3">




                <a class="btn btn-danger w-100 mb-1" href="{{ route('login') }}" rel="noopener">
                    <i class="ai-login fs-xl me-2 ms-n1"></i>
                    Signin
                </a>
            </div>
        </nav>
    </div>
</header>

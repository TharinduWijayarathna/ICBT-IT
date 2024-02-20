<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>


    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                
                    @php
                        $bandwidth = 0;
                        $isLoading = true;

                        if (isset($navigatorConnection) && $navigatorConnection) {
                            $bandwidth = $navigatorConnection['downlink'];
                            $connectionType = $navigatorConnection['effectiveType'];
                            $isLoading = false;
                        } else {
                            $connectionType = 'Unknown';
                            $bandwidth = 0;
                            $isLoading = false;
                        }
                    @endphp


                    <div id="networkStatus"></div>
       
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                        <img src="{{ asset('assets/admin/img/avatars/1.png') }}" alt class="h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar ">
                                        <img src="{{ asset('assets/admin/img/avatars/1.png') }}" alt
                                            class="h-auto rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">John Doe</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-profile-user.html">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>


    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
            aria-label="Search...">
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>



</nav>

<!-- Add this script at the end of your HTML body or in the head section -->
<script>
    // Check if the NavigatorConnection API is supported
    if ("connection" in navigator) {
        // Fetch the connection information
        var navigatorConnection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;

        // Update the UI with the bandwidth information
        function updateBandwidthUI() {
            var bandwidth = navigatorConnection.downlink;
            var connectionType = navigatorConnection.effectiveType;

            // Modify the UI according to bandwidth and connection type
            if (bandwidth == 0) {
                document.getElementById("networkStatus").innerHTML =
                    '<span style="padding-right: 10px;"><img src="{{ asset('assets/admin/img/connectivity/disconnected.png') }}" height="20" width="20" /></span>';
            } else if (bandwidth > 0 && bandwidth <= 0.25) {
                document.getElementById("networkStatus").innerHTML =
                    '<span style="padding-right: 10px;"><img src="{{ asset('assets/admin/img/connectivity/connectivity_none.png') }}" height="20" width="20" /></span>';
            } else if (bandwidth > 0.25 && bandwidth <= 2) {
                document.getElementById("networkStatus").innerHTML =
                    '<span style="padding-right: 10px;"><img src="{{ asset('assets/admin/img/connectivity/connectivity_slow.png') }}" height="20" width="20" /></span>';
            } else {
                document.getElementById("networkStatus").innerHTML =
                    '<span style="padding-right: 10px;"><img src="{{ asset('assets/admin/img/connectivity/connectivity_connected.png') }}" height="20" width="20" /></span>';
            }

            // You can also use connectionType if needed
            console.log("Connection Type:", connectionType);
        }

        // Call the function initially
        updateBandwidthUI();

        // Add an event listener for changes in the connection
        navigatorConnection.addEventListener("change", updateBandwidthUI);
    }
</script>

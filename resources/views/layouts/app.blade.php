<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikmat - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            padding: 0.5rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }
        .navbar-brand {
            margin-left:1rem;
            display: flex;
            align-items: center;
            margin-right: 0;
        }
        .navbar-brand img {
          
        height: 70px; 
         width: auto; 

        }
        .navbar-nav .nav-link {
    color: #000;
    font-weight: 500; /* Bold effect using numeric weight */
    margin: 0 2rem;
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

        .navbar-nav .nav-link:hover {
            color: #FFA500;
        }
        .navbar-nav .nav-link.active {
            color: #FFA500;
        }
        .user-icon {
            font-size: 1.5rem;
        }
        .user-icon a {
            color: #000;
            transition: color 0.3s ease;
        }
        .user-icon a:hover {
            color: #FFA500;
        }

        /* Center navbar contents for larger screens */
        .navbar-collapse {
            justify-content: center;
        }

        /* Mobile view adjustments */
        @media (max-width: 991px) {
            .navbar {
                display: flex;
                justify-content: space-between;
            }
            .navbar-collapse {
                flex-direction: column;
                align-items: flex-start;
            }
            .navbar-nav .nav-link {
                margin-left: 0; /* Reset margin for mobile */
                padding-left: 1.5rem; /* Add consistent padding */
            }
            .user-icon {
                padding-left: 1.5rem; /* Match the nav links padding */
                margin-left: 0 !important; /* Override Bootstrap's ms-auto */
                align-self: flex-start; /* Align to the start of the flex container */
                width: 100%; /* Take full width to maintain alignment */
                padding-top: 0.5rem; /* Add some spacing from nav links */
                padding-bottom: 0.5rem;
            }
        }
    </style>
    @yield('additional_css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo on the left in mobile view -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/images/hikmat-logo.png') }}" alt="Hikmat Logo">
            </a>
            
            <!-- Toggler for mobile view on the right -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact Us</a>
                    </li>
                </ul>
                
                <!-- User Icon -->
                <div class="user-icon ms-auto">
                    <a href="#" class="text-dark"><i class="bi bi-person-circle"></i></a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Hikmat. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('additional_js')
</body>
</html>
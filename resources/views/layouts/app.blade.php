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
            font-weight: 500; 
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

        .navbar-collapse {
            justify-content: center;
        }

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
                margin-left: 0;
                padding-left: 1.5rem;
            }
            .user-icon {
                padding-left: 1.5rem;
                margin-left: 0 !important;
                align-self: flex-start;
                width: 100%;
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }
        }
        .user-dropdown {
            position: relative;
        }

        .user-dropdown-toggle {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-dropdown-toggle:focus {
            outline: none;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #333;
        }

        .user-dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            min-width: 200px;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .user-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #333;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .user-dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .user-dropdown-item i {
            font-size: 1.2rem;
            color: #6c757d;
        }

        @media (max-width: 991px) {
            .user-dropdown {
                width: 100%;
                padding-left: 1.5rem;
                margin-top: 1rem;
            }

            .user-dropdown-menu {
                position: static;
                box-shadow: none;
                border: 1px solid #e9ecef;
                margin-top: 0.5rem;
            }
        }
    </style>
    @yield('additional_css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/images/hikmat-logo.png') }}" alt="Hikmat Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

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

                <div class="user-dropdown ms-auto">
                    <button class="user-dropdown-toggle" id="userDropdown" aria-expanded="false">
                        <div class="user-avatar">
                            <i class="bi bi-person"></i>
                        </div>
                        <span class="d-none d-lg-inline">John Doe</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="user-dropdown-menu" aria-labelledby="userDropdown">
                        <a class="user-dropdown-item" href="/userprofile">
                            <i class="bi bi-person-circle"></i>
                            Profile
                        </a>
                        <!-- <a class="user-dropdown-item" href="#">
                            <i class="bi bi-gear"></i>
                            Settings
                        </a> -->
                        <a class="user-dropdown-item" href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-light py-4 mt-5">
    <div class="container text-center">
        <p>&copy; {{ date('Y') }} Hikmat. All rights reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="/privacy-policy" class="text-decoration-none">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
                <a href="/terms-and-conditions" class="text-decoration-none">Terms and Conditions</a>
            </li>
            <li class="list-inline-item">
                <a href="/refund-policy" class="text-decoration-none">Refund Policy</a>
            </li>
        </ul>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userDropdownToggle = document.querySelector('.user-dropdown-toggle');
            const userDropdownMenu = document.querySelector('.user-dropdown-menu');

            userDropdownToggle.addEventListener('click', function() {
                userDropdownMenu.classList.toggle('show');
            });

            document.addEventListener('click', function(event) {
                if (!userDropdownToggle.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                    userDropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
    @yield('additional_js')
</body>
</html>

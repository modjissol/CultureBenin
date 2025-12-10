                        <ul class="header-nav" style="display:flex; flex-direction:row; gap:32px; justify-content:center; align-items:center; list-style:none; margin:0; padding:0;">
                            <li class="nav-item"><a href="#" class="nav-link">Objets & Artisanat</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Sites & Paysages</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Langues nationales</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Personnalités du Bénin</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Participer & Proposer</a></li>
                        </ul>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Culture Bénin')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    @yield('styles')
    @stack('styles')
    </head>
    <style>
        .header {
            width: 100%;
            background: #0a2840;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            height: 90px;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .header-left {
            display: flex;
            align-items: center;
            flex: 1 1 0;
            min-width: 0;
        }
        .header-logo {
            height: 60px;
            margin-right: 18px;
        }
        .header-title {
            font-size: 1.2rem;
            font-weight: bold;
            line-height: 1.2;
            margin-right: 40px;
            white-space: nowrap;
        }
        .header-nav {
            display: flex;
            gap: 32px;
            flex: 1 1 0;
            justify-content: center;
            align-items: center;
            min-width: 0;
        }
        .header-nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.15rem;
            transition: color 0.2s;
            padding: 4px 0;
            position: relative;
        }
        .header-nav a:hover {
            color: #ffd600;
        }
        .header-actions {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-left: 40px;
        }
        .header-btn {
            background: #ffd600;
            color: #0a2840;
            border: none;
            border-radius: 30px;
            padding: 10px 28px;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            margin-right: 10px;
        }
        .header-search {
            background: transparent;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        .header-lang {
            background: #0a2840;
            color: #fff;
            border: 2px solid #fff;
            border-radius: 8px;
            padding: 6px 18px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
        }
        body {
            padding-top: 0;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <div style="display: flex; align-items: center; font-family: 'Playfair Display', serif; font-size:1.2rem; font-weight:700; line-height:1.1; color:#fff; margin-right:32px; text-align:left; gap: 10px; position: relative;">
                <span style="position: relative; display: inline-block; height: 60px; width: 60px; margin-right: 10px;">
                    <img src='{{ asset('adminlte/img/enf.jpg') }}' alt='Arrière-plan' style='position: absolute; top: 0; left: 0; height: 60px; width: 60px; object-fit: cover; border-radius: 8px; z-index: 1;'>
                    <img src="{{ asset('adminlte/img/tele.webp') }}" alt="Logo Africa" style="position: absolute; top: 0; left: 0; height: 60px; width: 60px; object-fit: contain; border-radius: 8px; z-index: 2; opacity: 0.85; background: transparent;">
                </span>
                <span style="margin-left: 10px;">Culture Benin</span>
            </div>
            <div class="header-title">
            </div>
        </div>
        <nav class="header-nav">
        </nav>
        <div class="header-actions">
            <div class="dropdown" style="display:inline-block; vertical-align:middle;">
                <button class="header-btn dropdown-toggle" type="button" id="userMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background:#ffd600; color:#0a2840; font-weight:700; border-radius:32px; padding:8px 20px; font-size:1rem; border:none; margin-right:10px; min-width:120px; height:40px; display:flex; align-items:center; justify-content:center;">
                    Mon espace <span style="font-size:0.95rem; vertical-align:middle; margin-left:6px;">&#9660;</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="userMenuButton">
                    <li><a class="dropdown-item" href="/login">Connexion</a></li>
                    <li><a class="dropdown-item" href="/profile">Mon profil</a></li>
                    <li><a class="dropdown-item" href="/contact">Contact</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <a href="/search" class="header-search" style="display:inline-block; vertical-align:middle; margin-right:10px; text-decoration:none;">
                <button type="button" style="background:#fff; border:2px solid #fff; border-radius:50px; width:38px; height:38px; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 8px rgba(0,0,0,0.10); cursor:pointer; padding:0;">
                    <svg width="20" height="20" fill="#0a2840" viewBox="0 0 20 20"><circle cx="9" cy="9" r="7" stroke="#0a2840" stroke-width="2" fill="none"/><line x1="15" y1="15" x2="19" y2="19" stroke="#0a2840" stroke-width="2"/></svg>
                </button>
            </a>
            <button class="header-lang" style="background:none; color:#fff; border:2px solid #fff; border-radius:10px; padding:4px 18px; font-weight:700; font-size:1rem; height:38px; min-width:56px;">CB</button>
        </div>
    </header>
        <!-- Navigation principale -->
        <nav class="main-navbar">
            <div class="container">
                <div class="navbar-container">
                    <a href="{{ url('/') }}" class="navbar-logo">
                        <span class="logo-text"></span>
                    </a>
                    
                    <ul class="nav-links">
                    </ul>
                    
                    <button class="mobile-menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main class="main-content">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>À propos</h4>
                    <ul>
                        <li><a href="#">Qui sommes-nous ?</a></li>
                        <li><a href="#">Mentions légales</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Réseaux sociaux</h4>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Newsletter</h4>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Votre adresse email" required>
                        <button type="submit">S'abonner</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Culture Benin. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Menu mobile
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const navLinks = document.querySelector('.nav-links');
            
            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', function() {
                    this.classList.toggle('active');
                    navLinks.classList.toggle('active');
                });
            }
            
            // Gestion du menu déroulant utilisateur
            const userDropdownToggle = document.querySelector('.user-dropdown-toggle');
            const userDropdown = document.querySelector('.user-dropdown .dropdown-menu');
            
            if (userDropdownToggle) {
                userDropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    userDropdown.classList.toggle('show');
                });
                
                // Fermer le menu déroulant quand on clique ailleurs
                document.addEventListener('click', function(e) {
                    if (!userDropdownToggle.contains(e.target) && !userDropdown.contains(e.target)) {
                        userDropdown.classList.remove('show');
                    }
                });
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
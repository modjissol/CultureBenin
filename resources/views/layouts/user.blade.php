<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Culture Bénin')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header style="position:relative; background:#fff url('{{ asset('adminlte/img/bg-header.jpg') }}') center/cover no-repeat; box-shadow:0 2px 8px rgba(0,0,0,0.07); padding:18px 0 18px 0; margin-bottom:32px;">
        <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.35); z-index:1;"></div>
        <div style="position:relative; z-index:2; max-width:1200px; margin:0 auto; display:flex; align-items:center; justify-content:space-between;">
            <div style="display:flex; align-items:center; gap:16px;">
                <img src='{{ asset('adminlte/img/tele.webp') }}' alt='Logo Culture Benin' style='width:54px; height:54px; border-radius:12px; box-shadow:0 2px 8px rgba(230,57,70,0.12);'>
                <span style="font-size:2.1em; font-weight:900; color:#fff; letter-spacing:2px; text-shadow:0 2px 8px rgba(162,89,255,0.10);">CULTURE BENIN</span>
            </div>
            <div style="display:flex; align-items:center; gap:32px;">
                <form style="display:flex; align-items:center; background:rgba(255,255,255,0.15); border-radius:8px; padding:4px 12px;">
                    <i class="fas fa-search" style="color:#fff; font-size:1.2em;"></i>
                    <input type="text" placeholder="Rechercher..." style="border:none; background:transparent; outline:none; padding:6px 8px; font-size:1em; color:#fff; min-width:180px;">
                </form>
                <div style="display:flex; gap:18px;">
                    <a href="/login" style="color:#fff; font-weight:600; text-decoration:none; font-size:1.1em; text-shadow:0 2px 8px #222;">Connexion</a>
                    <a href="/register" style="color:#fff; font-weight:600; text-decoration:none; font-size:1.1em; text-shadow:0 2px 8px #222;">Inscription</a>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer style="background:#222; color:#fff; text-align:center; padding:20px 0; margin-top:40px; font-size:15px;">
        <div>
            &copy; {{ date('Y') }} Culture Bénin. Tous droits réservés.
        </div>
        <div style="margin-top:8px;">
            <a href="/" style="color:#e63946; text-decoration:none; margin:0 10px;">Accueil</a>
            <a href="/contact" style="color:#e63946; text-decoration:none; margin:0 10px;">Contact</a>
            <a href="/about" style="color:#e63946; text-decoration:none; margin:0 10px;">À propos</a>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>

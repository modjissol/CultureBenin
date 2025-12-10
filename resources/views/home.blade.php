        <style>
            .categories-grid {
                display: flex;
                justify-content: center;
                gap: 48px;
                margin: 32px 0;
            }

            .category-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                font-size: 1.3rem;
                font-weight: 700;
                color: #222;
                background: none;
                border: none;
                padding: 0;
                position: relative;
                transition: color 0.2s, text-shadow 0.2s;
            }

            .category-card span {
                color: #222;
                transition: color 0.2s, text-shadow 0.2s;
            }

            .category-card.active span,
            .category-card:active span,
            .category-card:focus span,
            .category-card:hover span {
                color: #222;
                text-shadow: 1px 1px 6px rgba(44, 62, 80, 0.18);
            }

            .category-card.active:after,
            .category-card:active:after,
            .category-card:focus:after,
            .category-card:hover:after {
                content: '';
                display: block;
                width: 100%;
                height: 4px;
                background: #e6b800;
                margin-top: 8px;
                border-radius: 2px;
            }
        </style>
        @extends('layouts.app')

        @section('title', 'Accueil - Culture Benin')

        @section('content')
            @if (session('success'))
                <div class="alert alert-success"
                    style="max-width:600px; margin:32px auto; text-align:center; font-size:1.2rem;">
                    {{ session('success') }}
                </div>
            @endif
            @if (Auth::check() && Auth::user()->role == 'admin')
                <div style="width:100%; display:flex; justify-content:flex-end; margin-top:100px; margin-bottom:24px;">
                    <a href="{{ route('dashboard') }}"
                        style="background:#ffd600; color:#0a2840; font-weight:700; border-radius:32px; padding:8px 20px; font-size:1rem; border:none; box-shadow:0 2px 8px rgba(44,62,80,0.08); text-decoration:none; display:inline-block;">
                        <i class="fas fa-tools" style="margin-right:8px;"></i> Retourner à l'administration
                    </a>
                </div>
            @endif
            <!-- Bandeau d'accueil valorisant la culture béninoise -->
            <section class="ad-banner"
                style="width:100vw; position:relative; left:50%; right:50%; margin-left:-50vw; margin-right:-50vw; display:flex; flex-direction:column; justify-content:center; align-items:center; margin-bottom:30px; background: url('/adminlte/img/enf.jpg') no-repeat center center; background-size: cover; padding:64px 0; min-height:520px;">
                <div style="width:80%; max-width:1200px; background:none;">
                    <div class="categories-grid" style="justify-content:center; margin-bottom:32px;">
                        <a href="#" class="category-card"><span>Histoires & Contes</span></a>
                        <a href="#" class="category-card"><span>Recettes & Plats du Bénin</span></a>
                        <a href="#" class="category-card"><span>Régions & Langues</span></a>
                        <a href="#" class="category-card"><span>Fêtes & Pratiques culturelles</span></a>
                    </div>
                    <div
                        style="color:#fff; padding:48px 24px; margin-top:-5px; border-radius:0 0 8px 8px; font-size:1.3rem; text-align:center; background:rgba(44,62,80,0.7); max-width:1200px; margin-left:auto; margin-right:auto;">
                        <strong>Bienvenue sur Culture Bénin</strong> — Traditions, langues, régions et savoirs vivants<br>
                        <span style="font-size:1rem;">Découvrez la richesse des cultures béninoises : histoires, recettes,
                            fêtes, objets, paysages et langues nationales. Partagez et explorez les pratiques authentiques
                            du Bénin !</span>
                        <br><a href="{{ route('contribuer') }}"
                            style="display:inline-block; margin-top:12px; padding:8px 24px; background:#6c8cd5; color:#fff; border-radius:4px; text-decoration:none; font-weight:500;">Contribuer</a>
                    </div>
                </div>
            </section>

            <!-- Section stylisée Culture Bénin / Valorisation -->
            <section class="intro-culture"
                style="display:flex; align-items:center; justify-content:center; width:100%; min-height:350px; margin-bottom:40px;">
                <div style="display:flex; width:80%; max-width:1200px;">
                    <div
                        style="display:flex; flex-direction:column; justify-content:center; align-items:center; width:30%;">
                        <div
                            style="font-family:'Playfair Display',serif; font-size:4rem; font-weight:700; color:#000; writing-mode:vertical-rl; text-orientation:mixed; letter-spacing:-2px; line-height:0.9; margin-right:20px;">
                            Bénin<br>Culture
                        </div>
                        <div style="width:80px; height:80px; background:#e6b800; margin-top:20px;"></div>
                    </div>
                    <div style="width:70%; padding-left:40px; display:flex; flex-direction:column; justify-content:center;">
                        <h1 style="font-size:2.8rem; font-weight:700; margin-bottom:18px; color:#111;">Explorez les
                            traditions, langues et régions du Bénin</h1>
                        <p style="font-size:1.2rem; color:#222; max-width:500px; margin-bottom:0;">Culture Bénin est le
                            portail dédié à la valorisation des patrimoines, langues nationales, recettes, fêtes et savoirs
                            vivants du Bénin. Proposez vos histoires, découvrez les pratiques locales et partagez la
                            diversité culturelle béninoise !</p>
                    </div>
                </div>
            </section>

            <!-- Illustrations authentiques du Bénin -->
            <section class="benin-illustrations"
                style="width:100%; display:flex; flex-wrap:wrap; justify-content:center; gap:32px; margin-bottom:48px;">
                <!-- Plats du Bénin -->
                <div
                    style="flex:1 1 320px; max-width:340px; background:#fffbe6; border-radius:12px; box-shadow:0 2px 8px rgba(44,62,80,0.08); overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=600&q=80"
                        alt="Plats du Bénin" style="width:100%; height:220px; object-fit:cover;">
                    <div style="padding:18px 16px;">
                        <h3 style="font-size:1.3rem; color:#b8860b; font-weight:700; margin-bottom:8px;">Plats & Recettes du
                            Bénin</h3>
                        <p style="font-size:1rem; color:#222;">Découvrez les saveurs du Bénin : gari, akassa, wassa wassa,
                            sauce tomate, igname pilé, et bien d’autres spécialités locales.</p>
                    </div>
                </div>
                <!-- Objets & Artisanat -->
                <div
                    style="flex:1 1 320px; max-width:340px; background:#e6f7ff; border-radius:12px; box-shadow:0 2px 8px rgba(44,62,80,0.08); overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=600&q=80"
                        alt="Artisanat du Bénin" style="width:100%; height:220px; object-fit:cover;">
                    <div style="padding:18px 16px;">
                        <h3 style="font-size:1.3rem; color:#0077b6; font-weight:700; margin-bottom:8px;">Objets & Artisanat
                        </h3>
                        <p style="font-size:1rem; color:#222;">Admirez le savoir-faire artisanal : poteries, tissus,
                            sculptures, bijoux et objets traditionnels du Bénin.</p>
                    </div>
                </div>
                <!-- Fêtes & Pratiques culturelles -->
                <div
                    style="flex:1 1 320px; max-width:340px; background:#f0f5ff; border-radius:12px; box-shadow:0 2px 8px rgba(44,62,80,0.08); overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=600&q=80"
                        alt="Fêtes du Bénin" style="width:100%; height:220px; object-fit:cover;">
                    <div style="padding:18px 16px;">
                        <h3 style="font-size:1.3rem; color:#6c8cd5; font-weight:700; margin-bottom:8px;">Fêtes & Pratiques
                            culturelles</h3>
                        <p style="font-size:1rem; color:#222;">Participez aux fêtes traditionnelles : Gèlèdé, Vaudou,
                            cérémonies royales, et autres pratiques culturelles béninoises.</p>
                    </div>
                </div>
                <!-- Artisanat du Bénin -->
                <div
                    style="flex:1 1 320px; max-width:340px; background:#fff0f6; border-radius:12px; box-shadow:0 2px 8px rgba(44,62,80,0.08); overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80"
                        alt="Artisanat Bénin" style="width:100%; height:220px; object-fit:cover;">
                    <div style="padding:18px 16px;">
                        <h3 style="font-size:1.3rem; color:#d72660; font-weight:700; margin-bottom:8px;">Artisanat &
                            Créations</h3>
                        <p style="font-size:1rem; color:#222;">Explorez les créations artisanales : masques, tissus, objets
                            décoratifs et œuvres d’art du Bénin.</p>
                    </div>
                </div>
            </section>


            <!-- Section Articles à la une -->
            <section id="articles" class="container">
                <div class="section-header">
                    <h2>À la une</h2>
                    <a href="#" class="see-all">Voir tous les articles <i class="fas fa-plus"></i></a>
                </div>

                <div class="articles-grid">
                    @foreach ($featuredArticles as $article)
                        <article class="article-card">
                            <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="article-image">
                            <div class="article-content">
                                <h3 class="article-title">{{ $article['title'] }}</h3>
                                <p class="article-excerpt">{{ $article['excerpt'] }}</p>
                                <div class="article-meta">
                                    @foreach ($article['categories'] as $category)
                                        <span class="article-category">{{ $category }}</span>
                                        @if (!$loop->last)
                                            •
                                        @endif
                                    @endforeach
                                    <span class="article-date">{{ $article['date'] }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <!-- Section Contenus validés -->
            <section id="contenus-valides" class="container">
                <div class="section-header">
                    <h2>Contenus validés</h2>
                </div>
                <div class="articles-grid">
                    @forelse($contenusValidés as $contenu)
                        <article class="article-card">
                            @php
                                $media = $contenu->medias->first();
                            @endphp
                            @if ($media && str_starts_with($media->chemin, 'uploads/medias'))
                                @php
                                    $ext = strtolower(pathinfo($media->chemin, PATHINFO_EXTENSION));
                                    $publicPath = public_path('storage/' . $media->chemin);
                                    $mediaUrl = file_exists($publicPath)
                                        ? asset('storage/' . $media->chemin)
                                        : route('media.file', $media->id_media ?? $media->id);
                                @endphp
                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <img src="{{ $mediaUrl }}" alt="{{ $contenu->titre }}" class="article-image">
                                @elseif(in_array($ext, ['mp4', 'webm', 'ogg']))
                                    <video controls class="article-image" style="width:100%;height:320px;object-fit:cover;">
                                        <source src="{{ $mediaUrl }}" type="video/{{ $ext }}">
                                        Votre navigateur ne supporte pas la vidéo.
                                    </video>
                                @endif
                            @endif
                            <div class="article-content">
                                <h3 class="article-title">{{ $contenu->titre }}</h3>
                                @php
                                    $maxLength = 180;
                                    $texte = $contenu->texte;
                                    $short = mb_substr($texte, 0, $maxLength);
                                    $reste = mb_substr($texte, $maxLength);
                                @endphp
                                <p class="article-excerpt">
                                    {{ $short }}@if (mb_strlen($reste) > 0)
                                        <span class="dots">...</span><span class="more"
                                            style="display:none;">{{ $reste }}</span>
                                        <button class="voir-plus-btn"
                                            style="background:none;border:none;color:#0077b6;cursor:pointer;padding:0;font-weight:bold;">Voir
                                            plus</button>
                                    @endif
                                </p>
                                <div class="article-meta">
                                    <span class="article-date">{{ $contenu->date_creation }}</span>
                                    @if ($contenu->region)
                                        <span class="article-category">{{ $contenu->region->nom_region }}</span>
                                    @endif
                                    @if ($contenu->langue)
                                        <span class="article-category">{{ $contenu->langue->nom_langue }}</span>
                                    @endif
                                    <span class="article-translate" style="margin-left:8px;"> 
                                        <a href="{{ route('contenus.traduction', $contenu) }}" class="text-muted" style="font-weight:600;">Traduction</a>
                                    </span>
                                </div>
                            </div>
                        </article>
                        @empty
                            <p>Aucun contenu validé pour le moment.</p>
                        @endforelse
                    </div>
                </section>

                <!-- Section Brèves -->
                <section class="breves-section">
                    <div class="container">
                        <div class="breves-container">
                            <h2 class="breves-title">Brèves</h2>
                            <div class="breves-list">
                                @foreach ($breves as $breve)
                                    <div class="breve-item">
                                        <div class="breve-date">{{ $breve['date'] }}</div>
                                        <h3 class="breve-title">{{ $breve['title'] }}</h3>
                                        <p class="breve-excerpt">{{ $breve['excerpt'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section Newsletter -->
                <section class="container newsletter-section">
                    <div class="newsletter-card">
                        <div class="newsletter-content">
                            <h2>Restez informé</h2>
                            <p>Abonnez-vous à notre newsletter pour recevoir les dernières actualités culturelles directement
                                dans votre boîte mail.</p>
                            <form class="newsletter-form">
                                <input type="email" placeholder="Votre adresse email" required>
                                <button type="submit" class="btn">S'abonner</button>
                            </form>
                        </div>
                        <div class="newsletter-image">
                            <img src="https://via.placeholder.com/400x300" alt="Newsletter">
                        </div>
                    </div>
                </section>

                <!-- Section Catégories -->
                <section class="container categories-section">
                    <h2>Explorez par catégorie</h2>
                    <div class="categories-grid" style="justify-content:center;">
                        <a href="#" class="category-card">
                            <i class="fas fa-drum"></i>
                            <span>Histoires & Contes</span>
                        </a>
                        <a href="#" class="category-card">
                            <i class="fas fa-utensils"></i>
                            <span>Recettes & Plats du Bénin</span>
                        </a>
                        <a href="#" class="category-card">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Régions & Langues</span>
                        </a>
                        <a href="#" class="category-card">
                            <i class="fas fa-music"></i>
                            <span>Fêtes & Pratiques culturelles</span>
                        </a>
                    </div>
                    <style>
                        .categories-grid {
                            display: flex;
                            justify-content: center;
                            gap: 48px;
                            margin: 32px 0;
                        }

                        .category-card {
                            display: flex;
                            flex-direction: column;
                            align-items: flex-start;
                            font-size: 1.3rem;
                            font-weight: 700;
                            color: var(--primary-color);
                            background: none;
                            border: none;
                            padding: 0;
                            position: relative;
                            transition: color 0.2s;
                        }

                        .category-card span {
                            color: var(--primary-color);
                            transition: color 0.2s;
                        }

                        .category-card.active span,
                        .category-card:active span,
                        .category-card:focus span,
                        .category-card:hover span {
                            color: var(--secondary-color);
                        }

                        .category-card.active:after,
                        .category-card:active:after,
                        .category-card:focus:after,
                        .category-card:hover:after {
                            content: '';
                            display: block;
                            width: 100%;
                            height: 4px;
                            background: var(--secondary-color);
                            margin-top: 8px;
                            border-radius: 2px;
                        }
                    </style>
                </section>

                <!-- Charger le script FedaPay une seule fois et le JS d'initialisation global -->
                <!-- Le script FedaPay est déplacé à la fin du body pour garantir son chargement -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.body.addEventListener('click', function(e) {
                            if (e.target && e.target.classList.contains('voir-plus-btn')) {
                                e.preventDefault();
                                var btn = e.target;
                                if (confirm('La suite du contenu est payante. Voulez-vous procéder au paiement ?')) {
                                    if (typeof FedaPay !== 'undefined' && FedaPay.checkout) {
                                        FedaPay.checkout({
                                            public_key: 'pk_sandbox_tmkQmXu61NfI_EsnW2Q4NF2t',
                                            amount: 500,
                                            currency: 'XOF',
                                            description: 'Accès à la suite du contenu',
                                            onComplete: function(response) {
                                                var p = btn.closest('p');
                                                if (p) {
                                                    var dots = p.querySelector('.dots');
                                                    var more = p.querySelector('.more');
                                                    if (dots) dots.style.display = 'none';
                                                    if (more) more.style.display = 'inline';
                                                }
                                                btn.style.display = 'none';
                                            },
                                            onDismiss: function() {}
                                        });
                                    } else {
                                        alert('Le module de paiement FedaPay n\'est pas chargé.');
                                    }
                                } else {
                                    alert('Paiement non disponible.');
                                }
                            }
                        });
                    });
                </script>
                @push('styles')
                    <style>
                        /* Styles spécifiques à la page d'accueil */
                        .section-header {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            margin-bottom: 30px;
                        }

                        .section-header h2 {
                            font-size: 2rem;
                            color: var(--primary-color);
                            position: relative;
                            display: inline-block;
                        }

                        .section-header h2:after {
                            content: '';
                            position: absolute;
                            bottom: -10px;
                            left: 0;
                            width: 60px;
                            height: 3px;
                            background-color: var(--accent-color);
                        }

                        .see-all {
                            color: var(--accent-color);
                            font-weight: 500;
                            display: flex;
                            align-items: center;
                            gap: 5px;
                            transition: var(--transition);
                        }

                        .see-all i {
                            font-size: 0.8em;
                            transition: var(--transition);
                        }

                        .see-all:hover {
                            color: var(--primary-color);
                        }

                        .see-all:hover i {
                            transform: translateX(3px);
                        }

                        /* Section Héro */
                        .hero-section {
                            position: relative;
                            background-color: var(--primary-color);
                            color: white;
                            padding: 100px 0;
                            margin-bottom: 60px;
                            overflow: hidden;
                        }

                        .hero-section .container {
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                        }

                        .hero-content {
                            max-width: 55%;
                            position: relative;
                            z-index: 2;
                        }

                        .hero-title {
                            font-size: 3rem;
                            margin-bottom: 20px;
                            line-height: 1.2;
                            color: white;
                        }

                        .hero-subtitle {
                            font-size: 1.25rem;
                            margin-bottom: 30px;
                            opacity: 0.9;
                            max-width: 80%;
                        }

                        .hero-image {
                            position: absolute;
                            right: 0;
                            top: 50%;
                            transform: translateY(-50%);
                            max-width: 45%;
                            border-radius: 8px;
                            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
                        }

                        /* Section Articles */
                        .articles-grid {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                            gap: 30px;
                            margin-bottom: 60px;
                        }

                        .article-card {
                            background: white;
                            border-radius: 10px;
                            overflow: hidden;
                            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                            transition: var(--transition);
                        }

                        .article-card:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                        }

                        .article-image {
                            width: 100%;
                            height: 200px;
                            object-fit: cover;
                        }

                        .article-content {
                            padding: 20px;
                        }

                        .article-title {
                            font-size: 1.4rem;
                            margin-bottom: 10px;
                            color: var(--text-color);
                        }

                        .article-excerpt {
                            color: var(--light-text);
                            margin-bottom: 15px;
                            line-height: 1.6;
                        }

                        .article-meta {
                            display: flex;
                            align-items: center;
                            flex-wrap: wrap;
                            gap: 10px;
                            font-size: 0.9rem;
                            color: var(--light-text);
                        }

                        .article-category {
                            color: var(--accent-color);
                            font-weight: 500;
                        }

                        .article-date {
                            margin-left: auto;
                        }

                        /* Section Brèves */
                        .breves-section {
                            background-color: var(--light-bg);
                            padding: 60px 0;
                            margin: 60px 0;
                        }

                        .breves-container {
                            max-width: 800px;
                            margin: 0 auto;
                        }

                        .breves-title {
                            text-align: center;
                            margin-bottom: 30px;
                            position: relative;
                            padding-bottom: 15px;
                        }

                        .breves-title:after {
                            content: '';
                            position: absolute;
                            bottom: 0;
                            left: 50%;
                            transform: translateX(-50%);
                            width: 60px;
                            height: 3px;
                            background-color: var(--accent-color);
                        }

                        .breves-list {
                            display: flex;
                            flex-direction: column;
                            gap: 20px;
                        }

                        .breve-item {
                            background: white;
                            border-radius: 8px;
                            padding: 20px;
                            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
                            transition: var(--transition);
                        }

                        .breve-item:hover {
                            transform: translateX(5px);
                            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
                        }

                        .breve-date {
                            font-size: 0.85rem;
                            color: var(--accent-color);
                            margin-bottom: 5px;
                            font-weight: 500;
                        }

                        .breve-title {
                            font-size: 1.1rem;
                            margin-bottom: 8px;
                            color: var(--text-color);
                        }

                        .breve-excerpt {
                            color: var(--light-text);
                            font-size: 0.95rem;
                            line-height: 1.5;
                        }

                        /* Section Newsletter */
                        .newsletter-section {
                            margin: 80px auto;
                        }

                        .newsletter-card {
                            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                            border-radius: 12px;
                            padding: 40px;
                            color: white;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            box-shadow: 0 10px 30px rgba(26, 54, 93, 0.15);
                        }

                        .newsletter-content {
                            max-width: 60%;
                        }

                        .newsletter-content h2 {
                            font-size: 2rem;
                            margin-bottom: 15px;
                            color: white;
                        }

                        .newsletter-content p {
                            margin-bottom: 25px;
                            opacity: 0.9;
                            font-size: 1.1rem;
                        }

                        .newsletter-form {
                            display: flex;
                            max-width: 500px;
                        }

                        .newsletter-form input {
                            flex: 1;
                            padding: 12px 20px;
                            border: none;
                            border-radius: 6px 0 0 6px;
                            font-size: 1rem;
                            outline: none;
                        }

                        .newsletter-form button {
                            padding: 0 25px;
                            border: none;
                            background-color: var(--accent-color);
                            color: white;
                            font-weight: 600;
                            border-radius: 0 6px 6px 0;
                            cursor: pointer;
                            transition: var(--transition);
                        }

                        .newsletter-form button:hover {
                            background-color: #1a4b8c;
                        }

                        .newsletter-image {
                            max-width: 35%;
                        }

                        .newsletter-image img {
                            border-radius: 8px;
                            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                        }

                        < !-- Section Catégories -->< !-- Les menus catégories sont désormais affichés sur le bandeau principal -->.categories-grid {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                            gap: 25px;
                        }

                        .category-card {
                            background: white;
                            border-radius: 10px;
                            padding: 30px 20px;
                            text-align: center;
                            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                            transition: var(--transition);
                            color: var(--text-color);
                            text-decoration: none;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }

                        .category-card:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                        }

                        .category-card i {
                            font-size: 2.5rem;
                            color: var(--accent-color);
                            margin-bottom: 15px;
                        }

                        .category-card span {
                            font-weight: 600;
                            font-size: 1.1rem;
                        }

                        /* Styles responsifs */
                        @media (max-width: 1024px) {
                            .hero-title {
                                font-size: 2.5rem;
                            }

                            .hero-subtitle {
                                font-size: 1.1rem;
                            }

                            .newsletter-card {
                                flex-direction: column;
                                text-align: center;
                                padding: 30px;
                            }

                            .newsletter-content {
                                max-width: 100%;
                                margin-bottom: 30px;
                            }

                            .newsletter-form {
                                max-width: 100%;
                            }

                            .newsletter-image {
                                max-width: 70%;
                                margin: 0 auto;
                            }
                        }

                        @media (max-width: 768px) {
                            .hero-section .container {
                                flex-direction: column;
                                text-align: center;
                            }

                            .hero-content {
                                max-width: 100%;
                                margin-bottom: 40px;
                            }

                            .hero-subtitle {
                                max-width: 100%;
                            }

                            .hero-image {
                                position: relative;
                                max-width: 100%;
                                transform: none;
                                top: auto;
                                right: auto;
                                margin-top: 30px;
                            }

                            .newsletter-content h2 {
                                font-size: 1.75rem;
                            }

                            .articles-grid {
                                grid-template-columns: 1fr;
                            }
                        }

                        @media (max-width: 576px) {
                            .hero-title {
                                font-size: 2rem;
                            }

                            .section-header {
                                flex-direction: column;
                                align-items: flex-start;
                                gap: 15px;
                            }

                            .newsletter-form {
                                flex-direction: column;
                            }

                            .newsletter-form input,
                            .newsletter-form button {
                                width: 100%;
                                border-radius: 6px;
                            }

                            .newsletter-form button {
                                margin-top: 10px;
                            }
                        }
                    </style>
                @endpush
            <!-- Charger le script FedaPay juste avant la fermeture du body -->
            <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
            @endsection

@extends('layouts.app')

@section('title', 'Accueil - Culture Benin')

@section('content')
    <!-- Section Héro avec image de fond -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Explorez la culture comme jamais !</h1>
                <p class="hero-subtitle">Découvrez les dernières actualités culturelles, expositions et événements à travers le monde.</p>
                <a href="#articles" class="btn">Découvrir</a>
            </div>
            <img src="https://via.placeholder.com/600x400" alt="Culture et art" class="hero-image">
        </div>
    </section>

    <!-- Section Articles à la une -->
    <section id="articles" class="container">
        <div class="section-header">
            <h2>À la une</h2>
            <a href="#" class="see-all">Voir tous les articles <i class="fas fa-plus"></i></a>
        </div>

        <div class="articles-grid">
            @foreach($featuredArticles as $article)
                <article class="article-card">
                    <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="article-image">
                    <div class="article-content">
                        <h3 class="article-title">{{ $article['title'] }}</h3>
                        <p class="article-excerpt">{{ $article['excerpt'] }}</p>
                        <div class="article-meta">
                            @foreach($article['categories'] as $category)
                                <span class="article-category">{{ $category }}</span>
                                @if(!$loop->last) • @endif
                            @endforeach
                            <span class="article-date">{{ $article['date'] }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Section Brèves -->
    <section class="breves-section">
        <div class="container">
            <div class="breves-container">
                <h2 class="breves-title">Brèves</h2>
                <div class="breves-list">
                    @foreach($breves as $breve)
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
                <p>Abonnez-vous à notre newsletter pour recevoir les dernières actualités culturelles directement dans votre boîte mail.</p>
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
        <div class="categories-grid">
            <a href="#" class="category-card">
                <i class="fas fa-monument"></i>
                <span>Archéologie</span>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-palette"></i>
                <span>Artistes & œuvres</span>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-landmark"></i>
                <span>Musées & Patrimoine</span>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-images"></i>
                <span>Expositions</span>
            </a>
        </div>
    </section>

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

        /* Section Catégories */
        .categories-section {
            margin: 60px auto 80px;
        }

        .categories-section h2 {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 15px;
        }

        .categories-section h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .categories-grid {
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
@endsection

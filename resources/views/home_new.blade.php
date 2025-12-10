@extends('layouts.user')

@section('title', 'Accueil')

@section('content')
<div class="content">
    <!-- Le reste du contenu de votre page d'accueil -->
    <section class="streaming-futur">
        <h2>La plateforme participative de la culture béninoise</h2>
        <p>Nous réunissons les passionnés, les experts et les curieux pour promouvoir le patrimoine immatériel du Bénin.<br>
        Participez, partagez et transmettez les histoires, recettes, pratiques et langues locales.</p>
    </section>

    <div class="main-content">
        <!-- Statistiques générales -->
        <section class="stats-section">
            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($stats['contenus_count'] ?? 0, 0, ',', ' ') }}</div>
                    <div class="stat-label">Contenus publiés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($stats['users_count'] ?? 0, 0, ',', ' ') }}</div>
                    <div class="stat-label">Utilisateurs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($stats['regions_count'] ?? 0, 0, ',', ' ') }}</div>
                    <div class="stat-label">Régions</div>
                </div>
            </div>
        </section>

        <!-- Derniers contenus -->
        <section class="latest-content">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
                <h2 class="section-title">Derniers contenus publiés</h2>
                <div style="display:flex;gap:10px;">
                    <a href="{{ route('contenus.index') }}" class="btn-card" style="padding:8px 24px;">VOIR TOUS</a>
                </div>
            </div>
            <div class="row">
                @if(isset($contenus) && count($contenus) > 0)
                    @foreach(array_slice($contenus, 0, 3) as $contenu)
                        <div class="col-md-4 mb-4">
                            <div class="modern-card">
                                @php
                                    $mediaPath = '';
                                    if (isset($contenu['medias']) && count($contenu['medias']) > 0) {
                                        $firstMedia = $contenu['medias'][0];
                                        $mediaPath = $firstMedia['lien'] ?? '';
                                    }
                                @endphp
                                
                                @if(!empty($mediaPath) && file_exists(public_path('storage/' . $mediaPath)))
                                    <img src="{{ asset('storage/' . $mediaPath) }}" alt="{{ $contenu['titre'] ?? 'Sans titre' }}" class="modern-card-img" style="width:100%;height:200px;object-fit:cover;">
                                @else
                                    <div class="modern-card-img d-flex align-items-center justify-content-center" style="background:#f0f0f0;height:200px;">
                                        <i class="fas fa-image" style="font-size: 3em; color: #666;"></i>
                                    </div>
                                @endif
                                
                                <div class="modern-card-body">
                                    <h3 class="modern-card-title">{{ $contenu['titre'] ?? 'Sans titre' }}</h3>
                                    <p class="modern-card-text">
                                        {{ isset($contenu['texte']) ? Str::limit($contenu['texte'], 100) : 'Aucune description disponible' }}
                                    </p>
                                    @if(isset($contenu['id_contenu']))
                                        <a href="{{ route('contenus.show', $contenu['id_contenu']) }}" class="modern-card-btn">Voir plus</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p class="text-center">Aucun contenu publié pour le moment.</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Médias récents -->
        <section class="media-section">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
                <h2 class="section-title" style="text-align:left;">Médias récents</h2>
                <div style="display:flex;gap:10px;">
                    <a href="{{ route('medias.index') }}" class="btn-card" style="padding:8px 24px;">VOIR TOUS</a>
                </div>
            </div>
            <div class="row">
                @if(isset($medias) && count($medias) > 0)
                    @foreach($medias as $media)
                        <div class="col-md-3 mb-4">
                            <div class="modern-card">
                                @php
                                    $mediaType = strtolower($media['type_media']['nom'] ?? '');
                                    $mediaPath = $media['lien'] ?? '';
                                    $description = $media['description'] ?? 'Aucune description';
                                @endphp
                                
                                @if(str_contains($mediaType, 'image'))
                                    <img src="{{ asset('storage/' . $mediaPath) }}" alt="{{ $description }}" class="modern-card-img" style="width:100%;height:200px;object-fit:cover;">
                                @elseif(str_contains($mediaType, 'video'))
                                    <video class="modern-card-img" controls style="width:100%;height:200px;object-fit:cover;">
                                        <source src="{{ asset('storage/' . $mediaPath) }}" type="video/mp4">
                                        Votre navigateur ne supporte pas la lecture de vidéos.
                                    </video>
                                @else
                                    <div class="modern-card-img d-flex align-items-center justify-content-center" style="background:#f0f0f0;height:200px;">
                                        <i class="fas fa-file-alt" style="font-size: 3em; color: #666;"></i>
                                    </div>
                                @endif
                                
                                <div class="modern-card-body">
                                    <p class="modern-card-text">
                                        {{ $description }}
                                    </p>
                                    @if(isset($media['contenu']) && isset($media['contenu']['id_contenu']))
                                        <a href="{{ route('contenus.show', $media['contenu']['id_contenu']) }}" class="modern-card-btn">Voir le contenu</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p class="text-center">Aucun média récent.</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Langue à l'honneur -->
        <section class="lang-section">
            <h2 class="section-title">Langue à l'honneur : {{ $langue->nom_langue }}</h2>
            <div class="honor-card">
                <div class="honor-icon honor-lang"><i class="fas fa-language"></i></div>
                <div class="honor-info">
                    <h3 class="honor-title">Le {{ $langue->nom_langue }}</h3>
                    <p class="honor-desc">
                        {{ $langue->description }}
                        @if(isset($langue->description) && strlen($langue->description) < 100)
                            <br><br>Découvrez des expressions courantes, des proverbes et des leçons pour apprendre les bases de cette langue riche.
                        @endif
                        @if(isset($langue->code_langue))
                            <br><br>
                            <small>Code langue: {{ strtoupper($langue->code_langue) }}</small>
                        @endif
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Gestion du menu déroulant du profil
        const profileButton = document.getElementById('profile-button');
        const profileMenu = document.getElementById('profile-menu');

        if (profileButton && profileMenu) {
            profileButton.addEventListener('click', function(e) {
                e.stopPropagation();
                profileMenu.classList.toggle('show');
            });

            // Fermer le menu quand on clique ailleurs
            document.addEventListener('click', function() {
                profileMenu.classList.remove('show');
            });
        }
    });
</script>
@endpush

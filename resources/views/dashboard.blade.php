
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-wrapper" style="display:flex;">
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-width:220px; background:#fff; border-right:1px solid #e2e8f0; min-height:calc(100vh - 90px); margin-top:90px;">
            <a href="/" class="brand-link" style="padding:18px 16px; display:block;">
                <span class="brand-text font-weight-light" style="font-size:1.3rem; color:#0a2840; font-family:'Playfair Display',serif; font-weight:700;">Culture Bénin</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"><a href="/dashboard" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                        <li class="nav-item"><a href="/utilisateurs" class="nav-link"><i class="nav-icon fas fa-users"></i> <span>Utilisateurs</span></a></li>
                        <li class="nav-item"><a href="/langues" class="nav-link"><i class="nav-icon fas fa-language"></i> <span>Langues</span></a></li>
                        <li class="nav-item"><a href="/roles" class="nav-link"><i class="nav-icon fas fa-user-tag"></i> <span>Rôles</span></a></li>
                        <li class="nav-item"><a href="/regions" class="nav-link"><i class="nav-icon fas fa-map-marker-alt"></i> <span>Régions</span></a></li>
                        <li class="nav-item"><a href="/type-contenus" class="nav-link"><i class="nav-icon fas fa-file"></i> <span>Types de Contenu</span></a></li>
                        <li class="nav-item"><a href="/type-medias" class="nav-link"><i class="nav-icon fas fa-film"></i> <span>Types de Média</span></a></li>
                        <li class="nav-item"><a href="/contenus" class="nav-link"><i class="nav-icon fas fa-file-alt"></i> <span>Contenus</span></a></li>
                        <li class="nav-item"><a href="/medias" class="nav-link"><i class="nav-icon fas fa-photo-video"></i> <span>Médias</span></a></li>
                        <li class="nav-item"><a href="/commentaires" class="nav-link"><i class="nav-icon fas fa-comments"></i> <span>Commentaires</span></a></li>
                        <li class="nav-item"><a href="/contenus-publies" class="nav-link"><i class="nav-icon fas fa-check-circle"></i> <span>Contenus Publiés</span></a></li>
                        <li class="nav-item"><a href="/en-attente" class="nav-link"><i class="nav-icon fas fa-clock"></i> <span>En attente</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="dashboard-content" style="flex:1; padding:40px 32px; margin-top:90px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
                @if(Auth::check())
                    <div style="padding:18px 24px; background:#eaf6ff; border-radius:12px; box-shadow:0 2px 8px rgba(44,62,80,0.08); font-size:1.25rem; color:#0a2840; font-weight:500;">
                        <i class="fas fa-smile-beam" style="color:#ffd600; margin-right:10px;"></i>
                        Bienvenue, {{ Auth::user()->prenom ?? Auth::user()->name }} {{ Auth::user()->nom ?? '' }} !
                    </div>
                @endif
                <a href="/" style="background:#ffd600; color:#0a2840; font-weight:700; border-radius:32px; padding:8px 20px; font-size:1rem; border:none; box-shadow:0 2px 8px rgba(44,62,80,0.08); text-decoration:none; margin-left:24px; display:inline-block;">
                    <i class="fas fa-home" style="margin-right:8px;"></i> Retourner à l'accueil
                </a>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">
                        <i class="fas fa-tachometer-alt"></i>
                        Statistiques
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Utilisateurs -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ \App\Models\Utilisateur::count() }}</h3>
                                    <p>Utilisateurs</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="{{ route('utilisateurs.index') }}" class="small-box-footer">Gérer les utilisateurs <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Langues -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ \App\Models\Langue::count() }}</h3>
                                    <p>Langues</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-language"></i>
                                </div>
                                <a href="{{ route('langues.index') }}" class="small-box-footer">Gérer les langues <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Rôles -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>{{ \App\Models\Role::count() }}</h3>
                                    <p>Rôles</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <a href="{{ route('roles.index') }}" class="small-box-footer">Gérer les rôles <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Régions -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ \App\Models\Region::count() }}</h3>
                                    <p>Régions</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <a href="{{ route('regions.index') }}" class="small-box-footer">Gérer les régions <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- Types de Contenu -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>{{ \App\Models\TypeContenu::count() }}</h3>
                                    <p>Types de Contenu</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <a href="{{ route('type-contenus.index') }}" class="small-box-footer">Gérer les types <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Types de Média -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-pink">
                                <div class="inner">
                                    <h3>{{ \App\Models\TypeMedia::count() }}</h3>
                                    <p>Types de Média</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-photo-video"></i>
                                </div>
                                <a href="{{ route('type-medias.index') }}" class="small-box-footer">Gérer les types <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Contenus -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>{{ \App\Models\Contenu::count() }}</h3>
                                    <p>Contenus</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-contract"></i>
                                </div>
                                <a href="{{ route('contenus.index') }}" class="small-box-footer">Gérer les contenus <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Médias -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <h3>{{ \App\Models\Media::count() }}</h3>
                                    <p>Médias</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <a href="{{ route('medias.index') }}" class="small-box-footer">Gérer les médias <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- Commentaires -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-indigo">
                                <div class="inner">
                                    <h3>{{ \App\Models\Commentaire::count() }}</h3>
                                    <p>Commentaires</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <a href="{{ route('commentaires.index') }}" class="small-box-footer">Gérer les commentaires <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Contenus par Statut -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>{{ \App\Models\Contenu::where('statut', 'publié')->count() }}</h3>
                                    <p>Contenus Publiés</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <a href="{{ route('contenus.index') }}?statut=publié" class="small-box-footer">Voir les publiés <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Contenus en Attente -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>{{ \App\Models\Contenu::where('statut', 'en_attente')->count() }}</h3>
                                    <p>En Attente</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <a href="{{ route('contenus.index') }}?statut=en_attente" class="small-box-footer">Voir en attente <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Dernière Mise à Jour -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>{{ \Carbon\Carbon::now()->format('d/m') }}</h3>
                                    <p>Dernière MAJ</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">Actualisé maintenant <i class="fas fa-check"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">
                        <i class="fas fa-tachometer-alt"></i>
                        Statistiques
                    </h3>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                        <!-- Utilisateurs -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ \App\Models\Utilisateur::count() }}</h3>
                                    <p>Utilisateurs</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="{{ route('utilisateurs.index') }}" class="small-box-footer">
                                    Gérer les utilisateurs <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Langues -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ \App\Models\Langue::count() }}</h3>
                                    <p>Langues</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-language"></i>
                                </div>
                                <a href="{{ route('langues.index') }}" class="small-box-footer">
                                    Gérer les langues <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Rôles -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>{{ \App\Models\Role::count() }}</h3>
                                    <p>Rôles</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <a href="{{ route('roles.index') }}" class="small-box-footer">
                                    Gérer les rôles <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Régions -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ \App\Models\Region::count() }}</h3>
                                    <p>Régions</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <a href="{{ route('regions.index') }}" class="small-box-footer">
                                    Gérer les régions <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!-- Types de Contenu -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>{{ \App\Models\TypeContenu::count() }}</h3>
                                    <p>Types de Contenu</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <a href="{{ route('type-contenus.index') }}" class="small-box-footer">
                                    Gérer les types <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Types de Média -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-pink">
                                <div class="inner">
                                    <h3>{{ \App\Models\TypeMedia::count() }}</h3>
                                    <p>Types de Média</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-photo-video"></i>
                                </div>
                                <a href="{{ route('type-medias.index') }}" class="small-box-footer">
                                    Gérer les types <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Contenus -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>{{ \App\Models\Contenu::count() }}</h3>
                                    <p>Contenus</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-contract"></i>
                                </div>
                                <a href="{{ route('contenus.index') }}" class="small-box-footer">
                                    Gérer les contenus <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Médias -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <h3>{{ \App\Models\Media::count() }}</h3>
                                    <p>Médias</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <a href="{{ route('medias.index') }}" class="small-box-footer">
                                    Gérer les médias <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!-- Commentaires -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-indigo">
                                <div class="inner">
                                    <h3>{{ \App\Models\Commentaire::count() }}</h3>
                                    <p>Commentaires</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <a href="{{ route('commentaires.index') }}" class="small-box-footer">
                                    Gérer les commentaires <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Contenus par Statut -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>{{ \App\Models\Contenu::where('statut', 'publié')->count() }}</h3>
                                    <p>Contenus Publiés</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <a href="{{ route('contenus.index') }}?statut=publié" class="small-box-footer">
                                    Voir les publiés <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Contenus en Attente -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>{{ \App\Models\Contenu::where('statut', 'en_attente')->count() }}</h3>
                                    <p>En Attente</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <a href="{{ route('contenus.index') }}?statut=en_attente" class="small-box-footer">
                                    Voir en attente <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Dernière Mise à Jour -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>{{ \Carbon\Carbon::now()->format('d/m') }}</h3>
                                    <p>Dernière MAJ</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Actualisé maintenant <i class="fas fa-check"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Statistiques avancées -->
                  
@endsection

<style>
/* Couleurs personnalisées pour les small-box */
.bg-purple {
    background-color: #6f42c1 !important;
    color: white;
}

.bg-pink {
    background-color: #e83e8c !important;
    color: white;
}

.bg-teal {
    background-color: #20c997 !important;
    color: white;
}

.bg-orange {
    background-color: #fd7e14 !important;
    color: white;
}

.bg-indigo {
    background-color: #6610f2 !important;
    color: white;
}

.bg-maroon {
    background-color: #d81b60 !important;
    color: white;
}

/* Style pour les small-box */
.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}

.small-box > .inner {
    padding: 10px;
}

.small-box h3 {
    font-size: 2.2rem;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}

.small-box p {
    font-size: 1rem;
}

.small-box .icon {
    position: absolute;
    top: -10px;
    right: 10px;
    z-index: 0;
    font-size: 70px;
    color: rgba(0,0,0,0.15);
    transition: all .3s linear;
}

.small-box:hover .icon {
    font-size: 75px;
}

.small-box .small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}

.small-box .small-box-footer:hover {
    color: #fff;
    background: rgba(0,0,0,0.15);
}
</style>
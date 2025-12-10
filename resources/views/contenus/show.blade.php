@extends('layouts.app')

@section('title', 'Détails du Contenu')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i>
                        Détails du Contenu : {{ $contenu->titre }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('contenus.index') }}" class="btn btn-sm btn-default">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>ID:</dt>
                                <dd>{{ $contenu->id_contenu }}</dd>

                                <dt>Titre:</dt>
                                <dd><strong>{{ $contenu->titre }}</strong></dd>

                                <dt>Auteur:</dt>
                                <dd>
                                    <span class="badge badge-primary">
                                        {{ $contenu->auteur->prenom ?? 'N/A' }} {{ $contenu->auteur->nom ?? '' }}
                                    </span>
                                </dd>

                                <dt>Type de contenu:</dt>
                                <dd>
                                    <span class="badge badge-purple">{{ $contenu->typeContenu->nom_contenu ?? 'N/A' }}</span>
                                </dd>

                                <dt>Région:</dt>
                                <dd>{{ $contenu->region->nom_region ?? 'N/A' }}</dd>

                                <dt>Langue:</dt>
                                <dd>
                                    <span class="badge badge-info">{{ $contenu->langue->nom_langue ?? 'N/A' }}</span>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Statut:</dt>
                                <dd>
                                    @if($contenu->statut == 'publié')
                                        <span class="badge badge-success">Publié</span>
                                    @elseif($contenu->statut == 'brouillon')
                                        <span class="badge badge-secondary">Brouillon</span>
                                    @elseif($contenu->statut == 'en_attente')
                                        <span class="badge badge-warning">En attente</span>
                                    @else
                                        <span class="badge badge-primary">{{ $contenu->statut }}</span>
                                    @endif
                                </dd>

                                <dt>Date de création:</dt>
                                <dd>{{ \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y') }}</dd>

                                <dt>Date de validation:</dt>
                                <dd>
                                    @if($contenu->date_validation)
                                        {{ \Carbon\Carbon::parse($contenu->date_validation)->format('d/m/Y') }}
                                    @else
                                        <span class="text-muted">Non validé</span>
                                    @endif
                                </dd>

                                <dt>Modérateur:</dt>
                                <dd>
                                    @if($contenu->moderateur)
                                        <span class="badge badge-secondary">
                                            {{ $contenu->moderateur->prenom }} {{ $contenu->moderateur->nom }}
                                        </span>
                                    @else
                                        <span class="text-muted">Aucun</span>
                                    @endif
                                </dd>

                                <dt>Contenu parent:</dt>
                                <dd>
                                    @if($contenu->parent)
                                        <a href="{{ route('contenus.show', $contenu->parent) }}">
                                            {{ $contenu->parent->titre }}
                                        </a>
                                    @else
                                        <span class="text-muted">Aucun</span>
                                    @endif
                                </dd>

                                <dt>Date création:</dt>
                                <dd>{{ $contenu->created_at->format('d/m/Y H:i') }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <dt>Contenu:</dt>
                            <dd class="border rounded p-3 bg-light">
                                @php
                                    $lignes = explode("\n", $contenu->texte);
                                    $premieres_lignes = array_slice($lignes, 0, 10);
                                    $reste_lignes = array_slice($lignes, 10);
                                @endphp
                                {!! nl2br(e(implode("\n", $premieres_lignes))) !!}
                                @if(count($reste_lignes) > 0)
                                    <span class="dots">...</span>
                                    <button id="btn-voir-plus" class="btn btn-primary mt-2">Voir plus</button>
                                    <div id="paiement-section" style="display:none;">
                                        <div class="alert alert-warning mt-3" id="message-paiement">
                                            <strong>La suite du contenu est payante.</strong><br>
                                            Pour lire la totalité, veuillez effectuer le paiement.
                                        </div>
                                        <button id="btn-payer" class="btn btn-success">Payer pour voir la suite</button>
                                    </div>
                                    <div id="suite-contenu" style="display:none;">
                                        {!! nl2br(e(implode("\n", $reste_lignes))) !!}
                                        <button id="btn-moins" class="btn btn-secondary mt-2">Voir moins</button>
                                    </div>
                                                                <script src="https://cdn.fedapay.com/js/checkout.js"></script>
                                                                <script>
                                                                    (function() {
                                                                        document.addEventListener('DOMContentLoaded', function() {
                                                                            var btnVoirPlus = document.getElementById('btn-voir-plus');
                                                                            var paiementSection = document.getElementById('paiement-section');
                                                                            var btnPayer = document.getElementById('btn-payer');
                                                                            var suiteContenu = document.getElementById('suite-contenu');
                                                                            var btnMoins;

                                                                            // Debug logs
                                                                            console.log('Chargement JS - Initialisation des éléments');
                                                                            console.log('btnVoirPlus:', btnVoirPlus);
                                                                            console.log('paiementSection:', paiementSection);
                                                                            console.log('btnPayer:', btnPayer);
                                                                            console.log('suiteContenu:', suiteContenu);

                                                                            // Réinitialisation stricte de l'affichage
                                                                            if (paiementSection) paiementSection.style.display = 'none';
                                                                            if (suiteContenu) suiteContenu.style.display = 'none';
                                                                            if (btnVoirPlus) btnVoirPlus.style.display = 'inline-block';

                                                                            // Action Voir plus
                                                                            if (btnVoirPlus) {
                                                                                btnVoirPlus.onclick = function() {
                                                                                    console.log('Click Voir plus');
                                                                                    btnVoirPlus.style.display = 'none';
                                                                                    paiementSection.style.display = 'block';
                                                                                    if (suiteContenu) suiteContenu.style.display = 'none';
                                                                                };
                                                                            }

                                                                            // Action Payer
                                                                            if (btnPayer) {
                                                                                btnPayer.onclick = function() {
                                                                                    console.log('Click Payer');
                                                                                    if(confirm('La suite du contenu est payante. Voulez-vous procéder au paiement ?')) {
                                                                                        FedaPay.init({
                                                                                            public_key: 'pk_sandbox_tmkQmXu61NfI_EsnW2Q4NF2t',
                                                                                            amount: 500,
                                                                                            currency: 'XOF',
                                                                                            description: 'Accès à la suite du contenu',
                                                                                            onComplete: function(response) {
                                                                                                console.log('Paiement réussi');
                                                                                                paiementSection.style.display = 'none';
                                                                                                suiteContenu.style.display = 'block';
                                                                                                btnMoins = document.getElementById('btn-moins');
                                                                                                if (btnMoins) {
                                                                                                    btnMoins.onclick = function() {
                                                                                                        console.log('Click Voir moins');
                                                                                                        suiteContenu.style.display = 'none';
                                                                                                        paiementSection.style.display = 'block';
                                                                                                    };
                                                                                                }
                                                                                            },
                                                                                            onDismiss: function() {
                                                                                                console.log('Paiement annulé ou fenêtre fermée');
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                };
                                                                            }
                                                                        });
                                                                    })();
                                                                </script>
                                @endif
                            </dd>
                        </div>
                    </div>

                    @if($contenu->enfants->count() > 0)
                    <div class="row mt-3">
                        <div class="col-12">
                            <dt>Contenus liés (réponses):</dt>
                            <dd>
                                <ul class="list-group">
                                    @foreach($contenu->enfants as $enfant)
                                    <li class="list-group-item">
                                        <a href="{{ route('contenus.show', $enfant) }}">
                                            {{ $enfant->titre }}
                                        </a>
                                        <span class="badge badge-secondary float-right">
                                            {{ $enfant->statut }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('contenus.edit', $contenu) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('contenus.destroy', $contenu) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge-purple {
    background-color: #6f42c1;
    color: white;
}
</style>
<script src="https://cdn.fedapay.com/js/checkout.js"></script>
<script>
    (function() {
        document.addEventListener('DOMContentLoaded', function() {
            var btnVoirPlus = document.getElementById('btn-voir-plus');
            var paiementSection = document.getElementById('paiement-section');
            var btnPayer = document.getElementById('btn-payer');
            var suiteContenu = document.getElementById('suite-contenu');
            var btnMoins;

            // Debug logs
            console.log('Chargement JS - Initialisation des éléments');
            console.log('btnVoirPlus:', btnVoirPlus);
            console.log('paiementSection:', paiementSection);
            console.log('btnPayer:', btnPayer);
            console.log('suiteContenu:', suiteContenu);

            // Réinitialisation stricte de l'affichage
            if (paiementSection) paiementSection.style.display = 'none';
            if (suiteContenu) suiteContenu.style.display = 'none';
            if (btnVoirPlus) btnVoirPlus.style.display = 'inline-block';

            // Action Voir plus
            if (btnVoirPlus) {
                btnVoirPlus.onclick = function() {
                    console.log('Click Voir plus');
                    btnVoirPlus.style.display = 'none';
                    paiementSection.style.display = 'block';
                    if (suiteContenu) suiteContenu.style.display = 'none';
                };
            }

            // Action Payer
            if (btnPayer) {
                btnPayer.onclick = function() {
                    console.log('Click Payer');
                    if(confirm('La suite du contenu est payante. Voulez-vous procéder au paiement ?')) {
                        FedaPay.init({
                            public_key: 'pk_sandbox_tmkQmXu61NfI_EsnW2Q4NF2t',
                            amount: 500,
                            currency: 'XOF',
                            description: 'Accès à la suite du contenu',
                            onComplete: function(response) {
                                console.log('Paiement réussi');
                                paiementSection.style.display = 'none';
                                suiteContenu.style.display = 'block';
                                btnMoins = document.getElementById('btn-moins');
                                if (btnMoins) {
                                    btnMoins.onclick = function() {
                                        console.log('Click Voir moins');
                                        suiteContenu.style.display = 'none';
                                        paiementSection.style.display = 'block';
                                    };
                                }
                            },
                            onDismiss: function() {
                                console.log('Paiement annulé ou fenêtre fermée');
                            }
                        });
                    }
                };
            }
        });
    })();
</script>
@endsection
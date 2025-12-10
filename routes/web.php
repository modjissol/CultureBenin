<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Auth;
// Redirection de /en-attente vers la route correcte
Route::get('/en-attente', function() {
    return redirect()->route('admin.contenus.en_attente');
});
// Actions modération contenus en attente
Route::post('admin/contenus/{id}/refuser', [ContenuController::class, 'refuser'])->name('admin.contenus.refuser');
Route::post('admin/contenus/{id}/supprimer', [ContenuController::class, 'supprimer'])->name('admin.contenus.supprimer');
// Alias pour accéder rapidement à la validation des contenus en attente
// Route unique pour la modération des contenus en attente
Route::get('admin/contenus/en-attente', [ContenuController::class, 'enAttente'])->name('admin.contenus.en_attente');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes d'authentification (temporairement commentées)
Route::group(['middleware' => 'web'], function () {
    // Routes d'authentification
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    // Routes d'enregistrement
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);

    // Routes de réinitialisation de mot de passe
    Route::get('password/reset', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    Route::post('password/email', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');
    Route::get('password/reset/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])
        ->name('password.update');
});

use App\Models\Langue;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

// Route d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Route pour le formulaire de contribution
Route::get('/contribuer', [App\Http\Controllers\ContenuController::class, 'create'])->name('contribuer');
Route::post('/contribuer', [App\Http\Controllers\ContenuController::class, 'store'])->name('contribuer.store');

// Routes pour les langues
Route::resource('langues', LangueController::class);

Route::resource('roles', RoleController::class);

Route::resource('regions', RegionController::class);

Route::resource('type-contenus', TypeContenuController::class);

Route::resource('type-medias', TypeMediaController::class);

Route::resource('utilisateurs', UtilisateurController::class);

Route::get('/contenus/proposer', function () {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        abort(403, 'Accès réservé à l’administrateur');
    }
    $regions = Region::all();
    $langues = Langue::all();
    $types = TypeContenu::all();
    return view('contenus.proposer', compact('regions', 'langues', 'types'));
})->name('contenus.proposer');

Route::resource('contenus', ContenuController::class);

// Traduction routes for contenus
Route::get('contenus/{contenu}/traduction', [ContenuController::class, 'traductionForm'])->name('contenus.traduction');
Route::post('contenus/{contenu}/traduction', [ContenuController::class, 'storeTraduction'])->name('contenus.traduction.store');

// Validation des contenus par l'admin
Route::get('admin/contenus/en-attente', [ContenuController::class, 'enAttente'])->name('admin.contenus.en_attente');
Route::post('admin/contenus/{id}/valider', [ContenuController::class, 'valider'])->name('admin.contenus.valider');

Route::resource('medias', MediaController::class);

// Serve media files when the public/storage symlink is missing
Route::get('media/{media}/file', [MediaController::class, 'serve'])->name('media.file');

Route::resource('commentaires', CommentaireController::class);




// Route dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Note: authentication routes are handled by Auth controllers above.
// Removed duplicate GET /register and POST /login closure routes to avoid conflicts.


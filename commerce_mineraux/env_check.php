<!-- Code de vérification de test pour le hash des mots de passe -->


<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Hashing\BcryptHasher;
use App\Models\User;
use Dotenv\Dotenv;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

// Charger les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Initialiser le gestionnaire de base de données
$app = new Container();
$app->instance('app', $app);
$app->singleton('config', function () {
    return [
        'database.connections.mysql' => [
            'driver' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
        ],
    ];
});

$capsule = new DB;
$capsule->addConnection($app['config']['database.connections.mysql']);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Vérifier si la table 'users' existe
if (!DB::schema()->hasTable('users')) {
    echo "La table 'users' n'existe pas dans la base de données.\n";
    exit;
}

// Récupérer l'utilisateur
$user = User::where('email', 'testuser9@example.com')->first();

if (!$user) {
    echo "Utilisateur non trouvé.\n";
    exit;
}

echo "Mot de passe en clair: password123\n";
echo "Mot de passe haché: " . $user->password . "\n";

$hasher = new BcryptHasher;

if ($hasher->check('password123', $user->password)) {
    echo "Le mot de passe correspond.\n";
} else {
    echo "Le mot de passe ne correspond pas.\n";
}

<?php

require 'vendor/autoload.php';

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Illuminate\Hashing\BcryptHasher;

// Initialisation manuelle du conteneur Laravel et des façades
$app = new Container();
$app->instance('app', $app);
$app->singleton('hash', function() {
    return new BcryptHasher();
});
Facade::setFacadeApplication($app);

// Hachage d'un mot de passe en utilisant bcrypt
$plainPassword = 'password123';
$hashedPassword = $app['hash']->make($plainPassword);

echo "Mot de passe en clair: " . $plainPassword . "\n";
echo "Mot de passe haché: " . $hashedPassword . "\n";

// Vérification du mot de passe
if ($app['hash']->check($plainPassword, $hashedPassword)) {
    echo "Le mot de passe correspond.\n";
} else {
    echo "Le mot de passe ne correspond pas.\n";
}

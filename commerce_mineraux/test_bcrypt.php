<?php

require 'vendor/autoload.php';

use Illuminate\Hashing\BcryptHasher;

$hasher = new BcryptHasher();

$password = 'password123';
$hashedPassword = $hasher->make($password);

echo "Hashed Password: " . $hashedPassword . "\n";

$isPasswordValid = $hasher->check($password, $hashedPassword);

echo "Password Check: " . ($isPasswordValid ? 'true' : 'false') . "\n";

<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

// Load functions
require_once __DIR__. '/includes/config/include.php';
require_once __DIR__.'/sources/main.functions.php';

// init
loadClasses();

// Get username and OTP from GET parameters
$request = SymfonyRequest::createFromGlobals();
$otp = $request->query->get('otp', '');
$login = $request->request->get('login', '');
$pw = $request->request->get('pw', '');
$pw2 = $request->request->get('pw2', '');

// Clean old rows
DB::delete(
    prefixTable('temp_accounts'),
    'exp < %s',
    date('Y-m-d H:i:s', time()),
);

$expectedLogin = DB::queryFirstField(
    'SELECT u.login
     FROM ' . prefixTable('temp_accounts') . ' ta
     INNER JOIN ' . prefixTable('users') . ' AS u ON u.id = ta.user_id
     WHERE ta.otp = %s AND ta.exp > %s',
     $otp,
     date('Y-m-d H:i:s', time()),
);

if (!$expectedLogin) {
    $error = 'Ce lien est expiré.';
    require_once 'self-init-form.php';
    exit;
}

// Form not sent yet
if ($request->isMethod('GET')) {
    require_once 'self-init-form.php';
    exit;
}

if ($login === '' || $pw === '' || $pw2 ==='') {
    $error = 'Tous les champs sont requis.';
    require_once 'self-init-form.php';
    exit;
}

if ($expectedLogin && $expectedLogin !== $login) {
    $error = 'Utilisateur invalide.';
    require_once 'self-init-form.php';
    exit;
}

if ($pw !== $pw2) {
    $error = 'Le mot de passe et la confirmation ne correspondent pas.';
    require_once 'self-init-form.php';
    exit;
}

if (!isPasswordStrong($pw)) {
    $error = 'Le mot de passe n\'est pas suffisament robuste.';
    require_once 'self-init-form.php';
    exit;
}

$userId = DB::queryFirstField(
    'SELECT id
     FROM ' . prefixTable('users') . '
     WHERE login = %s',
     $login,
);

handleUserKeys(
    (int) $userId,
    $pw,
    (int) NUMBER_ITEMS_IN_BATCH,
    '',
    true,
    true,
    true,
    false,
    'email_body_user_config_4',
    false,
    '',
    '',
);

// Clear this temp access
DB::delete(
    prefixTable('temp_accounts'),
    'otp = %s',
    $otp,
);

// Redirect user to teampass
header('Location: ./index.php');
exit;

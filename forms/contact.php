<?php

declare(strict_types=1);

$redirectPage = $_POST['redirect'] ?? 'index.php';

$allowedRedirects = [
    'index.php',
    'fr.php',
];

if (!in_array($redirectPage, $allowedRedirects, true)) {
    $redirectPage = 'index.php';
}

$redirectUrl = '../' . $redirectPage;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . $redirectUrl . '#contact', true, 303);
    exit;
}

$firstName = trim($_POST['firstName'] ?? '');
$lastName = trim($_POST['lastName'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if (
    $firstName === '' ||
    $lastName === '' ||
    $email === '' ||
    $subject === '' ||
    $message === ''
) {
    header(
        'Location: ' . $redirectUrl . '?contact=missing#contact',
        true,
        303,
    );
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header(
        'Location: ' . $redirectUrl . '?contact=invalid-email#contact',
        true,
        303,
    );
    exit;
}

if (
    mb_strlen($firstName) > 100 ||
    mb_strlen($lastName) > 100 ||
    mb_strlen($email) > 255 ||
    mb_strlen($subject) > 255 ||
    mb_strlen($message) > 5000
) {
    header(
        'Location: ' . $redirectUrl . '?contact=too-long#contact',
        true,
        303,
    );
    exit;
}

try {
    require_once __DIR__ . '/../conf/conf-db.php';

    $statement = $pdo->prepare(
        'INSERT INTO contact_info
            (firstName, lastName, email, subject, message)
        VALUES
            (:firstName, :lastName, :email, :subject, :message)'
    );

    $statement->execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
    ]);

    header(
        'Location: ' . $redirectUrl . '?contact=success#contact',
        true,
        303,
    );
    exit;
} catch (Throwable $exception) {
    error_log($exception->getMessage());

    header(
        'Location: ' . $redirectUrl . '?contact=error#contact',
        true,
        303,
    );
    exit;
}

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

$cleanHeaderValue = static function (string $value): string {
    return trim((string) preg_replace('/[\r\n]+/', ' ', $value));
};

$sendContactNotification = static function (
    string $firstName,
    string $lastName,
    string $email,
    string $subject,
    string $message,
    string $redirectPage
) use ($cleanHeaderValue): bool {
    $recipient = 'contact@acelyalejeune.com';
    $sender = 'contact@acelyalejeune.com';

    $safeFirstName = $cleanHeaderValue($firstName);
    $safeLastName = $cleanHeaderValue($lastName);
    $safeEmail = $cleanHeaderValue($email);
    $safeSubject = $cleanHeaderValue($subject);

    $pageLanguage = $redirectPage === 'fr.php' ? 'French page' : 'English page';

    $mailSubject = mb_encode_mimeheader(
        'Portfolio contact: ' . $safeSubject,
        'UTF-8'
    );

    $mailBody = implode("\n", [
        'New message from the portfolio contact form',
        '',
        'Source: ' . $pageLanguage,
        'First name: ' . $firstName,
        'Last name: ' . $lastName,
        'Email: ' . $email,
        'Subject: ' . $subject,
        '',
        'Message:',
        $message,
        '',
        'Reply directly to this visitor using: ' . $email,
    ]);

    $headers = [
        'From: Acelya Lejeune Portfolio <' . $sender . '>',
        'Reply-To: ' . $safeEmail,
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
        'X-Mailer: PHP/' . phpversion(),
    ];

    $additionalParameters = '-f' . $sender;

    return mail(
        $recipient,
        $mailSubject,
        $mailBody,
        implode("\r\n", $headers),
        $additionalParameters
    );
};

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

    $mailSent = $sendContactNotification(
        $firstName,
        $lastName,
        $email,
        $subject,
        $message,
        $redirectPage,
    );

    if (!$mailSent) {
        throw new RuntimeException('Contact notification email could not be sent.');
    }

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

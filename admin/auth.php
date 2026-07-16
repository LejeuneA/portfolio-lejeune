<?php

declare(strict_types=1);

$isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')
);

ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Strict',
    ]);

    session_start();
}

if (!headers_sent()) {
    header('X-Frame-Options: DENY');
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: no-referrer');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
}

function e(mixed $value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8',
    );
}

function requireAdminLogin(): void
{
    if (
        empty($_SESSION['user_id']) ||
        (int) ($_SESSION['user_permission'] ?? 0) !== 1
    ) {
        header('Location: login.php', true, 303);
        exit;
    }
}

function getCsrfToken(): string
{
    if (
        empty($_SESSION['csrf_token']) ||
        !is_string($_SESSION['csrf_token'])
    ) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function isValidCsrfToken(?string $token): bool
{
    return (
        is_string($token) &&
        isset($_SESSION['csrf_token']) &&
        is_string($_SESSION['csrf_token']) &&
        hash_equals($_SESSION['csrf_token'], $token)
    );
}

function setFlash(string $message, string $type = 'success'): void
{
    $_SESSION['flash'] = [
        'message' => $message,
        'type' => $type,
    ];
}

function getFlash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);

    return is_array($flash) ? $flash : null;
}

function getPortfolioFormData(array $source): array
{
    return [
        'image_url' => trim((string) ($source['image_url'] ?? '')),
        'info_url' => trim((string) ($source['info_url'] ?? '')),
        'info_url_fr' => trim((string) ($source['info_url_fr'] ?? '')),
        'live_url' => trim((string) ($source['live_url'] ?? '')),
        'github_url' => trim((string) ($source['github_url'] ?? '')),
    ];
}

function validatePortfolioFormData(array $data): ?string
{
    foreach ($data as $value) {
        if ($value === '') {
            return 'All fields are required.';
        }

        if (mb_strlen($value) > 2048) {
            return 'One or more fields are too long.';
        }
    }

    return null;
}

function destroyAdminSession(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly'],
        );
    }

    session_destroy();
}

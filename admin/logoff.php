<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php', true, 303);
    exit;
}

$csrfToken = $_POST['csrf_token'] ?? null;

if (!isValidCsrfToken(
    is_string($csrfToken) ? $csrfToken : null,
)) {
    header('Location: portfolio.php', true, 303);
    exit;
}

destroyAdminSession();

header('Location: login.php', true, 303);
exit;

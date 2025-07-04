<?php
require_once __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);

$speler = $_POST['speler'] ?? null;
$punten = $_POST['punten'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // DB storen nog doen
    // Redirect to clear POST on refresh
    header("Location: /?done=1&speler=" . urlencode($speler) . "&punten=" . urlencode($punten));
    exit;
}

$submittedSpeler = $_GET['speler'] ?? null;
$submittedPunten = $_GET['punten'] ?? null;
$done = $_GET['done'] ?? false;

echo $twig->render('single.twig', [
    'speler' => $submittedSpeler,
    'punten' => $submittedPunten,
    'done' => $done
]);

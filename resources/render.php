<?php
function renderHead($title) {
    echo "
    <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script src='https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4'></script>
    <title>$title</title>
    </head>
    ";
}
function renderAside($routeDigited) {
    
    function setHtml($theHtml, $route) {
        return ($route == $theHtml) ? "bg-gray-700" : "bg-gray-800 hover:bg-gray-700";
    }

    echo '
    <aside class="w-64 bg-gray-900 text-white p-5 space-y-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <nav class="space-y-4">
            <a href="/public" class="w-full text-left p-2 rounded ' . setHtml("index", $routeDigited) . '">Principal</a>
            <a href="/public/finance.php" class="w-full text-left p-2 rounded ' . setHtml("finance", $routeDigited) . '">Finances</a>
        </nav>
    </aside>
    ';
}
?>
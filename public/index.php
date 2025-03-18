<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include __DIR__ . '/../resources/render.php';
    renderHead("Index");
?>
<body class="flex h-screen bg-gray-100">
    <aside class="w-64 bg-gray-900 text-white p-5 space-y-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <nav class="space-y-4">
            <button class="w-full text-left p-2 bg-gray-800 rounded hover:bg-gray-700">Principal</button>
            <button id="profileButton" class="w-full text-left p-2 bg-gray-800 rounded hover:bg-gray-700">Finances</button>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        <h2 class="text-2xl font-bold">Bem-vindo ao Painel</h2>
        <p class="mt-2 text-gray-600">Aqui é onde o conteúdo principal aparece.</p>
    </main>
</body>
</html>
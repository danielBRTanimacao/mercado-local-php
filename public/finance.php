<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include __DIR__ . '/../resources/render.php';
    renderHead("Financeiro");
?>
<body class="flex h-screen bg-gray-100">
    <?php
        renderAside('finance');
    ?>

    <main class="flex-1 p-10">
        <h2 class="text-2xl font-bold">Bem-vindo ao Painel Finanças</h2>
        <p class="mt-2 text-gray-600">Aqui é onde o conteúdo principal aparece.</p>
    </main>
</body>
</html>
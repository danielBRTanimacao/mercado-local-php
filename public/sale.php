<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include __DIR__ . '/../resources/render.php';
    
    $url = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $sale = end($parts);

    renderHead("Produto " . $sale);
?>
<body class="flex h-screen bg-gray-100">
    <?php renderAside('sale');?>

    <main class="flex-1 p-10">
        <h2 class="text-2xl font-bold">Modifique uma venda</h2>
        <p class="mt-2 text-gray-600">Aqui é onde seu conteúdo de venda aparece para o produto com ID <?php echo $sale; ?>.</p>
    </main>
</body>
</html>

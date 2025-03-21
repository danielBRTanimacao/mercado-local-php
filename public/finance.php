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

        <article>
            <div id="myPlot" style="width:100%;"></div>
            <aside class="flex justify-evenly"> 
                <div id="plotCircleMonth" style="width:100%;"></div>
                <div id="plotCircle" style="width:100%;"></div>
            </aside>
        </article>
    </main>
    <script type="module" src="../public/js/finance.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</body>
</html>
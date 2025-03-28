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
        <p class="mt-2 text-gray-600">Fique de olho nos seus ganhos diarios.</p>
        <label for="moneyShow">Mostrar:</label>
        <select name="moneyShow" id="showMoney">
            <option value="sale">Vendas</option>
            <option value="money">Dinheiro</option>
        </select>
        <h2 class="text-2xl font-bold text-center hidden error text-red-600">
            Erro aos buscar os valores.
        </h2>

        <article>
            <div class="flex items-center justify-center" style="width: 100%; height: 390px;">
                <canvas id="myChart"></canvas>
            </div>

            <aside class="flex justify-evenly"> 
                <div>
                    <canvas id="chartDayCircle"></canvas>
                </div>
                <div>
                    <canvas id="chartMonthCircle"></canvas>
                </div>
            </aside>
        </article>
    </main>
    <script type="module" src="../public/js/finance.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
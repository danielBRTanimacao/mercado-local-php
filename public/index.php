<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include __DIR__ . '/../resources/render.php';
    include __DIR__ . '/../models/sales.php';
    renderHead("Painel principal");

    $db = new SQLite3(__DIR__ . '/../sales.db');


    $result = $db->query("SELECT * FROM sales");

    $sales = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $sales[] = $row;
    }
?>
<body class="flex h-screen bg-gray-100">
    <?php renderAside('index');?>

    <main class="flex-1 p-10">
        <h2 class="text-2xl font-bold">Bem-vindo ao Painel</h2>
        <p class="mt-2 text-gray-600">Aqui é onde seu conteúdo de venda aparece.</p>

        <div class="mt-6 bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4">Lista de Vendas</h3>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="border p-3">ID</th>
                            <th class="border p-3">Nome</th>
                            <th class="border p-3">Marca</th>
                            <th class="border p-3">Quantidade</th>
                            <th class="border p-3">KiloGram</th>
                            <th class="border p-3">Preço</th>
                            <th class="border p-3">Data de Compra</th>
                            <th class="border p-3">Criado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sales as $row) { ?>
                            <tr class="border text-center bg-gray-100 hover:bg-gray-200">
                                <td class="border p-3"><?php echo $row['id']; ?></td>
                                <td class="border p-3"><?php echo $row['name']; ?></td>
                                <td class="border p-3"><?php echo $row['brand'] ? $row['brand'] : '<span class="text-gray-500 italic">Sem marca</span>'; ?></td>
                                <td class="border p-3"><?php echo $row['quantity']; ?></td>
                                <td class="border p-3"><?php echo $row['kiloGram']; ?> kg</td>
                                <td class="border p-3 font-bold text-green-600">R$ <?php echo number_format($row['price'], 2, ',', '.'); ?></td>
                                <td class="border p-3"><?php echo $row['dateBuy']; ?></td>
                                <td class="border p-3"><?php echo $row['dateComponentCreated']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>

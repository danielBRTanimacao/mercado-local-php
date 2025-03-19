<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include __DIR__ . '/../resources/render.php';
    
    $url = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $sale = intval(end($parts));

    $db = new SQLite3(__DIR__ . '/../sales.db');

    $stmt = $db->prepare("SELECT * FROM sales WHERE id = :id");
    $stmt->bindValue(':id', $sale, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $sale_data = $result->fetchArray(SQLITE3_ASSOC);

    renderHead("Produto " . $sale);
?>
<body class="flex h-screen bg-gray-100">
    <?php renderAside('sale');?>

    <main class="flex-1 p-10">
        <h2 class="text-2xl font-bold">Modifique uma venda</h2>

        <?php if ($sale_data): ?>
            <article class="flex flex-col md:flex-row gap-8 bg-white p-6 rounded-lg shadow-md">
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Detalhes do Produto</h3>
                    <p class="text-gray-600"><strong>Produto:</strong> <?php echo htmlspecialchars($sale_data['name']); ?></p>
                    <p class="text-gray-600"><strong>Quantidade:</strong> <?php echo htmlspecialchars($sale_data['quantity']); ?></p>
                    <p class="text-gray-600"><strong>Kilos:</strong> <?php echo htmlspecialchars($sale_data['kiloGram']); ?>Kg</p>
                    <p class="text-gray-600"><strong>Preço:</strong> R$ <?php echo number_format($sale_data['price'], 2, ',', '.'); ?></p>
                    <p class="text-gray-600"><strong>Data Venda:</strong> R$ <?php echo htmlspecialchars($sale_data['dateBuy']); ?></p>
                </div>

                <div class="flex-1 bg-gray-100 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Editar Produto</h3>
                    <form action="/models/update.php" method="post" class="space-y-4">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($sale_data['id']); ?>">
                        <div>
                            <label for="id_name" class="block text-sm font-medium text-gray-700">Nome do produto:</label>
                            <input type="text" name="name" id="id_name" value="<?php echo htmlspecialchars($sale_data['name']); ?>"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        </div>

                        <div>
                            <label for="id_quantity" class="block text-sm font-medium text-gray-700">Quantidade:</label>
                            <input type="number" name="quantity" id="id_quantity" value="<?php echo htmlspecialchars($sale_data['quantity']); ?>"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        </div>

                        <div>
                            <label for="id_price" class="block text-sm font-medium text-gray-700">Preço:</label>
                            <input type="text" name="price" id="id_price" value="<?php echo number_format($sale_data['price'], 2, ',', '.'); ?>"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        </div>

                        <div>
                            <label for="id_kiloGram" class="block text-sm font-medium text-gray-700">Kilos:</label>
                            <input type="text" name="kiloGram" id="id_kiloGram" value="<?php echo htmlspecialchars($sale_data['kiloGram']); ?>"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                Atualizar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </article>
        <?php else: ?>
            <p class="mt-2 text-red-600">Venda não encontrada para o ID <?php echo $sale; ?>.</p>
        <?php endif; ?>
    </main>
</body>
</html>

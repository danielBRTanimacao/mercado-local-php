<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include __DIR__ . '/../resources/render.php';
    include __DIR__ . '/../database/sales.php';
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
        <aside class="flex justify-between">
            <div>
                <button 
                    id="openModal" 
                    class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" 
                    type="button"
                >
                    Adicionar
                </button>
                <button
                    id="showDelete"
                    type="button"
                    class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                >
                    Remover
                </button>
            </div>
            <button 
                class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                id="id_filter"
            >
                Filtrar
            </button>
        </aside>
        <div class="pt-2 hidden container_filters">
            <form method="get" class="flex">
                <input 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    type="search" 
                    name="q" 
                    id="id_search"
                    placeholder="Digite nome da venda..."
                >
                <button 
                    type="submit"
                    class="bg-slate-800 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                >
                    &#128269;
                </button>
            </form>
            <aside class="flex">
                <div>
                    <h5 class="text-xl pt-2">Filtrar preço</h5>
                    <input type="radio" id="bigNChoose" name="filter_chosed" value="big_value">
                    <label for="bigNChoose">Maior preço</label><br>
                    <input type="radio" id="minusNChoose" name="filter_chosed" value="minus_value">
                    <label for="minusNChoose">Menor preço</label><br>
                </div>
                <div class="ms-5">
                    <h5 class="text-xl pt-2">Filtrar data</h5>
                    <input type="radio" id="bigDChoose" name="filter_chosed" value="big_date">
                    <label for="bigDChoose">Mais recente</label><br>
                    <input type="radio" id="minusDChoose" name="filter_chosed" value="minus_date">
                    <label for="minusDChoose">Mais antigo</label>
                </div>
            </aside>
        </div>

        <div class="mt-6 bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4">Lista de Vendas</h3>
            <div class="overflow-x-auto">
                <table class="w-full rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="border p-3 hidden" id="hiddeTd">Deletar</th>
                            <th class="border p-3">ID</th>
                            <th class="border p-3">Nome</th>
                            <th class="border p-3">Marca</th>
                            <th class="border p-3">Quantidade</th>
                            <th class="border p-3">KiloGram</th>
                            <th class="border p-3">Preço</th>
                            <th class="border p-3">Data de Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        <button 
                            type="button" 
                            class="hidden rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            id="confirmDelete"
                        >
                            CONFIRMAR
                        </button>
                        <div class="hidden selectAll py-2">
                            <input type="checkbox" name="checkAll" id="SelectAllCheckers">
                            <span>Selecionar todos</span>
                        </div>
                        <p class="error hidden p-1 text-red-600">
                            erro
                        </p>
                        <?php foreach ($sales as $row) { ?>
                            <tr class="border text-center bg-gray-100 hover:bg-gray-200">
                                <td class="border p-3 hidden" id="hiddeTd">
                                    <input type="checkbox" name="check" id="checkersDelete">
                                </td>
                                <td class="border p-3">
                                    <a data-id="<?php echo $row['id']; ?>" class="idSales text-blue-600 dark:text-blue-500 hover:underline" href="/public/sale.php/<?php echo $row['id']; ?>">
                                        <?php echo $row['id']; ?>
                                    </a>
                                </td>
                                <td class="border p-3"><?php echo $row['name']; ?></td>
                                <td class="border p-3"><?php echo $row['brand'] ? $row['brand'] : '<span class="text-gray-500 italic">Sem marca</span>'; ?></td>
                                <td class="border p-3"><?php echo $row['quantity']; ?></td>
                                <td class="border p-3"><?php echo $row['kiloGram']; ?> kg</td>
                                <td class="border p-3 font-bold text-green-600">R$ <?php echo number_format($row['price'], 2, ',', '.'); ?></td>
                                <td class="border p-3"><?php echo $row['dateBuy']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold">Adicionar venda</h2>
            <p class="mt-2 text-gray-600">Adicione as informações.</p>
            
            <form action="/models/create.php" method="post">
                <div class="mt-4">
                    <label for="id_name" class="block text-sm font-medium text-gray-700">Nome do Produto:</label>
                    <input type="text" name="name" id="id_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div class="mt-4">
                    <label for="id_quantity" class="block text-sm font-medium text-gray-700">Quantidade:</label>
                    <input type="number" name="quantity" id="id_quantity" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div class="mt-4">
                    <label for="id_brand" class="block text-sm font-medium text-gray-700">Marca:</label>
                    <input type="text" name="brand" id="id_brand" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mt-4">
                    <label for="id_kiloGram" class="block text-sm font-medium text-gray-700">Peso (Kg):</label>
                    <input type="number" step="0.01" name="kiloGram" id="id_kiloGram" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div class="mt-4">
                    <label for="id_price" class="block text-sm font-medium text-gray-700">Preço:</label>
                    <input type="number" step="0.01" name="price" id="id_price" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div class="mt-6 flex justify-between">
                    <button type="button" id="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Adicionar Venda</button>
                </div>
            </form>
        </div>
    </div>
   
    <script src="../public/js/index.js"></script>
    <script src="../public/js/filters.js"></script>
</body>
</html>

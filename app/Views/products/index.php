<?php
/** @var array $products */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <?= view('partials/navbar') ?>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Products Inventory</h1>
            <a href="<?= base_url('/products/new') ?>" class="bg-indigo-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-500 transition">+ Add Product</a>
        </div>
        <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-700/50 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="p-4">Image</th>
                        <th class="p-4">Name</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Stock</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700 text-sm">
                    <?php foreach($products as $p): ?>
                    <tr>
                        <td class="p-4">
                            <?php if(!empty($p['image'])): ?>
                                <img src="<?= base_url('uploads/' . $p['image']) ?>" class="w-10 h-10 object-cover rounded-lg">
                            <?php else: ?>
                                <span class="text-slate-500 italic">No image</span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 font-medium"><?= esc($p['name']) ?></td>
                        <td class="p-4">₱<?= number_format($p['price'], 2) ?></td>
                        <td class="p-4"><?= $p['stock_quantity'] ?></td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('/products/' . $p['id'] . '/edit') ?>" class="text-indigo-400 hover:text-indigo-300">Edit</a>
                            <form action="<?= base_url('/products/' . $p['id']) ?>" method="post" class="inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
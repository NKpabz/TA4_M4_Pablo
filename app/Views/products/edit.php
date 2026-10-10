<?php
/** @var array $product */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <?= view('partials/navbar') ?>
    <div class="max-w-lg mx-auto px-6 py-12">
        <div class="bg-slate-800 border border-slate-700 p-8 rounded-2xl shadow-xl">
            <h2 class="text-2xl font-bold mb-6">Edit Product</h2>
            <form action="<?= base_url('/products/' . $product['id']) ?>" method="post" enctype="multipart/form-data" class="space-y-4">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="old_image" value="<?= $product['image'] ?>">
                
                <div>
                    <label class="block text-slate-400 text-sm mb-1">Product Name</label>
                    <input type="text" name="name" value="<?= esc($product['name']) ?>" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-slate-400 text-sm mb-1">Price (₱)</label>
                    <input type="number" step="0.01" name="price" value="<?= esc($product['price']) ?>" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-slate-400 text-sm mb-1">Stock Quantity</label>
                    <input type="number" name="stock_quantity" value="<?= esc($product['stock_quantity']) ?>" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:border-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-slate-400 text-sm mb-1">Product Image (leave blank to keep current)</label>
                    <input type="file" name="image" class="w-full text-slate-400 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <a href="<?= base_url('/products') ?>" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg text-sm">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-sm font-semibold">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
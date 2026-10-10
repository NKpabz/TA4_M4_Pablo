<?php
/** @var array $sales */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales History</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <?= view('partials/navbar') ?>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Transaction History</h1>
            <a href="<?= base_url('/sales/new') ?>" class="bg-indigo-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-500 transition">+ Record New Sale</a>
        </div>
        <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-700/50 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="p-4">ID</th>
                        <th class="p-4">Product</th>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Sold By</th>
                        <th class="p-4">Qty</th>
                        <th class="p-4">Total Price</th>
                        <th class="p-4">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700 text-sm">
                    <?php foreach($sales as $s): ?>
                    <tr>
                        <td class="p-4">#<?= $s['id'] ?></td>
                        <td class="p-4 font-medium"><?= esc($s['product_name']) ?></td>
                        <td class="p-4 text-slate-300"><?= !empty($s['customer_name']) ? esc($s['customer_name']) : '<span class="italic text-slate-500">Walk-in</span>' ?></td>
                        <td class="p-4 text-slate-300"><?= esc($s['staff_name']) ?></td>
                        <td class="p-4"><?= $s['quantity'] ?></td>
                        <td class="p-4 font-semibold text-emerald-400">₱<?= number_format($s['total_price'], 2) ?></td>
                        <td class="p-4 text-slate-400 text-xs"><?= $s['created_at'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
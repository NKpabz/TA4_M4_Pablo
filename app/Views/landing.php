<?php
/** @var array|null */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - POS System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <?= view('partials/navbar') ?>
    
    <div class="max-w-6xl mx-auto px-6 py-12">
        <div class="bg-gradient-to-r from-indigo-900/40 to-slate-800 border border-slate-700 p-8 rounded-2xl shadow-xl mb-8">
            <h1 class="text-3xl font-bold mb-2">Welcome back, <?= esc(session()->get('full_name') ?? 'Admin') ?>!</h1>
            <p class="text-slate-400">Here is a quick overview of your Point of Sale system. Manage inventory, track customers, and log transactions seamlessly.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="<?= base_url('/products') ?>" class="bg-slate-800 border border-slate-700 p-6 rounded-xl hover:border-indigo-500 transition group">
                <h3 class="text-lg font-semibold text-indigo-400 mb-1 group-hover:text-indigo-300">Products Inventory</h3>
                <p class="text-slate-400 text-sm">Manage stock levels, prices, and product images.</p>
            </a>
            <a href="<?= base_url('/customers') ?>" class="bg-slate-800 border border-slate-700 p-6 rounded-xl hover:border-indigo-500 transition group">
                <h3 class="text-lg font-semibold text-indigo-400 mb-1 group-hover:text-indigo-300">Customers Directory</h3>
                <p class="text-slate-400 text-sm">View and manage registered customer details.</p>
            </a>
            <a href="<?= base_url('/sales/new') ?>" class="bg-slate-800 border border-slate-700 p-6 rounded-xl hover:border-indigo-500 transition group">
                <h3 class="text-lg font-semibold text-indigo-400 mb-1 group-hover:text-indigo-300">New Sale</h3>
                <p class="text-slate-400 text-sm">Process checkout and update inventory automatically.</p>
            </a>
        </div>
    </div>
</body>
</html>
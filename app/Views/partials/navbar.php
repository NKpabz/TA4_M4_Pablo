<?php
/** @var array|null */
?>
<nav class="bg-slate-800 border-b border-slate-700 px-6 py-4 flex justify-between items-center text-white">
    <div class="font-bold text-lg tracking-wider text-indigo-400">POS MIDTERM</div>
    <div class="space-x-6 text-sm flex items-center">
        <a href="<?= base_url('/') ?>" class="hover:text-indigo-400 transition">Dashboard</a>
        <a href="<?= base_url('/products') ?>" class="hover:text-indigo-400 transition">Products</a>
        <a href="<?= base_url('/customers') ?>" class="hover:text-indigo-400 transition">Customers</a>
        <a href="<?= base_url('/users') ?>" class="hover:text-indigo-400 transition">Staff</a>
        <a href="<?= base_url('/sales') ?>" class="hover:text-indigo-400 transition">Sales History</a>
        <a href="<?= base_url('/sales/new') ?>" class="bg-indigo-600 px-3 py-1.5 rounded-lg hover:bg-indigo-500 transition">Record Sale</a>
        <a href="<?= base_url('/about') ?>" class="hover:text-indigo-400 transition">About</a>
        <a href="<?= base_url('/logout') ?>" class="text-red-400 hover:text-red-300 transition">Logout</a>
    </div>
</nav>
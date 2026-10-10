<?php
/** @var array $users */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <?= view('partials/navbar') ?>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Staff Members</h1>
            <a href="<?= base_url('/users/new') ?>" class="bg-indigo-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-500 transition">+ Add Staff</a>
        </div>
        <div class="bg-slate-800 border border-slate-700 rounded-xl overflow-hidden shadow-lg">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-700/50 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="p-4">Avatar</th>
                        <th class="p-4">Username</th>
                        <th class="p-4">Full Name</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700 text-sm">
                    <?php foreach($users as $u): ?>
                    <tr>
                        <td class="p-4">
                            <?php if(!empty($u['avatar'])): ?>
                                <img src="<?= base_url('uploads/' . $u['avatar']) ?>" class="w-10 h-10 object-cover rounded-full">
                            <?php else: ?>
                                <div class="w-10 h-10 bg-indigo-500/20 text-indigo-400 rounded-full flex items-center justify-center font-bold">
                                    <?= strtoupper(substr($u['username'], 0, 1)) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 font-medium"><?= esc($u['username']) ?></td>
                        <td class="p-4 text-slate-300"><?= esc($u['full_name']) ?></td>
                        <td class="p-4 text-right space-x-3">
                            <a href="<?= base_url('/users/' . $u['id'] . '/edit') ?>" class="text-indigo-400 hover:text-indigo-300">Edit</a>
                            <form action="<?= base_url('/users/' . $u['id']) ?>" method="post" class="inline">
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
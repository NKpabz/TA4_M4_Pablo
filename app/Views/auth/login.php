<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - POS System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex items-center justify-center h-screen">
    <div class="bg-slate-800 p-8 rounded-2xl shadow-xl w-96 border border-slate-700">
        <h2 class="text-2xl font-bold text-white mb-6 text-center">POS System Login</h2>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-500/10 border border-red-500 text-red-400 p-3 rounded-lg mb-4 text-sm">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/login/action') ?>" method="post">
            <div class="mb-4">
                <label class="block text-slate-400 text-sm mb-2">Username</label>
                <input type="text" name="username" required class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-indigo-500">
            </div>
            <div class="mb-6">
                <label class="block text-slate-400 text-sm mb-2">Password</label>
                <input type="password" name="password" required class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2 rounded-lg transition duration-200">Sign In</button>
        </form>
    </div>
</body>
</html>
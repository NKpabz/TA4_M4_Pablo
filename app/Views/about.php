<?php
/** @var array|null */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About - POS System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <?= view('partials/navbar') ?>
    
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="bg-slate-800 border border-slate-700 p-8 rounded-2xl shadow-xl">
            <h1 class="text-2xl font-bold mb-4 text-indigo-400">About This Project</h1>
            <p class="text-slate-300 mb-4">This Full-Stack Point of Sale (POS) system is built using CodeIgniter 4, Tailwind CSS, and MySQL for your midterm requirements.</p>
            <div class="border-t border-slate-700 pt-4 mt-4">
                <h3 class="text-sm font-semibold text-slate-400 uppercase tracking-wider mb-2">Key Features</h3>
                <ul class="list-disc list-inside text-slate-300 space-y-1 text-sm">
                    <li>Secure user authentication with session handling</li>
                    <li>Complete CRUD operations for Products, Customers, and Staff</li>
                    <li>File uploads for product images and staff avatars</li>
                    <li>Sales transaction recording with automated stock deduction</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
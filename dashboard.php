<?php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

// Fetch user data
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

// Fetch applied jobs
$jobsStmt = $pdo->prepare("SELECT * FROM jobs WHERE user_id = ?");
$jobsStmt->execute([$userId]);
$appliedJobs = $jobsStmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Naukri Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow">
        <nav class="container mx-auto flex justify-between items-center p-4">
            <div class="flex items-center">
                <img src="https://images.pexels.com/photos/1181275/pexels-photo-1181275.jpeg" alt="Logo" class="h-10">
            </div>
            <div class="hidden md:flex space-x-4 items-center">
                <a href="index.html" class="text-gray-700">Home</a>
                <a href="jobs.html" class="text-gray-700">Jobs</a>
                <a href="companies.html" class="text-gray-700">Companies</a>
                <div class="relative group">
                    <button class="flex items-center space-x-1 text-gray-700">
                        <span><?php echo htmlspecialchars($user['name']); ?></span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 hidden group-hover:block">
                        <a href="dashboard.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="login.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
            <!-- Profile Card -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold">Profile</h2>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <p>Phone: <?php echo htmlspecialchars($user['phone']); ?></p>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Profile</button>
            </div>

            <!-- Applied Jobs -->
            <div class="bg-white p-6 rounded-lg shadow md:col-span-3">
                <h2 class="text-xl font-semibold">Applied Jobs</h2>
                <div class="space-y-4">
                    <?php if (count($appliedJobs) > 0): ?>
                        <?php foreach ($appliedJobs as $job): ?>
                            <div class="border-b pb-4">
                                <h3 class="font-medium"><?php echo htmlspecialchars($job['title']); ?></h3>
                                <p class="text-gray-600"><?php echo htmlspecialchars($job['company']); ?> • <?php echo htmlspecialchars($job['location']); ?></p>
                                <p class="text-gray-500 text-sm mt-1">Applied on: <?php echo htmlspecialchars($job['applied_on']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No jobs applied yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Naukri Clone. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
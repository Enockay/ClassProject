<?php
require './database/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $message = "Login successful! Welcome, " . htmlspecialchars($user['first_name']) . ".";
    } else {
        $message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow-lg p-4 flex items-center justify-between">
        <h1 class="text-xl font-bold">Welcome to Our Platform</h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="index.php" class="hover:underline">Home</a></li>
                <li><a href="#announcements" class="hover:underline">Announcements</a></li>
                <li><a href="#events" class="hover:underline">Upcoming Events</a></li>
            </ul>
        </nav>
    </header>

    <!-- Login Section -->
    <section class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h1 class="text-2xl font-bold text-center mb-6">Log In to Your Account</h1>
            <form method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" 
                           class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" 
                           class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           required>
                </div>
                <button type="submit" 
                        class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Log In
                </button>
            </form>
            <?php if ($message): ?>
                <div class="bg-red-100 text-red-700 p-2 rounded mt-4 text-center">
                    <?= htmlspecialchars($message) ?>
                </div>
                
            <?php endif; ?>
            <p class="mt-4 text-sm text-center text-gray-700">
                Don't have an account? <a href="Signup.php" class="text-blue-600 hover:underline">Sign up</a>
            </p>
        </div>
    </section>

    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; 2024 Your Platform Name. All rights reserved.</p>
    </footer>

</body>
</html>

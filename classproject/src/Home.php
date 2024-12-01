<?php
session_start();
require './database/db.php';

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="../output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-blue-600 text-white shadow-lg p-4 flex items-center justify-between">
        <h1 class="text-xl font-bold">Welcome to Our Platform</h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="#announcements" class="hover:underline">Announcements</a></li>
                <li><a href="#events" class="hover:underline">Upcoming Events</a></li>
                <li><a href="#search" class="hover:underline">Search</a></li>
                <li><a href="logout.php" class="hover:underline">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-gray-200 py-12">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-4">Empowering Education Through Technology</h2>
            <p class="text-lg text-gray-700">Stay updated with the latest announcements, events, and tools to help you succeed.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto p-4">
        <!-- Announcements Section -->
        <section id="announcements" class="my-8">
            <h3 class="text-2xl font-bold mb-4">Announcements</h3>
            <div class="bg-white shadow-md rounded-lg p-4">
                <?php
                $stmt = $pdo->query("SELECT title, description, date FROM announcements ORDER BY date DESC LIMIT 3");
                $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($announcements) {
                    foreach ($announcements as $announcement) {
                        echo "<div class='mb-4'><h4 class='text-xl font-semibold'>" . htmlspecialchars($announcement['title']) . "</h4>";
                        echo "<p class='text-gray-700'>" . htmlspecialchars($announcement['description']) . "</p>";
                        echo "<small class='text-gray-500'>Posted on: " . htmlspecialchars($announcement['date']) . "</small></div>";
                    }
                } else {
                    echo "<p>No announcements at this time.</p>";
                }
                ?>
            </div>
        </section>

        <!-- Upcoming Events Section -->
        <section id="events" class="my-8">
            <h3 class="text-2xl font-bold mb-4">Upcoming Events</h3>
            <div class="bg-white shadow-md rounded-lg p-4">
                <?php
                $stmt = $pdo->query("SELECT event_name, event_date, description FROM events ORDER BY event_date ASC LIMIT 3");
                $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($events) {
                    foreach ($events as $event) {
                        echo "<div class='mb-4'><h4 class='text-xl font-semibold'>" . htmlspecialchars($event['event_name']) . "</h4>";
                        echo "<p class='text-gray-700'>" . htmlspecialchars($event['description']) . "</p>";
                        echo "<small class='text-gray-500'>Date: " . htmlspecialchars($event['event_date']) . "</small></div>";
                    }
                } else {
                    echo "<p>No upcoming events at this time.</p>";
                }
                ?>
            </div>
        </section>

        <!-- Search Bar -->
        <section id="search" class="my-8">
            <h3 class="text-2xl font-bold mb-4">Search</h3>
            <form action="search.php" method="GET" class="flex">
                <input type="text" name="query" placeholder="Search..." class="flex-grow p-2 border border-gray-300 rounded-l-lg">
                <button type="submit" class="bg-blue-600 text-white px-4 rounded-r-lg">Search</button>
            </form>
        </section>
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        <p>&copy; 2024 Your Platform Name. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
require "./header.php";
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
    <header class="bg-gray-900 text-white shadow-lg p-4 fixed top-0 w-full">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo and Branding -->
            <div class="flex items-center space-x-4">
                <img src="./assets/classpic.png" alt="Class Logo" class="h-10 w-10 rounded-full">
                <h1 class="text-2xl font-bold cursor-pointer">Computer Science Class</h1>
            </div>
            <!-- Navigation Menu -->
            <nav class="hidden md:flex space-x-6">
                <a href="./dashboard.php" class="text-white hover:text-blue-400 transition">Dashboard</a>
                <a href="#announcements" class="text-white hover:text-blue-400 transition">Announcements</a>
                <a href="#events" class="text-white hover:text-blue-400 transition">Upcoming Events</a>
                <a href="#search" class="text-white hover:text-blue-400 transition">Search</a>
            </nav>
            <!-- User Actions -->
            <div class="relative">
                <button id="button" class="button flex items-center space-x-2 focus:outline-none">
                    <img src="./assets/user.png" alt="User image" class="h-8 w-8 rounded-full">
                    <span>Hi, <?= htmlspecialchars($user['first_name']) ?>!</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="menu" class="hidden absolute right-0 mt-2 bg-white text-gray-900 shadow-lg rounded-lg w-48">
                    <a href="#profile" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a href="#settings" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                    <a href="./Login.php" class="block px-4 py-2 text-red-600 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
        <!-- Mobile Navigation -->
        <nav id="mobile-nav" class="flex md:hidden mt-4 space-x-4">
            <a href="#dashboard" class="text-white hover:text-blue-400 transition">Dashboard</a>
            <a href="#announcements" class="text-white hover:text-blue-400 transition">Announcements</a>
            <a href="#events" class="text-white hover:text-blue-400 transition">Upcoming Events</a>
            <a href="#search" class="text-white hover:text-blue-400 transition">Search</a>
        </nav>
    </header>


    <section class="bg-gradient-to-r from-blue-600 via-blue-800 to-blue-700 text-white py-24">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 text-center">
            <!-- Title -->
            <h1 class="text-4xl sm:text-5xl font-extrabold  animate-pulse leading-tight mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-indigo-400">
                Empowering Education Through Technology
            </h1>

            <!-- Subtitle -->
            <p class="text-lg sm:text-xl text-blue-200 mb-8 max-w-3xl mx-auto">
                Stay ahead with cutting-edge tools, resources, and events tailored to support your academic and career aspirations in the ever-evolving world of Computer Science.
            </p>

            <!-- Call-to-Action Button -->
            <a href="#learn-more" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white py-3 px-8 rounded-lg text-xl font-semibold transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:shadow-lg">
                Explore More
            </a>
        </div>
    </section>

    <!-- Search Bar -->
    <section id="search" class="my-4">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-xl font-bold mb-2">Search</h3>
            <form action="search.php" method="GET" class="flex">
                <input type="text" name="query" placeholder="Search..." class="flex-grow p-2 border border-gray-300 rounded-l-lg">
                <button type="submit" class="bg-blue-600 text-white px-4 rounded-r-lg">Search</button>
            </form>
        </div>
    </section>

    <!-- Dashboard Summary -->
    <section id="dashboard" class="py-8 bg-gray-100">
        <div class="max-w-6xl mx-auto">
            <h3
                class="text-3xl font-bold mb-4 text-gray-800 transition-transform transform hover:scale-105"
                data-aos="fade-up">
                Dashboard
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div
                    class="bg-white shadow-lg p-4 rounded-lg hover:shadow-xl transition-shadow duration-300 transform hover:scale-105"
                    data-aos="fade-right"
                    data-aos-delay="100">
                    <h4 class="text-xl font-semibold mb-2 text-gray-900">Active Announcements</h4>
                    <p class="text-gray-700">Stay informed with the latest updates from our team.</p>
                    <a href="#announcements" class="text-blue-600 hover:underline mt-2 block">View Announcements</a>
                </div>
                <div
                    class="bg-white shadow-lg p-4 rounded-lg hover:shadow-xl transition-shadow duration-300 transform hover:scale-105"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <h4 class="text-xl font-semibold mb-2 text-gray-900">Upcoming Events</h4>
                    <p class="text-gray-700">Discover and participate in events happening soon.</p>
                    <a href="#events" class="text-blue-600 hover:underline mt-2 block">View Events</a>
                </div>
                <div
                    class="bg-white shadow-lg p-4 rounded-lg hover:shadow-xl transition-shadow duration-300 transform hover:scale-105"
                    data-aos="fade-left"
                    data-aos-delay="300">
                    <h4 class="text-xl font-semibold mb-2 text-gray-900">Search Resources</h4>
                    <p class="text-gray-700">Find articles, documents, or information quickly.</p>
                    <a href="#search" class="text-blue-600 hover:underline mt-2 block">Start Searching</a>
                </div>
            </div>
        </div>
    </section>


    <section id="class-calendar" class="my-6 bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 text-center">Class Calendar</h2>

            <!-- Calendar View -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Calendar Display -->
                    <div>
                        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
                            <h3 class="text-2xl font-semibold mb-4">Upcoming Events</h3>
                            <ul class="space-y-4">
                                <?php
                                $stmt = $pdo->query("SELECT event_name, event_date, description FROM events ORDER BY event_date ASC LIMIT 5");
                                $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if ($events) {
                                    foreach ($events as $event) {
                                        echo "<li class='p-4 bg-blue-100 rounded-lg'>";
                                        echo "<h4 class='text-lg font-bold text-blue-700'>" . htmlspecialchars($event['title']) . "</h4>";
                                        echo "<p class='text-gray-600'>" . htmlspecialchars($event['description']) . "</p>";
                                        echo "<small class='text-gray-500'>Date: " . htmlspecialchars($event['event_date']) . "</small>";
                                        echo "</li>";
                                    }
                                } else {
                                    echo "<p class='text-gray-600'>No upcoming events at this time.</p>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Calendar View -->
                    <div class="bg-gray-50 p-4 rounded-lg shadow-md">
                        <h3 class="text-2xl font-semibold mb-4">Calendar View</h3>
                        <iframe src="https://calendar.google.com/calendar/embed?src=your_calendar_id_here"
                            style="border: 0"
                            class="w-full h-96 rounded-lg"
                            frameborder="0"
                            scrolling="no">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Notifications Section -->
            <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4">Event Notifications</h3>
                <p class="text-gray-700">Stay updated on upcoming events and deadlines with notifications. Subscribe for reminders via email or SMS!</p>
                <form action="subscribe.php" method="POST" class="mt-4 flex space-x-4">
                    <input type="email" name="email" placeholder="Enter your email"
                        class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>


    <section id="announcements" class="my-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-bold text-gray-800 mb-8 text-center">
                Latest Announcements
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $stmt = $pdo->query("SELECT title, description, date FROM announcements ORDER BY date DESC LIMIT 6");
                $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($announcements) {
                    foreach ($announcements as $announcement) {
                        echo "<div class='bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300'>";
                        echo "<h4 class='text-xl font-semibold text-blue-600 mb-2'>" . htmlspecialchars($announcement['title']) . "</h4>";
                        echo "<p class='text-gray-700 leading-relaxed mb-4'>" . htmlspecialchars($announcement['description']) . "</p>";
                        echo "<small class='text-gray-500 block'>Posted on: " . htmlspecialchars($announcement['date']) . "</small>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='text-gray-600 text-center col-span-full'>No announcements at this time.</p>";
                }
                ?>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6 mt-8">
        <div class="container mx-auto px-4">
            <!-- Branding -->
            <div class="mb-4">
                <img src="./assets/classpic.png" alt="Platform Logo" class="h-12 mx-auto">
            </div>

            <!-- Navigation Links -->
            <div class="mb-4">
                <a href="#" class="text-gray-400 hover:text-white px-4">Home</a>
                <a href="#" class="text-gray-400 hover:text-white px-4">About Us</a>
                <a href="#" class="text-gray-400 hover:text-white px-4">Contact</a>
                <a href="#" class="text-gray-400 hover:text-white px-4">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white px-4">Terms of Service</a>
            </div>

            <!-- Social Media Icons -->
            <div class="mb-4">
                <a href="#" class="text-gray-400 hover:text-white px-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-400 hover:text-white px-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white px-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-gray-400 hover:text-white px-3"><i class="fab fa-instagram"></i></a>
            </div>

            <!-- Copyright Notice -->
            <p class="text-sm text-gray-400">&copy; 2024 Computer Science Class. All rights reserved.</p>
        </div>
    </footer>
<script>
    const button = document.getElementById("button");
    console.log(button);
    button.addEventListener("click",() =>{
      const menu = document.getElementById("menu");
      menu.classList.toggle("hidden");
    })
    </script>
</body>

</html>
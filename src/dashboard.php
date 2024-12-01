<?php
require "./header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="../output.css" rel="stylesheet">
    <style>
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-3 flex justify-between items-center fixed top-0 w-full z-10 shadow-lg">
        <!-- Logo and Title -->
        <div class="flex items-center space-x-3">
            <div class="rounded-full bg-white p-2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 7v-6.4a1 1 0 01.553-.894l6.197-3.1a1 1 0 010 1.788l-6.197 3.1A1 1 0 0112 16.6V21z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-extrabold">Student Portal</h1>
        </div>

        <!-- Mobile Menu Toggle -->
        <button id="menu-toggle" class="md:hidden flex items-center text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Full Header Content -->
        <div id="menu" class="hidden md:flex md:items-center md:space-x-6 md:relative md:flex-grow md:max-w-md">
            <!-- Search Bar -->
            <div class="flex-grow max-w-md mx-4">
                <div class="relative">
                    <input type="text" class="w-full px-4 py-2 rounded-lg text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Search..." />
                    <button class="absolute right-2 top-2 bg-indigo-600 text-white p-1 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6a4 4 0 110 8 4 4 0 010-8zm0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Notification Icon -->
            <button class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-yellow-300 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a2 2 0 10-4 0v1.083A6.002 6.002 0 004 11v3.159c0 .417-.156.823-.437 1.142L2 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">3</span>
            </button>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button class="flex items-center space-x-2 hover:text-yellow-300 transition">
                    <img src="./assets/user.png" alt="Profile" class="w-8 h-8 rounded-full" />
                    <span class="text-sm font-medium"><?= htmlspecialchars($user['first_name']) ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg py-2 hidden group-hover:block">
                    <a href="#profile" class="block px-4 py-2 hover:bg-indigo-100">Profile</a>
                    <a href="#settings" class="block px-4 py-2 hover:bg-indigo-100">Settings</a>
                    <a href="#logout" class="block px-4 py-2 hover:bg-indigo-100">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <script>
        // Toggle menu for small screens
        document.getElementById('menu-toggle').addEventListener('click', () => {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>



    <!-- Main Container -->
    <div class="flex flex-col md:flex-row pt-16">
        <!-- Sidebar -->
        <!-- Sidebar Navigation -->
        <nav class="bg-gradient-to-r from-cyan-950 to-cyan-700 text-white w-full md:w-1/6 h-screen p-6">
            <ul class="space-y-6">
                <li>
                    <a href="#overview" data-content="default.php" class="sidebar-link flex items-center text-lg font-semibold hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M12 2v20M2 12h20" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#assignments" data-content="assignment.php" class="sidebar-link flex items-center text-lg hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.89 1.99 1.99 1.99H19c1.1 0 1.99-.89 1.99-1.99L21 5c0-1.1-.89-2-1.99-2zM12 7v10M9 10h6" />
                        </svg>
                        Assignments
                    </a>
                </li>
                <li>
                    <a href="#grades" data-content="grade.php" class="sidebar-link flex items-center text-lg hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M21 12l-10 10-5-5M4 12l5-5 5 5" />
                        </svg>
                        Grades
                    </a>
                </li>
                <li>
                    <a href="#courses" data-content="courses.php" class="sidebar-link flex items-center text-lg hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M3 8l7 7 7-7" />
                        </svg>
                        Courses
                    </a>
                </li>
                <li>
                    <a href="#profile" data-content="profile.php" class="sidebar-link flex items-center text-lg hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#calendar" data-content="calendar.php" class="sidebar-link flex items-center text-lg hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M3 10h18M8 3v3M16 3v3M4 8h16v13H4V8z" />
                        </svg>
                        Calendar
                    </a>
                </li>
                <li>
                    <a href="#settings" data-content="settings.php" class="sidebar-link flex items-center text-lg hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M12 8v4M12 16v1M8 12h4M12 12h4M5 3v1M5 6v1M5 9v1M5 12v1M5 15v1M5 18v1M19 3v1M19 6v1M19 9v1M19 12v1M19 15v1M19 18v1" />
                        </svg>
                        Settings
                    </a>
                </li>
                <li>
                    <a href="#help" data-content="help.php" class="sidebar-link flex items-center text-lg hover:text-indigo-200 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M12 6v6m0 0H8m4 0h4M12 18h0a6 6 0 1 1 0-12a6 6 0 0 1 0 12z" />
                        </svg>
                        Help
                    </a>
                </li>
                <li>
                <a href="./Home.php" class="text-sm font-semibold bg-red-500 hover:bg-red-600 transition rounded-lg px-4 py-2 text-white">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>



        <!-- Main Content -->
        <main id="main-content" class="flex-1 p-6 max-h-screen overflow-y-auto">
            <h2 class="text-2xl font-bold mb-4">Overview</h2>


            <!-- Assignments Section -->
            <section class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-700 mb-4">Assignments</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-lg rounded-lg border border-gray-200">
                        <thead class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Deadline</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            $query = "SELECT title, deadline, status, id FROM assignments WHERE user_id = :user_id";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindValue(':user_id', $user['id'], PDO::PARAM_INT);
                            $stmt->execute();

                            $assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($assignments) > 0) {
                                foreach ($assignments as $row) {
                                    echo "<tr class='hover:bg-gray-50 transition'>
                                <td class='px-6 py-4 text-sm text-gray-800 font-medium'>" . htmlspecialchars($row['title']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['deadline']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>
                                    <span class='px-2 py-1 text-xs font-semibold rounded-full " .
                                        (strtolower($row['status']) == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800') .
                                        "'>" . htmlspecialchars($row['status']) . "</span>
                                </td>
                                <td class='px-6 py-4 text-sm'>
                                    <a href='./edit_assignment.php?id=" . htmlspecialchars($row['id']) . "' class='text-blue-600 hover:underline mr-2'>Edit</a>
                                    <a href='./delete_assignment.php?id=" . htmlspecialchars($row['id']) . "' class='text-red-600 hover:underline'>Delete</a>
                                </td>
                              </tr>";
                                }
                            } else {
                                echo "<tr>
                            <td colspan='4' class='px-6 py-4 text-center text-gray-500'>
                                No assignments available.
                            </td>
                          </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>


            <!-- Grades Section -->
            <section class="mb-8">
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Grades</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-lg rounded-lg border border-gray-200">
                        <thead class="bg-gradient-to-r from-green-500 to-green-700 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">User ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Course ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Marks Awarded</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Total Marks</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Feedback</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Date Assessed</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            $query = "SELECT user_id, course_id, marks_awarded, total_marks, feedback, date_assessed FROM grades WHERE user_id = :user_id";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindValue(':user_id', $user['id'], PDO::PARAM_INT);
                            $stmt->execute();

                            $grades = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($grades) > 0) {
                                foreach ($grades as $row) {
                                    echo "<tr class='hover:bg-gray-100 transition'>
                                <td class='px-6 py-4 text-sm text-gray-800 font-medium'>" . htmlspecialchars($row['user_id']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['course_id']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['marks_awarded']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['total_marks']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['feedback']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['date_assessed']) . "</td>
                              </tr>";
                                }
                            } else {
                                echo "<tr>
                            <td colspan='6' class='px-6 py-4 text-center text-gray-500'>
                                No grades available for this user.
                            </td>
                          </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>


            <!-- Courses Section -->
            <section class="mb-8">
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Courses</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-lg rounded-lg border border-gray-200">
                        <thead class="bg-gradient-to-r from-blue-500 to-blue-700 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Course</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Unit Code</th>
                                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Lecturer</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            $query = "SELECT course_name, unit_code, lecturer_name FROM courses WHERE user_id = :user_id";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindValue(':user_id', $user['id'], PDO::PARAM_INT);
                            $stmt->execute();

                            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($courses) > 0) {
                                foreach ($courses as $row) {
                                    echo "<tr class='hover:bg-gray-100 transition'>
                                <td class='px-6 py-4 text-sm text-gray-800 font-medium'>" . htmlspecialchars($row['course_name']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['unit_code']) . "</td>
                                <td class='px-6 py-4 text-sm text-gray-600'>" . htmlspecialchars($row['lecturer_name']) . "</td>
                              </tr>";
                                }
                            } else {
                                echo "<tr>
                            <td colspan='3' class='px-6 py-4 text-center text-gray-500'>
                                No courses found for this user.
                            </td>
                          </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-3">
        <div class="container mx-auto px-4">
            <p class="text-sm text-gray-400">&copy; 2024 Student Dashboard. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll(".sidebar-link");
            const mainContent = document.getElementById("main-content");

            links.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();

                    const url = this.getAttribute("data-content");
                    if (!url) return;

                    // Show loading spinner
                    mainContent.innerHTML = '<div class="loader mx-auto my-10"></div>';

                    // Fetch new content
                    fetch(url)
                        .then(response => {
                            if (!response.ok) throw new Error("Failed to fetch content");
                            return response.text();
                        })
                        .then(html => {
                            mainContent.innerHTML = html;
                        })
                        .catch(err => {
                            mainContent.innerHTML = '<p class="text-red-500">Error loading content. Please try again later.</p>';
                        });
                });
            });
        });
    </script>
</body>

</html>
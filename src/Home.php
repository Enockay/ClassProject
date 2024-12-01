<?php
require "./header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Class</title>
    <link href="../output.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">
    <!-- Header -->
    <header class="bg-gray-900 text-white shadow-lg p-4 fixed top-0 w-full z-50 border-b-1 border-white">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo and Branding -->
            <div class="flex items-center space-x-4">
                <img src="./assets/classpic.png" alt="Class Logo" class="h-12 w-12 rounded-full">
                <h1 class="text-2xl font-bold">Computer Science Class</h1>
            </div>
            <!-- Navigation Menu -->
            <nav class="hidden md:flex space-x-4">
                <a href="./dashboard.php" class="text-white hover:text-blue-400 transition">student Portal</a>
                <a href="#about" class="text-white hover:text-blue-400 transition">About Us</a>
                <a href="#announcements" class="text-white hover:text-blue-400 transition">Announcements</a>
                <a href="#events" class="text-white hover:text-blue-400 transition">Events</a>
                <a href="#resources" class="text-white hover:text-blue-400 transition">Resources</a>
                <a href="#testimonials" class="text-white hover:text-blue-400 transition">Testimonials</a>
            </nav>
            <!-- User Actions -->
            <div class="relative">
                <button id="user-menu" class="flex items-center space-x-2 focus:outline-none">
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
    </header>

    <!-- Hero Section -->
    <section class="bg-gray-900 text-white py-36 relative overflow-hidden" style="background-image: url('./assets/abstract1.jpg'); background-color: #000;">
        <div class="absolute inset-0">
            <!-- Background with subtle abstract pattern -->
            <div class="bg-cover bg-center opacity-30">
            </div>

        </div>
        <div class="max-w-7xl mx-auto px-6 sm:px-8 text-center relative z-10">
            <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-6 animate-fade-in-up">
                Welcome to the Future of Learning
            </h1>
            <p class="text-lg lg:text-xl mb-8 max-w-3xl mx-auto animate-fade-in">
                Empower yourself with cutting-edge knowledge in technology, guided by experts and fueled by collaborative learning. Let’s shape the future together!
            </p>
        </div>
    </section>
    <div class="mt-4 max-w-7xl mx-auto px-6 sm:px-8 text-center relative z-10  py-9 rounded-xl">
        <form action="#" method="GET" class="relative">
            <input
                type="text"
                name="search"
                placeholder="Search for topics, notes, or updates..."
                class="w-full px-4 py-3 pl-10 text-gray-700 bg-white rounded-lg shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none border border-gray-300 animate-pulse">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="absolute left-3 top-3.5 w-5 h-5 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-4.35-4.35m1.2-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <button
                type="submit"
                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded-md shadow-md">
                Search
            </button>
        </form>
    </div>

    <!-- Announcements Section -->
    <section id="announcements" class="py-10 bg-gradient-to-r from-blue-50 via-white to-blue-50">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <h2 class="text-2xl font-extrabold text-blue-700 mb-8 text-center">🚀 Latest Announcements</h2>
            <div class="relative bg-white shadow-xl rounded-lg overflow-hidden">
                <!-- Carousel Wrapper -->
                <div id="announcementCarousel" class="overflow-hidden rounded-lg shadow-lg bg-gray-50 p-6">
                    <!-- Carousel Slides -->
                    <div class="flex transition-transform duration-700" style="width: 10000%; transform: translateX(0%);">
                        <?php
                        $stmt = $pdo->query("SELECT title, description, date FROM announcements ORDER BY date DESC LIMIT 6");
                        $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($announcements) {
                            foreach ($announcements as $announcement) {
                                echo "
                                <div class='w-full flex-none px-6 py-8' style='flex-basis: 100%;'>
                                    <h4 class='text-xl font-semibold text-blue-600 mb-3'>
                                        " . htmlspecialchars($announcement['title']) . "
                                    </h4>
                                    <p class='text-gray-700 leading-relaxed mb-4'>
                                        " . htmlspecialchars($announcement['description']) . "
                                    </p>
                                    <div class='text-sm text-gray-500'>
                                        <span class='inline-block bg-blue-100 text-blue-600 px-2 py-1 rounded'>
                                            " . date('F j, Y', strtotime(htmlspecialchars($announcement['date']))) . "
                                        </span>
                                    </div>
                                </div>";
                            }
                        } else {
                            echo "
                            <div class='w-full flex-none px-6 py-8 text-center' style='flex-basis: 100%;'>
                                <p class='text-gray-600 text-lg'>
                                    No announcements at this time. Check back later!
                                </p>
                            </div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button id="prevButton" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white rounded-full p-2 shadow-lg hover:bg-blue-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextButton" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white rounded-full p-2 shadow-lg hover:bg-blue-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-16 px-8 border-2 border-black rounded-2xl">
        <div class="container mx-auto flex flex-col lg:flex-row items-center lg:space-x-8">
            <!-- Left Side: Image -->
            <div class="w-full lg:w-1/2">
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <img src="./assets/why.jpg" alt="Why Computer Science" class="object-cover w-full h-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <h2 class="text-white text-3xl font-bold text-center animate-pulse">
                            Why Computer Science?
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Right Side: Description -->
            <div class="w-full lg:w-1/2 mt-8 lg:mt-0">
                <div class="bg-white p-8 rounded-lg shadow-md transform transition-transform duration-500 hover:scale-105">
                    <h2 class="text-2xl font-bold mb-4 text-blue-600">Why Choose Computer Science?</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Computer Science is the backbone of modern innovation and technological advancements. From artificial intelligence to web development, it empowers individuals to solve real-world problems through technology.
                    </p>
                    <ul class="list-disc list-inside text-gray-700 mb-4">
                        <li><strong>Analytical Thinking:</strong> Enhance problem-solving skills.</li>
                        <li><strong>Programming Mastery:</strong> Learn coding and software development.</li>
                        <li><strong>Innovation:</strong> Build innovative solutions for global challenges.</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Graduates in Computer Science gain skills in coding, algorithms, data structures, artificial intelligence, and more—making them valuable assets in industries like healthcare, finance, and entertainment.
                    </p>
                    <a href="#learn-more" class="bg-blue-500 text-white px-6 py-2 rounded-full shadow hover:bg-blue-600 transition-colors">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-10">
        <div class="max-w-4xl mx-auto text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Class Gallery</h2>
            <p class="text-gray-600 mt-2 text-lg">Explore moments from our class activities and events.</p>
        </div>

        <!-- Carousel Container -->
        <div class="relative max-w-full mx-auto overflow-hidden rounded-lg shadow-lg">
            <!-- Carousel Wrapper -->
            <div id="carousel" class="carousel flex transition-transform duration-700 ease-in-out w-full">
                <!-- Slide 1 -->
                <div class="carousel-item flex-none w-full h-[60vh] bg-cover bg-center" style="background-image: url('./assets/learning.jpg');">
                    <div class="absolute bottom-0 bg-black bg-opacity-50 text-white py-3 px-6 w-full text-center font-semibold">
                        Activity 1: Hands-On Learning
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item flex-none w-full h-[60vh] bg-cover bg-center" style="background-image: url('./assets/group.jpg');">
                    <div class="absolute bottom-0 bg-black bg-opacity-50 text-white py-3 px-6 w-full text-center font-semibold">
                        Activity 2: Group Projects
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item flex-none w-full h-[60vh] bg-cover bg-center" style="background-image: url('./assets/codecollaboration.jpeg');">
                    <div class="absolute bottom-0 bg-black bg-opacity-50 text-white py-3 px-6 w-full text-center font-semibold">
                        Activity 3: Code Collaboration
                    </div>
                </div>
                <!-- Add more slides as needed -->
            </div>

            <!-- Navigation Buttons -->
            <button id="prev" class="absolute top-1/2 left-6 transform -translate-y-1/2 bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-700 z-10">
                &lt;
            </button>
            <button id="next" class="absolute top-1/2 right-6 transform -translate-y-1/2 bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-700 z-10">
                &gt;
            </button>
        </div>
    </section>


    <section id="resources" class="py-10 bg-yellow-100">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-4">Class Resources</h2>
            <p class="text-lg text-gray-700 text-center leading-relaxed mb-12">
                Explore the vast array of resources we provide to ensure an enriched and effective learning environment.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Fetch resources from the database
                $stmt = $pdo->query("SELECT title, description, icon FROM resources ORDER BY id ASC");
                $resources = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($resources) {
                    foreach ($resources as $resource) {
                        echo "
                        <div class='bg-white shadow-2xl rounded-lg p-4 hover:shadow-3xl transition-shadow'>
                            <div class='text-4xl text-blue-600 mb-4 text-center'>
                                " . htmlspecialchars($resource['icon']) . "
                            </div>
                            <h3 class='text-xl font-semibold text-gray-900 mb-3 text-center'>
                                " . htmlspecialchars($resource['title']) . "
                            </h3>
                            <p class='text-gray-700 leading-relaxed text-center'>
                                " . htmlspecialchars($resource['description']) . "
                            </p>
                        </div>";
                    }
                } else {
                    echo "
                    <div class='text-center col-span-full'>
                        <p class='text-gray-600 text-lg'>
                            No resources available at this time. Please check back later!
                        </p>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6">About the Computer Science Program at Chuka University</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-8">
                At Chuka University, the Computer Science Department strives to produce forward-thinking, innovative, and skilled graduates ready to tackle the challenges of a rapidly advancing tech-driven world. Our programs focus on merging theory with practical application, fostering creativity, and nurturing collaboration. With a comprehensive curriculum, state-of-the-art resources, and a vibrant community, Chuka University is the ideal environment for aspiring tech leaders.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold mb-4">Departments and Specializations</h3>
                    <p class="text-gray-600">
                        Our department offers a variety of specializations to suit diverse career aspirations, including:
                    <ul class="list-disc list-inside text-left mt-2">
                        <li>Software Development</li>
                        <li>Artificial Intelligence and Machine Learning</li>
                        <li>Cybersecurity</li>
                        <li>Data Science and Big Data Analytics</li>
                        <li>Networks and Cloud Computing</li>
                    </ul>
                    </p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold mb-4">Experienced Faculty</h3>
                    <p class="text-gray-600">
                        Learn from an exceptional team of educators and industry professionals. Our faculty members hold advanced degrees and bring years of experience in cutting-edge research and real-world tech applications.
                    </p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold mb-4">Modern Learning Resources</h3>
                    <p class="text-gray-600">
                        We provide access to fully equipped computer labs, specialized software, and a digital library of technical resources. Students are also exposed to hands-on training through workshops, hackathons, and industry internships.
                    </p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold mb-4">Industry Collaboration</h3>
                    <p class="text-gray-600">
                        Our strong ties with industry partners ensure students benefit from guest lectures, mentorship programs, and job placement opportunities. Companies regularly recruit our students for internships and full-time roles.
                    </p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold mb-4">Research and Innovation</h3>
                    <p class="text-gray-600">
                        Engage in pioneering research projects and innovative ventures through departmental initiatives and research centers. Students are encouraged to develop solutions to real-world problems using technology.
                    </p>
                </div>
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold mb-4">Supportive Community</h3>
                    <p class="text-gray-600">
                        Join a thriving community of students, alumni, and faculty dedicated to technological excellence. Our mentorship programs and collaborative projects help build meaningful relationships and professional networks.
                    </p>
                </div>
            </div>
            <div class="mt-12">
                <a href="#programs" class="inline-block bg-blue-600 text-white text-lg font-medium px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition">
                    Explore Our Programs
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900">What Our Students Say</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-8">
                Hear from our students and alumni about their experiences in the Computer Science class.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg p-6 rounded-lg">
                    <p class="text-gray-600 italic">"This class gave me the tools and confidence to land my dream job in tech!"</p>
                    <div class="text-right mt-4">
                        <span class="text-blue-600 font-bold">- Alex Johnson</span>
                    </div>
                </div>
                <div class="bg-white shadow-lg p-6 rounded-lg">
                    <p class="text-gray-600 italic">"The collaborative environment and expert guidance were invaluable."</p>
                    <div class="text-right mt-4">
                        <span class="text-blue-600 font-bold">- Emily Davis</span>
                    </div>
                </div>
                <div class="bg-white shadow-lg p-6 rounded-lg">
                    <p class="text-gray-600 italic">"I loved the hands-on approach and real-world projects!"</p>
                    <div class="text-right mt-4">
                        <span class="text-blue-600 font-bold">- Michael Lee</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const carousel = document.querySelector('.carousel');
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        let offset = 0;

        next.addEventListener('click', () => {
            offset = (offset + 1) % carousel.children.length;
            carousel.style.transform = `translateX(-${offset * 100}%)`;
        });

        prev.addEventListener('click', () => {
            offset = (offset - 1 + carousel.children.length) % carousel.children.length;
            carousel.style.transform = `translateX(-${offset * 100}%)`;
        });

        const carousel2 = document.getElementById('announcementCarousel').children[0];
        const slides = carousel2.children.length;
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        let currentSlide = 0;

        function updateCarousel() {
            const offset = -(currentSlide * 100) + '%';
            carousel2.style.transform = `translateX(${offset})`;
        }

        prevButton.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + slides) % slides;
            updateCarousel();
        });

        nextButton.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % slides;
            updateCarousel();
        });

        // Auto-slide every 5 seconds
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides;
            updateCarousel();
        }, 5000);

        // Carousel Variables
        const carousel3 = document.getElementById('carousel');
        const slides3 = carousel3.children.length;
        const prev3 = document.getElementById('prev');
        const next3 = document.getElementById('next');
        let currentSlide3 = 0;

        // Update Carousel Position
        function updateCarousel() {
            const offset = -(currentSlide3 * 100) + '%';
            carousel3.style.transform = `translateX(${offset})`;
        }

        // Previous Button Click
        prev3.addEventListener('click', () => {
            currentSlide3 = (currentSlide3 - 1 + slides3) % slides3;
            updateCarousel();
        });

        // Next Button Click
        next3.addEventListener('click', () => {
            currentSlide = (currentSlide3 + 1) % slides3;
            updateCarousel();
        });

        // Auto-slide every 5 seconds
        setInterval(() => {
            currentSlide3 = (currentSlide3 + 1) % slides3;
            updateCarousel();
        }, 5000);
    </script>

</body>

</html>
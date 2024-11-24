# Welcome to the Class Project!

This project is a PHP-based web application designed to manage class events, announcements, and student profiles. The project is built with Tailwind CSS for styling and utilizes a MySQL database for storing data. This README provides all the necessary steps and details to get started, set up the project, and understand its structure.

---

## Features

### Class Calendar
- Displays upcoming events and deadlines.
- Calendar view integration.
- Allows users to subscribe to notifications (email or SMS).

### Student Profiles
- Students can create profiles with details like name, profile picture, and contact information.
- Visual progress tracking for assignments and modules.

### Announcements
- Displays class announcements dynamically from the database.

### Notifications
- Sends reminders for upcoming events.

---

## Requirements

### Environment
- PHP >= 7.4
- PDO Extension (for database connection)
- Composer (for managing PHP dependencies)
- Node.js and npm (for Tailwind CSS)

### Database
- MySQL

### Server
- Localhost (port 3000)

---

## Installation and Setup

### 1. Clone the Repository

```bash
git clone https://github.com/your-repository/class-project.git
cd class-project

2. Install PHP Dependencies
Run the following command to install required PHP packages:

composer install
3. Install Tailwind CSS and Build Assets
Make sure Tailwind CSS is installed. Then build the CSS files:

npm install
npm run build:css
4. Configure the Environment
Copy the .env.example file and update the database configuration:

bash
Copy code
cp .env.example .env
Edit the .env file with your database details:

dotenv
Copy code
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
5. Database Setup
a. Create a Database
Use the following commands in MySQL to create the database:

sql
Copy code
CREATE DATABASE class_project;
USE class_project;
b. Import the Database Schema
The schema is located in the class.sql file. Import it into your database:

mysql -u root -p class_project < class.sql
Running the Project
Start the Localhost Server
You can run the project on localhost:3000 using PHP's built-in server:

php -S localhost:3000
Tailwind CSS in Development
For real-time updates to Tailwind CSS during development, run:

npm run watch
Folder Structure
1. database/
Contains the connection.php file for connecting to the MySQL database using PDO.

2. public/
Contains the entry point for the project (index.php) and other accessible assets.

3. views/
Contains the PHP files for rendering the user interface (e.g., calendar, announcements, profiles).

4. css/
Contains the generated Tailwind CSS files.

5. routes/
Manages all routing logic.

6. header/
Contains reusable headers for checking user sessions and navigation.

Key Highlights
Database Connection
The database/connection.php file connects the project to the database. Ensure your .env variables are correctly set.

Example:

<?php
try {
    $pdo = new PDO("mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
Session Handling
The project uses session-based authentication. The header/ folder ensures sessions are started and valid.

Dynamic Content
Announcements and events are dynamically fetched from the database.
Notifications and progress tracking are integrated with user profiles.
Commands Summary
Clone the repository:

git clone https://github.com/your-repository/class-project.git
cd class-project
Install Composer dependencies:

composer install
Build Tailwind CSS:

npm install
npm run build:css
Set up the database:

mysql -u root -p class_project < class.sql
Run the project:

php -S localhost:3000
Notes

Run Without MySQL
If MySQL is not configured, the project will still run, but features requiring database interactions (like dynamic content) will not work.

Customizing Styles
Update Tailwind CSS styles in the tailwind.config.js file.

Environment Variables
Update .env to match your local setup.

License
This project is open-source and licensed under the MIT License.

Happy coding! 🎉
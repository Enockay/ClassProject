-- Create the database
CREATE DATABASE IF NOT EXISTS ;
USE classproject;

-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert dummy users
INSERT INTO users (first_name, last_name, email, password) VALUES
('John', 'Doe', 'john.doe@example.com', '$2y$10$xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
('Jane', 'Smith', 'jane.smith@example.com', '$2y$10$yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy');

-- Create the announcements table
CREATE TABLE announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert dummy announcements
INSERT INTO announcements (title, description, date) VALUES
('System Maintenance', 'Our platform will undergo maintenance on Nov 30, 2024.', '2024-11-30'),
('New Feature Release', 'We are excited to announce a new feature launching next week!', '2024-11-25'),
('Holiday Announcement', 'The office will be closed for the holidays on Dec 25, 2024.', '2024-12-25');

-- Create the events table
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    event_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert dummy events
INSERT INTO events (event_name, description, event_date) VALUES
('Tech Conference 2024', 'Join us for an insightful tech conference.', '2024-12-01'),
('Webinar on Cybersecurity', 'A webinar discussing the latest in cybersecurity.', '2024-11-28'),
('Annual Gala Dinner', 'Our annual gala dinner for all members.', '2024-12-15');

-- Ensure you change the password hashes above to actual bcrypt hashes. 
-- Example: You can use `password_hash('your_password', PASSWORD_BCRYPT)` in PHP to generate these hashes.

CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    subscribed_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO events (title, description, date) VALUES
('Math Exam', 'The final exam for the math class. Make sure to study all topics covered.', '2024-12-10 10:00:00'),
('Physics Lab', 'Lab session on the new physics experiments. Be prepared with your lab coat.', '2024-12-12 14:00:00'),
('Project Submission Deadline', 'The deadline for submitting your final project. No extensions will be given.', '2024-12-15 23:59:00'),
('Midterm Exam', 'The midterm exam will cover chapters 1-5. Make sure to review all topics.', '2024-12-20 09:00:00'),
('Holiday Break', 'Winter break begins! Enjoy your holidays and recharge for the next semester.', '2024-12-23 00:00:00');

INSERT INTO subscriptions (email) VALUES
('student1@example.com'),
('student2@example.com'),
('student3@example.com'),
('student4@example.com');

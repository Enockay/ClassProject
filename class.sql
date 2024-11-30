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

-- Courses Table
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    unit_code VARCHAR(10) NOT NULL,
    lecturer_name VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Populate Courses Table
INSERT INTO courses (user_id, course_name, unit_code, lecturer_name) VALUES
(1, 'Introduction to Programming', 'CS101', 'Dr. Alice Brown'),
(1, 'Data Structures', 'CS102', 'Prof. Bob White'),
(1, 'Database Systems', 'CS103', 'Dr. Carol Green'),
(2, 'Operating Systems', 'CS104', 'Prof. David Black'),
(2, 'Computer Networks', 'CS105', 'Dr. Eva Blue'),
(2, 'Software Engineering', 'CS106', 'Dr. Frank Red'),
(3, 'Machine Learning', 'CS107', 'Dr. Grace Yellow'),
(3, 'Artificial Intelligence', 'CS108', 'Prof. Henry Orange'),
(3, 'Cybersecurity', 'CS109', 'Dr. Ian Purple'),
(3, 'Web Development', 'CS110', 'Prof. Jack Pink');

-- Assignments Table
CREATE TABLE assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    deadline DATE NOT NULL,
    status ENUM('Pending', 'Completed') NOT NULL DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Populate Assignments Table
INSERT INTO assignments (user_id, title, deadline, status) VALUES
(1, 'Assignment 1 - Programming Basics', '2024-12-05', 'Completed'),
(1, 'Assignment 2 - Data Structures', '2024-12-10', 'Pending'),
(1, 'Assignment 3 - SQL Queries', '2024-12-15', 'Completed'),
(2, 'Assignment 1 - Operating Systems', '2024-12-08', 'Pending'),
(2, 'Assignment 2 - Network Models', '2024-12-12', 'Pending'),
(2, 'Assignment 3 - Software Design', '2024-12-20', 'Completed'),
(3, 'Assignment 1 - AI Basics', '2024-12-07', 'Pending'),
(3, 'Assignment 2 - ML Models', '2024-12-09', 'Pending'),
(3, 'Assignment 3 - Cyber Threats', '2024-12-13', 'Completed'),
(3, 'Assignment 4 - Web Design', '2024-12-14', 'Pending');

CREATE TABLE grades (
    grade_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Matches `user_id` from `courses`
    course_id INT NOT NULL, -- Matches `id` from `courses`
    marks_awarded DECIMAL(5, 2) NOT NULL,
    total_marks DECIMAL(5, 2) NOT NULL,
    feedback TEXT,
    date_assessed DATE NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO grades (user_id, course_id, marks_awarded, total_marks, feedback, date_assessed) VALUES
(1, 1, 88.50, 100.00, 'Excellent understanding of algorithms.', '2024-11-01'),
(1, 2, 92.00, 100.00, 'Exceptional performance in database queries.', '2024-11-02'),
(1, 3, 84.00, 100.00, 'Good work on system calls and scheduling.', '2024-11-03'),
(2, 1, 75.00, 100.00, 'Satisfactory grasp of sorting algorithms.', '2024-11-01'),
(2, 4, 78.50, 100.00, 'Good understanding of network protocols.', '2024-11-02'),
(3, 2, 91.00, 100.00, 'Well-structured database models.', '2024-11-02'),
(3, 3, 89.50, 100.00, 'Strong performance in process management.', '2024-11-03'),
(3, 5, 95.00, 100.00, 'Outstanding work in AI project.', '2024-11-04'),
(4, 1, 68.00, 100.00, 'Needs improvement in recursive algorithms.', '2024-11-01'),
(4, 4, 72.00, 100.00, 'Satisfactory performance in subnetting.', '2024-11-02');

<?php
require "./header.php";

// Fetch grades
$query = "SELECT user_id, course_id, marks_awarded, total_marks, feedback, date_assessed FROM grades WHERE user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':user_id', $user['id'], PDO::PARAM_INT);
$stmt->execute();

$grades = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Handle POST request for adding or updating grades
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $assignment_id = $_POST['assignment_id'];
    $grade = $_POST['grade'];
    $feedback = $_POST['feedback'];

    if (isset($_POST['grade_id'])) {
        // Update grade
        $grade_id = $_POST['grade_id'];
        $query = "UPDATE grades SET student_id = :student_id, assignment_id = :assignment_id, grade = :grade, feedback = :feedback WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $grade_id, PDO::PARAM_INT);
    } else {
        // Add new grade
        $query = "INSERT INTO grades (student_id, assignment_id, grade, feedback) VALUES (:student_id, :assignment_id, :grade, :feedback)";
        $stmt = $pdo->prepare($query);
    }

    $stmt->bindValue(':student_id', $student_id);
    $stmt->bindValue(':assignment_id', $assignment_id);
    $stmt->bindValue(':grade', $grade);
    $stmt->bindValue(':feedback', $feedback);
    $stmt->execute();

    header('Location: grades.php');
    exit;
}

// Handle GET request for deleting grades
if (isset($_GET['delete'])) {
    $grade_id = $_GET['delete'];
    $query = "DELETE FROM grades WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $grade_id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: grades.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Student Grades</h1>

        <!-- Grades Table -->
        <table class="w-full bg-white shadow-md rounded-md">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">User ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Course ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Marks Awarded</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Total Marks</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Feedback</th>
                    <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Date Assessed</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
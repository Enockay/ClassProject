<?php
require "./header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

</body>
</html>
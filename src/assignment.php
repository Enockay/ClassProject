<?php
require "./header.php";

$userId = $_SESSION['user']['id'];
$message = "";

// Handle Add/Edit/Delete operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_assignment'])) {
        $title = $_POST['title'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];

        $query = "INSERT INTO assignments (title, deadline, status, user_id) VALUES (:title, :deadline, :status, :user_id)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':title' => $title,
            ':deadline' => $deadline,
            ':status' => $status,
            ':user_id' => $userId
        ]);
        $message = "Assignment added successfully!";
    }

    if (isset($_POST['edit_assignment'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];

        $query = "UPDATE assignments SET title = :title, deadline = :deadline, status = :status WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':title' => $title,
            ':deadline' => $deadline,
            ':status' => $status,
            ':id' => $id,
            ':user_id' => $userId
        ]);
        $message = "Assignment updated successfully!";
    }

    if (isset($_POST['delete_assignment'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM assignments WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':user_id' => $userId
        ]);
        $message = "Assignment deleted successfully!";
    }
}

// Fetch assignments
$query = "SELECT * FROM assignments WHERE user_id = :user_id ORDER BY deadline ASC";
$stmt = $pdo->prepare($query);
$stmt->execute([':user_id' => $userId]);
$assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="../output.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800 font-sans p-6">

    <h2 class="text-3xl font-semibold text-gray-900 mb-6 tracking-tight">Assignments</h2>

    <!-- Notification -->
    <?php if ($message): ?>
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-lg shadow-md">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <!-- Add Assignment Form -->
    <form method="POST" class="mb-8 bg-white shadow-lg p-6 rounded-lg space-y-6 max-w-4xl mx-auto">
        <h3 class="text-xl font-semibold text-gray-900">Add New Assignment</h3>
        <div class="space-y-4">
            <input type="text" name="title" placeholder="Assignment Title" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required>
            <input type="date" name="deadline" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required>
            <select name="status" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <option value="Pending">Pending</option>
                <option value="Submitted">Submitted</option>
                <option value="Marked">Marked</option>
            </select>
        </div>
        <button type="submit" name="add_assignment" class="w-full bg-blue-600 text-white py-3 rounded-lg text-sm hover:bg-blue-700 transition duration-300 ease-in-out focus:ring-2 focus:ring-blue-500">
            Add Assignment
        </button>
    </form>

    <!-- Assignments Table -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg max-w-4xl mx-auto">
        <table class="w-full table-auto text-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Deadline</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Marks</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($assignments)) : ?>
                    <?php foreach ($assignments as $assignment) : ?>
                        <tr class="border-t border-gray-200 hover:bg-gray-50 transition duration-200 ease-in-out">
                            <td class="px-6 py-4"><?= htmlspecialchars($assignment['title']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($assignment['deadline']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($assignment['status']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($assignment['marks'] ?? 'N/A') ?></td>
                            <td class="px-6 py-4 space-x-4">
                                <!-- Edit Button -->
                                <form method="POST" class="inline">
                                    <input type="hidden" name="id" value="<?= $assignment['id'] ?>">
                                    <button type="submit" name="edit_assignment" class="text-blue-600 hover:underline focus:outline-none transition duration-300 ease-in-out">Edit</button>
                                </form>
                                |
                                <!-- Delete Button -->
                                <form method="POST" class="inline">
                                    <input type="hidden" name="id" value="<?= $assignment['id'] ?>">
                                    <button type="submit" name="delete_assignment" class="text-red-600 hover:underline focus:outline-none transition duration-300 ease-in-out">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-600">No assignments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>

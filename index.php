<?php
include 'core/models.php';

// Initialize search query
$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

// Fetch applicants based on search query
$applicants = searchApplicants($searchQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants Management</title>
    <style>
        /* Base styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #0044cc;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        main {
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn.create-btn {
            margin-bottom: 20px;
            float: right;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-form button {
            padding: 10px 20px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #0044cc;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #e0f7fa;
        }

        footer {
            background-color: #0044cc;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Applicants Management</h1>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">

            <!-- Create Applicant Button -->
            <a href="createApplicant.php" class="btn create-btn">Create New Applicant</a>

            <!-- Search Form -->
            <form class="search-form" method="POST">
                <input type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search by name, email, or job title">
                <button type="submit">Search</button>
            </form>

            <!-- Applicants Table -->
            <h2>Applicant Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Job Title</th>
                        <th>Experience (Years)</th>
                        <th>Resume Submitted</th>
                        <th>Application Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($applicants['querySet']) && !empty($applicants['querySet'])) {
                        foreach ($applicants['querySet'] as $applicant) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($applicant['first_name']) . " " . htmlspecialchars($applicant['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($applicant['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($applicant['phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($applicant['job_title']) . "</td>";
                            echo "<td>" . htmlspecialchars($applicant['experience_years']) . "</td>";
                            echo "<td>" . htmlspecialchars($applicant['resume_submitted']) . "</td>";
                            echo "<td>" . htmlspecialchars($applicant['application_date']) . "</td>";
                            echo "<td>
                                    <a href='editApplicant.php?id=" . $applicant['id'] . "' class='btn'>Edit</a>
                                    <a href='deleteApplicant.php?id=" . $applicant['id'] . "' class='btn' style='background-color: #dc3545;'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No applicants found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2024 Applicants Management System. All rights reserved.
    </footer>
</body>
</html>

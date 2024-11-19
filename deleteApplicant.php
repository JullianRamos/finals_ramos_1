<?php
include 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = deleteApplicant($id);
    $message = htmlspecialchars($result['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Applicant</title>
    <style>
        /* Base Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 30px;
            max-width: 400px;
        }

        .notification {
            font-size: 18px;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .notification.success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .notification.error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0044cc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0033a1;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($message)) : ?>
            <div class="notification <?php echo strpos($message, 'success') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <a href="index.php" class="btn">Go Back to Homepage</a>
    </div>
</body>
</html>

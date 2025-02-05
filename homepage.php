<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .welcome-text {
            font-size: 3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
        }
        .logout-link {
            color: #dc3545;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }
        .logout-link:hover {
            color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <p class="welcome-text">
            Hello <?php 
            if(isset($_SESSION['email'])){
                $email=$_SESSION['email'];
                $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                while($row=mysqli_fetch_array($query)){
                    echo $row['firstName'].' '.$row['lastName'];
                }
            }
            ?>
        </p>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
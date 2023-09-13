<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        .profile-photo {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Photo -->
                <img src="profile.jpg" alt="Profile Photo" class="img-fluid profile-photo">
            </div>
            <div class="col-md-6">
                <!-- Login Details -->
                <h1>Welcome, John Doe</h1>
                <p>Username: johndoe</p>
                <p>Email: johndoe@example.com</p>
            </div>
            <div class="col-md-3">
                <!-- Logout Button -->
                <a href="logout.php" class="btn btn-danger btn-lg btn-block">Logout</a>
                <!-- Add Subadmin Button -->
                <button class="btn btn-success btn-lg btn-block">Add Subadmin</button>
            </div>
        </div>
    </div>
    
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

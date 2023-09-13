<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        /* styles.css */

/* Common styles for both forms */
body {
    font-family: Arial, sans-serif;
    background: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.form-container {
    background: #fff;
    padding: 20px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    max-width: 400px;
    width: 100%;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.input-container {
    margin-bottom: 15px;
}

input[type="text"],
input[type="password"],
input[type="email"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

/* Styles specific to the registration form */
.register-container {
    text-align: center;
}

#profile-photo {
    margin-top: 10px;
}

/* Styles specific to the login form */
.login-container {
    text-align: center;
}

/* Styles for the overlay effect */
.overlay-container {
    position: relative;
    z-index: 1;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: transform 0.6s ease-in-out;
    transform: translateX(100%);
}

.overlay-panel {
    position: absolute;
    width: 50%;
    height: 100%;
    padding: 20px;
    background: #fff;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.6s ease-in-out;
}

.overlay-left {
    transform: translateX(-100%);
}

.container:hover .overlay {
    transform: translateX(0);
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container login-container">
        <?php
if ($this->session->flashdata('success')) {
    echo '<div class="success-message">' . $this->session->flashdata('success') . '</div>';
}
?>

            <form method="POST" enctype="multipart/form-data">
                <h2>Login</h2>
                <div class="input-container">
                    <input type="text" placeholder="Full Name" name="fullname" required>
                </div>
                <div class="input-container">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <button id= "login_user">Login</button>
                <p>Don't have an account? <a href="<?= base_url('index.php/admin/register') ?>">Register</a></p>

            </form>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
  
  $('#login_user').click(function() {
    login();
  });
});

function login(e){
    e.preventDefault(); 
       var formData = new FormData();


formData.append('fullname', $('input[name="fullname"]').val());
formData.append('password', $('input[name="password"]').val());
alert("In alert");
$.ajax({
    type: 'POST',
    url: '<?php echo base_url('index.php/admin/login_auth'); ?>',
    processData: false,
    contentType: false,
    data: formData,
    success: function(response) {
        // Handle the response from the server
        var result = JSON.parse(response);
        if (result.status === 'success') {
            alert("logged in ");
            window.location.href = '<?php echo base_url('index.php/admin/dashboard'); ?>';
        } else {
            // Display an error message
            alert(result.message);
        }
    },
    error: function(xhr, status, error) {
        alert("Error");
    }
});


 }
</script>
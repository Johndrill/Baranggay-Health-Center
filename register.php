<?php
include "db_conn.php";

$message = '';

if (isset($_POST['save_user'])) {
    $display_name = $_POST['display_name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

    $baseName = basename($_FILES["profile_picture"]["name"]);
    $targetFile =  time() . $baseName;

    $status = move_uploaded_file($_FILES["profile_picture"]["tmp_name"], 'user_images/' . $targetFile);

    if ($status) {
        try {
            $query = "INSERT INTO `users`(`display_name`, `user_name`, `password`, `profile_picture`) 
                VALUES('$display_name', '$user_name', '$encryptedPassword', '$targetFile');";

            $stmtUser = $con->query($query);

            if ($stmtUser) {
                $message = 'User registered successfully';
            } else {
                throw new Exception();
            }
        } catch(Exception $ex) {
            if ($con->errno == 1062) {
                $message = 'Username already exists. Please choose a different username.';
            } else {
                $message = 'An error occurred while registering the user.';
            }
        }
    } else {
        $message = 'A problem occurred in image uploading.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: slategray;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 10%;
            background-color: beige;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            height: 36px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .success-message {
            background-color: #dff0d8;
            border: 1px solid #d0e9c6;
            color: #3c763d;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .error-message {
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 10px;
        }
        </style>
</head>

<body>
    <div class="container">
        <h2>Add User</h2>
        <?php if (!empty($message)) : ?>
            <?php if ($message == 'User registered successfully') : ?>
                <div class="success-message">
                    <?php echo $message; ?>
                </div>
                <script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 2000);
                </script>
            <?php else : ?>
                <div class="error-message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="display_name">Display Name</label>
                <input type="text" id="display_name" name="display_name" required="required" autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" id="user_name" name="user_name" required="required" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required="required" />
            </div>
            <div class="form-group">
                <label for="profile_picture">Picture</label>
                <input type="file" id="profile_picture" name="profile_picture" required="required" />
            </div>
            <button type="button" id="cancel" name="cancel" class="btn" onclick="window.location.href='index.php'">Cancel</button>
            <button type="submit" id="save_medicine" name="save_user" class="btn">Save</button>
        </form>
    </div>
</body>

</html>

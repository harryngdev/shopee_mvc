<?php
    include './../classes/admin.php';
?>
<?php
    $admin = new Admin();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $adminAccount = $_POST['adminAccount'];
        $adminPass = md5($_POST['adminPass']);
        $login_check = $admin->login_admin($adminAccount, $adminPass);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Login</title>
    <link rel="stylesheet" href="../style/reset.css" />
    <link rel="stylesheet" href="style/style.css" />
</head>
<body class="bg-dark">
<div id="login-wrapper">
    <div class="login-card">
        <h2>Admin Login</h2>
        <form action="login.php" class="form" method="post">
            <div class="form-group">
                <input type="text" name="adminAccount" class="form-control" placeholder="Account" />
            </div>
            <div class="form-group">
                <input type="password" name="adminPass" class="form-control" placeholder="Password" />
            </div>
            <div class="form-notice">
                <?php
                    if (isset($login_check)) {
                        echo $login_check;
                    }
                ?>
            </div>
            <button type="submit" name="login" class="form-submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>
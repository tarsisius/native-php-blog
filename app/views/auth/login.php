<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="<?php echo APP_URL; ?>css/admin.css" rel="stylesheet">
</head>
<body>
    <div class="container-login">
        <div class="login-alert">
            <?php
            Flasher::Message();
            ?>
        </div>
        <form method="POST" action="<?php echo APP_URL; ?>user/login" class="form-horizontal" role="form">
            <div class="form-login">
                <input name="email" type="text" placeholder="Email" required>
            </div>
            <div class="form-login">
                <input name="password" type="password" placeholder="Password" required>
            </div>
            <center>
                <button type="submit" class="button blue">Login</button>
            </center>
        </form>
    </div>
</body>

</html>
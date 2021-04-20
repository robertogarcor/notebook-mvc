<?php $url; /* @var $url URL */ ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="./app/public/assets/user/css/main-login.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo $url->assets('auth','main-login.css');?>" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php

            if (isset($error)) { 
                echo '<p class="error">Username or password invalid. Please in again!.</p>';
            }
            if (isset($logout)){
                echo '<p class="logout">Session Closed OK!.</p>';
            }
            if (isset($success)){
                 echo '<p class="success alert alert-success role="alert">' . $success . '</p>';
            }    
        ?>
        <div class="login">
            <h1>Login</h1>
            <form action="<?php echo $url->uri('auth', 'login'); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <input type="submit" name="login" value="Send" class="btn btn-primary">
            </form>
            <p class="signup">Not registered account. <a href="<?php echo $url->uri('auth','register');?>">Sign up</a></p>
        </div>
    </body>
</html>

<?php $url;  /* @var $url URL */ ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Register User</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url->assets('auth', 'main-register.css'); ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            if (isset($error)){
                echo '<p class="error alert alert-danger role="alert">' . $error . '</p>';
            }
        ?>
        
        <div class="register-user">
            <h1>Register User</h1>
            <form action="<?php echo $url->uri('auth', 'store');?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter firstname" required>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" class="form-control" id="surname" placeholder="Enter surname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
                <input type="submit" name="user-register" value="Send" class="btn btn-primary">
            </form>
        </div> 
    </body>
</html>

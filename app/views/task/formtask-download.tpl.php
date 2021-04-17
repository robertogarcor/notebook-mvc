<?php
    
    $url; /* @var $url URL */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Donwload Task</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url->assets('task','main-task-download.css');?>" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
        <div class="task-form">
            <p><a href="<?php echo $url->uri('task','index'); ?>">Home</a> | user <?php echo $username; ?> | <a href="<?php echo $url->uri('auth', 'logout'); ?>"> Logout </a></p>
            <h1>Download File Task</h1>
            <p>Sure you want to download file task?</p>
            <form action="<?php echo $url->uri('task', 'download'); ?>" method="POST">
            <input type="submit" name="donwloadTask" value="Send" class="btn btn-danger">
            <a href="<?php echo $url->uri('task','index'); ?>" class="btn btn-info">Cancel</a>
        </div>
    </body>
</html>

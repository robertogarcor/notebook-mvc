<?php
    
    $url; /* @var $url URL */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notebook | Donwload Task</title>
        <!-- Bootstrap CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Main CSS --> 
        <link href="<?php echo $url->assets('task','main-task-download.css');?>" rel="stylesheet" type="text/css" /> 
        <link href="<?php echo $url->assets('base','main-base-navbar.css');?>" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Jquery | JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="task-form">
            <?php require_once $url->basetemplate('base', 'base-navbar'); ?>
            <h1>Download File Task</h1>
            <p>Sure you want to download file task?</p>
            <form action="<?php echo $url->uri('task', 'download'); ?>" method="POST">
            <input type="submit" name="donwloadTask" value="Send" class="btn btn-danger">
            <a href="<?php echo $url->uri('task','index'); ?>" class="btn btn-info">Cancel</a>
        </div>
    </body>
</html>

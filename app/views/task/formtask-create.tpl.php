<?php

    $url; /* @var $url URL */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notebook | Add Task</title>
        <!-- Bootstrap CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Main CSS --> 
        <link href="<?php echo $url->assets('task','main-task-create.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url->assets('base','main-base-navbar.css');?>" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Jquery | JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="task-form">
            <?php require_once $url->basetemplate('base', 'base-navbar'); ?>
            <h1>Add Task</h1>
            <form action="<?php echo $url->uri('task', 'store'); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name Task</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name task" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="completed" class="form-check-input" id="completed">
                    <label class="form-check-label" for="completed">Check me out if completed!</label>
                </div>
                <input type="submit" name="task" value="Send" class="btn btn-primary">
                <a href="<?php echo $url->uri('task','index'); ?>" class="btn btn-info">Cancel</a>
            </form>
        </div>
    </body>
</html>

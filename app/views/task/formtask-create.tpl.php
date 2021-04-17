<?php

    $url; /* @var $url URL */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Add Task</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url->assets('task','main-task-create.css');?>" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="task-form">
            <p><a href="<?php echo $url->uri('task','index'); ?>">Home</a> | user <?php echo $username;?> | <a href="<?php echo $url->uri('auth','logout'); ?>"> Logout </a></p>  
            <h1>Add Task</h1>
            <form action="<?php echo $url->uri('task', 'store'); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name Task</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name task">
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

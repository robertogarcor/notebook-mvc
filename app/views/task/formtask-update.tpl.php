<?php

    $url; /* @var $url URL */ 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Update Task</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url->assets('task','main-task-update.css');?>" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
        <div class="task-form">
            <p><a href="<?php echo $url->uri('task','index'); ?>">Home</a> | user <?php echo $username;?> | <a href="<?php echo $url->uri('auth', 'logout'); ?>"> Logout </a></p>
            <h1>Update Task</h1>
            <form action="<?php echo $url->uri('task', 'update'); ?>" method="POST">
            <div class="form-group">
                <!--<label for="id">Id</label>-->
                <input type="hidden" name="id" class="form-control" id="id" readonly="true" value="<?php echo $taskObj->id;?>">
            </div>
            <div class="form-group">
                <label for="name">Name Task</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name task" value="<?php echo $taskObj->name;?>">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="completed" class="form-check-input" id="completed" <?php $taskObj->completed === "1" ? print "checked=checked>" : print ">"; ?>
                <label class="form-check-label" for="completed">Check me out if completed!</label>
            </div>
            <input type="submit" name="updtask" value="Send" class="btn btn-primary">
            <a href="<?php echo $url->uri('task','index'); ?>" class="btn btn-info">Cancel</a>
        </div>
    </body>
</html>

<?php

    $url; /* @var $url URL */
    //var_dump($taskObj);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notebook | Delete Task</title>
        <!-- Bootstrap CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Main CSS --> 
        <link href="<?php echo $url->assets('task','main-task-destroy.css');?>" rel="stylesheet" type="text/css" />    
        <link href="<?php echo $url->assets('base','main-base-navbar.css');?>" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Jquery | JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="task-form">
            <?php require_once $url->basetemplate('base', 'base-navbar'); ?>           
            <h1>Delete Task</h1>
            <p>Sure you want to delete this task?</p>
            <form action="<?php echo $url->uri('task', 'destroy'); ?>" method="POST">
            <div class="form-group id">
                <!--<label for="id">Id</label>-->
                <input type="hidden" name="id" class="form-control" id="id" readonly="true" value="<?php echo $taskObj->id;?>">
            </div>
            <div class="form-group">
                <label for="name">Name Task</label>
                <input type="text" name="name" class="form-control" id="name" readonly="true" placeholder="Enter name task" value="<?php echo $taskObj->name;?>">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="completed" class="form-check-input" id="completed" disabled="true" <?php $taskObj->completed === "1" ? print "checked=checked>" : print ">"; ?>
                <label class="form-check-label" for="completed"><?php $taskObj->completed === "1" ? print "Completed!" : print "Not Completed!" ?></label>
            </div>
            <input type="submit" name="deltask" value="Send" class="btn btn-danger">
            <a href="<?php echo $url->uri('task','index'); ?>" class="btn btn-info">Cancel</a>
        </div>
    </body>
</html>

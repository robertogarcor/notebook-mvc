<?php
    $url; /* @var $url URL */
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Sumary Tasks</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url->assets('task','main-task-index.css');?>" rel="stylesheet" type="text/css" />   
    </head>
    <body>
        <?php
            if(isset($_GET['success'])) {
                echo '<p class="success alert alert-success role="alert">' . $_GET['success'] . '</p>';
            }
        ?>
        <div class='sumary-tasks'>
            <p><a href="<?php echo $url->uri('task','index'); ?>">Home</a> | Welcome! user <?php echo $userObj->username;?> | <a href="<?php echo $url->uri('auth','logout'); ?>"> Logout </a></p>
            <h1>Sumary Tasks</h1>
            <section>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Completed</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php
                            foreach ($userObj->tasks as $t) {?>
                                <tr>
                                    <td scope="row">
                                        <?php print $t->id;?>
                                    </td>
                                    <td>    
                                        <input type="checkbox" disabled="true" <?php $t->completed === "1" ? print "checked=checked>" : print ">"; ?>
                                    </td>
                                    <td>
                                        <?php print $t->name?>
                                    </td>
                                    <td>  
                                        <a class="btn btn-info btn-xs" href="<?php echo $url->uri('task', 'destroy', $t->id); ?>"> Delete </a><span> | </span>
                                        <a class="btn btn-info btn-xs" href="<?php echo $url->uri('task', 'edit', $t->id); ?>"> Update </a>
                                    </td>
                                </tr>
                            <?php    
                            }
                            ?>  
                    </tbody>
                </table>                
                <br>
                <a href="<?php echo $url->uri('task', 'create'); ?>" class="btn btn-success">Add Task</a>
                <a href="<?php echo $url->uri('task', 'download'); ?>" class="btn btn-primary">Donwload Task <a/>                        
            </section>
        </div>
    </body>
</html>


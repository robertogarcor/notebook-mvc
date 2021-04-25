<!--nav-bar menu--> 
    <nav>
        <ul>
            <li >
                <a class="" href="<?php echo $url->uri('task','index'); ?>">Home</a>
                 <span> | </span>
            </li>
            <li class="dropdown">
                <span>Welcome!,</span>
                <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $username;?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="" href="">Edit profile</a>
                        </li>
                        <li>
                            <a class="" href="">Delete profile</a>
                        </li>
                    </ul>
            </li>
            <li>
                <span> | </span>
                <a class="" href="<?php echo $url->uri('auth','logout'); ?>">Logout</a>
            </li>
        </ul>
    </nav>
<!--.end nav-bar menu-->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Moj Blog</a>

            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php 

                    
                    $registration_class = '';
                    $contact_class = '';
                    $pageName = basename($_SERVER['PHP_SELF']);
                    $registration = 'registration.php';
                    $contact = 'contact.php';
                    
                    if($pageName == $registration){
                        $registration_class = 'active';
                    }elseif($pageName == $contact){
                        $contact_class = 'active';
                    }
                 ?>
                <li>
                        <a href="admin">Admin</a>
                    </li>
                    <?php echo "<li class='$contact_class'>
                        <a href='contact.php'>Contact US</a>
                    </li>"
                     ?>

                    <?php echo "<li class='$registration_class'>
                        <a href='registration.php'>Register</a>
                    </li>"
                     ?>
 
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->

                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>

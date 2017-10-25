<?php include("includes/admin_header.php"); ?>

    <div id="wrapper">
        <?php 
        // $session = session_id();
        // $time = time();
        // $time_out_in_seconds = 60;
        // $time_out = $time - $time_out_in_seconds;

        // $query = "SELECT * FROM users_online WHERE session = '$session'";
        // $send_query = mysqli_query($connection, $query);
        // $count = mysqli_num_rows($send_query);
        // if($count == NULL){
        //     mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES ('$session', '$time')");
        // }else{
        //      mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session "

        // }}
        ?>

        <!-- Navigation -->
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin dashboard

                            <small><?php  echo "You are logged in with ". $_SESSION['user_role']    . " Privilege "; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        

                            
                        <div class='huge'><?php echo $post_counts = recordCount('posts'); ?></div>
                        
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <div class='huge'><?php echo $comment_counts = recordCount('comments'); ?></div>                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $user_counts = recordCount('users'); ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $categories_counts = recordCount('categories'); ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

            
            <!-- /.container-fluid -->

            <!-- Charts -->
            <?php                 
                $select_all_published_post = checkStatus('posts', 'post_status', 'published');
                $post_draft_counts = checkStatus('posts', 'post_status', 'draft');
                $unapproved_comments_count = checkStatus('comments', 'comment_status', 'unapproved');
                $subscribers_count = checkUserRole('users', 'user_role', 'subscriber');

             ?>


        <div class="row">
            
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Data', 'Count'],
                  <?php 

                    $elements_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Approved comments', 'Pending comments', 'Users', 'Subscribers', 'Categories'];
                    $elements_count = [$post_counts, $select_all_published_post, $post_draft_counts, $comment_counts, $unapproved_comments_count, $user_counts, $subscribers_count, $categories_counts];
                    for ($i =0; $i <8; $i++) {
                        echo "['{$elements_text[$i]}'" . "," . "{$elements_count[$i]}],";
                    }


                   ?>
                  // ['Posts', 1000],
                ]);

                var options = {
                  chart: {
                    title: '',
                    subtitle: '',
                  }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, options);
              }
            </script>
            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


        </div>
    <!-- /Charts -->
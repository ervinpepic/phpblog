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
                        <h1 class="page-header text-center">
                          STATISTICS
                        </h1>
    

                            
                    <?php $post_counts = recordCount('posts'); ?>


                    <?php $comment_counts = recordCount('comments'); ?>

                    <?php $user_counts = recordCount('users'); ?>


                    <?php $categories_counts = recordCount('categories'); ?>
     
            
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

                    $elements_text = ['All Posts', 'Active Posts', 'Draft Posts', 'All comments', 'Pending for approve', 'Users', 'Subscribers', 'Categories'];
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
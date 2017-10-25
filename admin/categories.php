<?php include("includes/admin_header.php");?>

    <div id="wrapper">

        <!-- Navigation -->
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Dashboard</small>
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
                <div class="col-xs-6">

                <?php insert_categories(); ?>
                        <form action="" method="POST" >
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>  
                             <div class="form-group">
                                <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <?php //update and include

                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include ("includes/update_categories.php");
                        }

                         ?>
                        </div>
                        <div class="col-xs-6">
                       <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php findAllCategories();?>

                                <?php deleteCategories();?>
                                </tbody>
                            </table>

                        </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div> 
        
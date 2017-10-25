<?php 
if(isset($_POST['create_user'])){
	
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	
	$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));


	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	// $post_tags = $_POST['post_tags'];
	// $post_content = $_POST['post_content'];
	// $post_date = date('d-m-y');
	// // $post_comment_count = 4;  

	// move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password)";
	$query .=
	"VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}',
	'{$user_email}', '{$user_password}' )";
	$create_user_query = mysqli_query($connection, $query);

	confirm($create_user_query);
	echo "User Successeful created " . " ";
	header("Location: users.php");
	
}

 ?>

<form action="" method="post" enctype="multipart/form-data">
	 <div class="form-group">
	 	<label for="title">Firstname</label>
	 	 <input type="text" class="form-control" name="user_firstname"></input>
	 </div>
	  <div class="form-group">
	 	<label for="post_status">Lastname</label>
	 	 <input type="text" class="form-control" name="user_lastname"></input>
	 </div>

<div class="form-group">
	<select name="user_role" id="">
		<option value="subsrciber">Select Options</option>
		<option value="admin">Admin</option>
		<option value="subscriber">Subscriber</option>
	</select>
</div>



<!-- 	  <div class="form-group">
	 	<label for="post_image">Post Image</label>
	 	 <input type="file" name="image"></input>
	 </div> -->

	 <div class="form-group">
	 	<label for="post_tags">Username</label>
	 	 <input type="text" class="form-control" name="username"></input>
	 </div>

	  <div class="form-group">
	 	<label for="post_content">Email</label>
	 	 <input type="email" class="form-control" name="user_email"></input>
	 </div>
	 <div class="form-group">
	 	<label for="post_content">Password</label>
	 	 <input type="password" class="form-control" name="user_password"></input>
	 </div>
	 <div class="form-group">
	 	<input class="btn btn-primary" type="submit" name="create_user" value="Add User"></input>
	 </div>




</form>
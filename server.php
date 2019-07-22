<?php
	$errors=array();
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
$user="";

	$db=mysqli_connect('localhost','root','','football');
	if(isset($_POST['register'])){
		
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$email=mysqli_real_escape_string($db,$_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		array_push($errors,"Invalid Email");}
		$password1=mysqli_real_escape_string($db,$_POST['password1']);
		$password2=mysqli_real_escape_string($db,$_POST['password2']);

	//ensure fields are filled properly
		if(empty($username))
		{
			array_push($errors, "Username is needed");
		}
		if(empty($email))
		{
			array_push($errors, "Email is needed");
		}
		if(empty($password1))
		{
			array_push($errors, "Password is needed");
		}
		if($password1!=$password2)
		{
			array_push($errors, "Passwords don't match");
		}
		if(count($errors) ==0){
			$password =md5($password1);
			$sql ="INSERT INTO users (username,email,password) VALUES('$username','$email','$password')"; 
			mysqli_query($db,$sql);
			session_start();

			$_SESSION['username']=$username;
			$_SESSION['loggedin'] = true;
			$_SESSION['success']="You are now logged in";
			header('location: index.php');	
		}
	}
if(isset($_POST['login'])){
		
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$password=mysqli_real_escape_string($db,$_POST['password']);

	//ensure fields are filled properly
		if(empty($username))
		{
			array_push($errors, "Username is needed");
		}
		if(empty($password))
		{
			array_push($errors, "Password is needed");
		}
		if(count($errors) ==0){
			$password =md5($password);
			$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result=mysqli_query($db,$query);
			if(mysqli_num_rows($result)==1){
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] =$username;
				session_start();
				header('location:index.php');	
			}else{
				array_push($errors,"wrong username/password combination");

			}
			
			
			
		}
	}




if(isset($_POST['indexes'])){
		
		$heading=mysqli_real_escape_string($db,$_POST['heading']);
		$image=mysqli_real_escape_string($db,$_POST['image']);
		$content=mysqli_real_escape_string($db,$_POST['content']);

		if(empty($heading))
		{
			array_push($errors, "Heading is needed");
		}
		if(empty($content))
		{
			array_push($errors, "Content is needed");
		}
		if(empty($content))
		{
			array_push($errors, "Picture is needed");
		}
		if(!$_SESSION['loggedin'])
		{
			array_push(($errors),"You need to log in to post");
		}
		if(count($errors) ==0){
			$sqli ="INSERT INTO posts (image,heading,content) VALUES ('$image','$heading','$content')"; 
			mysqli_query($db,$sqli);
			header('location:index.php');
				
		}
	}
	if(isset($_POST['show'])){
		$username=mysqli_real_escape_string($db,$_POST['username']);$user=$username;
		$comment=mysqli_real_escape_string($db,$_POST['comment']);
		$content="http://arabellamc.com/arabella/themes/images/default-user.png";
		$post=mysqli_real_escape_string($db,$_POST['post']);
		if(empty($comment))
		{
			array_push($errors, "Comment is needed");
		}
		if(!$_SESSION['loggedin'])
		{
			array_push(($errors),"You need to log in to comment");
		}
		if(count($errors) ==0){
			$sqli ="INSERT INTO comment (text,author,image,post) VALUES ('$comment','$username','$content','$post')"; 
			mysqli_query($db,$sqli);
			// Program to display complete URL 
  
		$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                === 'on' ? "https" : "http") . "://" . 
          $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; 
			header('Location:index.php');	
		
	}

}
if(isset($_POST['del'])){
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$text=mysqli_real_escape_string($db,$_POST['text']);
	$sqli="DELETE FROM comment WHERE author='$username'";
	mysqli_query($db,$sqli);
	header('Location:index.php');
}

if(isset($_GET['logout'])){
	session_destroy();$user="";
	header('location:login.php');
}


?>
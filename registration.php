	


	<?php
	$server='localhost';
	$username='root';
	$password='';
	$dbname='user';
	$link=mysqli_connect($server,$username,$password,$dbname);
	if(!$link)
	{
       echo'faild to connect database:'.mysqli_connect_error($link);
	}
    //take data from user
    $email=$_POST['email'];
    $password=$_POST['password'];

     //sql ar jonno csss code
	$sql="SELECT * FROM person WHERE email='$email' && password='$password'";
	$result=mysqli_query($link,$sql);
	$num=mysqli_num_rows($result);
	if($num==1)
	{
        echo'Enter another email and passord,this email already given';
 
	}else
	{
		$q="INSERT INTO person(email,password)VALUES('$email','$password')";
        if(mysqli_query($link,$q))
        	{
             header('location:login.php');
        	}else{
        		echo'faild to add record:'.$q.'<br/>'.mysqli_error($link);
        	}
	}
	mysqli_close($link);

	?>
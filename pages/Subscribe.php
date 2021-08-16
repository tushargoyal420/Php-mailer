<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../assests/styles/Style.css" />
    <title>Subscribe</title>
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="/assests/fontawesome/fontawesome-free-5.15.4-web/css/all.min.css" /> -->
  </head>
  <body>
    <div class="navbar">
      <div class="logoside">
        <span class="logotext"> Tusshar <span class="logotext2"> Mail</span></span>
      </div>

      <div class="linkside">
        <ul>
          <li><a href="../index.html" >Home</a></li>
          <li><a href="about.html" >About</a></li>
          <li><a href="contact.html" >Contact</a></li>
          <li><a href="Subscribe.php" class="signupbutton">Subscribe</a></li>
        </ul>
      </div>
    </div>
  
 <div class="contentform">
    <div class="cardleft">
      
    </div>
    <div class="cardright">
      <h1>Subscribe</h1>
      <div class="form">
        <form method="POST">
          <input class="inputbox" type="email" id="email" name="email" placeholder="Enter email"><br>
          <input type="submit" id="submitButton"class="submitbutton" value="Submit"><br>
        </form>   
      </div>
    </div>
  
    </div>

<div class="footer">
        <ul>
          <div class="socialmedia" >
            <a href="https://github.com/tushargoyal420" class="github"><i class="fa fa-github"></i></a>
            <a href="https://www.facebook.com/tushar.goyal.399041" class="facebook" > <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/in/tushar-goyal-306523191/" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></i></a>
            <a href="https://www.instagram.com/tus_sha_r/" class="instagram"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://wa.me/916396922804" class="whatsapp"> <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
          </div>          
        </ul>
    </div>
</body>
</html>


<?php
	
 if($_POST){
	 
	$email =$_POST['email'];
	
	//validate email
   	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo '<script> alert("Email Incorrect") </script>';
	}
	
	else 
	{
		$link= mysqli_connect("localhost", "root","", "rtcamp");
	//check database connection
		if(mysqli_connect_error()){
			die("Error to connect database");
		}
		
		else {

            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $email)."'";
            if($result = mysqli_query($link, $query)){
       
				if (mysqli_num_rows($result) > 0) {    
					echo ('<script>alert("Email is already taken. Please use other email.")</script>');
					}
				
				else {
					// $query = "INSERT INTO `users` ( `email`) VALUES ('".mysqli_real_escape_string($link, $email)."')";
                
					// if (mysqli_query($link, $query)) 
					// {
						echo ('<script>alert("Kindly check your email for verification")</script>');
						header("refresh:10.0; url='../index.html'");
					// } 
					// else {
						// echo "<h1>There was a problem signing you up - please try again later.</h1>";
					// }     
					}
			}
		}
	}
}
?>
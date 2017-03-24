<?php

	session_start();

	require 'db.php';

	include_once('assets/language.php');
	include_once 'languages/'.$langfile;


	// Processing post and registering user
	include('assets/posts.php');


	$pageTitle = "MyBlog: Register";
    include('functions/functions.php');
	include('assets/header.php');

    if(logged_in()) 
    {
        header("location: index.php");
        exit();
    }

?>

<style>
	
body{background:url(images/bg2.jpg) no-repeat center center fixed;position:absolute;top:0;left:0;min-height:100%;min-width:100%;background-size:cover}.navbar-fixed-top{position:relative}#footer{position:absolute;bottom:0;width:100%;height:60px;background:#ececec;padding-left:0px}@import "http://fonts.googleapis.com/css?family=Roboto";*{font-family:'Roboto', sans-serif}#login-modal .modal-dialog{width:350px}#login-modal input[type=text],input[type=password]{margin-top:10px}#div-login-msg,#div-lost-msg,#div-register-msg{border:1px solid #dadfe1;height:30px;line-height:28px;transition:all ease-in-out 500ms}#div-login-msg.success,#div-lost-msg.success,#div-register-msg.success{border:1px solid #68c3a3;background-color:#c8f7c5}#div-login-msg.error,#div-lost-msg.error,#div-register-msg.error{border:1px solid #eb575b;background-color:#ffcad1}#icon-login-msg,#icon-lost-msg,#icon-register-msg{width:30px;float:left;line-height:28px;text-align:center;background-color:#dadfe1;margin-right:5px;transition:all ease-in-out 500ms}#icon-login-msg.success,#icon-lost-msg.success,#icon-register-msg.success{background-color:#68c3a3 !important}#icon-login-msg.error,#icon-lost-msg.error,#icon-register-msg.error{background-color:#eb575b !important}#img_logo{max-height:100px;max-width:100px}

</style>


<div class="container">

<?php

	if(isset($_SESSION['message']))
	{
		echo '
			  <br/><div class="alert alert-danger alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Message:</strong> ',$_SESSION['message'],'
			  </div>
		';
	}
	unset($_SESSION['message']);

?>

</div>

<?php

include('assets/footer.php');

?>


</body>
</html>
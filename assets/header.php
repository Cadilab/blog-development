<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <ul class="nav navbar-nav right">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> <?php echo $lang['MENU_HOME']; ?></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-tree-conifer"></span> <?php echo $lang['MENU_NEW']; ?></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-sort"></span> <?php echo $lang['MENU_POPULAR']; ?></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> <?php echo $lang['MENU_ABOUT']; ?></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <?php 

      if(!logged_in())
      {
        echo ' 
          <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> ', $lang['MENU_REGISTER'] ,' </a></li>
          <li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> ', $lang['MENU_LOGIN'] ,'</a></li> ';
      }
      else
      {
        echo '

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> ', $_SESSION['username'] ,'
          <span class="caret"></span></a>

          <ul class="dropdown-menu">
            <li><a href="#">', $lang['MENU_ACCOUNT'] ,'</a></li>
            <li><a href="#">', $lang['MENU_SETTINGS'] ,'</a></li>
            <li><a href="logout.php">', $lang['MENU_LOGOUT'] ,'</a></li>
          </ul>
        </li>
        ';
      }

      ?>

    </ul>
  </div>	
</nav>
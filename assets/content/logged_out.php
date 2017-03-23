<style>
	
body{background:url(images/bg.jpg) no-repeat center center fixed;position:absolute;top:0;left:0;min-height:100%;min-width:100%;background-size:cover}.navbar-fixed-top{position:relative}#footer{position:absolute;bottom:0;width:100%;height:60px;background:#ececec;padding-left:0px}@import "http://fonts.googleapis.com/css?family=Roboto";*{font-family:'Roboto', sans-serif}#login-modal .modal-dialog{width:350px}#login-modal input[type=text],input[type=password]{margin-top:10px}#div-login-msg,#div-lost-msg,#div-register-msg{border:1px solid #dadfe1;height:30px;line-height:28px;transition:all ease-in-out 500ms}#div-login-msg.success,#div-lost-msg.success,#div-register-msg.success{border:1px solid #68c3a3;background-color:#c8f7c5}#div-login-msg.error,#div-lost-msg.error,#div-register-msg.error{border:1px solid #eb575b;background-color:#ffcad1}#icon-login-msg,#icon-lost-msg,#icon-register-msg{width:30px;float:left;line-height:28px;text-align:center;background-color:#dadfe1;margin-right:5px;transition:all ease-in-out 500ms}#icon-login-msg.success,#icon-lost-msg.success,#icon-register-msg.success{background-color:#68c3a3 !important}#icon-login-msg.error,#icon-lost-msg.error,#icon-register-msg.error{background-color:#eb575b !important}#img_logo{max-height:100px;max-width:100px}

</style>

</br><div class="container" style="color: #fff;">

    <div class="col col-lg-4">

        <?php echo $lang[ 'BODY_WELCOME']; ?>

    </div>

    </br>
    </br>
    </br>

    <form method="POST">

        <div class="col col-lg-3 pull-right">
            <p>
                <?php echo $lang[ 'BODY_FILLREGISTER']; ?>
            </p>

            <div class="form-group">
                <input class="form-control" required type="text" name="username" placeholder="<?php echo $lang['PH_USERNAME']; ?>">
            </div>
            <div class="form-group">
                <input class="form-control" required type="email" name="email" placeholder="<?php echo $lang['PH_EMAIL']; ?>">
            </div>
            <div class="form-group">
                <input class="form-control" required type="password" id="newPassword" onChange="checkPasswordMatch();" name="password" placeholder="<?php echo $lang['PH_PASSWORD']; ?>">
            </div>

            <div class="registrationFormAlert" id="divCheckPasswordMatch">
            </div>

            <div class="form-group">
                <input class="form-control" required type="password" id="repeatPassword" name="repassword" onChange="checkPasswordMatch();" placeholder="<?php echo $lang['PH_REPASSWORD']; ?>">
            </div>

            <input type="submit" required name="reg_submit" class="btn btn-sm btn-primary" value="Register">
        </div>

    </form>

</div>

<?php include( 'assets/footer.php'); ?>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="div-forms">
                <form id="login-form" method="POST">
                    <div class="modal-body">
                        <br>
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg"><?php echo $lang['LOGIN_HEADER']; ?></span>
                        </div>
                        <br>
                        <input id="login_username" name="username" class="form-control" type="text" placeholder="<?php echo $lang['PH_USERNAME']; ?>" required>
                        <input id="login_password" name="password" class="form-control" type="password" placeholder="<?php echo $lang['PH_PASSWORD']; ?>" required>
                        <div class="checkbox">
                            <label>
                                <br>
                                <input type="checkbox" name="remember_me">
                                <?php echo $lang[ 'LOGIN_REMEMBER']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" name="login_submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
	
function checkPasswordMatch() 
{
    var password = $("#newPassword").val();
    var confirmPassword = $("#repeatPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("");
}	

</script>
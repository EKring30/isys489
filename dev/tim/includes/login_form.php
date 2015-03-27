<?php
$jquery .= '$("#btnLogin").click(function(e) {
    e.preventDefault();
    $.post("login.php", $("#loginForm").serialize(), function(data) {
      if (data)
      {
        data = $.parseJSON(data);
        if (data.msg == "success")
        {
          location.href = data.url;
        }
        else
        {
          alert(data.msg);
        }
      }
    });
  });';

$content .= '
	<div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
          <div id="my-tab-content" class="tab-content">
			<div class="tab-pane active" id="login">
       		    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
     			<form class="form-signin" id="loginForm" method="post">
     				<input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
     				<input type="password" class="form-control" placeholder="Password" name="pwd" required>
     				<button class="btn btn-lg btn-default btn-block" id="btnLogin">Sign In</button>
     			</form>
     			<div id="tabs" data-tabs="tabs">
     				<p class="text-center"><a href="#register" data-toggle="tab">Need an account?</a></p>
     				<p class="text-center"><a href="#forgot" data-toggle="tab">Forgot password?</a></p>
  				</div>
			</div>
			<div class="tab-pane" id="register">
				<form class="form-signin">
					<input type="text" class="form-control" placeholder="User Name ..." required autofocus>
					<input type="email" class="form-control" placeholder="Emaill Address ..." required>
					<input type="password" class="form-control" placeholder="Password ..." required>
					<input type="submit" class="btn btn-lg btn-default btn-block" value="Sign Up" />
				</form>
				<div id="tabs" data-tabs="tabs">
   					<p class="text-center"><a href="#login" data-toggle="tab">Have an Account?</a></p>
  				</div>
			</div>
		  </div>
        </div>
    </div>
</div>
'."\r\n";	
?>
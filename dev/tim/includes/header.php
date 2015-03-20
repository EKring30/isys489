    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">S4S</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li<?php if ($page == "index") {?> class="active"<?php } ?>><a href="index.php">Home</a></li>
            <li<?php if ($page == "about") {?> class="active"<?php } ?>><a href="#about">About</a></li>
            <li<?php if ($page == "contact") {?> class="active"<?php } ?>><a href="#contact">Contact</a></li>
            <li<?php if ($page == "test") {?> class="active"<?php } ?>><a href="test_form.php">Test Form</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              if (empty($_SESSION['user'])) { ?>
                <li class="dropdown<?php if ($page == "login") {?> active<?php }?>">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                  <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                    <form method="post" action="login" accept-charset="UTF-8">
                      <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                      <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                      <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                      <label class="string optional" for="user_remember_me"> Remember me</label>
                      <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                      <label style="text-align:center;margin-top:5px">or</label>
                                      <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                      <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                    </form>
                  </div>
                </li>
              <?php } else { ?>
                <li><a name="user">Hello, <?php echo $_SESSION["user"]["name"] ?></a></li>
                <li><a href="logout.php">Logout</a></li>
              <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
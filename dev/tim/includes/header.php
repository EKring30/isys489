<?php
  $jquery .= '$("#btnLogin").click(function() {})';
?>

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
          <ul class="navbar-nav nav pull-right">
            <?php
              if (empty($_SESSION['user'])) { ?>
            <li class="dropdown<?php if ($page == "login") {?> active<?php }?>" id="menuLogin">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login <b class="caret"></b></a>
              <div class="dropdown-menu" style="padding:17px;">
                <form class="form" id="formLogin"> 
                  <input name="username" id="username" type="text" placeholder="Username"> 
                  <input name="pwd" id="pwd" type="password" placeholder="Password"><br>
                  <button type="button" id="btnLogin" class="btn">Login</button>
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
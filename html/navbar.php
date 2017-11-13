<nav class="navbar is-light">
  <div class="navbar-brand">
  <a class="navbar-item" href="index.php">
    <img src="../sengoku/style/img/logo3.png" alt="Sengoku: Activity Report" width="30" height="90">
  </a>
  </div>
  <div id="navMenuTransparentExample" class="navbar-menu">
    <div class="navbar-start">
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <?php  if(isset($_SESSION['SESSID'])) { ?>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
              <img style="border-radius:50%;width:30px;height:50px" src="style/img/<?php echo $Users->GetUser($_SESSION['SESSID']);?>.png"> <span style="margin-left:5px;"> <?php echo $_SESSION['SESSNAME']; ?></span>
              </a>
              <div class="navbar-dropdown is-boxed">
                <a class="navbar-item " href="/documentation/overview/start/">

                </a>
                <a class="navbar-item " href="settings.php">
                <span class="icon" style="color: #000;">
                <i class="fa fa-sliders" aria-hidden="true"></i>
                </span> Settings
                </a>

                <hr class="navbar-divider">
                <div class="navbar-item">
                  <div>
                    <a href="util/logout.php"><span class="icon" style="color: #000;"><i class="fa fa-sign-out" aria-hidden="true"></i></span>         Log-Out</a>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?> 
           </p>
          <a class="navbar-item " href="https://bulma.io/love/">
          <span class="icon fa-spin bd-emoji">❤</span>
          <?php echo date('M-d'); ?>
          </a>
        </div> <!-- /field is grouped--> 
      </div> <!-- //navbar item --> 
    </div> <!-- //navbar end --> 
  </div> <!-- //navMenuTransparentExample --> 
</nav>
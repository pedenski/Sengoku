<?php
session_start();

include_once('html/login_header.php');


?>

<section class="hero is-light is-fullheight">
  <!-- Hero head: will stick at the top -->


  <!-- Hero content: will be in the middle -->

  <div class="columns is-mobile is-centered">
  <div class="column is-half is-narrow">
    
  </div>
</div>


  <div class="hero-body">
    <div class="container has-text-centered">
         <div class="columns is-mobile is-centered">
        <div class="column is-half is-narrow">
      
        <form id='login' action='_submit_login.php' method='post' accept-charset='UTF-8'>
          <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="username" placeholder="Username">
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
            
          </p>
       

        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" name="password" placeholder="Password">
            <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <button type='submit' name="submit" class="button is-info is-fullwidth">
              Login
            </button>
          </p>
        </div>
      </form>
      </div>
        </div>
    </div>
    </div>
  </div>


  <!-- Hero footer: will stick at the bottom -->
  
<div class="hero-foot">
    <nav class="is-fullwidth has-text-centered">
      <div class="container">
       <h6 class="subtitle is-6"><a href="https://github.com/pedenski">zdmurai 2017</a></h6>
      </div>
    </nav>
  </div>
</section>















<?php
include_once('html/login_header.php');


?>

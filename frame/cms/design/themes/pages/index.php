<!DOCTYPE html>
<!-- saved from url=(0050)https://colorlib.com/polygon/gentelella/login.html -->
<html lang="en" class="gr__colorlib_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AmrFrame | </title>

    <!-- Bootstrap -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="https://colorlib.com/polygon/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login" data-gr-c-s-loaded="true">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            
              <h1>Login Form</h1>
            <form id="form1" method="post" action="index#login">
              <div>
              
                <input type="text" name="log_email" class="form-control" placeholder="Username" required="">
              </div>
              <div>
                <input type="password" name="log_pass" class="form-control" placeholder="Password" required="">
              </div>
              <div>
                  <input  class="btn btn-default " type="submit" name="login" value="login" /> 
                   </form>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br>

                <div>
                  <h1><i class="fa fa-paw"></i> AmrFrame</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
           
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form id="form2" method="post" action="index.php#login">
              <h1>Create Account</h1>
              <div>
                <input name="name" type="text" class="form-control" placeholder="Username" required="">
              </div>
              <div>
                <input name="email" type="email" class="form-control" placeholder="Email" required="">
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="">
              </div>
               



                <div>
                <input name="themes" type="text" class="form-control" placeholder="Theme folder" required="">
              </div>

              <div>
                <input name="db_host" type="text" class="form-control" placeholder="database host(server)" required="">
              </div>

              <div>
                <input name="db_user" type="text" class="form-control" placeholder="database username" required="">
              </div>

              <div>
                <input name="db_pass" type="text" class="form-control" placeholder="database password" >
              </div>

              <div>
                <input name="db_name" type="text" class="form-control" placeholder="database name" required="">
              </div>

              <div class="form-group">
  <label for="sel1">Is the frame in subfolder please type its name:</label>
  <input name="main_folder" type="text" class="form-control" placeholder="mainfolder" >
  </div>

                 <div class="form-group">
  <label for="sel1">Active css , js cache *:</label>
  <select name="cache" class="form-control" id="sel1">
    <option value="1">yes /(recommended for puplising the site)/</option>
    <option value="0">no /(recommended for testing mode)/</option>
  </select>
  </div>


  <div class="form-group">
  <label for="sel1">there is php files ? *:</label>
  <select name ="static" class="form-control" id="sel1">
    <option value="0">yes /(recommended)/</option>
    <option value="1">no</option>
  </select>
  </div>

<div class="form-group">
  <label for="sel1">Is htaccess is activated ? *:</label>
  <select name="htaccess" class="form-control" id="sel1">
    <option value="1">yes /(recommended)/</option>
    <option value="0">no</option>
  </select>
  </div>




             

              <div>
               <input  class="btn btn-default submit" type="submit" name="signup" value="submit" /> 
              </div>


              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a admin ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br>

                <div>
                  <h1><i class="fa fa-paw"></i> AmrFrame</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  
</body></html>
<?php
print_r(error_get_last());

?>
<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'">
 <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png"
                                    alt="">
 </a>';
}

?>



<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>CDI573 - Centro De Desarrollo Integral</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                
                                </head>
                                <body className='snippet-body'>
                                <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Login</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="login_script.php" method="POST">
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" placeholder="Usuario o Email" required>
                                </div>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" placeholder="Ingrese su contraseña" required>
                                    <button class="btn bg-white text-muted">
                                        <span class="far fa-eye-slash"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-inline">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember" class="text-muted">Recordar</label>
                                <a href="#" id="forgot" class="font-weight-bold">Olvido su contraseña?</a>
                            </div>
                            <div class="btn btn-primary btn-block mt-3">Ingresar</div>
                            <div class="text-center pt-4 text-muted">No tienes una cuenta? <a href="#">Registrarse</a>
                            </div>
                            <div class="text-center pt-4 text-muted"> <a href="index.php">Retornar a la pagina principal.</a>
                        </form>
                    </div>
                    <br>
                    <div class="mx-3 my-2 py-2 bordert">
                        <div class="text-center py-3">
                            <a href="https://wwww.facebook.com" target="_blank" class="px-2">
                                <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt="">
                            </a>
                            <a href="https://www.github.com" target="_blank" class="px-2">
                                <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png"
                                    alt="">
                            </a>

                            <?php
                                if($login_button == '')
                                {
                                    echo '<div class="panel-heading">Bienvenido Usuario</div><div class="panel-body">';
                                    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                                    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                                    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                                    echo '<h3><a href="logout.php">Logout</h3></div>';
                                }
                                else
                                {
                                    echo '<div align="center">'.$login_button . '</div>';
                                }
                                ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'>#</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>



<style>::-webkit-scrollbar {
                                  width: 8px;
                                }
                                /* Track */
                                ::-webkit-scrollbar-track {
                                  background: #f1f1f1; 
                                }
                                 
                                /* Handle */
                                ::-webkit-scrollbar-thumb {
                                  background: #888; 
                                }
                                
                                /* Handle on hover */
                                ::-webkit-scrollbar-thumb:hover {
                                  background: #555; 
                                } @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    height: 100vh;
    background: linear-gradient(to top, #c9c9ff 50%, #9090fa 90%) no-repeat;
}
.container{
    margin: 50px auto;
}
.panel-heading{
    text-align: center;
    margin-bottom: 10px;
}
#forgot{
    min-width: 100px;
    margin-left: auto;
    text-decoration: none;
}
a:hover{
    text-decoration: none;
}
.form-inline label{
    padding-left: 10px;
    margin: 0;
    cursor: pointer;
}
.btn.btn-primary{
    margin-top: 20px;
    border-radius: 15px;
}
.panel{
    min-height: 380px;
    box-shadow: 20px 20px 80px rgb(218, 218, 218);
    border-radius: 12px;
}
.input-field{
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #ddd;
    color: #4343ff;
}
input[type='text'],
input[type='password']{
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%; 
}
.fa-eye-slash.btn{
    border: none;
    outline: none;
    box-shadow: none;
}
img{
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative;
}
a[target='_blank']{
    position: relative;
    transition: all 0.1s ease-in-out;
}

.bordert{
    border-top: 1px solid #aaa;
    position: relative;
}
.bordert:after{
    content: "or connect with";
    position: absolute;
    top: -13px;
    left: 33%;
    background-color: #fff;
    padding: 0px 8px;
}
@media(max-width: 360px){
    #forgot{
        margin-left: 0;
        padding-top: 10px;
    }
    body{
        height: 100%;
    }
    .container{
        margin: 30px 0;
    }
    .bordert:after{
        left: 25%;
    }
}</style>
                            
                                </body>
                            </html>
                            
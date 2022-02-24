<?php 

require_once 'Classes/Mail.php';

if($_POST) :
  if (isset($_POST['name'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  }
  if (isset($_POST['phone'])){
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  }
  if (isset($_POST['email'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  }
  if (isset($_POST['message'])){
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
  }
endif;
    
    $subject = "Message from personal Website";
    $message = stripslashes( nl2br( $message ) );
    
    $txt = '<html><body><p>Name = ' . $name . '</p>';
    $txt .= '<p>Phone = ' . $phone . '</p>';
    $txt .= '<p>Email = ' . $email . '</p>';
    $txt .= '<p>Message:</p> <p>' . $message . '</p></body></html>';

//Example using php mailer
$mail = new Mail;
//Set subject and sender of the mail.
$mail->setSubject($subject);
$mail->setSender($email);
//Set the plain content of the mail.
$mail->setContentHTML($txt);
//Add a receiver of the mail (you can add more than one receiver too).
$mail->addReceiver('jctyasociados@gmail.com');

$mail->isSMTP(true,['host'=>"smtp.office365.com",'user'=>'iolenterprises@outlook.com','pass'=>'1to1anyherzT&','port'=>587]);
//Finally send the mail.
$mail->send();

    $html = <<<EOT
    <!DOCTYPE html>

    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Javier Cristobal</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta name="description" content="" />
            <meta name="author" content="Javier Cristobal" />
            <!-- Bootstrap core CSS -->
      <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
      <!-- Bootstrap core JavaScript -->
      <script src="assets/dist/js/jquery-3.5.1.js"></script>
      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/functions.js"></script>
            <link href="css/styles.css" rel="stylesheet">
            <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>
            
        </head>
        <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="index.html">Javier Cristobal</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Me</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="certificates.html">Certificates</a></li>
              <li><a class="dropdown-item" href="briefing.html">Personal Briefing</a></li>
            </ul>
          </li> 
          <li class="nav-item">
            <a  class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <main role="main">
    
    <div class="jumbotron">
        <div class="container">
          <h1 class="header1">Javier Cristobal</h1>
          <p>This is my website with all my curriculum and certificates</p>
          <p><a class="btn btn-primary btn-lg" href="cv.pdf" role="button" target="_blank">Download Curriculum in PDF &raquo;</a></p>
        </div>
    </div>
    <div class="container">
        <hr>
        
        <p>Your Message has been received, you'll get a response as soon as posible.<p>
        <p>Regards:</p>
        <p>Javier Cristobal</p>
        <hr>
      
        </div> <!-- /container -->
    </main>
    
    </body>
    </html>
EOT;

echo $html;

?>
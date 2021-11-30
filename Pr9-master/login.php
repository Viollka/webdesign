<?php

session_start();

$isRestricted = false;

if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
   $isRestricted = true;
}

?>

<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       body{
           padding-top: 3rem;
       }
       .container {
           width: 400px;
       }
   </style>
</head>
<body>
<div class="container">
   <h3>LOGIN</h3>
   <form action="views/adduser.php" method="post">
       <div class="row">
           <div class="field">
               <label>E-mail: <input type="email" name="email"><br></label>
           </div>
       </div>
	   <div class="row">
           <div class="field">
               <label>Password: <input type="password" name="password"></label>
           </div>
       </div>
       <input type="submit" class="btn" value="LOGIN">
   </form>
</div>
</body>
</html>
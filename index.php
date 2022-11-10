<?php
    @$page = $_GET['page'];

    if($page == "")

    {

        $page = "1";

    }
?>

<html>
 <head>
    <title>Piwny Szczecin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" class="text/css" href="styles.css">
    <style>
      .button {
         background-color: black;
      border: black;
      color: white;
      padding: 7px 15px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 15px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      }
      .button:hover{
         background-color: #FF6633;
         color: white;
      }
      </style>
 </head>
 <body>
   <header>
     <img src="assets/photos/beer.png" width="10%" height="100%">
   </header>
   <section>
   <nav>
      <a class="button" href="index.php?page=1" >Główna</a>
      <a class="button" href="index.php?page=2">Piwne Info</a> 
      <a class="button" href="index.php?page=3">Login/rejestracja</a>
      <a class="button" href="index.php?page=4">Twoje Konto</a>
      <a class="button" href="index.php?page=5">Dodaj Piwo</a>
      </nav>
   </section>
      <div id="content">   
        <?php
          include($page.".php");
        ?>
        </div>

   <footer>
     Autor strony: Kamil Łęga
   </footer>

 </body>
</html>
<style>
  #content{
    width:100%;
    height:23vh;
    color:white;
    text-align:center;
}

</style>
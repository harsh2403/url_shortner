<?php
include './dbh.php';

     function urlExists($original_url){
          $conn=$GLOBALS['conn'];
          $row =  "SELECT * FROM url_short WHERE original_url='$original_url';" ;
          $result =mysqli_query($conn, $row);
          $resultCheck = mysqli_num_rows($result) ;
          if($resultCheck > 0){
            return true;
          } else{
            return false;
          }
       }

       function urlHasBeenShortened($original_url){
             // include_once './dbh.php';
             $conn=$GLOBALS['conn'];

             $row =  "SELECT * FROM url_short WHERE original_url='$original_url'; ";
             $result =mysqli_query($conn, $row);
             $resultCheck = mysqli_num_rows($result) ;
             if($resultCheck > 0){
               return true;
             } else{
               return false;
             }
       }

       function alreadyShortened($original_url){
             // include_once './dbh.php';
             $conn=$GLOBALS['conn'];

             $row =  "SELECT * FROM url_short WHERE short_url='$original_url'; ";
             $result =mysqli_query($conn, $row);
             $resultCheck = mysqli_num_rows($result) ;
             if($resultCheck > 0){
               return true;
             } else{
               return false;
             }
       }


       function getURLID($original_url){
         // include_once './dbh.php';
         $conn=$GLOBALS['conn'];

         $row =  "SELECT short_url FROM url_short WHERE original_url='$original_url';";
         $result = mysqli_query($conn,$row);
         $sql = mysqli_fetch_assoc($result);
         return $sql;
       }

       function insertURL($original_url,$url_to_store){
         // include_once './dbh.php';
         $conn=$GLOBALS['conn'];
          //$url_to_store='https://cse3.cf/'.$short_url;
          $row = "INSERT INTO url_short (original_url, created, short_url, clicks) VALUES ('$original_url',CURDATE(),'$url_to_store','0');";
          $result = mysqli_query($conn, $row);

         if(strlen($conn->error) == 0){
           return true;
         }
       }

       function getUrlLocation($original_url){
          $conn=$GLOBALS['conn'];
          $row =  "SELECT original_url FROM url_short WHERE short_url='$original_url';";
          $result = mysqli_query($conn,$row);
          $sql = mysqli_fetch_assoc($result);
          return $sql;
       }

       function getURL($original_url){
         // include_once './dbh.php';
         $conn=$GLOBALS['conn'];

         $row =  "SELECT original_url FROM url_short WHERE short_url='$original_url';";
         $result = mysqli_query($conn,$row);
         $sql = mysqli_fetch_assoc($result);
         return $sql;
       }


 ?>

<?php
      include './dbh.php';
      include './functions.php';

      $original_url  =  $_POST['url'];
      $short_url     =  hash('crc32',$original_url);
      $url_to_store='http://tripoto.pe.hu/'.$short_url;
      $clicks = 0;

      if(urlExists($original_url)== true){
            $short_url     =  hash('crc32',$original_url);
      }

      if(urlHasBeenShortened($original_url)){
          echo implode("",getURLID($original_url)) ;
            return true;
      }

      if(alreadyShortened($original_url)){
        echo implode("",getUrl($original_url));
          return true;
      }

      insertURL($original_url, $url_to_store);

      echo 'http://tripoto.pe.hu/'.$short_url;
 ?>

<?php
              include './dbh.php';
                include './functions.php';
            if(isset($_GET['$url_to_store'])){
              $url_to_store = $_GET['$url_to_store'];
              $url          = getUrlLocation($url_to_store);
              header('Location: '.$url);
            }

?>
<!DOCTYPE html>
<html>
        <head>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <title>URL SHORTNER</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="main.css">
            <!--Import Google Icon Font-->
             <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
             <!--Import materialize.css-->
             <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>

        </head>
        <body>
           <br>
                <div class="head">
                      <h1>Simplify Your Links!</h1>


                <div class="input-field col s6">
                      <input style="width:20%; background-color: white;" id="icon_prefix" type="text" name="url">

                <!--   <label style=" margin-left: 750px;" for="icon_prefix">Enter URL to Shorten</label> -->

                </div>


                      <input style="border-style: hidden;" type="submit" value="shorten my url">
                      <br>
                      <p class="errors"></p>
                </div>
            <script type="text/javascript">
              $(document).ready(function(){
                  $('input[type="submit"]').click(function(e){
                      e.preventDefault();
                      $('.errors').html('');
                      var url = $('input[name="url"]').val();

                      if(url.length==0){
                         $('.errors').html('whoops! please enter a url');
                        return false;
                      }
                      $.post('process.php', {url: url},
                      function (data, textStatus, xhr){
                        $('.errors').html('<a href="' + url + '" target="_blank">' + data + '</a>')
                      });
                  });
              });
                </script>


                <?php
                            include './dbh.php';
                            $query = "SELECT * FROM url_short; ";
                            $conn=$GLOBALS['conn'];
                            $member = mysqli_query($conn,$query);
                            if (!$member) {
                            die($query);
                            }
                ?>
                      <br>
                            <table class="striped">
                                <thead>
                                  <tr>
                                    <th>Original_url</th>
                                    <th>Created</th>
                                    <th>Short_url</th>
                                    <th>clicks</th>
                                  </tr>
                                </thead>

                                <tbody>
                                        <?php while($row = mysqli_fetch_array($member)) { ?>
                                          <tr>
                                            <td><a href="<?php echo $row['original_url']; ?>"><?php echo $row['original_url']; ?></a></td>
                                            <td><?php echo $row['created']; ?></td>
                                            <td><a href="<?php echo $row['original_url']; ?>"><?php echo $row['short_url']; ?></a></td>
                                            <td id="click" >


                                            </td>
                                          </tr>
                                        <?php } ?>
                                </tbody>



                                  <!--<script type="text/javascript">
                                    var count;
                                    function myFunction() {
                                       count=0;
                                    var  inc=1;
                                    count=count+inc;
                                    return count;
                                  }
                                      document.getElementById("click").innerHTML=myFunction();

                                  </script> -->






        </body>
</html>

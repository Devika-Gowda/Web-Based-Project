<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Cattle Feed Transaction</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/news.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="background-image: url(images/img3.jpg);background-size:100% 100%;background-repeat: no-repeat;">
        <div class="main">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
              <a class="navbar-brand" href="#" style="padding-left:0%;">Kamadhenu</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link "href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link "href="customerview.php">Customer View</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link "href="cattlefeed.php">Cattle Feed</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link "href="transport.php">Milk Transport</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link "href="news.php">News</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link "href="feedback.php">Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link "href="about.php">About Us</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Type here.." aria-label="Search" id="searchbar">
                  <input class="btn btn-outline-success" type="button"id="btnsearch" value="Search" onclick="search();">
                </form>
              </div>
            </div>
          </nav>
            <hr size="2">
            <div class='container my-5'>
                <h1 class='text-center my-4 ' style='color: pink;'>Cattle Feed Details</h1>
                <div class='row row-cols-1 row-cols-md-2 g-4'>
                      <?php
                        $con=new mysqli("localhost","root","","phpdairy");
                        if($con->connect_error){
                            die("Failed to connect:".$con->connect_error);
                        }
                        $sql="SELECT * FROM tblfeed";
                        $result=$con->query($sql);
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        while($row = $result->fetch_assoc()){
                          $id=$row['cf_id'];
                        echo "
                    <div class='col'style='padding:10%'>
                      <div class='card' style='width: 20rem;'>
                    <img src='$row[cf_photo]' class='card-img-top img-fluid' alt='...'>
                    <div class='card-body'>
                          <h5 class='card-title'>$row[feed_name]</h5>
                          <p class='card-text'>$row[details]<br><b>$row[amt]&nbsp;Kg</b></p>
                          <a href='orde.php?fid=$id' class='btn btn-primary'>Place Order</a>
                        </div>   
                        </div>
                          </div>
                         
                ";
                }
                ?> 
                </div>
                </div>
                <?php
        include("footer.php");
        ?>
            </div>
    </body>
</html>
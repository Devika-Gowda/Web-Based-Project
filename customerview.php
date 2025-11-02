<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer View</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/home.css">
</head>
<body style="background-image: url(images/img3.jpg);background-size:cover;background-repeat: no-repeat;">
<div class="main">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
              <a class="navbar-brand"  style="padding-left:0%;">Kamadhenu</a>
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
<div class="container my-5" >
        <h2>Personal Transaction</h2>
        <br/>
        <br/>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-white">Enter Producer ID:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="pid"required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Date</th>
                    <th>Quantity(in Litre)</th>
                    <th>Fat</th>
                    <th>SNF</th>
                    <th>CLR</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('dbconnect.php');
                if($_SERVER['REQUEST_METHOD']=='POST'){
                $sql="SELECT * FROM tblproducer,tblmilk WHERE tblproducer.p_id=tblmilk.p_id";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                $pid=$_POST['pid'];
                while($row = $result->fetch_assoc()){
                if($row['p_id']===$pid){
                    echo "
                    <tr>
                    <td>$row[p_id]</td>
                    <td>$row[p_name]</td>
                    <td>$row[p_mail]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>$row[date]</td>
                    <td>$row[litre]</td>
                    <td>$row[fat]</td>
                    <td>$row[snf]</td>
                    <td>$row[clr]</td>
                    <td>$row[price]</td>
                    <td>$row[tot_price]</td>
                </tr>
                ";
                }
            }
        }
        
                ?>
                
            </tbody>
        </table>
    </div>
    <?php
        include("footer.php");
        ?>
</body>
</html>
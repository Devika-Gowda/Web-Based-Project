<?php
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit-no">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
      <div class="wrapper">
        <div class="body-overlay"></div>
          <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
              <h3><p style="font-size: 32px;font-family: Chiller;font-weight: bold;color: pink;padding-left: 16px;">Kamadhenu</p></h3>
              </div>
              <ul class="list-unstyled components">
                <li class="active">
                  <a href="#" class="dashboard"><i class="material-icons">dashboard</i><span>dashboard</span></a>
                </li>
                <div class="small-screen navbar-display">
                  <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                      <li><a href="#">You have 5 new messages</a></li>
                      <li><a href="#">You have 5 new messages</a></li>
                      <li><a href="#">You have 5 new messages</a></li>
                      <li><a href="#">You have 5 new messages</a></li>
                    </ul>
                  </li>
                  <li class="d-lg-none d-md-block d-xl-none d-sm-block ">
                    <a href="#"><i class="material-icons">apps</i><span>apps</span></a>
                  </li>
                  <li class="d-lg-none d-md-block d-xl-none d-sm-block ">
                    <a href="#"><i class="material-icons">person</i><span>user</span></a>
                  </li>
                  <li class="d-lg-none d-md-block d-xl-none d-sm-block ">
                    <a href="#"><i class="material-icons">settings</i><span>setting</span></a>
                  </li>
                </div>
                <li class="dropdown">
                  <a href="/phpdairy/membership.php">
                    <i class="material-icons">aspect_ratio</i><span>Membership Management</span></a>
                </li>
                <li class="dropdown">
                  <a href="/phpdairy/milkdetails.php">
                    <i class="material-icons">apps</i><span>Milk Statistics</span></a>
                </li>
                <li class="dropdown">
                  <a href="/phpdairy/transport.php">
                    <i class="material-icons">equalizer</i><span>Milk Transport Report</span></a>
                </li>
                <li class="dropdown">
                  <a href="/phpdairy/addfeed.php">
                    <i class="material-icons">extension</i><span>Cattle Feed Management</span></a>
                </li>
                <li class="dropdown">
                  <a href="/phpdairy/viewfeedback.php">
                    <i class="material-icons">border_color</i><span>Feedback Management</span></a>
                </li>
                <li class="dropdown">
                  <a href="/phpdairy/addnews.php">
                    <i class="material-icons">grid_on</i><span>News</span></a>
                </li>
                <li class="dropdown">
                  <a href="/phpdairy/myaccount.php">
                    <i class="material-icons">person</i><span>My Account</span></a>
                </li>
              </ul>
          </nav>
          <div id="content">
            <div class="top-navbar">
              <nav class="navbar navbar-expand-lg">
                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" 
                data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                  <span class="material-icons">arrow_back_ios</span>
                <a class="navbar-brand" href="#">Dashboard</a></button>
                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" 
                data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">more_vert</span>
                </button>
                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarcollapse">
                  <ul class="nav navbar-nav ml-auto" style="padding-left: 1200px;">
                    <li class="nav-item dropdown active">
                      <a class="nav-link" href="#" data-toggle="dropdown">
                        <span class="material-icons">notifications</span>
                        <span class="notification">4</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="#">You have 4 new messages</a>
                        </li>
                        <li>
                          <a href="#">You have 4 new messages</a>
                        </li>
                        <li>
                          <a href="#">You have 4 new messages</a>
                        </li>
                        <li>
                          <a href="#">You have 4 new messages</a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><span class="material-icons">apps</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><span class="material-icons">person</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><span class="material-icons">settings</span></a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
            <div class="main-content">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header">
                      <div class="icon icon-warning">
                        <span class="material-icons">equalizer</span>
                      </div>
                    </div>
                    <div class="card-content">
                      <p class="category"><strong>Visits</strong></p>
                      <h3 class="card-title">70,340</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-info">info</i>
                        <a href="#">See detailed report</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header">
                      <div class="icon icon-rose">
                        <span class="material-icons">shopping_cart</span>
                      </div>
                    </div>
                    <div class="card-content">
                      <p class="category"><strong>Orders</strong></p>
                      <h3 class="card-title">102</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-info">local_offer</i>
                        product-wise sales
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header">
                      <div class="icon icon-success">
                        <span class="material-icons">attach_money</span>
                      </div>
                    </div>
                    <div class="card-content">
                      <p class="category"><strong>Revenue</strong></p>
                      <h3 class="card-title">$23,100</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-info">date_range</i>
                        Weekly sales
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header">
                      <div class="icon icon-success">
                        <span class="material-icons">follow_the_signs</span>
                      </div>
                    </div>
                    <div class="card-content">
                      <p class="category"><strong>Total Members</strong></p>
                      <h3 class="card-title">
                        <?php
                        $sql="SELECT * FROM tblproducer";
                        $result=$con->query($sql);
                        if(!$result){
                            die("Invalid query:".$con->error);
                        }
                        $rowcount=mysqli_num_rows($result);
                        echo "$rowcount";
                        ?>
                      </h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-info">update</i>
                        just updated
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-7 col-md-12">
                  <div class="card" style="min-height:485px">
                  <div class="card-header card-header-text">
                    <h4 class="card-title">Members Stats</h4>
                    <p class="category">New Members on 3rd June,2023</p>
                  </div>
                  <div class="card-content table-responsive">
                    <table class="table table-hover">
                      <thead class="text-primary">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Joined at</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                $sql="(SELECT * FROM tblproducer ORDER BY p_id DESC LIMIT 5) ORDER BY p_id ASC";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[p_id]</td>
                    <td>$row[p_name]</td>
                    <td>$row[p_mail]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                </tr>
                ";
                }
                ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>
                <div class="col-lg-5 col-md-12">
                  <div class="card" style="min-height: 485">
                  <div class="card-header card-header-text">
                    <h4 class="card-title">Activities</h4>
                  </div>
                </div>
                  <div class="card-content">
                  <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/slide1.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide2.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide3.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide4.jpg" class="d-block w-100" alt="..."style="width:100%;height:400px;">
                  </div>
                </div>
              </div>
                </div>
              </div>
              </div>
              <footer class="footer">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-6">
                      <nav class="d-flex">
                        <ul class="m-0 p-0">
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Company</a></li>
                          <li><a href="#">Portfolio</a></li>
                          <li><a href="#">Blogs</a></li>
                        </ul>
                      </nav>
                    </div>
                    <div class="col-md-6">
                      <p class="copyright d-flex justify-content-end">
                        &copy;2023
                        <a href="#">Copyrights are Reserved </a>
                      </p>
                    </div>
                  </div>
                </div>
              </footer>
            </div>
          </div>
        
        <script src="js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#sidebar-collapse").on('click',function(){
              $('#sidebar').toggleClass('active');
              $('#content').toggleClass('active');
            });
            $(".more-button,.body-overlay").on('click',function(){
              $('#sidebar,.body-overlay').toggleClass('show-nav');
          });
        });
        </script>
    </body>
</html>
<?php
$con=new mysqli("localhost","root","","phpdairy");
if($con->connect_error){
    die("Failed to connect:".$con->connect_error);
}
$sql="SELECT * FROM tbltransport";
$result=$con->query($sql);
if(!$result){
    die("Invalid query:".$con->error);
}
$chart_data="";
while($row = $result->fetch_assoc()){
    $date[]=$row['t_date'];
    $mqty[]=$row['m_qty'];

}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>Milk Transport</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
        <script src="js/bootstrap.bundle.min.js"></script>
        <style>
        #chart-container{
            width:640px;
            height:auto;
        }
        </style>
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
                      <?php
                      include('dbconnect.php');
                      session_start();
                      $sql="SELECT * FROM tblsupervisor";
                      $result=mysqli_query($con,$sql);
                       if(mysqli_num_rows($result)===1){
                       $row=mysqli_fetch_assoc($result);
                    if($row['role']==="$_SESSION[role]"){
                      echo "<li class='nav-item'>
                        <a class='nav-link 'href='addmilk.php'>Milk Statistics</a>
                      </li>
                      ";
                    }}
                      ?>
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
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchbar">
                      <input class="btn btn-outline-success" type="button"id="btnsearch" value="Search" onclick="search();">
                    </form>
                  </div>
                  <a href="logout.php">Logout</a>
                </div>
              </nav>
            <hr size="2">
            <h2 class="text-white text-center">Milk Transport</h2>
            <div class="container my-5" >
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        <br/>
        <br/>
        <?php
        include('dbconnect.php');
        session_start();
        $sql="SELECT * FROM tblsupervisor";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if($row['role']==="$_SESSION[role]"){
        echo "<a class='btn btn-primary'href='/phpdairy/addtransport.php' role='button'>Add Transport Details</a>
        ";
        }}
        ?>
        <br/>
        <br/>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Total Quantity</th>
                    <th>Destination</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $sql="SELECT * FROM tbltransport";
                $result=$con->query($sql);
                if(!$result){
                    die("Invalid query:".$con->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[t_id]</td>
                    <td>$row[t_date]</td>
                    <td>$row[m_qty]</td>
                    <td>$row[loc]</td>
                    <td>$row[time]</td>
                    </tr>
                ";
                }
                ?>   
            </tbody>
        </table>
    </div>
            <?php
        include("footer.php");
        ?>
        </div>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/chart.min.js"></script>
        <script type="text/javascript">
            var ctx=document.getElementById("bargraph").getContext("2d");
            var mychart=new Chart(ctx,{
                type:'bar',
                data:{
                    labels:<?php echo json_encode($date);?>,
                    datasets:[{
                        backgroundColor:[
                            "#6f3535",
                            "#5945fd",
                            "#25d5f2",
                        ],
                        hoverBackgroundColor:[
                            "#5969ff",
                            "#25d5f2",
                            "#5945fd",
                        ],
                            data:<?php echo json_encode($mqty);?>
                }]
                    },
                    option:{
                        legend:{
                            responsive:true,
                            display:true,
                            position:'bottom',
                            labels:{
                                fontColor:'pink',
                                fontFamily:'Times New Roman',
                                fontSize:14,
                                padding:30,
                                innerWidth:10
                            }
                        }
                    }
            });
        </script>
        </body>
</html>
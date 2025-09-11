<?php
include("dbconnect.php");
$name="";
$email="";
$msg="";
$rating="";
$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $msg=$_POST["msg"];
    $rating=$_POST["rating"];
    do {
        if(empty($name)||empty($email)||empty($msg)||empty($rating)){
            $errorMessage="All the fields are required ";
            break;
        }
        $sql="SELECT p_id FROM tblproducer WHERE p_name='$name' AND p_mail='$email'";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $row = $result->fetch_assoc();
        if(!$row){
            $errorMessage="No email found ";
        exit;
    }
    $data=$row["p_id"];
        $sql="INSERT INTO tblfeedback(p_id,msg,rating)"."VALUES($data,'$msg','$rating')";
        $result=$con->query($sql);
        if(!$result){
            $errorMessage="Invalid query:".$con->error;
            break;
        }
        $name="";
        $email="";
        $msg="";
        $rating="";
        $successMessage="Feedback sent successfully";
        exit;
    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Feedback</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="jquery.rateyo.min.css"> 
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
            <hr >
            <div class="container mt-4 shadow-lg">
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6" style="font-family: 'Times New Roman';">
                            <h2 class="text-white text-center">Feedback Form</h2>
                            <p class="text-white">We would love to hear your thoughts, concerns or problem with anything so we can improve!</p>
                            <hr>
                            <?php
                                if(!empty($errorMessage)){
                                    echo "
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>$errorMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                                    </div>
                                    ";
                                }
                                ?>
                            <form style="color: white;" method="post">
                                <h4>Feedback Type</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="radio" name="feed" class="pointer">&nbsp;&nbsp;<label>Comments</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="feed">&nbsp;&nbsp;<label>Bug Reports</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="feed">&nbsp;&nbsp;<label>Questions</label>
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control"name="email" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label">Describe Feedback:</label>
                                    <textarea rows="4" class="form-control" name="msg" required></textarea>
                                </div>
                                <label class="form-label">Give Ratings:</label>&nbsp;&nbsp;
                                <div class="rateyo" id="rating" 
                                data-rateyo-rating="4" 
                                data-rateyo-num-stars="5" 
                                data-rateyo-score="3">
                            </div>
                                    <span class="result">0</span>
                                    <input type="hidden" name="rating">
                                <?php if(!empty($successMessage)){
                            echo "
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            </div>
                            </div>
                            ";
                        }
                        ?>
                                <br><button type="submit" class="btn btn-primary">Submit feedback</button>
                                
                            </form>
                            <br/>
                        </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <?php
        include("footer.php");
        ?>
            </div>
            <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
 
 $(".rateyo").rateYo().on("rateyo.change",function(e,data){
   var rating=data.rating;
   $(this).parent().find('.score').text('score: '+$(this).attr('data-rateyo-score'));
   $(this).parent().find('.result').text('rating: '+rating);
   $(this).parent().find('input[name=rating]').val(rating);
 });

});
    </script>
    </body>
</html>
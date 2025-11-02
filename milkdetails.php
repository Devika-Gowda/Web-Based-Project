<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-image: url(images/img3.jpg);background-size:cover;background-repeat: no-repeat;">
    <div class="container my-5" >
        <h2>List of Milk Producers and their Milk supply details</h2>
        <br/>
        <br/>
        <a class="btn btn-primary"href="/phpdairy/addmilk.php" role="button">Add Milk</a>
        <br/>
        <br/>
        <table class="table table-info" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Quantity(in Litre)</th>
                    <th>Fat</th>
                    <th>SNF</th>
                    <th>CLR</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con=new mysqli("localhost","root","","phpdairy");
                if($con->connect_error){
                    die("Failed to connect:".$con->connect_error);
                }
                $sql="SELECT * FROM tblproducer,tblmilk WHERE tblproducer.p_id=tblmilk.p_id";
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
                    <td>$row[date]</td>
                    <td>$row[litre]</td>
                    <td>$row[fat]</td>
                    <td>$row[snf]</td>
                    <td>$row[clr]</td>
                    <td>$row[price]</td>
                    <td>$row[tot_price]</td>
                    <td>
                        <a class='btn btn-primary btn-sm'href='/phpdairy/editmilk.php?pid=$row[p_id]'>Edit</a>
                    </td>
                </tr>
                ";
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
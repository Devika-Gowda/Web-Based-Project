<?php
session_start();
$session=session_id();
if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['role'])){
    function test_input($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);
    $role=test_input($_POST['role']);
    if(empty($email)||empty($password)||empty($role)){
        echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong> All the fields are required</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
    }
    else {
        $con=new mysqli("localhost","root","","phpdairy");
        if(!$con){
            echo "Connection failed";
            exit();
        }
        if($role=='admin'){
        $sql="SELECT * FROM tbladmin WHERE a_mail='$email' AND password='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if($row['password']===$password && $row['role']===$role){
                $_SESSION['a_mail']=$email;
                $_SESSION['password']=$password;
                $_SESSION['role']=$role;
                header("Location:admin.php");
            }
            else{
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
        }else{
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    }
    else if($role=='supervisor'){
        $sql="SELECT * FROM tblsupervisor WHERE emailid='$email' AND pwd='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if($row['pwd']===$password && $row['role']===$role){
                $_SESSION['emailid']=$email;
                $_SESSION['pwd']=$password;
                $_SESSION['role']=$role;
                header("Location:home.php");
            }
            else{
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
        }else{
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    }
    else if($role=='producer'){
        $sql="SELECT * FROM tblproducer WHERE p_mail='$email' AND p_pwd='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if($row['p_pwd']===$password && $row['role']===$role){
                $_SESSION['p_mail']=$email;
                $_SESSION['p_pwd']=$password;
                $_SESSION['role']=$role;
                header("Location:home.php");
            }
            else{
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
        }else{
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Invalid Email and Password</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Login page</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <style type="text/css">
            .icon-user{
                position: absolute;
                left: 250px;
                top: 0;
                width: 60px;
                height: 53%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .icon-eye{
                position: absolute;
                left: 250px;
                top: 80px;
                width: 60px;
                height: 53%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body style="background-image: url(images/img3.jpg);">
        <div class="container vh-100 ">
            <div class="row justify-content h-100 " >
                <div class="card w-25 my-auto shadow">
                    <div class="card-header text-center bg-info text-white">
                        <h2>Login Form</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" >
                                <div class="icon-user">
                                    <i class="fa-solid fa-user" aria-hidden="true"></i>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" >
                                <div class="icon-eye">
                                    <span><i class="fa-solid fa-eye" id="show-password" aria-hidden="true"></i></span>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="form-select mb-3" name="role" >
                                    <option selected value="producer">Producer</option>
                                    <option value="admin">Admin</option>
                                    <option value="supervisor">Supervisor</option>
                                </select>
                            </div><br>
                            <input type="submit" class="btn btn-info w-100" value="Login" name=""/>
                            <a href="password-reset.php"class="float-start">Forgot your password?</a>
                        </form>                
                    </div>
                    <div class="card-footer text-right">
                        <small>&copy; Copyrights are reserved</small>
                    </div>
                </div>
            </div>
        </div>
        <script >
            const togglePassword = document.querySelector('#show-password');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            });
        </script>
    </body>
</html>


                         
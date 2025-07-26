<?php include('conn.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>HI USER</h1>
<p>REGISTER HERE</p>
<div>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="number">Phone number</label>
        <input type="number" name="Phone" id="number" placeholder=Phonenumber required><br><br>
    <label for="password">Password</label>
        <input type="password" name="Password" id="password" placeholder=Password required><br><br>
    <label for="Confirm-pasword">Confirm_password</label>
        <input type="password" name="Confirm_password" id="Confirm_pass" placeholder=Confirm-Password required><br><br>
    <label for="text">Referral_code</label>
        <input type="number" name="Referral" id="text" placeholder=Referral-code><br><br>
        <input type="submit" name="register" value="register">
    </form>
        <p>Already have an account? <a href="login.php">login</a></p>
</div>

        <?php
           

            if (isset($_POST['register'])) {
                $Phone =$_POST['Phone'];
                $Password =$_POST['Password'];
                $Confirm_password =$_POST['Confirm_password'];
                $Referral =$_POST['Referral'];

               // print_r($_POST);
                //die();

                
                if (empty($Phone) || empty($Password) || empty($Confirm_password)) {
                    echo "Required Field Cannot be Empty"; 
                } elseif ($Confirm_password != $Password) {
                    echo "Password do not Match";
                } else {
                    $sql = "INSERT INTO `login`(`Phone`, `Password`, `Confirm_password`, `Referral`) VALUES ($Phone, $Password, $Confirm_password, $Referral)";
                    $query = mysqli_query($conn, $sql);
                    
                if ($query) {
                    echo "New Record Inserted Successfully";
                    header('location: login.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    header('location: register.php');
                }
                       
            }
        }
        ?> 
</body>
</html>
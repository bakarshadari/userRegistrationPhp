<?php
require_once('configration.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $firstname      = $_POST['firstname'];
            $lastName       = $_POST['lastName'];
            $email          = $_POST['email'];
            $phoneNumber    = $_POST['phoneNumber'];
            $password       = $_POST['password'];
            $sql = "INSERT INTO users (firstName , lastName, email , phone , password ) VALUES (?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname , $lastName , $email , $phoneNumber , $password]);
            if($result){
                echo "sucessfully saved";
            }
            else{
                echo "errors in saving the data";
            }
            // echo $firstname . "" . $lastName ."" .  $email . "" .  $phoneNumber  ."" . "" . $password;

           
        }

?>
    </div>
    <div>
            <form action="regestration.php" method = "post">
                <div class = "container">
                    <div class="row">
                        <div class = "col-sm-3">
                            <h1>user registration</h1>
                            <p>enter the correct values </p>
                            <hr class="mb-3">
                            <label for="firstName "><b>first Name</b></label>
                            <input class="form-control" id = "firstname" type="text" name="firstname" required>
                            
                            <label for="lastName "><b>last Name</b></label>
                            <input class="form-control" id = "lastName"type="text" name="lastName" required>
                            <label for="email "><b>email</b></label>
                            <input class="form-control" id = "email" type="text" name="email" required>
                            
                            <label for="phoneNumber "><b>phone Number</b></label>
                            <input class="form-control" id = "phoneNumber"type="text" name="phoneNumber" required>
                            
                            <label for="password "><b>password</b></label>
                            <input class="form-control" id = "password"type="text" name="password" required>
                            <hr class="mb-3">
                            <input class = "btn btn-primary" type="submit" id ="register"name="create" value = "Sing Up">
                        </div>
                        
                    </div>

   </div>



    </form>




    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function (){
            $('#register').click(function (e){
                var valid = this.form.checkValidity();
                
                if(valid){


                var firstname        = $('#firstname').val();
                var lastName         = $('#lastName').val();
                var email            = $('#email').val();
                var phoneNumber      = $('#phoneNumber').val();
                var password         = $('#password').val();

                    e.preventDefault();
                    $.ajax({
                        type:'POST',
                        url:'process.php',
                        data{firstname: firstname,lastName:lastName, email: email , phoneNumber: phoneNumber, password:password},
                        success: function(data){
                        swal.fire({
                                    'title': "successfull.",
                                    'text': "successfully recorded data.",
                                     'type':"success"
                                    })
                        },
                        error: function(data){
                        swal.fire({
                                    'title': "error.",
                                    'text': "There is an error in data saving..",
                                    'type':"error"
                                    })
                         }
                    });
                   

                // }else{
                    
                }
                
            });
            // alert('hello.')
            
            
        });


    </script>
</body>
</html>
/// configartion of php connection_aborted
<?php

$db_user = "root";
$db_pass = "";
$db_name = "useraccount";
$db = new PDO('mysql:host=localhost;dbname='.$db_name.';charset-utf8',$db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//process file 
<?php

echo "hellow precess";
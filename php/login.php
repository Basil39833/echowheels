<?php
session_start();
?>
<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
<?php
require("../connect.php");
if (isset($_POST['sub'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "select * from login where email_id='$email'";
    $res = count_data($sql);
    if ($res > 0) {

        $res = select_data($sql);
        
        if ($res) {
            $rows=mysqli_fetch_assoc($res);
            if ($password == $rows['password']) {
                $status = $rows['user_status'];
                if ($status == 1) {

                    $usertype = $rows['user_type'];
                    if ($usertype == 0) {
                        $_SESSION['email_id']=$rows['email_id'];
                        ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                text: 'Welcome Back Admin',
                                didClose: () => {
                                window.location.replace('../dash/admin.html');
                                }
                                });
                        </script>
                        <?php
                    } else if ($usertype == 1) {
                        $_SESSION['email_id']=$rows['email_id'];
                        ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                text: 'Welcome Back User',
                                didClose: () => {
                                window.location.replace('../user/index.php');
                                }
                                });
                        </script>
                        <?php
            
                    } 
                  
                } 
                else {
                    ?>
                    <script>
                    Swal.fire({
                    icon: 'error',
                    text: 'User not Valid',
                    didClose: () => {
                        window.location.replace('../index.html');
                         }
                          });
                        </script>
                    <?php
                }
            } 
            else {
                ?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    text: 'Incorrect',
                    didClose: () => {
                        window.location.replace('../index.html');
                         }
                          });
                        </script>
                <?php
            }
        } 
        else {
            ?>
            <script>
                    Swal.fire({
                    icon: 'error',
                    text: 'Error Occurred',
                    didClose: () => {
                        window.location.replace('../index.html');
                         }
                          });
                        </script>
            <?php
        }
    } else {
        ?>
        <script>
                    Swal.fire({
                    icon: 'error',
                    text: 'Account not exist',
                    didClose: () => {
                        window.location.replace('../index.html');
                         }
                          });
                        </script>
        <?php
    }
}
?>
</body>
</html>
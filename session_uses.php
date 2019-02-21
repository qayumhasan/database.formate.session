------------------------------------------------------------------------------------------------------------------
									index.php
------------------------------------------------------------------------------------------------------------------

<?php
    include 'inc/database.php';
    $db = new Database;  
?>
<?php
    include 'inc/session.php';
    Session::checkSession();
?>

--------------------------------------------------------------------------------------------------------------										 login.php 																	----------------------------------------------------------------------------------------------------------------->
<!-- login.php header -->
<?php
    include 'inc/database.php';
    
    $db = new Database; 
    
?>
<?php 
    include 'inc/session.php';
    Session::init();
?>

  <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $sql = "SELECT * FROM tbl_user WHERE name='$uname' AND pass='$pass'";
            $result = $db->select($sql);
            if ($result !=false) {
                $value = mysqli_fetch_assoc($result);
                $rows = mysqli_num_rows($result);
                if ($rows>0) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $value['name'];
                    $_SESSION['email'] = $value['email'];
                    header('location:index.php');
                }
            }                           
 ?>

 ----------------------------------------------------------------------------------------------------------------										 logout.php 															------------------------------------------------------------------------------------------------------------ 

  <a href="?action=logout" class="btn_ancor">Log out</a>
    <?php 
        if (isset($_GET['action']) && $_GET['action']='logout') {
            session_destroy();
            header('location:login.php');
        }
    ?>
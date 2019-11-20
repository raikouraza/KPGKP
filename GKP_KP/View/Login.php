<?php
if($_SESSION['approved_user'] == FALSE){
    ?>
    <div style="width:200px;height:100px;border:1px solid grey; margin:auto;">
        <form method="POST" action="">
            <div style="text-align: center">
                <div>Username :</div>
                <div><input type="text" name="uname" placeholder="Username"></div>
            </div>
            <div style="text-align: center">
                <div>Password :</div>
                <div><input type="password" name="pwd" placeholder="Password"></div>
            </div>
            <div style="text-align: center" >
                <div><input type="Submit" name="btnLogin" value="Login" style="background-color: cornflowerblue;color:darkblue;width: 100px;"></div>
            </div>
        </form>
    </div>
    <?php
}else{
    ?>
    <h5>Welcome, <?php echo $_SESSION['name']; ?></h5>
    <p>You have logged in as <?php echo $_SESSION['userrole']; ?></p>
    <?php
}
?>




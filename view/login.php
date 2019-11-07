<?php
    $userdao = new UserDao();
    $login = filter_input(0,"btnLogin");
    if(isset($login)){
        $uname = filter_input(0,"Uname");
        $pass = filter_input(0,"Pass");
        $usr = new User();
        $usr->setUsername($uname);
        $usr->setPassword($pass);
        $ulogged = $userdao->loginUser($usr);
        if($ulogged != false){
            /* @var User $ulogged*/
            $_SESSION["logged_as"] = $ulogged[0]->getRole()->getName();
            $_SESSION["loggedin"] = true;
            header('location:index.php');
        }
    }
?>

<form method="POST">
    <div style="padding:1% 1%;">
        <label for="inpUname">username: </label><br>
        <input type="text" id="inpUname" name="Uname" placeholder="username" autofocus>
    </div>
    <div style="padding:0 1%;">
        <label for="inpPass">password: </label><br>
        <input type="password" id="inpPass" name="Pass" placeholder="password">
        <button type="submit" name="btnLogin">Login</button>
    </div>
</form>
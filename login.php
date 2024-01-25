<div class="login-01">
    <div class="one-login  hvr-float-shadow">
        <div class="one-login-head">
            <h1>LOGIN</h1>
            <span></span>
        </div>
        <div class="form1">
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <li>
                    <input name="email" type="text" placeholder="Username" id="username">
                </li>
                <li>
                    <input name="password" type="password" placeholder="Password" id="password">
                </li>

                <div class="submit">
                    <input name="login" type="submit" value="SIGN IN">
                </div>

                <h5>Don't have an account ?<a href="<?php echo "?p=register"; ?>"> Sign Up </a></h5>
            </form>
        </div>
    </div>
</div>
<?php
if ($_POST["login"]) {
    $sqlag = mysqli_query($kon, "select * from anggota where email='$_POST[email]' and password='$_POST[password]'");
    $rag = mysqli_fetch_array($sqlag);
    $row = mysqli_num_rows($sqlag);
    if ($row > 0) {
        session_start();
        $_SESSION["userag"] = $rag["email"];
        $_SESSION["passag"] = $rag["password"];
        echo "<div align='center'>Login Berhasil</div>";
    } else {
        echo "<div align='center'>Username Atau  Password Salah</div>";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
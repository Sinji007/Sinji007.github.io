<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!--Stylesheet-->
<style media="screen">
    *,
    *:before,
    *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #ffffff;
    }

    .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
    }

    .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
    }

    .shape:first-child {
        background: linear-gradient(#833d31,
                #23a2f6);
        left: -80px;
        top: -80px;
    }

    .shape:last-child {
        background: linear-gradient(to right,
                #ff512f,
                #536b29);
        right: -30px;
        bottom: -80px;
    }

    form {
        height: 520px;
        width: 400px;
        background-color: rgba(255, 255, 255, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 100px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
    }

    form * {
        font-family: 'Poppins', sans-serif;
        color: #000000;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
    }

    label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    input {
        text-align: center;
        display: block;
        height: 50px;
        width: 100%;
        background-color: #ffffff;
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
        cursor: pointer;
        -webkit-box-shadow: 0px 0px 80px 19px rgba(227, 28, 28, 0.59);
        -moz-box-shadow: 0px 0px 80px 19px rgba(227, 28, 28, 0.59);
        box-shadow: 0px 0px 80px 19px rgba(227, 28, 28, 0.59);
    }

    ::placeholder {
        color: #000000;
    }

    #login {
        margin-top: 50px;
        width: 100%;
        background-color: #000000;
        color: #ffffff;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
</head>


<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form name="form1" method="post" action="" enctype="multipart/form-data">
    <h3>Login Administrator</h3>

    <label for="username">Nama</label>
    <input name="username" type="text" placeholder="Masukan Username" id="username">

    <label for="password">Sandi</label>
    <input name="password" type="password" placeholder="Masukan Password" id="password">

    <input name="login" type="submit" id="login" value="LOGIN">

</form>
<?php
if ($_POST["login"]) {
    $sqla = mysqli_query($kon, "select * from admin where username='$_POST[username]' and password='$_POST[password]'");
    $ra = mysqli_fetch_array($sqla);
    $row = mysqli_num_rows($sqla);
    if ($row > 0) {
        session_start();
        $_SESSION["useradm"] = $ra["username"];
        $_SESSION["passadm"] = $ra["password"];
        echo "<div align='center'><font color='#FF0000'>Login Berhasil</div>";
    } else {
        echo "<div align='center'><font color='#FF0000'>Username Atau Password Salah</div>";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
}
?>
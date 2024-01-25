<div class="login-02">
    <div class="two-login  hvr-float-shadow">
        <div class="two-login-head">
            <img src="images/top-note.png" alt="" />
            <h2>Register</h2>
            <lable></lable>
        </div>
        <div class="form1">
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <li>
                    <input name="nama" type="text" id="nama" class="text" placeholder="Name">
                </li>
                <li>
                    <input name="email" type="text" id="nama" class="text" placeholder="Gmail">
                </li>

                <li>
                    <input name="password" type="text" id="nama" class="text" placeholder="Password">
                </li>

                <div class="submit two">
                    <input name="register" type="submit" id="simpan" value="Simpan">
                </div>
                <h5>Do you have an account ?<a href="<?php echo "?p=login"; ?>"> Sign in </a></h5>

            </form>
        </div>


    </div>
</div>
<?php
if ($_POST["register"]) {
    if (!empty($_POST["nama"]) and !empty($_POST["email"]) and !empty($_POST["password"])) {
        $sqlag = mysqli_query($kon, "insert into anggota (nama, email, password, tgldaftar) values ('$_POST[nama]', '$_POST[email]', '$_POST[password]', NOW())");
        if ($sqlag) {
            echo "Registrasi Berhasil";
        } else {
            echo "Registrasi Gagal";
        }
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=login'>";
    } else {
        echo "Data harus diisi dengan lengkap";
    }
}
?>
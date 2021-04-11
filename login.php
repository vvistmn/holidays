<?php  include "includes/_header.php"; ?>
<br>
<div class="container">
<?php 
if(isset($_POST['login'])) {
    loginUsers($_POST);
}
?>
    <form method="post" action="">
        <div class="form-group row">
            <label for="email" class="col-2 col-form-label">Email</label>
            <div class="col-10">
                <input class="form-control" type="email" placeholder="example@example.com" id="email" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-2 col-form-label">Пароль</label>
            <div class="col-10">
                <input class="form-control" type="password"  id="password" placeholder="Введите пароль" name="password" required>
            </div>
        </div>
        <input type="submit" name="login" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Ввойди в систему">
    </form>
</div>
<?php  include "includes/_footer.php"; ?>
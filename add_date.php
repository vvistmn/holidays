<?php  include "includes/_header.php"; ?>
<?php 
if (empty($_SESSION['AUTH']['email'])) {
    header('Location: login.php');
} elseif (isset($_POST['create_date'])) {
    createDate($_POST);
}
?>
<div class="container">
    <div>
        <h1 class="text-center">Привет, <?php echo $_SESSION['AUTH']['name']?>! Выбери день отпуска.</h1><br>
    </div>
    <form method="post" action="">
        <div class="form-group row">
            <label for="start_date" class="col-2 col-form-label">Дата начала отпустка</label>
            <div class="col-10">
                <input class="form-control" type="date" id="start_date" name="start_date">
            </div>
        </div>
        <div class="form-group row">
            <label for="end_date" class="col-2 col-form-label">Дата окончания отпустка</label>
            <div class="col-10">
                <input class="form-control" type="date" id="end_date" name="end_date">
            </div>
        </div>
        <button type="submit" name="create_date" class="btn btn-primary">Выбрать дату отпуска</button>
    </form>
</div>
<?php  include "includes/_footer.php"; ?>
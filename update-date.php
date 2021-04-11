<?php  include "includes/_header.php"; ?>
<?php 
if (empty($_SESSION['AUTH']['email'])) {
    header('Location: login.php');
} 

if (isset($_GET['id_date'])) {
    $currentDate = currentDate($_GET['id_date']);
} 

if (isset($_POST['update_date']) && isset($_GET['id_date'])) {
    updateCurrentDate($_POST, $_GET['id_date']);
}
?>
<div class="container">
    <div>
        <h1 class="text-center">Привет, <?php echo $_SESSION['AUTH']['name']?>! Перенесите любой день отпуска.</h1><br>
    </div>
    <form method="post" action="">
        <div class="form-group row">
            <label for="start_date" class="col-2 col-form-label">Дата начала отпустка</label>
            <div class="col-10">
                <input class="form-control" type="date" id="start_date" name="start_date" value="<?php echo $currentDate['start_date']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="end_date" class="col-2 col-form-label">Дата окончания отпустка</label>
            <div class="col-10">
                <input class="form-control" type="date" id="end_date" name="end_date" value="<?php echo $currentDate['end_date']?>">
            </div>
        </div>
        <button type="submit" name="update_date" class="btn btn-primary">Выбрать дату отпуска</button>
    </form>
</div>
<?php  include "includes/_footer.php"; ?>
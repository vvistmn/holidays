<?php  include "includes/_admin_header.php"; ?>
<div class="container">

    <?php if (isset($_SESSION['AUTH']['email'])):
     $allDates = viewAllDates();?>
    <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Номер заявки на отпуск</th>
                        <th>Сотрудник</th>
                        <th>Почта сотрудника</th>
                        <th>Начало отпуска</th>
                        <th>Конец отпуска</th>
                        <th>Подтверждена</th>
                        <th>Изменить дату</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Номер заявки на отпуск</th>
                        <th>Сотрудник</th>
                        <th>Почта сотрудника</th>
                        <th>Начало отпуска</th>
                        <th>Конец отпуска</th>
                        <th>Подтверждена</th>
                        <th>Изменить дату</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($allDates as $date):?>
                        <tr>
                            <td>№<?php echo $date['id']; ?></td>
                            <td><?php echo $date['name'] . ' ' . $date['surname']; ?></td>
                            <td><?php echo $date['email']; ?></td>
                            <td><?php echo $date['start_date']; ?></td>
                            <td><?php echo $date['end_date']; ?></td>
                            <td>
                            <?php if ($date['is_confirmed'] == 0):?>
                                <a href="confirm-date.php?date_id=<?php echo $date['id']; ?>">Подтвердить заявку</a>
                            <?php else:?>
                                Подтверждена
                            <?php endif;?>
                            </td>
                            <td>
                            <?php if ($date['user_id'] == $_SESSION['AUTH']['id'] && $date['is_confirmed'] == 0):?>
                                <a href="../update-date.php?id_date=<?php echo $date['id'];?>">Изменить дату</a>
                            <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php else:
            header('Location: login.php'); //is_confirmed
        endif;?>
</div>
<?php  include "../includes/_footer.php"; ?>
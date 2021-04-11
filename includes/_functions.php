<?php  include '_db.php';

function confirmQuery($result) {
    global $connection;
    
    if(!$result) {    
          die('Ошибка запроса. ' . mysqli_error($connection));      
      }
}

function isAdmin ($email) {
    global $connection; 

    $queryIsAdmin = 'SELECT is_admin FROM users WHERE email = \'' . $email . '\'';
    $resultIsAdmin = mysqli_query($connection, $queryIsAdmin);
    confirmQuery($resultIsAdmin);

    $isAdmin = mysqli_fetch_array($resultIsAdmin)['is_admin'];

    if ($isAdmin == 1){
        return true;

    } else {
        return false;
    }
}

function loginUsers ($requst) {
    global $connection;

    $email    = mysqli_real_escape_string($connection, trim($requst['email']));
    $password = mysqli_real_escape_string($connection, trim($requst['password']));

    $queryUser = 'SELECT * FROM users WHERE email = \'' . $email . '\'';
    $resultUser = mysqli_query($connection, $queryUser);

    confirmQuery($resultUser);

    while ($row = mysqli_fetch_assoc($resultUser)) {
        $user = $row;
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['AUTH']['id'] = $user['id'];
        $_SESSION['AUTH']['email'] = $user['email'];
        $_SESSION['AUTH']['name'] = $user['name'];
        $_SESSION['AUTH']['surname'] = $user['surname'];
        if ($user['is_admin'] == 1) {
            $_SESSION['AUTH']['is_admin'] = $user['is_admin'];
        }

        if (isAdmin($user['email'])) {
            header('Location: admin/index.php');
        } else {
            header('Location: index.php');
        }
    } else {
        header('Location: login.php');
    }
}

function logout () {
    unset($_SESSION['AUTH']);
    
    header("Location: index.php");
}

function registrationUsers ($requst) {
    global $connection;

    $name = mysqli_real_escape_string($connection, trim($requst['name']));
    $surname = mysqli_real_escape_string($connection, trim($requst['surname']));
    $email    = mysqli_real_escape_string($connection, trim($requst['email']));
    $password = mysqli_real_escape_string($connection, trim($requst['password']));

    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));

    $queryRegistration = 'INSERT INTO users (name, surname, email, password) ';
    $queryRegistration .= "VALUES('{$name}', '{$surname}', '{$email}', '{$password}' )";
    $resultRegistration = mysqli_query($connection, $queryRegistration);
    
    confirmQuery($resultRegistration);

    header('Location: login.php');
}

function createDate ($request) {
    global $connection, $_SESSION;
    
    $startDate = mysqli_real_escape_string($connection, trim($request['start_date']));
    $endtDate = mysqli_real_escape_string($connection, trim($request['end_date']));
    $userID = mysqli_real_escape_string($connection, trim($_SESSION['AUTH']['id']));

    $queryCreateDate = 'INSERT INTO dates(user_id, start_date, end_date) VALUES(';
    $queryCreateDate .= $userID . ', \'';
    $queryCreateDate .= $startDate . '\', \'';
    $queryCreateDate .= $endtDate . '\')';
    $resultCreateDate = mysqli_query($connection, $queryCreateDate);

    confirmQuery($resultCreateDate);

    header('Location: index.php');
}

function viewAllDates () {
    global $connection;

    $queryAllDates = 'SELECT * FROM users JOIN dates ON users.id = dates.user_id ORDER BY dates.id DESC';
    $resultAllDates = mysqli_query($connection,$queryAllDates);  

    confirmQuery($resultAllDates);

    while ($row = mysqli_fetch_assoc($resultAllDates)) {
        $allDates[$row['id']] = $row;
    }

    return $allDates;
}

function currentDate ($id) {
    global $connection, $_SESSION;

    $queryCurrentDate = 'SELECT * FROM users JOIN dates ON users.id = dates.user_id WHERE dates.id = ' . $id;
    $resultCurrentDate = mysqli_query($connection, $queryCurrentDate);

    confirmQuery($resultCurrentDate);

    $currentDate = mysqli_fetch_assoc($resultCurrentDate);

    if ($currentDate['user_id'] != $_SESSION['AUTH']['id'] || $currentDate['is_confirmed'] != 0) {
        header('Location: index.php');
    } 

    return $currentDate;
}

function updateCurrentDate ($request, $id) {
    global $connection;

    $startDate = mysqli_real_escape_string($connection, trim($request['start_date']));
    $endtDate = mysqli_real_escape_string($connection, trim($request['end_date']));

    $stmt = mysqli_prepare($connection, "UPDATE dates SET start_date = ?, end_date = ? WHERE id = ? ");
    mysqli_stmt_bind_param($stmt, 'sss', $startDate, $endtDate, $id);
    mysqli_stmt_execute($stmt);

    confirmQuery($stmt);

    mysqli_stmt_close($stmt);

    header('Location: index.php');
}

function confirmDate ($id) {
    global $connection;
    $isConfirm = '1';

    $stmt = mysqli_prepare($connection, "UPDATE dates SET is_confirmed = ? WHERE id = ? ");
    mysqli_stmt_bind_param($stmt, 'ss', $isConfirm, $id);
    mysqli_stmt_execute($stmt);

    confirmQuery($stmt);

    mysqli_stmt_close($stmt);

    header('Location: index.php');
}
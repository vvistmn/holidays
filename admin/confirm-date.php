<?php  include "includes/_admin_header.php";

if (isset($_GET['date_id'])) {
    confirmDate($_GET['date_id']);
}
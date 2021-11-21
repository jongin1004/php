<?php
    session_save_path('./');
    session_start();
    echo $_SESSION['title'];
    echo file_get_contents('./sess_'.session_id());
?>
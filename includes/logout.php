<?php
session_start();

//cierro la sesion
session_destroy();
header('Location: ../index.php');
exit();
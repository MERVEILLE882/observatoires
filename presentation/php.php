<?php
$passwordToHash = 'ana';
$hashedPassword = password_hash($passwordToHash, PASSWORD_DEFAULT);
echo $hashedPassword;
?>
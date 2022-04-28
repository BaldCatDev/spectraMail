<?php
/**
 * Мы считаем, что зловредный юзер не придет на страницу. Поэтому никак не проверяем никакие данные с формы, хотя должны.
 */
include_once 'Postal.php';
if( !in_array($_POST['type'], Postal::TOPICS)){
    echo 'Топик неизвестный выбрал ты.';
    die();
}

$postal = new Postal(
    $_POST['type'],
    $_POST['mail']
);
$postal -> send();
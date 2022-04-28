<?php
include 'Postal.php';

if ($_FILES['template'] && $_POST['mail']) {
    // print_r($_FILES['template']);
    if ($_FILES['template']['error'] !== 0) {
        echo $_FILES['template']['error'];
    } else {
        $postal = new Postal(
            $_POST['type'],
            $_POST['mail'],
            $_FILES['template']['tmp_name'],
        );
        $postal->addArguments( $_POST );

//        $postal->prepare_message();
        $postal->send();
        $sent = true;
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Spectra mail test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container pt-5">
    <?php if($sent): ?>

    <div class="row">
        <div class="alert alert-success" role="alert">
            Письмо отправлено на <?= $_POST['mail'] ?>
        </div>
    </div>
    <?php endif ?>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-3">
            <h2>Тест email</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="mail" class="form-label">e-mail</label>
                    <input required type="email" class="form-control" name="mail" id="mail"/>
                </div>
                <div class="mb-3">
                    <label for="messType" class="form-label">Тема письма</label>
                    <select name="type" id="messType" class="form-select">
                        <?php foreach (Postal::TOPICS as $val => $label): ?>
                            <option value="<?= $val ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="template" class="form-label">HTML шаблон</label>
                    <input type="file" name="template">
                </div>
                <div class="mb-3">
                    <label for="arg1" class="form-label">Сумма</label>
                    <input type="number" class="form-control" name="sum" id="sum"/>
                    <div class="form-text">текст в HTML шаблоне: %SUM%</div>
                </div>
                <div class="mb-3">
                    <label for="arg1" class="form-label">Доп. аргумент 1</label>
                    <input type="text" class="form-control" name="arg1" id="arg1"/>
                    <div class="form-text">текст в HTML шаблоне: %ARG1%</div>
                </div>
                <div class="mb-3">
                    <label for="arg2" class="form-label">Доп. аргумент 2</label>
                    <input type="text" class="form-control" name="arg2" id="arg2"/>
                    <div class="form-text">текст в HTML шаблоне: %ARG2%</div>
                </div>

                <input type="submit" name="Отправить" id="formSend">
            </form>
        </div>
    </div>
</div>
</body>
</html>
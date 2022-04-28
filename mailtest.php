<?php
    include 'Postal.php';
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
    <div class="row">
        <div class="col-4 offset-4">
            <h2>Тест email</h2>
            <form action="m.php">
<!--                <div class="mb-3">-->
<!--                    <label for="template" class="form-label">Шаблон</label>-->
<!--                    <input type="text" class="form-control" name="template" id="template"/>-->
<!--                </div>-->
                <div class="mb-3">
                    <label for="mail" class="form-label">e-mail</label>
                    <input type="email" class="form-control" name="mail" id="mail"/>
                </div>
                <div class="mb-3">
                    <label for="messType" class="form-label">Тема письма</label>
                    <select name="type" id="messType" class="form-select">
                        <?php foreach (Postal::TOPICS as $val => $label): ?>
                            <option value="<?= $val ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" name="Отправить" id="formSend">
            </form>
        </div>
    </div>
</div>
</body>
</html>
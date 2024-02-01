<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="/public/manifest.json">
    <link rel="shortcut icon" href="/public/assets/favicon.ico" type="image/x-icon">
    <title><?= $this->e($title) ?> | Bloggers</title>
    <link rel="stylesheet" href="./public/css/main.css">
    <?= $this->section("styles") ?>
</head>

<body>
    <?= $this->insert("partials/header") ?>
    <main>
        <?= $this->section("main") ?>
    </main>
    <?= $this->insert("partials/footer") ?>
</body>

</html>
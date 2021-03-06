<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <?= $this->renderSection('custom_css'); ?>

  <title><?= $pageTitle; ?></title>
</head>

<body>
  <?= $this->include('/layout/navbar'); ?>
  <?= $this->include('/layout/notice'); ?>

  <?= $this->renderSection('content'); ?>

  <?= $this->renderSection('custom_script'); ?>
</body>
</html>
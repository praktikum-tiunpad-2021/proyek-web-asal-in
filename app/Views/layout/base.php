<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style.css">
  <?= $this->renderSection('custom_css'); ?>

  <title><?= $pageTitle; ?></title>
</head>

<body>
  <?= $this->include('/layout/navbar'); ?>

  <main class="container">
    <?= $this->renderSection('content'); ?>
  </main>

  <?= $this->renderSection('custom_script'); ?>
</body>
</html>
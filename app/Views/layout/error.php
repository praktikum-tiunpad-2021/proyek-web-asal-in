<?php if (!empty($errors->getErrors())) : ?>
  <div class="error-container">
    <ul>
      <?php foreach ($errors->getErrors() as $field => $error) : ?>
        <li><?= $error ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<?php if (session()->getFlashdata('errors') != null) : ?>
  <div class="error-container">
    <ul>
      <li><?= session()->getFlashdata('errors') ?></li>
    </ul>
  </div>
<?php endif ?>
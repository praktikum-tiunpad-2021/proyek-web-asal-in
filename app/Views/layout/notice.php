<?php if (session()->getFlashdata('errors') != null) : ?>
  <div class="error-container">
    <ul>
      <li><?= session()->getFlashdata('errors') ?></li>
    </ul>
  </div>
<?php endif ?>

<?php if (session()->getFlashdata('successes') != null) : ?>
  <div class="success-container">
    <ul>
      <li><?= session()->getFlashdata('successes') ?></li>
    </ul>
  </div>
<?php endif ?>
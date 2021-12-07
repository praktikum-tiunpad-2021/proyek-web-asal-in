<?php if (session()->getFlashdata('error') != null) : ?>
  <div class="error-container container" style="margin-top: 1em;">
    <ul>
      <li><?= session()->getFlashdata('error') ?></li>
    </ul>
  </div>
<?php endif ?>

<?php if (session()->getFlashdata('success') != null) : ?>
  <div class="success-container container" style="margin-top: 1em;">
    <ul>
      <li><?= session()->getFlashdata('success') ?></li>
    </ul>
  </div>
<?php endif ?>
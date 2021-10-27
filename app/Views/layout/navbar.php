<header>
  <a href="/" class="logo-container">
    <img src="img/logo-transparent.svg" class="logo" alt="SPPO">
  </a>

  <nav>
    <?php if (!empty($disableNavbar) && $disableNavbar == true) : ?>
    <?php elseif (!session()->isLoggedIn) : ?>
      <?= $this->include('/layout/navbar/guest'); ?>
    <?php elseif (session()->userData['role'] == 'USER') : ?>
      <?= $this->include('/layout/navbar/user'); ?>
    <?php elseif (session()->userData['role'] == 'ADMIN') : ?>
      <?= $this->include('/layout/navbar/admin'); ?>
    <?php endif; ?>
</nav>
</header>
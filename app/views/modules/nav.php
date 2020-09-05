<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo URL_ROUTE ?>home">
    <img src="<?php echo URL_ROUTE ?>/media/system/icons/logo.png" alt="">
    SMF v2
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
  <?php if (Controller::authenticated()) : ?>
    <ul class="navbar-nav">
      <li class="nav-item"> 
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['user']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROUTE ?>auth/logout"">Logout</a>
      </li> 
    </ul>
    <?php endif; ?>
  </div>
</nav> 
<?php require_once APP_ROUTE . '/views/public/register.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo URL_ROUTE ?>home">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php if (!Controller::authenticated()) : ?>
          <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-sm" href="javascript:void(0);">Login</a>
        <?php else :?>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['user'] ?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URL_ROUTE ?>auth/logout"">Logout</a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</nav>
<?php require_once APP_ROUTE . '/views/modules/login.php'; ?>
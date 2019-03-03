<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content pt-2 pb-2">
      <form method="post" action="<?php echo URL_ROUTE ?>auth/login" target="_top" class="px-4 py-3">
        <div class="form-group">
          <label for="user-email">Email address</label>
          <input type="email" class="form-control" id="user-email" name="user-email" placeholder="email@example.com">
        </div>
        <div class="form-group">
          <label for="user-password">Password</label>
          <input type="password" class="form-control" id="user-password" name="user-password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck">
            <label class="form-check-label" for="dropdownCheck">
              Remember me
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Sign in</button>
      </form>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?php echo URL_ROUTE ?>auth/login">New around here? Sign up</a>
      <a class="dropdown-item" href="#">Forgot password?</a>
    </div>
  </div>
</div>
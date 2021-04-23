<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content pt-2 pb-2">
      <form method="post" action="<?php echo URL_ROUTE ?>auth/register" target="_top" class="px-4 py-3">
        <div class="form-group">
          <label for="user-email">Username</label>
          <input type="text" class="form-control" id="user-nick" name="user-nick" placeholder="Some nickname">
        </div>
        <div class="form-group">
          <label for="user-email">Email address</label>
          <input type="email" class="form-control" id="user-email" name="user-email" placeholder="email@example.com">
        </div>
        <div class="form-group">
          <label for="user-password">Password</label>
          <input type="password" class="form-control" id="user-password" name="user-password" placeholder="Password">
        </div> 
        <button type="submit" class="btn btn-primary" name="register">Register</button>
      </form>
    </div>
  </div>
</div>
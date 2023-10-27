<section class="row justify-content-center align-items-center mt-5" id="forgot-pass-form">
    <div class="col-xs-8 col-sm-10 col-md-8 col-lg-6 col-xl-4">
        <h3 class="text-center mb-3">Reset password with mail</h3>
        <form action="<?php echo URL_ROUTE;?>login" method="post">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div> 
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-primary btn-block" name="login">Recovery password</button>
            </div>
        </form>  
        </div>
    </div>
</section>
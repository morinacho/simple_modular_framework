<section class="row justify-content-center mt-5" id="login">
    <div class="col-xs-8 col-sm-10 col-md-8 col-lg-6 col-xl-4">
        <div class="card">
            <img src="<?php echo URL_ROUTE;?>public/assets/media/images/login-header.jpg" class="card-img-top">
            <div class="card-body">
                <form action="<?php echo URL_ROUTE;?>login" method="post">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text material-icons">person</div>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="example@email.com">
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text material-icons">lock</div>
                        </div>
                        <input type="password" class="form-control" id="password" name="user-password" placeholder="********">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block" name="login">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center mt-3" href="<?php echo URL_ROUTE;?>forgot_password">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
</section> 
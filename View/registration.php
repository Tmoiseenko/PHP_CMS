<?php require_once VIEW_DIR . '/layout/admin_header.php'; ?>
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Dashboard</h1>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form method="post" class="form-validate">
                                    <div class="form-group">
                                        <input id="register-username" type="text" name="login" required pattern="^[a-zA-Z0-9]{3,20}$" data-msg="Please enter your username" class="input-material">
                                        <label for="register-username" class="label-material">Ваше никнейм</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="register-email" type="email" name="email" required pattern="\S+@[a-z]+.[a-z]+" data-msg="Please enter a valid email address" class="input-material">
                                        <label for="register-email" class="label-material">Аддрес электронной почты</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="register-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                                        <label for="register-password" class="label-material">Ваш пароль</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="regidter" type="submit" name="register" class="btn btn-primary" value="Регистрация">
                                    </div>
                                </form><small>У вас уже есть аккаунт? </small><a href="/login" class="signup">Войти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </p>
        </div>
    </div>
<?php require_once VIEW_DIR . '/layout/admin_footer.php'; ?>
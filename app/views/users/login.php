<div class="container">
    <div class="text-center">
        <img style="width: 100px; height:auto; padding: 0;" src="../public/images/favicon.png" id="logoimg" alt=" Logo" />
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
        <?php
            if($error) {
        ?>
            <div class="alert alert-danger">
                Identifiants incorrects
            </div>
        <?php
            }
        ?>
            <form method="post" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your email and password
                </p>
                <?= $form->input('email', 'email'); ?>
                <?= $form->input('password', 'password', ['type' => 'password']); ?>
                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>
</div>
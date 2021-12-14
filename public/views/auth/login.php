<?php include ROOT . '/public/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row block">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
               <h2 class="text-right mb-4 mr-n5" id="formName">Login Form</h2>
                <form method='post' action="#" id="loginForm">
                    <div class="form-group">
                        <label for="email" id="emailLabel">Email</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                        <small id="emailHelp" class="form-text text-muted">Please enter your email address</small>

                    </div>
                    <div class="form-group">
                        <label for="password" id="passwordLabel">Password</label>
                        <input type="password" class="form-control"  id="inputPassword" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
                        <small id="passwordHelp" class="form-text text-muted">Please enter your password length min 6 characters</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit" id="loginButton">Login</button>
                    </div>
                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul class="list-group">
                            <?php foreach ($errors as $error) : ?>
                                <li class="list-group-item list-group-item-danger"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </form>
                <br />
                <br />
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/public/views/layouts/footer.php'; ?>
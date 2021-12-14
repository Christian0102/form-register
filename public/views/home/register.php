<?php include ROOT . '/public/views/layouts/header.php'; ?>


<section>
    <div class="container">
        <div class="row block">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <h2 class="text-center mb-4 mr-n5" id="formName">Register Form</h2>
                <form method='post' action="#" id="registerForm">
                    <div class="form-group">
                        <label for="username" id="usernameLabel">Username: </label>
                        <input type="text" class="form-control" id="inputUsername" name="username"
                            placeholder="Username" value="" pattern=".{6, 50}" required title="5 to 10 characters" required>
                        <small id="usernameHelp" class="form-text text-muted">Username min 6 characters max 50
                            characters</small>
                    </div>
                    <div class="form-group">
                        <label for="password" id="inputPasswordLabel">Password: </label>
                        <input type="password" class="form-control" id="inputPassword" name="password"
                            placeholder="Password" required>
                        <small id="passwordHelp" class="form-text text-muted">Password should be at
                            least 8 chars, should contain at least one upper letter, one lower letter
                            and a “special” char (! @ # $ % ^ & * ( ) - =)
                            characters</small>
                        <span class="badge badge-danger" id="inputPasswordDanger" style="display:none">Password should
                            be at
                            least 8 chars, should contain at least one upper letter, one lower letter
                            and a “special” char</span>
                    </div>
                    <div class="form-group">
                        <label for="password" id="confirmPasswordLabel">Confirm Password: </label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            placeholder="Password" value="" required>
                        <small id="passwordHelp" class="form-text text-muted">Repeat Password Please
                            characters</small>
                        <span class="badge badge-danger" id="confirmPasswordDanger" style="display:none">Please Insert
                            the Same Password</span>
                    </div>
                    <div class="form-group">
                        <label for="email" id="emailLabel">Email: </label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email"
                            value="">
                        <small id="emailHElp" class="form-text text-muted">Please enter valide email</small>
                    </div>
                    <div class="form-group">
                        <select name="department" class="browser-default custom-select" required="required" required>
                            <option value="" selected disabled>Select Department</option>
                            <?php foreach ($departments as $department):?>
                            <option value="<?php render($department['id']);?>"><?php render($department['name']);?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="h6">Category</p>
                        <?php foreach($categories as $category):?>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" name="categories[]"
                                value="<?php render($category['id']);?>">
                            <label class="form-check-label" for="defaultCheck1">
                                <?php render($category['name']);?>
                            </label>
                        </div>
                        <?php endforeach;?>

                    </div>
                    <div class="form-group">
                        <p class="h6">Hobbies</p>
                        <?php foreach($hobies as $hobby):?>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hobby"
                                    value="<?php render($hobby['id']);?>" required> <?php render($hobby['name']);?>
                            </label>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input terms" type="checkbox" name="terms" value="accepted"
                                id="defaultCheck1" required />
                            <label class="form-check-label" for="defaultCheck1">
                                I accept Terms & Conditions
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-success" id="registerButton" name="submit"
                                    value="submit">Register</button>
                                <button type="reset" class="btn btn-danger ml-2" id="resetButton">Reset</button>
                            </div>
                        </div>


                        <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul class="list-group">
                            <?php foreach ($errors as $error) : ?>
                            <span class="badge badge-danger"> - <?php render($error); ?></span>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include ROOT . '/public/views/layouts/footer.php'; ?>
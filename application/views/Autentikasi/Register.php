<div class="right-display">
    <div class="right-display-container">
        <h2 class="header">Hello</h2>
        <p class="header-paragh">Register your account</p>
        <form action="<?= base_url('Auth/Registration') ?>" method="post" id="form-auth">
            <div class="input-login">
                <div class="fs-ls">
                    <div class="input-group">
                        <input type="text" class="inp-fs" id="inp-fs" name="inp-fs" placeholder="First Name"
                            autocomplete="off" value="<?= set_value('inp-fs'); ?>">
                        <?= form_error('inp-fs', '<small class="danger-text-inp">', '</small>'); ?>
                    </div>
                    <div class="input-group">
                        <input type="text" class="inp-ls" id="inp-ls" name="inp-ls" placeholder="last Name"
                            autocomplete="off" value="<?= set_value('inp-ls'); ?>">
                        <?= form_error('inp-ls', '<small class="danger-text-inp">', '</small>'); ?>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" class="inp-email" id="inp-email" name="inp-email" placeholder="Email Address"
                        aria-label="Your Email Address" autocomplete="off"
                        value="<?= form_error('inp-email') ? '' : set_value('inp-email'); ?>">
                    <?= form_error('inp-email', '<small class="danger-text-inp">', '</small>'); ?>
                </div>
                <div class="input-group">
                    <div class="password-div">
                        <input type="password" class="create-password in-l-child" name="pass"
                            placeholder="Create Password" aria-label="Input Password" id="password" autocomplete="off">
                        <i class="fas fa-eye-slash eye"></i>
                    </div>
                    <?= form_error('pass', '<small class="danger-text-inp">', '</small>'); ?>
                </div>
                <div class="input-group">
                    <div class="password-div">
                        <input type="password" class="create-password in-l-child" name="pass2"
                            placeholder="Confirm Password" aria-label="Input Password" id="password" autocomplete="off">
                        <i class="fas fa-eye-slash eye"></i>
                    </div>
                    <?= form_error('pass2', '<small class="danger-text-inp">', '</small>'); ?>
                </div>
            </div>
            <div class="submit-parent">
            <button class="btn-done-login" type="submit">Register</button>
            </div>
        </form>
        <p class="sign-up-text">Already have account ? <label><a href="<?= base_url() ?>"
                    style="color: unset; text-decoration: none">Login</a></label></p>
    </div>
</div>
</div>
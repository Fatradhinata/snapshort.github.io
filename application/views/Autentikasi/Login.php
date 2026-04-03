<style>
</style>
<div class="right-display">
    <div class="right-display-container">
        <h2 class="header">Welcome</h2>
        <p class="header-paragh">Login to your account</p>
        <?php if ($this->session->flashdata('error')): ?>
                <?= $this->session->flashdata('error'); ?>            
        <?php endif; ?>
        <form action="<?= base_url('Auth') ?>" method="POST">
            <div class="input-login">
                <div class="input-group">
                    <input type="text" class="email-username" id="email-us" name="email-us"
                        placeholder="Email or Username" aria-label="Input Email or Username" autocomplete="off">
                    <?= form_error('email-us', '<small class="danger-text-inp">', '</small>'); ?>
                </div>
                <div class="input-group">
                    <div class="password-div">
                        <input type="password" class="password in-l-child" id="password" name="password"
                        placeholder="Password" aria-label="Input Password" autocomplete="off"" >
                        <i class=" fas fa-eye-slash eye" id="eye"></i>
                    </div>
                    <?= form_error('password', '<small class="danger-text-inp">', '</small>'); ?>
                </div>
                <!-- <p class="forgot-passwd in-l-child">Forgot Password ?</p> -->
            </div>
            <div class="submit-parent">
            <button class="btn-done-login" type="submit">Login</button>
            </div>
        </form>
        <p class="sign-up-text">Don't have account ? <label><a href="<?= base_url(); ?>Auth/Registration"
                    style="color: unset; text-decoration: none">Sign Up</a></label></p>
    </div>
</div>
</div>
<link rel="stylesheet" href="<?= base_url('asset/css/page/email-verify.css?v=' . time()) ?>">
<div class="right-display">
    <div class="centered">
        <div>
            <img class="back-icon" src="<?= base_url("asset/icon/back-line.svg") ?>" onclick="window.history.back()" alt="">
        </div>
        <div class="header-parent">
            <h2 class="header">Email Verifycation</h2>
            <p class="header-paragh">Please Enter 6 digit code sent to
                <?= $email ?>
            </p>
        </div>
        <div class="input-code-parent">
            <div class="box-parent">
                <input type="number" class="box-input" min="0" max="1" required>
            </div>
            <div class="box-parent">
                <input type="number" class="box-input" min="0" max="1" required>
            </div>
            <div class="box-parent">
                <input type="number" class="box-input" min="0" max="1" required>
            </div>
            <div class="box-parent">
                <input type="number" class="box-input" min="0" max="1" required>
            </div>
            <div class="box-parent">
                <input type="number" class="box-input" min="0" max="1" required>
            </div>
            <div class="box-parent">
                <input type="number" class="box-input" min="0" max=1 required>
            </div>
        </div>
        <p class="new-code">Didn't receive any code ? <span>Resend Code</span></p>
        <a href="<?= site_url('SetUpProfile')?>"><button class="btn-done-login">Next</button></a>
    </div>
</div>
<script>
    const codeInputs = document.querySelectorAll('.box-input');

    codeInputs.forEach((input, index) => {
        input.addEventListener('input', (event) => {
            validateInput(input);
        });

        input.addEventListener('keydown', (event) => {
            if (input.value && index < codeInputs.length - 1 && event.key != "Backspace") {
                codeInputs[index + 1].focus();
            }
        });

        input.addEventListener('keyup', (event) => {
            const pressedKey = event.key;
            console.log(pressedKey);
            if (pressedKey == "Backspace") {
                codeInputs[index - 1].focus(); 
            }
        });
    });

    document.querySelector('.btn-done-login').onclick = () => {
    var value = '';
    codeInputs.forEach(inp => {
        value += inp.value;
    });
    console.log(value);
}


    function validateInput(input) {
        if (input.value.length > 1) {
            input.value = input.value.slice(0, 1);
        }
    }


</script>
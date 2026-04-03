<link rel="stylesheet" href="<?= base_url('asset/css/page/setup-profile.css?v=' . time()) ?>">
<div class="right-display">
    <div class="centered">
        <form action="<?= site_url("setUpProfile/lastCheck") ?>" method="POST" enctype="multipart/form-data">
            <div class="header-parent">
                <h2 class="header">Setup Profile</h2>
                <p class="header-paragh">Create a username, full name and create your profile picture</p>
            </div>
            <div class="change-pp-parent">
                <img id="profile-picture" src="<?= site_url("asset/icon/default-pp.svg") ?>" alt="Default">
                <input type="file" accept="image/*" style="display: none" id="file-input" name="profile-picture">
                <button onclick="changeImage()" type="button">Change</button>
            </div>
            <div class="input-parent setup-input">
                <div class="username-parent">
                    <div class="input-group">
                        <div class="icon-left-input"><img src="<?= site_url("asset/icon/at-sign.svg") ?>" alt=""></div>
                        <input type="text" placeholder="Create Username" name="username" class="username-input" autocomplete="off">
                    </div>
                    <p class="header-paragh">Username cannot contain spaces and unique symbols</p>
                </div>
                <div class="input-group">
                    <div class="icon-left-input"><img src="<?= site_url("asset/icon/user-default-icon.svg") ?>" alt="">
                    </div>
                    <input type="text" placeholder="Fullname" name="fullname" class="fullname-input" value="<?= $name ?>">
                </div>
            </div>
            <div class="redirect-parent">
                <button class="btn-done-login" type="submit">Next</button>
                <a class="back-paragh" href="<?= site_url("SetUpProfile/lastCheck") ?>">Back to Login</a>
            </div>
        </form>
    </div>
</div>
<script>
    const inp = document.getElementById('file-input');
    const img = document.getElementById('profile-picture');
    

    function changeImage() {
        inp.click();
    }

    inp.onchange = () => {
        const file = inp.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = (e) => {
                img.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }
</script>
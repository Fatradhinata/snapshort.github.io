<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67765d7747.js" crossorigin="anonymous"></script>
    <title>
        <?= $title; ?>
    </title>
    <link rel="stylesheet" href="<?= base_url($css2); ?>?v=<?= time(); ?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/page/nav-side-bar.css?v=' . time()); ?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/page/header-responsive.css?v=' . time()); ?>"
        type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css?v=' . time()); ?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url($css1) . "?v=" . time(); ?>" type="text/css" />
    <link rel="icon" href="<?= base_url('asset/img/logo/favicon(1).ico') ?>" type="image/ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body>
    <div class="popup-container" style="display: none">
        <div class="delete-popup">
            <div class="header-popup"></div>
            <h5>Delete User</h5>
            <hr>
            <p class="validation">Are you sure you want to delete User with ID <span id="us-id"></span><br> With
                Username
                <span id="us-name"></span> ?
            </p>
            <div class="reason">
                <label for="reason-input">Your reason : </label>
                <textarea name="reason-input" id="reason-inp" cols="50" rows="3"></textarea>
            </div>
            <hr>
            <div class="button-valid">
                <button class="cancel" onclick="closePopup()">Cancel</button>
                <button class="delete"><a href="<?= site_url('UserTableAdmin/deleteUser/' . $user['user_id']) ?>"
                        style="color: white;">Delete</a></button>
            </div>
        </div>
    </div>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background-color: #424874;">
            <div class="position-sticky" style="background-color: transparent">
                <div class="list-group list-group-flush mx-3" style="margin-top: 70px;">
                    <!-- Collapse 1 -->
                    <ul id="collapseExample1" class="collapse show list-group list-group-flush ul-side-bar"
                        style="margin-left: 40px">
                        <?php if ($user == null || $user['level'] == 'User') { ?>
                            <style>
                                .upload-container button {
                                    margin-left: 15px !important;
                                }
                            </style>
                            <li class="py-1">
                                <a href="<?= base_url() ?>Home" class="text-reset"> <svg width="39" height="33"
                                        viewBox="0 0 39 33" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="home-icon">
                                        <path
                                            d="M15.75 32.5V21.25H23.25V32.5H32.625V17.5H38.25L19.5 0.625L0.75 17.5H6.375V32.5H15.75Z"
                                            fill="white" />
                                    </svg>
                                    <span class="pl-4 text-light">Home</span></a>
                            </li>
                            <li class="py-1">
                                <a href="<?= base_url() ?>Following" class="text-reset"><svg width="44" height="34"
                                        viewBox="0 0 44 34" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="following-icon">
                                        <path
                                            d="M19.25 33.5C19.25 33.5 16.5 33.5 16.5 30.75C16.5 28 19.25 19.75 30.25 19.75C41.25 19.75 44 28 44 30.75C44 33.5 41.25 33.5 41.25 33.5H19.25ZM30.25 17C32.438 17 34.5365 16.1308 36.0836 14.5836C37.6308 13.0365 38.5 10.938 38.5 8.75C38.5 6.56196 37.6308 4.46354 36.0836 2.91637C34.5365 1.36919 32.438 0.5 30.25 0.5C28.062 0.5 25.9635 1.36919 24.4164 2.91637C22.8692 4.46354 22 6.56196 22 8.75C22 10.938 22.8692 13.0365 24.4164 14.5836C25.9635 16.1308 28.062 17 30.25 17ZM14.344 33.5C13.9363 32.6415 13.733 31.7002 13.75 30.75C13.75 27.0238 15.62 23.1875 19.074 20.52C17.35 19.9888 15.5539 19.729 13.75 19.75C2.75 19.75 0 28 0 30.75C0 33.5 2.75 33.5 2.75 33.5H14.344ZM12.375 17C14.1984 17 15.947 16.2757 17.2364 14.9864C18.5257 13.697 19.25 11.9484 19.25 10.125C19.25 8.30164 18.5257 6.55295 17.2364 5.26364C15.947 3.97433 14.1984 3.25 12.375 3.25C10.5516 3.25 8.80295 3.97433 7.51364 5.26364C6.22433 6.55295 5.5 8.30164 5.5 10.125C5.5 11.9484 6.22433 13.697 7.51364 14.9864C8.80295 16.2757 10.5516 17 12.375 17Z"
                                            fill="white" />
                                    </svg>
                                    <span class="pl-4 text-light">Following</span></a>
                            </li>
                            <li class="py-1">
                                <a href="<?= base_url() ?>Explore" class="text-reset"> <svg width="38" height="38"
                                        viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="explore-icon">
                                        <g clip-path="url(#clip0_327_2)">
                                            <path
                                                d="M19 21C20.1046 21 21 20.1046 21 19C21 17.8954 20.1046 17 19 17C17.8954 17 17 17.8954 17 19C17 20.1046 17.8954 21 19 21Z"
                                                fill="white" />
                                            <path
                                                d="M19 0C8.52351 0 0 8.52351 0 19C0 29.4765 8.52351 38 19 38C29.4765 38 38 29.4765 38 19C38 8.52351 29.4765 0 19 0ZM23.3846 23.3846L8.76923 29.2308L14.6154 14.6154L29.2308 8.76923L23.3846 23.3846Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_327_2">
                                                <rect width="38" height="38" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="pl-4 text-light">Explore</span></a>
                            </li>
                        <?php } else if ($user['level'] == 'Admin') { ?>
                                <ul id="collapseExample1" class="collapse show list-group list-group-flush ul-side-bar"
                                    style="margin-left: 0px">
                                    <li class="py-1">
                                        <a href="<?= base_url() ?>Home" class="text-reset">
                                            <img src="<?= base_url('asset/icon/random.svg') ?>" alt="Random">
                                            <span class="pl-4 text-light">Random</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="<?= base_url() ?>adminTable/" class="text-reset">
                                            <img src="<?= base_url('asset/icon/folls.svg') ?>" alt="Random">
                                            <span class="pl-4 text-light">User</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="<?= base_url() ?>adminTable/Content" class="text-reset">
                                            <img src="<?= base_url('asset/icon/video-white.svg') ?>" alt="Random">
                                            <span class="pl-4 text-light">Content</span></a>
                                    </li>

                            <?php } ?>
                        </ul>
                        <div class="upload-container">
                            <button class="border-0 pr-2" onclick="window.location.assign('<?= base_url() ?>Upload')"
                                style="margin-left: 0px; width: 140px">
                                <svg width="27" height="19" viewBox="0 0 27 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="upload-icon">
                                    <path
                                        d="M20.7917 7.3125V2.20833C20.7917 1.40625 20.1354 0.75 19.3333 0.75H1.83333C1.03125 0.75 0.375 1.40625 0.375 2.20833V16.7917C0.375 17.5938 1.03125 18.25 1.83333 18.25H19.3333C20.1354 18.25 20.7917 17.5938 20.7917 16.7917V11.6875L26.625 17.5208V1.47917L20.7917 7.3125ZM16.4167 10.9583H12.0417V15.3333H9.125V10.9583H4.75V8.04167H9.125V3.66667H12.0417V8.04167H16.4167V10.9583Z"
                                        fill="#424874" />
                                </svg>
                                <p class="m-0">Upload</p>
                            </button>
                        </div>
                        <!-- Collapse 1 -->
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top flex-column"
            style="box-shadow: 0px -2px 6px black; min-width: 380px;">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="<?= base_url() ?>Home">
                    <img src="<?= base_url('asset/img/logo/snapshort 2.svg') ?>" height="75" alt="Snapshort Logo"
                        class="ml-4 logo" loading="lazy" />
                </a>
                <!-- Search form -->

                <!-- Right links -->
                <?php if (isset($user)) {
                    if ($user['level'] == 'User') { ?>
                        <ul class="navbar-nav ms-auto d-flex flex-row ul-right-nav">
                            <!-- Notification dropdown -->
                            <li class="nav-item search-li" style="margin-right: 100px;">
                                <form class="d-none d-md-flex input-group w-auto my-auto p-2 form-search"
                                    style="background-color: #EDEDED; border-radius: 30px;">
                                    <input autocomplete="off" type="search" class="bg-transparent pr-1"
                                        placeholder='Search Something..'
                                        style="min-width: 225px; font-size: 13px; letter-spacing: .5px;" />
                                    <span class="input-group-text border-0 pr-1 pl-2 span-search"><img
                                            src="<?= base_url('asset/icon/search.svg') ?>" height="22"
                                            style="cursor: pointer;"></span>
                                </form>
                            </li>
                            <li class="nav-item mr-2">
                                <a class="nav-link me-3 me-lg-0 hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-mdb-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-bell" style="color: #424874; font-size: 30px;"></i>
                                </a>
                            </li>

                            <!-- Avatar -->
                            <li class="nav-item align-items-center d-flex user-account-navbar" style="width: 170px;"
                                id="toggleMenu">
                                <a class="nav-link hidden-arrow d-flex align-items-center justify-content-between" href="#"
                                    id="user-profile" role="button" aria-expanded="false" style="width: 170px;">
                                    <div class="user-icon-cont d-flex rounded-circle"
                                        style="width: 31px; height: 31px; background-color: #424874; justify-content: center; align-items: center;">
                                        <i class="fas fa-user text-light"></i>
                                    </div>
                                    <p class="username m-0 fw-semibold"
                                        style="font-weight: 500; font-size: 13px; letter-spacing: .5px; color: #424874; max-width: 85px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                        <?php if (isset($own_user)) {
                                            echo $own_user['username'];
                                        } else {
                                            echo $user['username'];
                                        } ?>
                                    </p>
                                    <i class="fas fa-chevron-down m-0" style="margin: auto;"></i>
                                </a>
                            </li>
                        </ul>
                    <?php } else if ($user['level'] == 'Admin') { ?>
                            <div class="admin-button-profile">
                                <img src="<?= base_url('asset/icon/icon_admin.svg') ?>" alt="Admin Icon">
                                <span>
                                <?= $user['username'] ?>
                                </span>
                            </div>
                    <?php }
                } else { ?>
                    <form class="d-none d-md-flex input-group w-auto my-auto p-2 form-search"
                        style="background-color: #EDEDED; border-radius: 30px;">
                        <input autocomplete="off" type="search" class="bg-transparent pr-1" placeholder='Search Something..'
                            style="min-width: 225px; font-size: 13px; letter-spacing: .5px;" />
                        <span class="input-group-text border-0 pr-1 pl-2 span-search"><img
                                src="<?= base_url('asset/icon/search.svg') ?>" height="22" style="cursor: pointer;"></span>
                    </form>
                    <style>
                        .follow-guest {
                            border: none;
                            border-radius: 20px;
                            background-color: #5C64A2;
                            padding: 5px 30px;
                            color: white;
                            font-family: 'Poppins';
                            font-weight: 500;
                            outline: none;
                            cursor: pointer;

                            &:hover {
                                filter: brightness(1.1);
                            }

                            &:focus {
                                outline: none;
                            }
                        }
                    </style>
                    <button class="follow-guest" onclick="window.location.assign('<?= site_url("Auth") ?>')">Login</button>
                <?php } ?>
            </div>
            <!-- Container wrapper -->
        </nav>
        <div class="user-profile-menu" style="display: none;">
            <div class="top-select">
                <div class="row-1-custom" onclick="window.location.assign('<?= site_url("Profile") ?>')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path
                            d="M21.9059 20.6075C20.362 17.9395 17.9381 16.0674 15.1217 15.2735C16.491 14.5775 17.586 13.4405 18.23 12.046C18.8741 10.6516 19.0298 9.0808 18.6719 7.58703C18.314 6.09326 17.4635 4.76356 16.2574 3.81232C15.0514 2.86108 13.5601 2.34375 12.0241 2.34375C10.488 2.34375 8.99676 2.86108 7.79071 3.81232C6.58466 4.76356 5.73413 6.09326 5.37625 7.58703C5.01838 9.0808 5.17403 10.6516 5.81811 12.046C6.46218 13.4405 7.55713 14.5775 8.92642 15.2735C6.11001 16.0665 3.68618 17.9385 2.14224 20.6075C2.09984 20.6742 2.07138 20.7488 2.05855 20.8267C2.04572 20.9047 2.0488 20.9845 2.06761 21.0612C2.08641 21.138 2.12054 21.2101 2.16795 21.2734C2.21536 21.3366 2.27507 21.3896 2.34349 21.4291C2.41191 21.4687 2.48762 21.494 2.56606 21.5035C2.64451 21.513 2.72408 21.5066 2.79997 21.4846C2.87587 21.4625 2.94653 21.4254 3.00769 21.3754C3.06886 21.3253 3.11928 21.2634 3.15591 21.1934C5.03188 17.9522 8.34634 16.0176 12.0241 16.0176C15.7018 16.0176 19.0163 17.9522 20.8922 21.1934C20.9289 21.2634 20.9793 21.3253 21.0405 21.3754C21.1016 21.4254 21.1723 21.4625 21.2482 21.4846C21.3241 21.5066 21.4036 21.513 21.4821 21.5035C21.5605 21.494 21.6362 21.4687 21.7047 21.4291C21.7731 21.3896 21.8328 21.3366 21.8802 21.2734C21.9276 21.2101 21.9617 21.138 21.9805 21.0612C21.9993 20.9845 22.0024 20.9047 21.9896 20.8267C21.9768 20.7488 21.9483 20.6742 21.9059 20.6075ZM6.36001 9.1817C6.36001 8.06146 6.6922 6.96637 7.31458 6.03492C7.93695 5.10347 8.82156 4.37749 9.85653 3.94879C10.8915 3.52009 12.0304 3.40793 13.1291 3.62648C14.2278 3.84502 15.237 4.38447 16.0292 5.17661C16.8213 5.96874 17.3608 6.97798 17.5793 8.0767C17.7979 9.17542 17.6857 10.3143 17.257 11.3492C16.8283 12.3842 16.1023 13.2688 15.1709 13.8912C14.2394 14.5136 13.1443 14.8458 12.0241 14.8458C10.5224 14.844 9.0828 14.2466 8.02097 13.1848C6.95915 12.123 6.36182 10.6834 6.36001 9.1817Z"
                            fill="black" />
                    </svg>
                    <p>View Profile</p>
                </div>
                <div class="row-1-custom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path
                            d="M19.6429 24.1074L12.5 16.9645L5.35718 24.1074V2.67878C5.35718 2.20518 5.54531 1.75098 5.8802 1.41609C6.21509 1.0812 6.66929 0.893066 7.14289 0.893066H17.8572C18.3308 0.893066 18.785 1.0812 19.1199 1.41609C19.4548 1.75098 19.6429 2.20518 19.6429 2.67878V24.1074Z"
                            stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p>Favorites</p>
                </div>
            </div>
            <div class="bottom-menu">
                <hr style="background-color: #D2D2D2">
                <div class="row-1-custom" onclick="window.location.assign('<?= site_url("Auth/Logout") ?>')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path
                            d="M5.20825 3.125H11.4583C12.2871 3.125 13.0819 3.45424 13.668 4.04029C14.254 4.62634 14.5833 5.4212 14.5833 6.25V10.4167H13.5416V6.25C13.5416 5.69747 13.3221 5.16756 12.9314 4.77686C12.5407 4.38616 12.0108 4.16667 11.4583 4.16667H5.20825C4.65572 4.16667 4.12581 4.38616 3.73511 4.77686C3.34441 5.16756 3.12492 5.69747 3.12492 6.25V19.7917C3.12492 20.3442 3.34441 20.8741 3.73511 21.2648C4.12581 21.6555 4.65572 21.875 5.20825 21.875H11.4583C12.0108 21.875 12.5407 21.6555 12.9314 21.2648C13.3221 20.8741 13.5416 20.3442 13.5416 19.7917V15.625H14.5833V19.7917C14.5833 20.6205 14.254 21.4153 13.668 22.0014C13.0819 22.5874 12.2871 22.9167 11.4583 22.9167H5.20825C4.37945 22.9167 3.58459 22.5874 2.99854 22.0014C2.41249 21.4153 2.08325 20.6205 2.08325 19.7917V6.25C2.08325 5.4212 2.41249 4.62634 2.99854 4.04029C3.58459 3.45424 4.37945 3.125 5.20825 3.125ZM8.33325 12.5H20.052L16.6666 9.11458L17.3541 8.33333L22.0416 13.0208L17.3541 17.7083L16.6666 16.9271L20.052 13.5417H8.33325V12.5Z"
                            fill="black" />
                    </svg>
                    <p>Logout</p>
                </div>
            </div>
        </div>
        <!-- Navbar -->
    </header>
    <script>
        var sidebar, toggle, sideShow;

        sidebar = document.getElementById('sidebarMenu');
        toggle = document.querySelector('.navbar-toggler');

        sideShow = false;

        toggle.onclick = () => {
            if (sideShow == false) {
                sidebar.style.display = 'block';
                sideShow = true
                sideShow = true
            } else {
                sidebar.style.display = 'none';
                sideShow = false
            }
        }

        $(document).ready(function () {
            $("#toggleMenu").click(function () {
                $(".user-profile-menu").toggle();
            });
        });
    </script>
</body>

</html>
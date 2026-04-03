<?php 
if ($user != null) {
if (!isset($empty_content)) {?>
<div class="slider-content-parent" style="display: flex; flex-direction: column; margin-top: 125px;">
    <?php foreach ($followed_content as $index => $ctn) { ?>
        <div class="mt-2 parent-content-row">
            <div class="d-flex parent-content">
                <div class="tab-1" style="width: 280px">
                    <h4>Following</h4>
                    <div class="card mb-3 user-own" style="max-width: 450px; border: 0; margin-top: 100px">
                        <div class="row g-0 m-0">
                            <div class="d-flex" style="align-items: center">
                                    <img src="data:image/jpeg;base64, <?= $user_content[$index]['profile_picture'] ?> "
                                        class="img-fluid rounded-circle" alt="..."
                                        style="width: 68px; height: 68px; object-fit: cover; object-position: 50% 20%; margin: auto 0px;">
                            </div>
                            <div class="col-md-8 user-title">
                                <p class="card-title" style="font-size: 13px;"><b>@<?= $user_content[$index]['username'] ?>
                                    </b>
                                    <?= $user_content[$index]['name'] ?>
                                </p>
                                <p class="num-followers"> <?= $user_content[$index]['followers'] ?><span><svg width="13" height="10" viewBox="0 0 14 11"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_33_7)">
                                                <path
                                                    d="M2.1 2.75C2.1 2.02065 2.395 1.32118 2.9201 0.805456C3.4452 0.289731 4.15739 0 4.9 0C5.64261 0 6.3548 0.289731 6.8799 0.805456C7.405 1.32118 7.7 2.02065 7.7 2.75C7.7 3.47935 7.405 4.17882 6.8799 4.69454C6.3548 5.21027 5.64261 5.5 4.9 5.5C4.15739 5.5 3.4452 5.21027 2.9201 4.69454C2.395 4.17882 2.1 3.47935 2.1 2.75ZM0 10.3619C0 8.2457 1.74563 6.53125 3.90031 6.53125H5.89969C8.05437 6.53125 9.8 8.2457 9.8 10.3619C9.8 10.7143 9.50906 11 9.15031 11H0.649688C0.290938 11 0 10.7143 0 10.3619ZM13.3284 11H10.3119C10.43 10.798 10.5 10.5639 10.5 10.3125V10.1406C10.5 8.83652 9.90719 7.66563 8.97313 6.8793C9.02563 6.87715 9.07594 6.875 9.12844 6.875H10.4716C12.4206 6.875 14 8.42617 14 10.3404C14 10.7057 13.6981 11 13.3284 11ZM9.45 5.5C8.77187 5.5 8.15938 5.2293 7.71531 4.79316C8.14625 4.22168 8.4 3.51484 8.4 2.75C8.4 2.17422 8.25562 1.63066 7.99969 1.15371C8.40656 0.861523 8.9075 0.6875 9.45 0.6875C10.8041 0.6875 11.9 1.76387 11.9 3.09375C11.9 4.42363 10.8041 5.5 9.45 5.5Z"
                                                    fill="#424874" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_33_7">
                                                    <rect width="14" height="11" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span></p>
                                <button class="button border-0"
                                    style="background-color: #F1F1F1; color: white; font-size: 13px; padding: 5px 13px; color: #424874; font-weight: 600;"><img
                                        src="asset/icon/check.svg" style="width: 15px; margin-right: 2px">
                                    Diikuti</button>
                            </div>
                        </div>
                    </div>
                    <div class="user-content card-user-info" style="width: 300px;">
                        <p class="user-description card-long-header">Latest posts of users you follow</p>
                        <div class="following-user">
                            <div class="row-1 f-row">
                                <img src="asset/img/pp/row-1.jpg" class="img-fluid rounded-circle" alt="..."
                                    style="width: 50px; height: 50px; object-fit: cover; object-position: 50% 20%; margin: auto 0px;">
                                <div class="user-name">
                                    <div class="d-flex">
                                        <p class="name-user-name">Abdul</p>
                                        <button>NEW POST!</button>
                                    </div>
                                    <p class="p-followed">Followed by <span>sebutsajahabib</span></p>
                                </div>
                                <button class="followed-btn">Diikuti</button>
                            </div>
                            <div class="row-2 f-row">
                                <img src="asset/img/pp/row-2.jpg" class="img-fluid rounded-circle" alt="..."
                                    style="width: 50px; height: 50px; object-fit: cover; object-position: 50% 80%; margin: auto 0px;">
                                <div class="user-name">
                                    <div class="d-flex">
                                        <p class="name-user-name">Samsul</p>
                                        <button>NEW POST!</button>
                                    </div>
                                    <p class="p-followed">Followed by <span>sebutsajahabib</span></p>
                                </div>
                                <button class="followed-btn">Diikuti</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-2" style="max-height: 682px;">
                    <div class="content-video-parent">
                    <video playsinline preload="auto" width="380" crossorigin="use-credentials" preload="auto" muted
                                loop
                                src="<?= base_url('asset/video/' . $ctn['user_id'] . '/' . $ctn['video'] . '.mp4') ?>"
                                class="video" type="video/mp4" style="border-radius: 15px">
                                Your browser does not support the video tag.
                            </video>
                        <div class="pause-animation">
                            <img src="asset/icon/pause.svg">
                        </div>
                        <div class="reaction-video">
                            <button class="button-reaction mute-btn-reaction mute-div"
                                style="margin-bottom: 10px; display: none;">
                                <span>
                                    <img src="asset/icon/mute.svg">
                                </span>
                            </button>

                            <button class="button-reaction profile-btn-reaction"
                                style="margin-bottom: 10px; display: none;">
                                <span>
                                    <img src="asset/img/pp/father.jpg" class="img-fluid rounded-circle" alt="..."
                                        style="width: 30px; height: 30px; object-fit: cover; object-position: 50% 20%; margin: auto 0px; border: 1px solid black;">
                                </span>
                            </button>
                            <button class="button-reaction">
                                <span>
                                    <div class="icon-button-reaction"><svg width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.2027 12.1988L15.7314 9.13876C15.7624 8.95941 15.7539 8.77544 15.7064 8.59973C15.6589 8.42402 15.5736 8.26081 15.4565 8.12151C15.3393 7.98221 15.1931 7.87019 15.0282 7.79328C14.8632 7.71637 14.6834 7.67643 14.5014 7.67626H10.6157C10.525 7.67628 10.4354 7.65655 10.3531 7.61846C10.2708 7.58036 10.1978 7.52481 10.1391 7.45565C10.0804 7.3865 10.0375 7.3054 10.0134 7.218C9.98919 7.13059 9.98435 7.03897 9.99915 6.94951L10.4964 3.91576C10.5771 3.42318 10.5541 2.91919 10.4289 2.43601C10.3753 2.23636 10.2722 2.05349 10.129 1.9044C9.98578 1.75532 9.80723 1.64484 9.6099 1.58326L9.50115 1.54801C9.25528 1.46902 8.98848 1.48728 8.75565 1.59901C8.50065 1.72201 8.31465 1.94626 8.24565 2.21251L7.88865 3.58801C7.775 4.02573 7.60985 4.44843 7.39665 4.84726C7.0854 5.43001 6.6039 5.89726 6.1029 6.32851L5.02365 7.25851C4.87393 7.38789 4.75699 7.55091 4.68242 7.7342C4.60785 7.91749 4.57778 8.11585 4.59465 8.31301L5.20365 15.3578C5.23049 15.6693 5.37318 15.9595 5.60354 16.171C5.8339 16.3824 6.13519 16.4998 6.4479 16.5H9.9339C12.5454 16.5 14.7737 14.6805 15.2027 12.1988Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.22606 7.1137C2.371 7.10736 2.51279 7.15727 2.6218 7.25301C2.73082 7.34874 2.79862 7.4829 2.81106 7.62745L3.53856 16.0544C3.55088 16.1799 3.5375 16.3066 3.49922 16.4268C3.46094 16.5469 3.39857 16.658 3.31592 16.7532C3.23327 16.8485 3.13207 16.9258 3.01851 16.9806C2.90495 17.0355 2.78141 17.0665 2.65543 17.072C2.52946 17.0775 2.40369 17.0572 2.28581 17.0124C2.16794 16.9676 2.06042 16.8993 1.96984 16.8116C1.87926 16.7239 1.80751 16.6186 1.75898 16.5022C1.71044 16.3858 1.68614 16.2608 1.68756 16.1347V7.67545C1.68762 7.53046 1.74366 7.39109 1.844 7.28643C1.94433 7.18176 2.0812 7.11988 2.22606 7.1137Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <p>250</p>
                                </span>
                            </button>
                            <button class="button-reaction">
                                <span>
                                    <div class="icon-button-reaction">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 1C3.58125 1 0 3.90937 0 7.5C0 9.05 0.66875 10.4688 1.78125 11.5844C1.39062 13.1594 0.084375 14.5625 0.06875 14.5781C0 14.65 -0.01875 14.7563 0.021875 14.85C0.0625 14.9438 0.15 15 0.25 15C2.32188 15 3.875 14.0063 4.64375 13.3938C5.66563 13.7781 6.8 14 8 14C12.4187 14 16 11.0906 16 7.5C16 3.90937 12.4187 1 8 1Z"
                                                fill="white" />
                                        </svg>

                                    </div>
                                    <p>250</p>
                                </span>
                            </button>
                            <button class="button-reaction">
                                <span>
                                    <div class="icon-button-reaction">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.583252 17.25V2.58333C0.583252 2.07917 0.762918 1.64742 1.12225 1.28808C1.48159 0.928751 1.91303 0.74939 2.41659 0.750002H11.5833C12.0874 0.750002 12.5192 0.929668 12.8785 1.289C13.2378 1.64833 13.4172 2.07978 13.4166 2.58333V17.25L6.99992 14.5L0.583252 17.25Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <p>250</p>
                                </span>
                            </button>
                            <button class="button-reaction">
                                <span>
                                    <div class="icon-button-reaction">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.4166 9.30208L11.0833 2.375V5.83854C7.91659 5.83854 1.58325 7.91667 1.58325 16.2292C1.58325 15.0743 3.48325 12.7656 11.0833 12.7656V16.2292L17.4166 9.30208Z"
                                                fill="white" stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </div>
                                    <p>250</p>
                                </span>
                            </button>
                        </div>
                        <div class="info-video">
                            <div class="user-profile-name">
                                <p class="mb-1">Al Aziz · <span>2 days ago</span></p>
                            </div>
                            <div class="caption-content">
                                <p>Little light, sparks circling the black hole, no life <span id="hastag">#space</span></p>
                            </div>
                            <div class="categories">
                                <button><span>Space</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="mini-control-video">
                        <div class="expand-div">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22.5" fill="black" fill-opacity="0.38" />
                                <path
                                    d="M12.1154 12.1147H19.0385V14.4224H16.11L21.6981 20.0105L20.0654 21.6421L14.4231 15.9997V19.0378H12.1154V12.1147ZM12.1154 32.884H19.0385V30.5763H16.0108L21.6981 24.8901L20.0654 23.2586L14.4231 28.9009V25.9609H12.1154V32.884ZM25.9615 32.884H32.8846V25.9609H30.5769V28.8732L24.9612 23.2586L23.3296 24.8901L29.0158 30.5763H25.9615V32.884ZM32.8846 12.1147H25.9615V14.4224H28.9177L23.3296 20.0105L24.9612 21.6421L30.5769 16.0263V19.0378H32.8846V12.1147Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="mute-div">
                            <img src="asset/icon/mute.svg">
                        </div>
                        <!-- <div class="swipe-vid">
                            <div class="up-arrow">
                                <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_23_91)">
                                        <rect width="47" height="47" rx="23.5" fill="#464646" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.1154 16.2404C22.4827 15.8732 22.9807 15.667 23.5 15.667C24.0193 15.667 24.5173 15.8732 24.8845 16.2404L35.9628 27.3187C36.3195 27.688 36.5169 28.1827 36.5125 28.6962C36.508 29.2096 36.3021 29.7008 35.939 30.0639C35.5759 30.427 35.0847 30.6329 34.5712 30.6374C34.0578 30.6419 33.5631 30.4445 33.1937 30.0877L23.5 20.394L13.8062 30.0877C13.4369 30.4445 12.9422 30.6419 12.4287 30.6374C11.9153 30.6329 11.4241 30.427 11.061 30.0639C10.6979 29.7008 10.492 29.2096 10.4875 28.6962C10.483 28.1827 10.6804 27.688 11.0372 27.3187L22.1154 16.2404Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_23_91">
                                            <rect width="47" height="47" rx="23.5" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="down-arrow">
                                <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" style="rotate: 180deg;>
                            <g clip-path=" url(#clip0_23_91)">
                                    <rect width="47" height="47" rx="23.5" fill="#464646" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22.1154 16.2404C22.4827 15.8732 22.9807 15.667 23.5 15.667C24.0193 15.667 24.5173 15.8732 24.8845 16.2404L35.9628 27.3187C36.3195 27.688 36.5169 28.1827 36.5125 28.6962C36.508 29.2096 36.3021 29.7008 35.939 30.0639C35.5759 30.427 35.0847 30.6329 34.5712 30.6374C34.0578 30.6419 33.5631 30.4445 33.1937 30.0877L23.5 20.394L13.8062 30.0877C13.4369 30.4445 12.9422 30.6419 12.4287 30.6374C11.9153 30.6329 11.4241 30.427 11.061 30.0639C10.6979 29.7008 10.492 29.2096 10.4875 28.6962C10.483 28.1827 10.6804 27.688 11.0372 27.3187L22.1154 16.2404Z"
                                        fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_23_91">
                                            <rect width="47" height="47" rx="23.5" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="tab-3">
                    <div class="card-user-info card-acc-suggest">
                        <p class="card-long-header" style="width: 220px">Some creators who often create content that
                            discusses
                            <label style="font-weight: 600;">Space</label>
                        </p>
                        <div class="user-acc">
                            <div class="suggest-acc d-flex">
                                <div class="user-card">
                                    <div class="d-flex user-pp" style="align-items: center">
                                        <img src="asset/img/pp/sulaiman.png" class="img-fluid rounded-circle" alt="..."
                                            style="width: 50px; height: 50px; object-fit: cover; object-position: 0% 40%; margin: auto 0px;">
                                    </div>
                                    <div class="acc-info d-flex">
                                        <div class="d-flex acc-name">
                                            <p class="card-title" style="font-size: 12px;"><b>Sulaiman</b></p>
                                            <p style="font-weight: 500">Followed by <b>sebutsajahabib</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-text">
                                    <span>Follow</span>
                                </div>
                            </div>
                            <div class="suggest-acc d-flex">
                                <div class="user-card">
                                    <div class="d-flex user-pp" style="align-items: center">
                                        <img src="asset/img/pp/hafiz.png" class="img-fluid rounded-circle" alt="..."
                                            style="width: 50px; height: 50px; object-fit: cover; object-position: 0% 40%; margin: auto 0px;">
                                    </div>
                                    <div class="acc-info d-flex">
                                        <div class="d-flex acc-name">
                                            <p class="card-title" style="font-size: 12px;"><b>hafidz</b></p>
                                            <p style="font-weight: 500">Followed by <b>kangreligi, + 4...</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-text">
                                    <span>Follow</span>
                                </div>
                            </div>
                            <div class="suggest-acc d-flex">
                                <div class="user-card">
                                    <div class="d-flex user-pp" style="align-items: center">
                                        <img src="asset/img/pp/tobi 3.png" class="img-fluid rounded-circle" alt="..."
                                            style="width: 50px; height: 50px; object-fit: cover; object-position: 0% 40%; margin: auto 0px;">
                                    </div>
                                    <div class="acc-info d-flex">
                                        <div class="d-flex acc-name">
                                            <p class="card-title" style="font-size: 12px;"><b>Muslim</b></p>
                                            <p style="font-weight: 500">Followed by <b>Hafidz, + 2 More</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-text">
                                    <span>Follow</span>
                                </div>
                            </div>
                            <div class="suggest-acc d-flex">
                                <div class="user-card">
                                    <div class="d-flex user-pp" style="align-items: center">
                                        <img src="asset/img/pp/omar.png" class="img-fluid rounded-circle" alt="..."
                                            style="width: 50px; height: 50px; object-fit: cover; object-position: 0% 40%; margin: auto 0px;">
                                    </div>
                                    <div class="acc-info d-flex">
                                        <div class="d-flex acc-name">
                                            <p class="card-title" style="font-size: 12px;"><b>Omar</b></p>
                                            <p style="font-weight: 500">Followed by <b>Muslim, + 6 More</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-text">
                                    <span>Follow</span>
                                </div>
                            </div>
                        </div>
                        <p class="user-description card-long-header another-cat" style="width: 200px; margin-top: 20px;">
                            Want to
                            see
                            more
                            content like this ? <a href="#"> Visit Explore</a>
                        </p>
                    </div>
                </div>
            </div>
            <hr style="margin: 40px 0px;">
        </div>
    <?php }; ?>
</div>
    <?php } else { ?>
        <style>
            body {
                overflow: hidden !important;
            }
        </style>
        <div class="container-follower" style="display: flex">
        <div class="text-parent">
            <h3>
            You haven't followed other users
            </h3>
        </div>
        </div>
        <?php } } else {?>
            <style>
                body {
                    overflow: hidden !important;
                }

                .container-follower {
                    display: flex;
                    margin-top: 0px !important;

                }

                .text-parent {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    gap: 30px
                }

                .text-parent button {
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
                }
            </style>
            <div class="container-follower">
            <div class="text-parent">
                <h3>
                You haven't followed other users
                </h3>
                <button onclick="window.location.assign('<?= site_url("Auth") ?>')">Login</button>

            </div>
            </div>

    <?php }?>
<script>
    var content = document.querySelector('.video');
    var contentParent = document.querySelector('.content-video-parent')
    var pauseDisplay = document.querySelector('.pause-animation');
    const allVideo = document.querySelectorAll('.video');
    const parentTab = document.querySelectorAll('.parent-content-row');
    const r_h4 = document.querySelectorAll('.recommend-h4');

    var contentParent = document.querySelector('.content-video-parent')
    var muteIcon = document.querySelectorAll('.mute-div')
    window.onload = function () {
        document.querySelector('.video').play();
    }

    content.onclick = () => {
        if (content.paused) {
            content.play()
            pauseDisplay.style.opacity = 0;
        } else {
            content.pause()
            pauseDisplay.getElementsByTagName('img')[0].src = 'asset/icon/pause.svg';
            pauseDisplay.style.opacity = 1;
        }
    }

    muteIcon.forEach(mute => {
        mute.onclick = () => {
            if (content.muted) {
                content.muted = false;
                mute.getElementsByTagName('img')[0].setAttribute('src', 'asset/icon/unmute.svg');
            } else {
                content.muted = true;
                mute.getElementsByTagName('img')[0].setAttribute('src', 'asset/icon/mute.svg');
            }
        }
    });

    window.addEventListener('scroll', function () {
        allVideo.forEach((video, ind) => {
            const navbar = document.getElementById('main-navbar');

            var videoRect = video.getBoundingClientRect();
            var windowHeight = window.innerHeight || document.documentElement.clientHeight;
            var videoViewTop = videoRect.top + (video.offsetHeight / 2);
            var videoViewBottom = windowHeight;

            if (videoViewTop >= 0 + navbar.offsetHeight && videoRect.bottom - video.offsetHeight / 2 + 30 <= windowHeight) {
                video.play();
            } else {
                video.pause();
            }

        });
    })

    parentTab.forEach(element => {
        element.querySelector('.video').onclick = () => {
            if (element.querySelector('.video').paused) {
                element.querySelector('.video').play()
                element.querySelector('.pause-animation').style.opacity = 0;
            } else {
                element.querySelector('.video').pause()
                element.querySelector('.pause-animation').getElementsByTagName('img')[0].src = 'asset/icon/pause.svg';
                element.querySelector('.pause-animation').style.opacity = 1;
            }
        }

        element.querySelectorAll('.mute-div').forEach(mute => {
            if (element.querySelector('.video').muted) {
                element.querySelector('.video').muted = false;
                mute.getElementsByTagName('img')[0].setAttribute('src', 'asset/icon/unmute.svg');
            } else {
                element.querySelector('.video').muted = true;
                mute.getElementsByTagName('img')[0].setAttribute('src', 'asset/icon/mute.svg');
            }

            mute.onclick = () => {
                if (element.querySelector('.video').muted) {
                    element.querySelector('.video').muted = false;
                    mute.getElementsByTagName('img')[0].setAttribute('src', 'asset/icon/unmute.svg');
                } else {
                    element.querySelector('.video').muted = true;
                    mute.getElementsByTagName('img')[0].setAttribute('src', 'asset/icon/mute.svg');
                }
            }
        });
    });

    r_h4.forEach((element, ind) => {
        if (ind != 0) {
            element.remove();
        }
    });
</script>
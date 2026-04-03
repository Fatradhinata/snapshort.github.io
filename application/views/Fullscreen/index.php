<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67765d7747.js" crossorigin="anonymous"></script>
    <title>Fullscreen | Snapshort</title>
    <link rel="stylesheet" href="<?= base_url('asset/css/page/fullscreen.css?v=' . time());
    ; ?>" type="text/css" />
    <link rel="icon" href="<?= base_url('asset/img/logo/favicon(1).ico') ?>" type="image/ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    <style>
        .duration-audio-parent {
            width: 26px;
            min-width: 26px;
        }

        #waveform {
            position: relative;
            cursor: pointer;
        }

        #hover {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 10;
            pointer-events: none;
            height: 100%;
            width: 0;
            mix-blend-mode: overlay;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        #waveform:hover #hover {
            opacity: 1;
        }

        <?php if ($user == null) {?>
            .comment-setting-btn {
                opacity: 0 !important;
            }
            <?php }?> 
    </style>
</head>

<body>
    <div class="report-popup" id="report-popup">
        <div class="report-core">
            <div class="report-core-core">
                <div class="header-report">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none"
                        id="close-report">
                        <path
                            d="M9.29248 23.709L16.5016 16.4999L23.7107 23.709M23.7107 9.29077L16.5002 16.4999L9.29248 9.29077"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h4>Report Content</h4>
                </div>
                <hr>
                <div class="reason">
                    <span>Please select your reason</span>
                    <div class="reason-row done-report">
                        <p>Fraud or Copyright infringement</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 13 21" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.5037 9.36548C12.8215 9.66126 13 10.0624 13 10.4806C13 10.8989 12.8215 11.3 12.5037 11.5958L2.9144 20.5185C2.75803 20.6691 2.57098 20.7893 2.36417 20.8719C2.15736 20.9546 1.93493 20.9981 1.70985 20.9999C1.48477 21.0018 1.26156 20.9619 1.05324 20.8825C0.844913 20.8032 0.655648 20.6861 0.496489 20.538C0.337329 20.3899 0.211461 20.2138 0.126229 20.02C0.0409972 19.8261 -0.00189191 19.6184 6.39332e-05 19.409C0.00201978 19.1996 0.0487818 18.9926 0.137621 18.8002C0.226461 18.6077 0.355598 18.4337 0.5175 18.2882L8.90834 10.4806L0.517499 2.67304C0.208719 2.37556 0.0378606 1.97714 0.0417227 1.56358C0.0455849 1.15002 0.223858 0.754419 0.538147 0.461977C0.852436 0.169535 1.27759 0.00365252 1.72205 5.90525e-05C2.1665 -0.00353632 2.5947 0.155447 2.9144 0.442762L12.5037 9.36548Z"
                                fill="#E3E3E3" />
                        </svg>
                    </div>
                    <div class="reason-row done-report">
                        <p>Provoke the other party</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 13 21" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.5037 9.36548C12.8215 9.66126 13 10.0624 13 10.4806C13 10.8989 12.8215 11.3 12.5037 11.5958L2.9144 20.5185C2.75803 20.6691 2.57098 20.7893 2.36417 20.8719C2.15736 20.9546 1.93493 20.9981 1.70985 20.9999C1.48477 21.0018 1.26156 20.9619 1.05324 20.8825C0.844913 20.8032 0.655648 20.6861 0.496489 20.538C0.337329 20.3899 0.211461 20.2138 0.126229 20.02C0.0409972 19.8261 -0.00189191 19.6184 6.39332e-05 19.409C0.00201978 19.1996 0.0487818 18.9926 0.137621 18.8002C0.226461 18.6077 0.355598 18.4337 0.5175 18.2882L8.90834 10.4806L0.517499 2.67304C0.208719 2.37556 0.0378606 1.97714 0.0417227 1.56358C0.0455849 1.15002 0.223858 0.754419 0.538147 0.461977C0.852436 0.169535 1.27759 0.00365252 1.72205 5.90525e-05C2.1665 -0.00353632 2.5947 0.155447 2.9144 0.442762L12.5037 9.36548Z"
                                fill="#E3E3E3" />
                        </svg>
                    </div>
                    <div class="reason-row done-report">
                        <p>Suicide and Self-harm</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 13 21" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.5037 9.36548C12.8215 9.66126 13 10.0624 13 10.4806C13 10.8989 12.8215 11.3 12.5037 11.5958L2.9144 20.5185C2.75803 20.6691 2.57098 20.7893 2.36417 20.8719C2.15736 20.9546 1.93493 20.9981 1.70985 20.9999C1.48477 21.0018 1.26156 20.9619 1.05324 20.8825C0.844913 20.8032 0.655648 20.6861 0.496489 20.538C0.337329 20.3899 0.211461 20.2138 0.126229 20.02C0.0409972 19.8261 -0.00189191 19.6184 6.39332e-05 19.409C0.00201978 19.1996 0.0487818 18.9926 0.137621 18.8002C0.226461 18.6077 0.355598 18.4337 0.5175 18.2882L8.90834 10.4806L0.517499 2.67304C0.208719 2.37556 0.0378606 1.97714 0.0417227 1.56358C0.0455849 1.15002 0.223858 0.754419 0.538147 0.461977C0.852436 0.169535 1.27759 0.00365252 1.72205 5.90525e-05C2.1665 -0.00353632 2.5947 0.155447 2.9144 0.442762L12.5037 9.36548Z"
                                fill="#E3E3E3" />
                        </svg>
                    </div>
                    <div class="reason-row done-report">
                        <p>Dangerous content and Challenges</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 13 21" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.5037 9.36548C12.8215 9.66126 13 10.0624 13 10.4806C13 10.8989 12.8215 11.3 12.5037 11.5958L2.9144 20.5185C2.75803 20.6691 2.57098 20.7893 2.36417 20.8719C2.15736 20.9546 1.93493 20.9981 1.70985 20.9999C1.48477 21.0018 1.26156 20.9619 1.05324 20.8825C0.844913 20.8032 0.655648 20.6861 0.496489 20.538C0.337329 20.3899 0.211461 20.2138 0.126229 20.02C0.0409972 19.8261 -0.00189191 19.6184 6.39332e-05 19.409C0.00201978 19.1996 0.0487818 18.9926 0.137621 18.8002C0.226461 18.6077 0.355598 18.4337 0.5175 18.2882L8.90834 10.4806L0.517499 2.67304C0.208719 2.37556 0.0378606 1.97714 0.0417227 1.56358C0.0455849 1.15002 0.223858 0.754419 0.538147 0.461977C0.852436 0.169535 1.27759 0.00365252 1.72205 5.90525e-05C2.1665 -0.00353632 2.5947 0.155447 2.9144 0.442762L12.5037 9.36548Z"
                                fill="#E3E3E3" />
                        </svg>
                    </div>
                    <div class="reason-row done-report">
                        <p>Controversial content</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 13 21" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.5037 9.36548C12.8215 9.66126 13 10.0624 13 10.4806C13 10.8989 12.8215 11.3 12.5037 11.5958L2.9144 20.5185C2.75803 20.6691 2.57098 20.7893 2.36417 20.8719C2.15736 20.9546 1.93493 20.9981 1.70985 20.9999C1.48477 21.0018 1.26156 20.9619 1.05324 20.8825C0.844913 20.8032 0.655648 20.6861 0.496489 20.538C0.337329 20.3899 0.211461 20.2138 0.126229 20.02C0.0409972 19.8261 -0.00189191 19.6184 6.39332e-05 19.409C0.00201978 19.1996 0.0487818 18.9926 0.137621 18.8002C0.226461 18.6077 0.355598 18.4337 0.5175 18.2882L8.90834 10.4806L0.517499 2.67304C0.208719 2.37556 0.0378606 1.97714 0.0417227 1.56358C0.0455849 1.15002 0.223858 0.754419 0.538147 0.461977C0.852436 0.169535 1.27759 0.00365252 1.72205 5.90525e-05C2.1665 -0.00353632 2.5947 0.155447 2.9144 0.442762L12.5037 9.36548Z"
                                fill="#E3E3E3" />
                        </svg>
                    </div>
                    <div class="reason-row done-report">
                        <p>Sexual content</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 13 21" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.5037 9.36548C12.8215 9.66126 13 10.0624 13 10.4806C13 10.8989 12.8215 11.3 12.5037 11.5958L2.9144 20.5185C2.75803 20.6691 2.57098 20.7893 2.36417 20.8719C2.15736 20.9546 1.93493 20.9981 1.70985 20.9999C1.48477 21.0018 1.26156 20.9619 1.05324 20.8825C0.844913 20.8032 0.655648 20.6861 0.496489 20.538C0.337329 20.3899 0.211461 20.2138 0.126229 20.02C0.0409972 19.8261 -0.00189191 19.6184 6.39332e-05 19.409C0.00201978 19.1996 0.0487818 18.9926 0.137621 18.8002C0.226461 18.6077 0.355598 18.4337 0.5175 18.2882L8.90834 10.4806L0.517499 2.67304C0.208719 2.37556 0.0378606 1.97714 0.0417227 1.56358C0.0455849 1.15002 0.223858 0.754419 0.538147 0.461977C0.852436 0.169535 1.27759 0.00365252 1.72205 5.90525e-05C2.1665 -0.00353632 2.5947 0.155447 2.9144 0.442762L12.5037 9.36548Z"
                                fill="#E3E3E3" />
                        </svg>
                    </div>
                    <div class="reason-row flex-column other-reason">
                        <div class="reason-row-core">
                            <p>Other</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 13 21"
                                fill="none" style="rotate: 90deg;" class="chevron-other">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.5037 9.36548C12.8215 9.66126 13 10.0624 13 10.4806C13 10.8989 12.8215 11.3 12.5037 11.5958L2.9144 20.5185C2.75803 20.6691 2.57098 20.7893 2.36417 20.8719C2.15736 20.9546 1.93493 20.9981 1.70985 20.9999C1.48477 21.0018 1.26156 20.9619 1.05324 20.8825C0.844913 20.8032 0.655648 20.6861 0.496489 20.538C0.337329 20.3899 0.211461 20.2138 0.126229 20.02C0.0409972 19.8261 -0.00189191 19.6184 6.39332e-05 19.409C0.00201978 19.1996 0.0487818 18.9926 0.137621 18.8002C0.226461 18.6077 0.355598 18.4337 0.5175 18.2882L8.90834 10.4806L0.517499 2.67304C0.208719 2.37556 0.0378606 1.97714 0.0417227 1.56358C0.0455849 1.15002 0.223858 0.754419 0.538147 0.461977C0.852436 0.169535 1.27759 0.00365252 1.72205 5.90525e-05C2.1665 -0.00353632 2.5947 0.155447 2.9144 0.442762L12.5037 9.36548Z"
                                    fill="#E3E3E3" />
                            </svg>
                        </div>
                        <div class="other-core">
                            <input type="text" class="reason-other-input">
                            <div class="submit-div">
                                <button class="done-report">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="report-success">
                <img src="<?= base_url("asset/icon/report-success.svg") ?>" alt="Report">
                <h4>Report was sent successfully !</h4>
                <button class="report-close">Close</button>
            </div>
        </div>
    </div>
    <div class="parent-content">
        <div class="content">
            <canvas id="thumbnail-canvas" style="display: none"></canvas>
            <div class="back-icon" onclick="history.back()">
                <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.382959 1.82975C0.515511 1.51005 0.739882 1.23683 1.0277 1.04464C1.31552 0.852448 1.65387 0.749913 1.99996 0.75H19.5C21.1087 0.75 22.7016 1.06686 24.1878 1.68248C25.6741 2.2981 27.0245 3.20042 28.162 4.33794C29.2995 5.47546 30.2019 6.82589 30.8175 8.31213C31.4331 9.79837 31.75 11.3913 31.75 13C31.75 14.6087 31.4331 16.2016 30.8175 17.6879C30.2019 19.1741 29.2995 20.5245 28.162 21.6621C27.0245 22.7996 25.6741 23.7019 24.1878 24.3175C22.7016 24.9331 21.1087 25.25 19.5 25.25H3.74996C3.28583 25.25 2.84071 25.0656 2.51252 24.7374C2.18433 24.4093 1.99996 23.9641 1.99996 23.5C1.99996 23.0359 2.18433 22.5908 2.51252 22.2626C2.84071 21.9344 3.28583 21.75 3.74996 21.75H19.5C21.8206 21.75 24.0462 20.8281 25.6871 19.1872C27.3281 17.5462 28.25 15.3206 28.25 13C28.25 10.6794 27.3281 8.45376 25.6871 6.81282C24.0462 5.17187 21.8206 4.25 19.5 4.25H6.22446L9.36221 7.38775C9.68099 7.7178 9.85738 8.15986 9.85339 8.6187C9.8494 9.07755 9.66536 9.51647 9.34089 9.84093C9.01643 10.1654 8.57751 10.3494 8.11866 10.3534C7.65982 10.3574 7.21776 10.181 6.88771 9.86225L0.762709 3.73725C0.517826 3.49252 0.351036 3.18066 0.283438 2.84111C0.215841 2.50157 0.250475 2.14961 0.382959 1.82975Z"
                        fill="#D6D6D6" />
                </svg>
            </div>
            <img src="" id="thumb">
            <div class="content-div">
                <video muted playsinline preload="auto" height="100%" autoplay crossorigin="use-credentials"
                    preload="auto" loop
                    src="<?= base_url("asset/video/" . $user_content['user_id'] . '/' . $content['video']) ?>.mp4"
                    class="video" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <form class="form-search" style="border-radius: 30px;">
                    <input autocomplete="off" type="search" class="search-input" placeholder='Search Something..'
                        style="min-width: 200px; font-size: 13px;" />
                    <span class="search-input"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="20px"
                            height="20px">
                            <path
                                d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
                        </svg></span>
                </form>
            </div>
            <div class="swipe-vid">
                <div class="up-arrow">
                    <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_284_508)">
                            <rect width="47" height="47" rx="23.5" fill="#7D7D7D" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.1156 16.2404C22.4828 15.8732 22.9808 15.667 23.5001 15.667C24.0194 15.667 24.5174 15.8732 24.8846 16.2404L35.9629 27.3187C36.3197 27.688 36.5171 28.1827 36.5126 28.6962C36.5081 29.2096 36.3022 29.7008 35.9391 30.0639C35.576 30.427 35.0848 30.6329 34.5713 30.6374C34.0579 30.6419 33.5632 30.4445 33.1939 30.0877L23.5001 20.394L13.8064 30.0877C13.437 30.4445 12.9423 30.6419 12.4289 30.6374C11.9154 30.6329 11.4242 30.427 11.0611 30.0639C10.698 29.7008 10.4921 29.2096 10.4876 28.6962C10.4832 28.1827 10.6805 27.688 11.0373 27.3187L22.1156 16.2404Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_284_508">
                                <rect width="47" height="47" rx="23.5" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="down-arrow">
                    <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg"
                        style="rotate: 180deg">
                        <g clip-path="url(#clip0_284_508)">
                            <rect width="47" height="47" rx="23.5" fill="#7D7D7D" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.1156 16.2404C22.4828 15.8732 22.9808 15.667 23.5001 15.667C24.0194 15.667 24.5174 15.8732 24.8846 16.2404L35.9629 27.3187C36.3197 27.688 36.5171 28.1827 36.5126 28.6962C36.5081 29.2096 36.3022 29.7008 35.9391 30.0639C35.576 30.427 35.0848 30.6329 34.5713 30.6374C34.0579 30.6419 33.5632 30.4445 33.1939 30.0877L23.5001 20.394L13.8064 30.0877C13.437 30.4445 12.9423 30.6419 12.4289 30.6374C11.9154 30.6329 11.4242 30.427 11.0611 30.0639C10.698 29.7008 10.4921 29.2096 10.4876 28.6962C10.4832 28.1827 10.6805 27.688 11.0373 27.3187L22.1156 16.2404Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_284_508">
                                <rect width="47" height="47" rx="23.5" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
            </div>
            <div class="report-report">
                <?php if ($user != null) {?>
                    <button class="report" report-content-id="<?= $content['id'] ?>" report-type="Content"><span><svg
                    width="15" height="22" viewBox="0 0 15 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                    d="M0.75 0C0.948912 0 1.13968 0.0790177 1.28033 0.21967C1.42098 0.360322 1.5 0.551088 1.5 0.75V2.6L3.22 2.256C4.87075 1.92571 6.58194 2.08276 8.145 2.708L8.349 2.789C9.9099 3.41355 11.6279 3.53042 13.259 3.123C13.4359 3.07878 13.6205 3.07546 13.7989 3.11328C13.9773 3.15111 14.1447 3.22909 14.2884 3.34129C14.4322 3.4535 14.5484 3.59699 14.6284 3.76085C14.7084 3.92472 14.75 4.10466 14.75 4.287V11.654C14.75 12.298 14.311 12.86 13.686 13.016L13.472 13.069C11.7025 13.5115 9.83859 13.3852 8.145 12.708C6.58226 12.0829 4.87143 11.9259 3.221 12.256L1.5 12.6V20.75C1.5 20.9489 1.42098 21.1397 1.28033 21.2803C1.13968 21.421 0.948912 21.5 0.75 21.5C0.551088 21.5 0.360322 21.421 0.21967 21.2803C0.0790175 21.1397 0 20.9489 0 20.75V0.75C0 0.551088 0.0790175 0.360322 0.21967 0.21967C0.360322 0.0790177 0.551088 0 0.75 0Z"
                    fill="white" fill-opacity="0.7" />
                </svg>
            </span>Report</button>
            <?php }?>
            </div>
        </div>
        <div class="reaction">
            <div class="user-content-info">
                <div class="user-acc">
                    <div class="user-info">
                        <img src="data:image/jpeg;base64, <?= $user_content['profile_picture'] ?> " alt="Photo Profile"
                            style="border: 1px solid white; width: 55px; height: 55px">
                        <div class="user-acc-name">
                            <p class="user-name">
                                <?= $user_content['username'] ?>
                            </p>
                            <p>
                                <?= $user_content['name'] ?> · <span data-date="<?= $content['date'] ?>"
                                    class="date-span"></span>
                            </p>
                        </div>
                    </div>
                    <button class="follow-btn" style="display: none;">Follow</button>
                    <?php if ($user != null) {?>
                    <div class="option-content">
                        <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 2.84375C2.36244 2.84375 2.65625 2.54994 2.65625 2.1875C2.65625 1.82506 2.36244 1.53125 2 1.53125C1.63756 1.53125 1.34375 1.82506 1.34375 2.1875C1.34375 2.54994 1.63756 2.84375 2 2.84375Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M2 7.65625C2.36244 7.65625 2.65625 7.36244 2.65625 7C2.65625 6.63756 2.36244 6.34375 2 6.34375C1.63756 6.34375 1.34375 6.63756 1.34375 7C1.34375 7.36244 1.63756 7.65625 2 7.65625Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M2 12.4688C2.36244 12.4688 2.65625 12.1749 2.65625 11.8125C2.65625 11.4501 2.36244 11.1562 2 11.1562C1.63756 11.1562 1.34375 11.4501 1.34375 11.8125C1.34375 12.1749 1.63756 12.4688 2 12.4688Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <?php }?>
                </div>
                <p class="caption">
                    <?= $content['caption'] ?><span id="hastag"></span>
                </p>
                <div class="reaction-video">
                    <button class="button-rct">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.2027 12.1988L15.7314 9.13876C15.7624 8.95941 15.7539 8.77544 15.7064 8.59973C15.6589 8.42402 15.5736 8.26081 15.4565 8.12151C15.3393 7.98221 15.1931 7.87019 15.0282 7.79328C14.8632 7.71637 14.6834 7.67643 14.5014 7.67626H10.6157C10.525 7.67628 10.4354 7.65655 10.3531 7.61846C10.2708 7.58036 10.1978 7.52481 10.1391 7.45565C10.0804 7.3865 10.0375 7.3054 10.0134 7.218C9.98919 7.13059 9.98435 7.03897 9.99915 6.94951L10.4964 3.91576C10.5771 3.42318 10.5541 2.91919 10.4289 2.43601C10.3753 2.23636 10.2722 2.05349 10.129 1.9044C9.98578 1.75532 9.80723 1.64484 9.6099 1.58326L9.50115 1.54801C9.25528 1.46902 8.98848 1.48728 8.75565 1.59901C8.50065 1.72201 8.31465 1.94626 8.24565 2.21251L7.88865 3.58801C7.775 4.02573 7.60985 4.44843 7.39665 4.84726C7.0854 5.43001 6.6039 5.89726 6.1029 6.32851L5.02365 7.25851C4.87393 7.38789 4.75699 7.55091 4.68242 7.7342C4.60785 7.91749 4.57778 8.11585 4.59465 8.31301L5.20365 15.3578C5.23049 15.6693 5.37318 15.9595 5.60354 16.171C5.8339 16.3824 6.13519 16.4998 6.4479 16.5H9.9339C12.5454 16.5 14.7737 14.6805 15.2027 12.1988Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.22606 7.1137C2.371 7.10736 2.51279 7.15727 2.6218 7.25301C2.73082 7.34874 2.79862 7.4829 2.81106 7.62745L3.53856 16.0544C3.55088 16.1799 3.5375 16.3066 3.49922 16.4268C3.46094 16.5469 3.39857 16.658 3.31592 16.7532C3.23327 16.8485 3.13207 16.9258 3.01851 16.9806C2.90495 17.0355 2.78141 17.0665 2.65543 17.072C2.52946 17.0775 2.40369 17.0572 2.28581 17.0124C2.16794 16.9676 2.06042 16.8993 1.96984 16.8116C1.87926 16.7239 1.80751 16.6186 1.75898 16.5022C1.71044 16.3858 1.68614 16.2608 1.68756 16.1347V7.67545C1.68762 7.53046 1.74366 7.39109 1.844 7.28643C1.94433 7.18176 2.0812 7.11988 2.22606 7.1137Z"
                                fill="white" />
                        </svg>
                        <span>
                            <?= $user_content['total_like'] ?>
                        </span>
                    </button>
                    <button class="button-rct">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 1C3.58125 1 0 3.90937 0 7.5C0 9.05 0.66875 10.4688 1.78125 11.5844C1.39062 13.1594 0.084375 14.5625 0.06875 14.5781C0 14.65 -0.01875 14.7563 0.021875 14.85C0.0625 14.9438 0.15 15 0.25 15C2.32188 15 3.875 14.0063 4.64375 13.3938C5.66563 13.7781 6.8 14 8 14C12.4187 14 16 11.0906 16 7.5C16 3.90937 12.4187 1 8 1Z"
                                fill="white" />
                        </svg>

                        <span>
                            <?= $total_comment ?>
                        </span>
                    </button>
                    <button class="button-rct">
                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.583252 17.25V2.58333C0.583252 2.07917 0.762918 1.64742 1.12225 1.28808C1.48159 0.928751 1.91303 0.74939 2.41659 0.750002H11.5833C12.0874 0.750002 12.5192 0.929668 12.8785 1.289C13.2378 1.64833 13.4172 2.07978 13.4166 2.58333V17.25L6.99992 14.5L0.583252 17.25Z"
                                fill="white" />
                        </svg>
                        <span>0</span>
                    </button>
                    <button class="button-rct">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.4166 9.30208L11.0833 2.375V5.83854C7.91659 5.83854 1.58325 7.91667 1.58325 16.2292C1.58325 15.0743 3.48325 12.7656 11.0833 12.7656V16.2292L17.4166 9.30208Z"
                                fill="white" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span>0</span>
                    </button>
                </div>
            </div>
            <div class="comment-rec">
                <div class="comment-cat">
                    <div class="comment-btn-div">
                        <button class="cat-cmt">Newest</button>
                    </div>
                    <div class="comment-btn-div">
                        <button class="cat-cmt">Top Comment</button>
                    </div>
                </div>
                <div class="comment-core">
                    <div class="comment-bar">
                        <?php foreach ($comments as $key => $comment) { ?>
                            <div class="user-bar-parent">
                                <div class="user-bar user-bar-comment-for-setting">
                                    <div class="report-comment" report-content-id="<?= $comment['id'] ?>"
                                        report-type="Comment">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M5.75 1C5.94891 1 6.13968 1.07902 6.28033 1.21967C6.42098 1.36032 6.5 1.55109 6.5 1.75V3.6L8.22 3.256C9.87075 2.92571 11.5819 3.08276 13.145 3.708L13.349 3.789C14.9099 4.41355 16.6279 4.53042 18.259 4.123C18.4359 4.07878 18.6205 4.07546 18.7989 4.11328C18.9773 4.15111 19.1447 4.22909 19.2884 4.34129C19.4322 4.4535 19.5484 4.59699 19.6284 4.76085C19.7084 4.92472 19.75 5.10466 19.75 5.287V12.654C19.75 13.298 19.311 13.86 18.686 14.016L18.472 14.069C16.7025 14.5115 14.8386 14.3852 13.145 13.708C11.5823 13.0829 9.87143 12.9259 8.221 13.256L6.5 13.6V21.75C6.5 21.9489 6.42098 22.1397 6.28033 22.2803C6.13968 22.421 5.94891 22.5 5.75 22.5C5.55109 22.5 5.36032 22.421 5.21967 22.2803C5.07902 22.1397 5 21.9489 5 21.75V1.75C5 1.55109 5.07902 1.36032 5.21967 1.21967C5.36032 1.07902 5.55109 1 5.75 1Z"
                                                fill="#CD5252" />
                                        </svg>
                                        <p>Report</p>
                                    </div>
                                    <div class="user-user-info">
                                        <img src="data:image/jpeg;base64,<?= $user_comment[$key]['profile_picture'] ?> "
                                            alt="user pp" class="user-pp-cmt">
                                        <div class="title-comment-date">
                                            <p class="user-name">
                                                <?= $user_comment[$key]['username'] ?>
                                            </p>
                                            <?php if ($comment['comment'] != null) { ?>
                                                <p>
                                                    <?= $comment['comment'] ?>
                                                </p>
                                            <?php } else { ?>
                                                <div class="audio-bar">
                                                    <img src="<?= base_url("asset/icon/play_blue.svg") ?>" alt="Play"
                                                        id="control-audio" data-wavesurfer-index="0">
                                                    <div id="waveform" style="width: 100%"
                                                        data-audio="data:audio/mpeg;base64,<?= $comment['voice_note'] ?>"
                                                        type="audio/mp3">
                                                        <div id="hover"></div>
                                                    </div>
                                                    <p class="duration-audio-parent" id="duration-audio">0:00</p>
                                                </div>
                                            <?php } ?>
                                            <div class="descrption-cmt">
                                                <div class="desc-core">
                                                    <span data-date="<?= $comment['created_date'] ?>"
                                                        class="date-span"></span>
                                                    <span class="reply-text-button"
                                                        data-comment-id="<?= $comment['id'] ?>">Reply</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="like-parent">
                                        <svg class="comment-setting-btn" width="4" height="14" viewBox="0 0 4 14"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 2.84375C2.36244 2.84375 2.65625 2.54994 2.65625 2.1875C2.65625 1.82506 2.36244 1.53125 2 1.53125C1.63756 1.53125 1.34375 1.82506 1.34375 2.1875C1.34375 2.54994 1.63756 2.84375 2 2.84375Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M2 7.65625C2.36244 7.65625 2.65625 7.36244 2.65625 7C2.65625 6.63756 2.36244 6.34375 2 6.34375C1.63756 6.34375 1.34375 6.63756 1.34375 7C1.34375 7.36244 1.63756 7.65625 2 7.65625Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M2 12.4688C2.36244 12.4688 2.65625 12.1749 2.65625 11.8125C2.65625 11.4501 2.36244 11.1562 2 11.1562C1.63756 11.1562 1.34375 11.4501 1.34375 11.8125C1.34375 12.1749 1.63756 12.4688 2 12.4688Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_432_1098" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                                x="0" y="2" width="27" height="24">
                                                <path
                                                    d="M8.4375 4.5C5.02031 4.5 2.25 7.27031 2.25 10.6875C2.25 16.875 9.5625 22.5 13.5 23.8084C17.4375 22.5 24.75 16.875 24.75 10.6875C24.75 7.27031 21.9797 4.5 18.5625 4.5C16.47 4.5 14.6194 5.53894 13.5 7.12913C12.9294 6.31643 12.1715 5.65318 11.2902 5.19553C10.409 4.73787 9.43048 4.4993 8.4375 4.5Z"
                                                    fill="white" stroke="white" stroke-width="4" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </mask>
                                            <g mask="url(#mask0_432_1098)">
                                                <path d="M0 0H27V27H0V0Z" fill="#B4B4B4" />
                                            </g>
                                        </svg>
                                        <span>
                                            0
                                        </span>
                                    </div>
                                </div>
                                <?php if (count($comment['replies']) >= 1) { ?>
                                    <div class="reply-bar user-bar-comment-for-setting">
                                        <div class="expand-reply-outer-parent" style="display: flex">
                                            <div class="expand-reply"
                                                onclick="expandReply(this, <?= count($comment['replies']) ?>)">
                                                <div class="reply-line"></div>
                                                <p>View replies (<span class="total-comment">
                                                        <?= count($comment['replies']) ?>
                                                    </span>)
                                                </p>
                                                <img src="<?= base_url("asset/icon/chevron-dark-grey.svg") ?>" alt="chevron"
                                                    width="17px" height="17px">
                                            </div>
                                        </div>
                                        <?php foreach ($comment['replies'] as $ind => $reply) {
                                            ?>
                                            <div class="user-reply-bar">
                                                <div class="report-comment" report-content-id="<?= $reply['id'] ?>"
                                                    report-type="Comment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M5.75 1C5.94891 1 6.13968 1.07902 6.28033 1.21967C6.42098 1.36032 6.5 1.55109 6.5 1.75V3.6L8.22 3.256C9.87075 2.92571 11.5819 3.08276 13.145 3.708L13.349 3.789C14.9099 4.41355 16.6279 4.53042 18.259 4.123C18.4359 4.07878 18.6205 4.07546 18.7989 4.11328C18.9773 4.15111 19.1447 4.22909 19.2884 4.34129C19.4322 4.4535 19.5484 4.59699 19.6284 4.76085C19.7084 4.92472 19.75 5.10466 19.75 5.287V12.654C19.75 13.298 19.311 13.86 18.686 14.016L18.472 14.069C16.7025 14.5115 14.8386 14.3852 13.145 13.708C11.5823 13.0829 9.87143 12.9259 8.221 13.256L6.5 13.6V21.75C6.5 21.9489 6.42098 22.1397 6.28033 22.2803C6.13968 22.421 5.94891 22.5 5.75 22.5C5.55109 22.5 5.36032 22.421 5.21967 22.2803C5.07902 22.1397 5 21.9489 5 21.75V1.75C5 1.55109 5.07902 1.36032 5.21967 1.21967C5.36032 1.07902 5.55109 1 5.75 1Z"
                                                            fill="#CD5252" />
                                                    </svg>
                                                    <p>Report</p>
                                                </div>
                                                <div class="user-user-info">
                                                    <img src="data:image/jpeg;base64,<?= $user_comment[$key]['replies_user'][$ind]['profile_picture'] ?> "
                                                        alt="user pp" class="user-pp-cmt">
                                                    <div class="title-comment-date">
                                                        <p class="user-name">
                                                            <?= $user_comment[$key]['replies_user'][$ind]['username'] ?>
                                                        </p>
                                                        <?php if ($reply['comment'] != null) { ?>
                                                            <p>
                                                                <?= $reply['comment'] ?>
                                                            </p>
                                                        <?php } else { ?>
                                                            <div class="audio-bar">
                                                                <img src="<?= base_url("asset/icon/play_blue.svg") ?>" alt="Play"
                                                                    id="control-audio" data-wavesurfer-index="0">
                                                                <div id="waveform" style="width: 100%"
                                                                    data-audio="data:audio/mpeg;base64,<?= $reply['voice_note'] ?>"
                                                                    type="audio/mp3">
                                                                    <div id="hover"></div>
                                                                </div>
                                                                <p class="duration-audio-parent" id="duration-audio">0:00</p>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="descrption-cmt">
                                                            <div class="desc-core">
                                                                <span data-date="<?= $reply['created_date'] ?>"
                                                                    class="date-span"></span>
                                                                <span class="reply-text-button">Reply</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="like-parent">                                                    
                                                    <svg width="4" height="14" viewBox="0 0 4 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" class="comment-setting-btn">
                                                        <path
                                                            d="M2 2.84375C2.36244 2.84375 2.65625 2.54994 2.65625 2.1875C2.65625 1.82506 2.36244 1.53125 2 1.53125C1.63756 1.53125 1.34375 1.82506 1.34375 2.1875C1.34375 2.54994 1.63756 2.84375 2 2.84375Z"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M2 7.65625C2.36244 7.65625 2.65625 7.36244 2.65625 7C2.65625 6.63756 2.36244 6.34375 2 6.34375C1.63756 6.34375 1.34375 6.63756 1.34375 7C1.34375 7.36244 1.63756 7.65625 2 7.65625Z"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M2 12.4688C2.36244 12.4688 2.65625 12.1749 2.65625 11.8125C2.65625 11.4501 2.36244 11.1562 2 11.1562C1.63756 11.1562 1.34375 11.4501 1.34375 11.8125C1.34375 12.1749 1.63756 12.4688 2 12.4688Z"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <mask id="mask0_432_1098" style="mask-type:luminance"
                                                            maskUnits="userSpaceOnUse" x="0" y="2" width="27" height="24">
                                                            <path
                                                                d="M8.4375 4.5C5.02031 4.5 2.25 7.27031 2.25 10.6875C2.25 16.875 9.5625 22.5 13.5 23.8084C17.4375 22.5 24.75 16.875 24.75 10.6875C24.75 7.27031 21.9797 4.5 18.5625 4.5C16.47 4.5 14.6194 5.53894 13.5 7.12913C12.9294 6.31643 12.1715 5.65318 11.2902 5.19553C10.409 4.73787 9.43048 4.4993 8.4375 4.5Z"
                                                                fill="white" stroke="white" stroke-width="4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </mask>
                                                        <g mask="url(#mask0_432_1098)">
                                                            <path d="M0 0H27V27H0V0Z" fill="#B4B4B4" />
                                                        </g>
                                                    </svg>
                                                    <span>
                                                        0
                                                    </span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php }
                                ; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="comment-input-parent">
                    <?php if ($user != null)  {?>
                    <div class="input-div">
                            <img id="emoji-icon" src="<?= base_url('asset/icon/emoji.svg?v=' . time()) ?>" alt="Mic Icon">
                            <div class="middle-2">
                                <input type="text" class="comment-text" placeholder="Add a comment">
                            </div>
                            <img id="right-comment-icon" src="<?= base_url('asset/icon/mic.svg?v=' . time()) ?>"
                            alt="Mic Icon" onclick="changeIconRecord(this)" style="cursor: pointer">
                        </div>
                        <?php } else {?>
                            <style>
                body {
                    overflow: hidden !important;
                }

                .thelogin {
                    border: none;
                    border-radius: 20px;
                    background-color: #5C64A2;
                    padding: 8px 55px;
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
                <button class="thelogin" onclick="window.location.assign('<?= site_url("Auth") ?>')">Login</button>

                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>

        const user_id = '<?= $user_id ?>';
        const content_id = '<?= $content['id'] ?>'

        const thumbnailCanvas = document.getElementById('thumbnail-canvas');
        const ctx = thumbnailCanvas.getContext('2d');
        const videoElement = document.querySelector('.video');
        const thumbnailImage = document.getElementById('thumbnail-image');
        const img = document.ggetElementsId = 'thumb'

        const commentInput = document.querySelector('.comment-text');

        var replyId = 0;
        var controlVoice = document.querySelectorAll('[id=control-audio]');
        var durationDisplay = document.querySelectorAll('[id=duration-audio]');

        const canvas = document.createElement('canvas')
        const ctx2 = canvas.getContext('2d')

        const voiceDiv = document.querySelectorAll('[id=waveform]');

        // Define the waveform gradient
        const gradient = ctx2.createLinearGradient(0, 0, 0, canvas.height * 1.35)
        gradient.addColorStop(0, '#656666') // Top color
        gradient.addColorStop((canvas.height * 0.7) / canvas.height, '#656666') // Top color
        gradient.addColorStop((canvas.height * 0.7 + 1) / canvas.height, '#ffffff') // White line
        gradient.addColorStop((canvas.height * 0.7 + 2) / canvas.height, '#ffffff') // White line
        gradient.addColorStop((canvas.height * 0.7 + 3) / canvas.height, '#B1B1B1') // Bottom color
        gradient.addColorStop(1, '#B1B1B1') // Bottom color

        // Define the progress gradient
        const progressGradient = ctx2.createLinearGradient(0, 0, 0, canvas.height * 1.35)
        progressGradient.addColorStop(0, '#0065E8') // Top color
        progressGradient.addColorStop((canvas.height * 0.7) / canvas.height, '#EB4926') // Top color
        progressGradient.addColorStop((canvas.height * 0.7 + 1) / canvas.height, '#ffffff') // White line
        progressGradient.addColorStop((canvas.height * 0.7 + 2) / canvas.height, '#ffffff') // White line
        progressGradient.addColorStop((canvas.height * 0.7 + 3) / canvas.height, '#F6B094') // Bottom color
        progressGradient.addColorStop(1, '#F6B094') // Bottom color

        // Hover effect
        let currentPlayingWaveSurfer = null;
        let currentIconIndex = null;
        let intervalId;
        var waveSurferArray = []

        function formatTime(timeInSeconds) {
            const minutes = Math.floor(timeInSeconds / 60);
            const seconds = Math.floor(timeInSeconds % 60);
            return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        voiceDiv.forEach((ws, waveIndex) => {
            const audioUrl = ws.dataset.audio;
            const wavesurfer = WaveSurfer.create({
                container: ws,
                waveColor: gradient,
                progressColor: progressGradient,
                barWidth: 2,
                barRadius: 4,
                height: 30,
                barGap: 2,
                responsive: true,
                hideScrollbar: true,
                url: audioUrl
            });

            waveSurferArray.push(wavesurfer);

            wavesurfer.on('audioprocess', () => {
                const currentTimeInSeconds = wavesurfer.getCurrentTime();
                ws.parentElement.querySelector('.duration-audio-parent').textContent = formatTime(currentTimeInSeconds);

                if (wavesurfer.getDuration() == currentTimeInSeconds) {
                    controlVoice[waveIndex].src = '<?= base_url("asset/icon/play_blue.svg") ?>';
                    wavesurfer.seekTo(0)
                    wavesurfer.stop()
                }
            });

            const hover = ws.querySelector('#hover');
            ws.addEventListener('pointermove', (e) => (hover.style.width = `${e.offsetX}px`));

            console.log(controlVoice);

            console.log('hayasdasdsad');
        });

        function audioControl() {
            controlVoice = document.querySelectorAll('[id=control-audio]');
            durationDisplay = document.querySelectorAll('[id=duration-audio]');

            console.log(controlVoice, durationDisplay);
            controlVoice.forEach((icon, waveIndex) => {
                console.log(icon);
                console.log('hay');
                icon.addEventListener('click', () => {
                    const waveSurferIndex = icon.dataset.wavesurferIndex;

                    if (currentPlayingWaveSurfer && currentPlayingWaveSurfer !== waveSurferArray[waveIndex]) {
                        currentPlayingWaveSurfer.seekTo(0);
                        currentPlayingWaveSurfer.stop();
                        controlVoice[currentIconIndex].src = '<?= base_url("asset/icon/play_blue.svg") ?>';
                    }

                    if (!waveSurferArray[waveIndex].isPlaying()) {
                        waveSurferArray[waveIndex].play();

                        intervalId = setInterval(() => {
                            const currentTimeInSeconds = waveSurferArray[waveIndex].getCurrentTime();
                            durationDisplay.textContent = formatTime(currentTimeInSeconds);
                        }, 1000);

                        icon.src = '<?= base_url("asset/icon/pause-blue.svg") ?>';

                        currentPlayingWaveSurfer = waveSurferArray[waveIndex]
                        currentIconIndex = waveIndex
                    } else {
                        waveSurferArray[waveIndex].pause();
                        clearInterval(intervalId);
                        currentPlayingWaveSurfer = null;
                        icon.src = '<?= base_url("asset/icon/play_blue.svg") ?>';
                    }

                });
            });
        }

        audioControl();
        videoElement.addEventListener('loadedmetadata', generateThumb);

        function generateThumb() {
            const contentContainer = document.querySelector('.content');

            if (videoElement.readyState !== 4) {
                setTimeout(generateThumb, 1);
                return;
            }

            thumbnailCanvas.width = contentContainer.clientWidth;
            thumbnailCanvas.height = contentContainer.clientHeight;

            ctx.drawImage(videoElement, 0, 0, thumbnailCanvas.width, thumbnailCanvas.height);
            // Mengatur thumbnail sebagai sumber gambar pada elemen img
            thumb.style.backgroundImage = `url(${thumbnailCanvas.toDataURL('image/jpeg')})`;
            thumb.style.filter = 'blur(10px) brightness(.85) contrast(.85)'; // Sesuaikan nilai blur sesuai kebutuhan
            thumb.style.objectFit = 'cover'
            thumb.style.scale = '1.2'
        }

        generateThumb()

        function changeIcon() {
            const theIcon = document.getElementById('right-comment-icon');

            if (commentInput.value) {
                theIcon.src = '<?= base_url("asset/icon/send.svg?v=" . time()) ?>';
                theIcon.onclick = () => {
                    createComment(user_id, content_id, commentInput.value);
                };
                theIcon.style.filter = 'invert(26%) sepia(89%) saturate(2896%) hue-rotate(203deg) brightness(91%) contrast(107%)';
            } else {
                theIcon.src = '<?= base_url("asset/icon/mic.svg?v=" . time()) ?>';
                theIcon.style.filter = 'unset';
                theIcon.onclick = () => {
                    changeIconRecord(theIcon)
                }
            }
        }

        commentInput.addEventListener('input', changeIcon);

        function createComment(user_id, content_id, comment) {
            var data = {
                user_id: user_id,
                content_id: content_id,
                comment: comment,
                replyId: replyId
            };

            console.log(data);

            $.ajax({
                url: '<?= site_url('UserMetrics/Comment') ?>',
                method: 'POST',
                dataType: "json",
                data: data,
                success: function (response) {
                    commentInput.value = ''
                    changeIcon();

                    console.log(response);

                    var newComment;

                    if (response.reply == null) {
                        newComment = document.createElement('div');
                        newComment.className = 'user-bar-parent';
                        newComment.innerHTML = `
                        <div class="user-bar">
                                    <div class="user-user-info">
                                        <img src="data:image/jpeg;base64,<?= $user['profile_picture'] ?>"
                                            alt="user pp" class="user-pp-cmt">
                                        <div class="title-comment-date">
                                            <p class="user-name"><?= $user['username'] ?>
                                            </p>
                                            <p>
                                                ${response.comment.comment}
                                            </p>
                                            <div class="descrption-cmt">
                                                <div class="desc-core">
                                                    <span data-date="${response.comment.created_date}"
                                                        class="date-span"></span>
                                                    <span class="reply-text-button"
                                                        data-comment-id="${response.comment.id}">Reply</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="like-parent">
                                        <svg width="4" height="14" viewBox="0 0 4 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 2.84375C2.36244 2.84375 2.65625 2.54994 2.65625 2.1875C2.65625 1.82506 2.36244 1.53125 2 1.53125C1.63756 1.53125 1.34375 1.82506 1.34375 2.1875C1.34375 2.54994 1.63756 2.84375 2 2.84375Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M2 7.65625C2.36244 7.65625 2.65625 7.36244 2.65625 7C2.65625 6.63756 2.36244 6.34375 2 6.34375C1.63756 6.34375 1.34375 6.63756 1.34375 7C1.34375 7.36244 1.63756 7.65625 2 7.65625Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M2 12.4688C2.36244 12.4688 2.65625 12.1749 2.65625 11.8125C2.65625 11.4501 2.36244 11.1562 2 11.1562C1.63756 11.1562 1.34375 11.4501 1.34375 11.8125C1.34375 12.1749 1.63756 12.4688 2 12.4688Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_432_1098" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                                x="0" y="2" width="27" height="24">
                                                <path
                                                    d="M8.4375 4.5C5.02031 4.5 2.25 7.27031 2.25 10.6875C2.25 16.875 9.5625 22.5 13.5 23.8084C17.4375 22.5 24.75 16.875 24.75 10.6875C24.75 7.27031 21.9797 4.5 18.5625 4.5C16.47 4.5 14.6194 5.53894 13.5 7.12913C12.9294 6.31643 12.1715 5.65318 11.2902 5.19553C10.409 4.73787 9.43048 4.4993 8.4375 4.5Z"
                                                    fill="white" stroke="white" stroke-width="4" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </mask>
                                            <g mask="url(#mask0_432_1098)">
                                                <path d="M0 0H27V27H0V0Z" fill="#B4B4B4" />
                                            </g>
                                        </svg>
                                        <span>
                                        ${response.comment.likes}
                                        </span>
                                    </div>
                                    </div>`


                        let firstChild = document.querySelector('.comment-bar').firstElementChild;

                        document.querySelector('.comment-bar').insertBefore(newComment, firstChild);
                    } else {
                        const paragraphs = document.querySelectorAll('.reply-text-button');
                        console.log(paragraphs);
                        const commentId = Array.from(paragraphs, paragraph => paragraph.getAttribute('data-comment-id'));

                        newComment = document.createElement('div');
                        if (paragraphs[commentId.indexOf(response.reply)].closest('.user-bar-parent').querySelector('.reply-bar') != null) {
                            newComment.className = 'user-reply-bar';
                            newComment.innerHTML = `<div class="user-user-info">
                                                    <img src="data:image/jpeg;base64,<?= $user['profile_picture'] ?> "
                                                        alt="user pp" class="user-pp-cmt">
                                                    <div class="title-comment-date">
                                                        <p class="user-name">
                                                            <?= $user['username'] ?>
                                                        </p>
                                                        <p>
                                                        ${response.comment.comment}
                                                        </p>
                                                        <div class="descrption-cmt">
                                                            <div class="desc-core">
                                                                <span data-date="${response.comment.created_date}"
                                                                    class="date-span"></span>
                                                                <span class="reply-text-button" data-comment-id="${response.reply}">Reply</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="like-parent">
                                                    <svg width="4" height="14" viewBox="0 0 4 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2 2.84375C2.36244 2.84375 2.65625 2.54994 2.65625 2.1875C2.65625 1.82506 2.36244 1.53125 2 1.53125C1.63756 1.53125 1.34375 1.82506 1.34375 2.1875C1.34375 2.54994 1.63756 2.84375 2 2.84375Z"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M2 7.65625C2.36244 7.65625 2.65625 7.36244 2.65625 7C2.65625 6.63756 2.36244 6.34375 2 6.34375C1.63756 6.34375 1.34375 6.63756 1.34375 7C1.34375 7.36244 1.63756 7.65625 2 7.65625Z"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M2 12.4688C2.36244 12.4688 2.65625 12.1749 2.65625 11.8125C2.65625 11.4501 2.36244 11.1562 2 11.1562C1.63756 11.1562 1.34375 11.4501 1.34375 11.8125C1.34375 12.1749 1.63756 12.4688 2 12.4688Z"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <mask id="mask0_432_1098" style="mask-type:luminance"
                                                            maskUnits="userSpaceOnUse" x="0" y="2" width="27" height="24">
                                                            <path
                                                                d="M8.4375 4.5C5.02031 4.5 2.25 7.27031 2.25 10.6875C2.25 16.875 9.5625 22.5 13.5 23.8084C17.4375 22.5 24.75 16.875 24.75 10.6875C24.75 7.27031 21.9797 4.5 18.5625 4.5C16.47 4.5 14.6194 5.53894 13.5 7.12913C12.9294 6.31643 12.1715 5.65318 11.2902 5.19553C10.409 4.73787 9.43048 4.4993 8.4375 4.5Z"
                                                                fill="white" stroke="white" stroke-width="4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </mask>
                                                        <g mask="url(#mask0_432_1098)">
                                                            <path d="M0 0H27V27H0V0Z" fill="#B4B4B4" />
                                                        </g>
                                                    </svg>
                                                    <span>
                                                        0
                                                    </span>
                                                </div>`

                            paragraphs[commentId.indexOf(response.reply)].closest('.user-bar-parent').querySelector('.reply-bar').appendChild(newComment);

                            let totalComment = paragraphs[commentId.indexOf(response.reply)].closest('.user-bar-parent').querySelector('.total-comment').textContent
                            paragraphs[commentId.indexOf(response.reply)].closest('.user-bar-parent').querySelector('.total-comment').textContent = parseInt(totalComment) + 1;
                        } else {
                            newComment.className = 'reply-bar';
                            newComment.innerHTML = `
                            <div class="expand-reply">
                                            <div class="reply-line"></div>
                                            <p>View replies (<span class="total-comment">1</span>)
                                            </p>
                                            <img src="<?= base_url("asset/icon/chevron-dark-grey.svg") ?>" alt="chevron"
                                                width="17px" height="17px">
                                        </div>
                            <div class="user-reply-bar">
                                                        <div class="user-user-info">
                                                        <img src="data:image/jpeg;base64,<?= $user['profile_picture'] ?> "
                                                            alt="user pp" class="user-pp-cmt">
                                                        <div class="title-comment-date">
                                                            <p class="user-name">
                                                                <?= $user['username'] ?>
                                                            </p>
                                                            <p>
                                                            ${response.comment.comment}
                                                            </p>
                                                            <div class="descrption-cmt">
                                                                <div class="desc-core">
                                                                    <span data-date="${response.comment.created_date}"
                                                                        class="date-span"></span>
                                                                    <span class="reply-text-button" data-comment-id="${response.reply}">Reply</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="like-parent">
                                                        <svg width="4" height="14" viewBox="0 0 4 14" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2 2.84375C2.36244 2.84375 2.65625 2.54994 2.65625 2.1875C2.65625 1.82506 2.36244 1.53125 2 1.53125C1.63756 1.53125 1.34375 1.82506 1.34375 2.1875C1.34375 2.54994 1.63756 2.84375 2 2.84375Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M2 7.65625C2.36244 7.65625 2.65625 7.36244 2.65625 7C2.65625 6.63756 2.36244 6.34375 2 6.34375C1.63756 6.34375 1.34375 6.63756 1.34375 7C1.34375 7.36244 1.63756 7.65625 2 7.65625Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M2 12.4688C2.36244 12.4688 2.65625 12.1749 2.65625 11.8125C2.65625 11.4501 2.36244 11.1562 2 11.1562C1.63756 11.1562 1.34375 11.4501 1.34375 11.8125C1.34375 12.1749 1.63756 12.4688 2 12.4688Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <mask id="mask0_432_1098" style="mask-type:luminance"
                                                                maskUnits="userSpaceOnUse" x="0" y="2" width="27" height="24">
                                                                <path
                                                                    d="M8.4375 4.5C5.02031 4.5 2.25 7.27031 2.25 10.6875C2.25 16.875 9.5625 22.5 13.5 23.8084C17.4375 22.5 24.75 16.875 24.75 10.6875C24.75 7.27031 21.9797 4.5 18.5625 4.5C16.47 4.5 14.6194 5.53894 13.5 7.12913C12.9294 6.31643 12.1715 5.65318 11.2902 5.19553C10.409 4.73787 9.43048 4.4993 8.4375 4.5Z"
                                                                    fill="white" stroke="white" stroke-width="4" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </mask>
                                                            <g mask="url(#mask0_432_1098)">
                                                                <path d="M0 0H27V27H0V0Z" fill="#B4B4B4" />
                                                            </g>
                                                        </svg>
                                                        <span>
                                                            0
                                                        </span>
                                                    </div>
                                                    </div>`

                            paragraphs[commentId.indexOf(response.reply)].closest('.user-bar-parent').appendChild(newComment);

                        }
                    }

                    let thisDate = newComment.querySelector('.date-span').getAttribute('data-date');
                    console.log(thisDate);
                    console.log(newComment.querySelector('.date-span'));
                    newComment.querySelector('.date-span').innerHTML = formatTimeAgo(thisDate);

                    reply();

                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", xhr.responseText);
                    console.error("Status:", status);
                    console.error("Error:", error);
                }
            });
        }

        // ============================ Reply ==============================
        reply()
        function reply() {
            const replySpan = document.querySelectorAll('.reply-text-button');

            replySpan.forEach(elm => {
                elm.onclick = () => {
                    const closestUserInfo = elm.closest(".user-user-info");
                    const userName = closestUserInfo.querySelector(".user-name");

                    commentInput.focus();
                    commentInput.value = `@${userName.textContent.trim()} `;
                    changeIcon();

                    replyId = elm.getAttribute('data-comment-id');
                    console.log(replyId);
                }
            });
        }

        function expandReply(theBar, totalComment) {
            var userReplyComment = theBar.closest('.reply-bar').querySelectorAll('.user-reply-bar');

            if (theBar.getElementsByTagName('img')[0].style.rotate !== '180deg') {
                theBar.getElementsByTagName('img')[0].style.rotate = '180deg';
                theBar.getElementsByTagName('p')[0].innerHTML = `Hide replies (${totalComment})`
                userReplyComment.forEach(comment => comment.style.display = 'none');
            } else {
                theBar.getElementsByTagName('img')[0].style.rotate = '0deg';
                theBar.getElementsByTagName('p')[0].innerHTML = `View replies (${totalComment})`
                userReplyComment.forEach(comment => comment.style.display = 'flex');
            }
        }


        // ============================ Voice Note ==============================

        var elapsedTimeSpan = document.getElementById('elapsedTime');
        var recordActive = false
        var startTime;
        var intervalId2;
        var inputDiv = document.querySelector(".input-div");


        var middleRecordingDiv = document.createElement('div');
        middleRecordingDiv.className = 'comment-voice-record-middle';
        middleRecordingDiv.innerHTML = `<div><img src="<?= base_url("asset/icon/chevron-dark-gray.svg") ?>"><p>Click this to cancel</p></div><div id="record-time-div"><p><span id="elapsedTime">0:00</span> / 1:00</p></div></div>`

        var middle2 = document.createElement('div');
        middle2.className = "middle-2"
        middle2.innerHTML = inputDiv.children[1]

        function changeIconRecord(elm) {
            inputDiv = document.querySelector(".input-div");
            console.log("apsdnasdasjd");
            if (recordActive == false) {
                elm.setAttribute("src", "<?= base_url('asset/icon/record-active.svg?v=' . time()) ?>");
                elm.setAttribute("id", "stopButton");
                inputDiv.children[0].setAttribute("src", "<?= base_url('asset/icon/cancel-record.svg?v=' . time()) ?>")

                middle2 = inputDiv.children[1];
                inputDiv.replaceChild(middleRecordingDiv, inputDiv.children[1]);

                elapsedTimeSpan = document.getElementById('elapsedTime');
                startTime = Date.now();
                intervalId2 = setInterval(updateElapsedTime, 1000);
                console.log("VN")
                voiceNote();
                recordActive = true;
            } else {
                elm.src = "<?= base_url('asset/icon/mic.svg?v=' . time()) ?>"
                inputDiv.children[0].setAttribute("src", "<?= base_url('asset/icon/emoji.svg?v=' . time()) ?>")
                console.log("No")

                inputDiv.replaceChild(middle2, inputDiv.children[1]);
                recordActive = false;
            }
        }

        function voiceNote() {
            const recordButton = document.getElementById('recordButton');
            const stopButton = document.getElementById('stopButton');
            const audioPlayer = document.getElementById('audioPlayer');
            const cancelText = document.getElementById('cancelText');

            let mediaRecorder;
            let chunks = [];


            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(function (stream) {
                    mediaRecorder = new MediaRecorder(stream);

                    mediaRecorder.ondataavailable = function (e) {
                        if (e.data.size > 0) {
                            chunks.push(e.data);
                        }
                    };

                    mediaRecorder.onstop = function () {
                        const blob = new Blob(chunks, { type: 'audio/wav' });
                        chunks = [];

                        const audioURL = URL.createObjectURL(blob);
                        var voiceBar = document.createElement('div');
                        voiceBar.className = 'user-bar-parent';
                        voiceBar.innerHTML = `<div class="user-bar">
                            <div class="user-user-info">
                                <img src="data:image/jpeg;base64,<?= $user['profile_picture'] ?>" alt="user pp" class="user-pp-cmt">
                                <div class="title-comment-date">
                                    <p class="user-name"><?= $user['username'] ?></p>
                                    <div class="audio-bar">
                                        <img src="<?= base_url("asset/icon/play_blue.svg") ?>" alt="Play"
                                            id="control-audio" data-wavesurfer-index="">
                                        <div id="waveform" style="width: 100%">
                                            <div id="hover"></div>
                                        </div>
                                        <p class="duration-audio-parent" id="duration-audio">0:00</p>
                                    </div>
                                    <div class="descrption-cmt">
                                        <div class="desc-core">
                                            <span>1h ago</span>
                                            <span class="reply-text-button">Reply</span>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="like-parent">
                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 2.84375C2.36244 2.84375 2.65625 2.54994 2.65625 2.1875C2.65625 1.82506 2.36244 1.53125 2 1.53125C1.63756 1.53125 1.34375 1.82506 1.34375 2.1875C1.34375 2.54994 1.63756 2.84375 2 2.84375Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M2 7.65625C2.36244 7.65625 2.65625 7.36244 2.65625 7C2.65625 6.63756 2.36244 6.34375 2 6.34375C1.63756 6.34375 1.34375 6.63756 1.34375 7C1.34375 7.36244 1.63756 7.65625 2 7.65625Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M2 12.4688C2.36244 12.4688 2.65625 12.1749 2.65625 11.8125C2.65625 11.4501 2.36244 11.1562 2 11.1562C1.63756 11.1562 1.34375 11.4501 1.34375 11.8125C1.34375 12.1749 1.63756 12.4688 2 12.4688Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_432_1098" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                        x="0" y="2" width="27" height="24">
                                        <path
                                            d="M8.4375 4.5C5.02031 4.5 2.25 7.27031 2.25 10.6875C2.25 16.875 9.5625 22.5 13.5 23.8084C17.4375 22.5 24.75 16.875 24.75 10.6875C24.75 7.27031 21.9797 4.5 18.5625 4.5C16.47 4.5 14.6194 5.53894 13.5 7.12913C12.9294 6.31643 12.1715 5.65318 11.2902 5.19553C10.409 4.73787 9.43048 4.4993 8.4375 4.5Z"
                                            fill="white" stroke="white" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </mask>
                                    <g mask="url(#mask0_432_1098)">
                                        <path d="M0 0H27V27H0V0Z" fill="#B4B4B4" />
                                    </g>
                                </svg>
                                <span>41</span>
                                </div>
                            </div>`

                        let firstChild = document.querySelector(".comment-bar").firstElementChild;
                        document.querySelector(".comment-bar").insertBefore(voiceBar, firstChild);
                        console.log(voiceBar, firstChild);

                        let ws = document.getElementById('waveform')
                        const wavesurfer = WaveSurfer.create({
                            container: ws,
                            waveColor: gradient,
                            progressColor: progressGradient,
                            barWidth: 2,
                            barRadius: 4,
                            height: 30,
                            barGap: 2,
                            responsive: true,
                            hideScrollbar: true,
                            url: audioURL
                        });

                        waveSurferArray.unshift(wavesurfer);

                        wavesurfer.on('audioprocess', () => {
                            const currentTimeInSeconds = wavesurfer.getCurrentTime();
                            ws.parentElement.querySelector('.duration-audio-parent').textContent = formatTime(currentTimeInSeconds);

                            if (wavesurfer.getDuration() == currentTimeInSeconds) {
                                controlVoice[0].src = '<?= base_url("asset/icon/play_blue.svg") ?>';
                                wavesurfer.seekTo(0)
                                wavesurfer.stop()
                            }
                        });

                        const hover = ws.querySelector('#hover');
                        ws.addEventListener('pointermove', (e) => (hover.style.width = `${e.offsetX}px`));
                        audioControl()
                        // Kirim rekaman ke server PHP (gunakan fungsi Ajax atau formulir biasa)
                        console.log(blob)
                        sendVoiceToServer(blob, content_id);
                    };

                    mediaRecorder.start();

                    stopButton.addEventListener('click', function () {
                        mediaRecorder.stop();

                        clearInterval(intervalId2);

                        intervalId2 = setInterval(updateElapsedTime, 1000);

                        elapsedTimeSpan.innerText = `0:00`
                    });
                })
                .catch(function (err) {
                    console.error('Error accessing microphone:', err);
                });
        }

        function updateElapsedTime() {
            const currentTime = Math.floor((Date.now() - startTime) / 1000); // Dalam detik
            const minutes = Math.floor(currentTime / 60);
            const seconds = currentTime % 60;

            elapsedTimeSpan.innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        function sendVoiceToServer(blob, content_id, replyId) {
            var formData = new FormData();
            formData.append('audio', blob, 'audio.wav');
            console.log(blob)
            var data = {
                user_id: user_id,
                content_id: content_id,
                replyId: replyId
            };

            for (var key in data) {
                formData.append(key, data[key]);
            }

            $.ajax({
                type: "POST",
                url: "<?= site_url("UserMetrics/Comment") ?>",
                data: formData,
                processData: false, // Prevent jQuery from automatically transforming the data
                contentType: false, // Set content type to false as FormData will handle it
                success: function (response) {
                    console.log(response);
                },
                error: function (error) {
                    console.log("Error: " + JSON.stringify(error));
                }
            });
        }

        function report(reportedId, type, reason) {
            console.log(user_id);
            var data = {
                reported_id: reportedId,
                reporting_user: user_id,
                reason: reason,
                type: type
            };

            $.ajax({
                type: "POST",
                url: "<?= site_url("UserMetrics/Report") ?>",
                data: data,
                success: function (response) {
                    console.log(response)
                    if (response.done == 'avaible') {
                        document.querySelector(".report-success").style.display = "flex";
                        document.querySelector(".report-core-core").style.display = "none";
                    }
                },
                error: function (error) {
                    console.log("Error: " + JSON.stringify(error));
                }
            });
        }

        $(document).ready(function () {
            $(".comment-setting-btn").click(function () {
                var userBarParent = $(this).closest(".user-bar-comment-for-setting");
                var reportComment = userBarParent.find(".report-comment");


                $(".report-comment").not(reportComment).css("display", "none");

                userBarParent.find(".report-comment").css("display", "flex");
            });

            $(document).click(function (event) {
                if (!$(event.target).closest(".comment-setting-btn, .report-comment").length) {
                    $(".report-comment").css("display", "none");
                }
            });

            $(".report").click(function () {
                var reportContent = $(this).attr("report-content-id");
                var reportType = $(this).attr("report-type");

                $("#report-popup").attr("report-content-id", reportContent);
                $("#report-popup").attr("report-type", reportType);
                $("#report-popup").toggleClass("flex-display");

                videoElement.pause();
            });

            $("#close-report").click(function () {
                $("#report-popup").removeClass("flex-display");
                videoElement.play();
            });

            $(".report-comment").click(function () {
                var reportContent = $(this).attr("report-content-id");
                var reportType = $(this).attr("report-type");

                $("#report-popup").attr("report-content-id", reportContent);
                $("#report-popup").attr("report-type", reportType);
                $("#report-popup").toggleClass("flex-display");
                videoElement.pause();
            });

            $(".reason-row-core").click(function () {
                $(".other-core").css("display", function (i, value) {
                    return value === "none" ? "flex" : "none";
                });

                if ($(".other-core").css("display") === "none") {
                    $(".chevron-other").css("rotate", "90deg");
                } else {
                    $(".chevron-other").css("rotate", "270deg");
                }
            });

            $(".report-close").click(function () {
                $("#report-popup").removeClass("flex-display");
                $(".report-success").css("display", "none");
                $(".report-core-core").css("display", "flex");
            })
        });

        var reason = document.querySelectorAll('.done-report');
        reason.forEach(element => {
            element.onclick = () => {
                const reportElm = document.getElementById('report-popup');
                const reported_id = reportElm.getAttribute('report-content-id');
                const type = reportElm.getAttribute('report-type');

                console.log(type);
                if (element.closest('.other-core') != null) {
                    const reason = element.closest(".other-core").querySelector(".reason-other-input");
                    report(reported_id, type, reason.value);
                } else {
                    const reason = element.getElementsByTagName('p')[0]
                    report(reported_id, type, reason.innerText);
                }
            }
        });

    </script>
    <script src="<?= site_url("asset/js/date-format.js?v=") . time() ?>"></script>

</html>
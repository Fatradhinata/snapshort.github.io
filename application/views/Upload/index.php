<?php if ($user != null) { ?>
    <div class="parent-content">
        <h4>Create New Content</h4>
        <div class="upload-outer-div">
            <div class="dotted-border-upload">
                <div class="core-upload">
                    <h3>Drag Video Here</h3>
                    <input type="file" id="file-input" accept=".mp4, .MP4" style="display: none" name="file-input"
                        onchange="generateThumb()">
                    <button id="upload-btn" name="upload-btn">Select From Computer</button>
                    <?php if (!empty($upload_error)): ?>
                        <small>
                            <?= $upload_error ?>
                        </small>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="parent-content-two">
        <h4 style="font-weight: 600">Upload Content</h4>
        <form action="Upload/setVideoDesc" method="POST" enctype="multipart/form-data">
            <div class="upload-outer-div">
                <div class="content-parent">
                    <div class="video-parent">
                        <input type="file" id="file-input-core" name="file-input-core" accept=".mp4, .MP4"
                            style="display: none;">
                        <video height="auto" width="250vw" id="video-content-core" name="video-core"></video>
                        <canvas id="thumbnail-canvas" style="display: none"></canvas>
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
                                </span>
                            </button>
                        </div>
                        <div class="info-video">
                            <div class="user-profile-name">
                                <p class="mb-1" style="font-weight: 500">
                                    <?= $user['name'] ?>
                                </p>
                            </div>
                            <div class="caption-content">
                                <p class="capt" style="font-weight: 400"></p>
                            </div>
                        </div>
                    </div>
                    <div class="file-name-parent">
                        <span class="file-name"></span>
                        <button class="change-video-btn" id="change-video-btn">
                            Change video
                        </button>
                    </div>
                </div>
                <div class="video-detail-set">
                    <div class="input-parent">
                        <div class="input-group">
                            <span>Caption</span>
                            <input type="text" name="caption" maxlength="1000" id="caption-inp">
                        </div>
                        <div class="input-group">
                            <span>Category</span>
                            <select name="category-select[]" id="cat-select" multiple="multiple" class="cat-slct">

                            </select>
                        </div>
                        <div class="input-group">
                            <span>Caption</span>
                            <select name="privacy" id="privacy-vid">
                                <option value="Anyone">Anyone</option>
                                <option value="Me">Only Me</option>
                                <option value="Not Public">Anyone with the link</option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-sub-parent">
                        <button class="discard-btn">Discard</button>
                        <button class="post-btn" type="submit">Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        const uploadButton = document.getElementById('upload-btn');
        const fileInput = document.getElementById('file-input');
        const formVideo = document.getElementById('video-form');
        const changeVid = document.getElementById('change-video-btn');

        changeVid.onclick = () => {
            fileInput.click();
        }

        uploadButton.onclick = () => {
            fileInput.click();
        }

        fileInput.onclick = () => {
            const files = fileInput.files[0];
        }

        function generateThumb() {
            const selectOnly = document.querySelector('.parent-content');
            const setUpVideo = document.querySelector('.parent-content-two');
            const videoElement = document.getElementById('video-content-core');
            const videoInput = document.getElementById('file-input')
            const videoInputTwo = document.getElementById('file-input-core')
            const thumbnailCanvas = document.getElementById('thumbnail-canvas');
            const ctx = thumbnailCanvas.getContext('2d');

            var category = ['Indonesia', 'Nature', 'Education', 'Comedy', 'Travel', 'Relaxing', 'Space', 'Fashion', 'Culinary', 'Sports', 'Technology', 'Tutorials', 'Arts and Craft', 'Gaming', 'Movies', 'Sports', 'Musical', 'Adventure', 'Horror']
            var categoryRow = document.querySelector('.cat-slct');
            var fileName = document.querySelector('.file-name');
            var video = document.querySelector('.video-content-core');

            category.forEach(element => {
                let opt = document.createElement('option');
                opt.classList.add('category-opt');
                opt.innerHTML = element;

                categoryRow.appendChild(opt);
            });

            var captInp = document.getElementById('caption-inp');
            captInp.onkeyup = () => {
                document.querySelector('.capt').innerHTML = captInp.value;
            }

            if (videoInput.files && videoInput.files[0]) {
                const videoFiles = videoInput.files[0];
                const videoURL = URL.createObjectURL(videoFiles);



                videoElement.src = videoURL;

                videoElement.onloadeddata = function () {
                    thumbnailCanvas.width = videoElement.videoWidth;
                    thumbnailCanvas.height = videoElement.videoHeight;
                    ctx.drawImage(videoElement, 0, 0, thumbnailCanvas.width, thumbnailCanvas.height);
                    const thumbnailDataURL = thumbnailCanvas.toDataURL('image/jpeg');

                    selectOnly.style.display = "none";
                    setUpVideo.style.display = "flex";
                };


                const url = new URL(videoURL);
                var fileName_ = videoInput.files[0].name
                console.log(videoInput.files[0].name);
                fileName.innerHTML = fileName_;

                fileName_ = fileName_.replace('.mp4', '');
                captInp.value = fileName_
            }

            videoInputTwo.files = videoInput.files;
            console.log(videoInputTwo.files[0]);
            console.log(videoInput.value);
        }
    </script>
<?php } else { ?>
    <style>
        body {
            overflow: hidden !important;
        }

        .container-follower {
            display: flex;
            margin-top: 0px !important;
            width: 100vw;
            height: 100vh;
            justify-content: center;
            margin-left: 100px;
        }

        .text-parent {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
<?php } ?>
<div class="parent-content">
    <h4>Explore</h4>
    <div class="category">
        <div class="row">
        </div>
    </div>
    <div class="video-random">
        <?php foreach ($contents as $index => $content) { ?>
            <div class="video-parent">
                <div class="thumbnail-video" style="cursor: pointer;">
                    <video src="<?= base_url('asset/video/' . $content['user_id'] . '/' . $content['video'] . '.mp4') ?>"
                        id="thumbnail"
                        onclick="window.location.assign('<?= base_url() ?>Fullscreen/index/<?= $content['user_id'] . '/' . $content['id'] ?>')"></video>
                    <div class="view-count">
                        <svg width="15" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 8.91691V14.4325C1 16.2612 3.00608 17.4162 4.63929 16.5288L7.175 15.1497M1 5.75024V3.40137C1 1.57262 3.00608 0.417577 4.63929 1.30504L14.7821 6.82137C15.1624 7.02357 15.4804 7.32542 15.7022 7.69457C15.924 8.06372 16.0412 8.48625 16.0412 8.91691C16.0412 9.34757 15.924 9.7701 15.7022 10.1393C15.4804 10.5084 15.1624 10.8103 14.7821 11.0125L9.71071 13.7706"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span>
                            <?= $content['view'] ?>
                        </span>
                    </div>
                </div>
                <div class="video-description">
                    <p>
                        <?= $content['caption'] ?>
                    </p>
                </div>
                <div class="profile-reaction">
                    <div class="profile" onclick="window.location.assign('<?= site_url("Profile/anotherUser/" . $user_content[$index]['user_id']) ?>')">
                        <img src="data:image/jpeg;base64, <?= $user_content[$index]['profile_picture'] ?>" alt="">
                        <p>
                            <?= $user_content[$index]['username'] ?>
                        </p>
                    </div>
                    <div class="reaction">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.2027 12.1988L15.7314 9.13876C15.7624 8.95941 15.7539 8.77544 15.7064 8.59973C15.6589 8.42402 15.5736 8.26081 15.4565 8.12151C15.3393 7.98221 15.1931 7.87019 15.0282 7.79328C14.8632 7.71637 14.6834 7.67643 14.5014 7.67626H10.6157C10.525 7.67628 10.4354 7.65655 10.3531 7.61846C10.2708 7.58036 10.1978 7.52481 10.1391 7.45565C10.0804 7.3865 10.0375 7.3054 10.0134 7.218C9.98919 7.13059 9.98435 7.03897 9.99915 6.94951L10.4964 3.91576C10.5771 3.42318 10.5541 2.91919 10.4289 2.43601C10.3753 2.23636 10.2722 2.05349 10.129 1.9044C9.98578 1.75532 9.80723 1.64484 9.6099 1.58326L9.50115 1.54801C9.25528 1.46902 8.98848 1.48728 8.75565 1.59901C8.50065 1.72201 8.31465 1.94626 8.24565 2.21251L7.88865 3.58801C7.775 4.02573 7.60985 4.44843 7.39665 4.84726C7.0854 5.43001 6.6039 5.89726 6.1029 6.32851L5.02365 7.25851C4.87393 7.38789 4.75699 7.55091 4.68242 7.7342C4.60785 7.91749 4.57778 8.11585 4.59465 8.31301L5.20365 15.3578C5.23049 15.6693 5.37318 15.9595 5.60354 16.171C5.8339 16.3824 6.13519 16.4998 6.4479 16.5H9.9339C12.5454 16.5 14.7737 14.6805 15.2027 12.1988Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.22606 7.1137C2.371 7.10736 2.51279 7.15727 2.6218 7.25301C2.73082 7.34874 2.79862 7.4829 2.81106 7.62745L3.53856 16.0544C3.55088 16.1799 3.5375 16.3066 3.49922 16.4268C3.46094 16.5469 3.39857 16.658 3.31592 16.7532C3.23327 16.8485 3.13207 16.9258 3.01851 16.9806C2.90495 17.0355 2.78141 17.0665 2.65543 17.072C2.52946 17.0775 2.40369 17.0572 2.28581 17.0124C2.16794 16.9676 2.06042 16.8993 1.96984 16.8116C1.87926 16.7239 1.80751 16.6186 1.75898 16.5022C1.71044 16.3858 1.68614 16.2608 1.68756 16.1347V7.67545C1.68762 7.53046 1.74366 7.39109 1.844 7.28643C1.94433 7.18176 2.0812 7.11988 2.22606 7.1137Z"
                                fill="white" />
                        </svg>
                        <span>
                            <?= $content['likes'] ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    var category = ['Indonesian', 'Nature', 'Education', 'Comedy', 'Travel', 'Relaxing', 'Space', 'Fashion', 'Culinary', 'Sports', 'Technology', 'Tutorials', 'Arts and Craft', 'Gaming', 'Movies', 'Sports', 'Musical', 'Adventure', 'Horror']

    var categoryRow = document.querySelector('.row')
    const vParent = document.querySelectorAll('.thumbnail-video')

    category.forEach(element => {
        let btn = document.createElement('button');
        btn.classList.add('category-btn');
        btn.innerHTML = element;

        categoryRow.appendChild(btn);
    });

    vParent.forEach(element => {
        element.onmouseenter = () => {
            element.getElementsByTagName('video')[0].muted = true;
            element.getElementsByTagName('video')[0].play();
        }

        element.onmouseleave = () => {
            element.getElementsByTagName('video')[0].currentTime = 0;
            element.getElementsByTagName('video')[0].pause();
        }
    });

    const catBtn = document.querySelectorAll('.category-btn');
    var dataCat = [];
    catBtn.forEach(btn => {
        btn.onclick = () => {
            if (btn.className.includes('cat-active')) {
                btn.classList.remove('cat-active');
                var index = dataCat.indexOf(btn.textContent);
                if (index !== -1) {
                    dataCat.splice(index, 1);
                }
            } else if (!btn.className.includes('cat-active') && dataCat.length < 10) {
                btn.classList.add('cat-active');
                dataCat.push(btn.textContent)
            }
            categorySelect(dataCat)
        }
    });

    function categorySelect(dataArray) {
        console.log(dataArray);
        $.ajax({
            url: '<?= base_url('UserMetrics/Category') ?>',
            method: 'POST',
            dataType: 'json',
            data: { data: dataArray },
            success: function (response) {
                if (response.default == true) {
                    window.location.reload();
                } else {
                    console.log(response.data.contents);
                    if (response.data.contents != null) {
                        displayVideos(response.data.contents, response.data.user_content)
                    } else {
                        var videoContainer = $('.video-random');
                        videoContainer.empty();
                        console.log("sadasdsad");
                        let emptyWarning = "<h3>Content not available</h3>"
                        videoContainer.append(emptyWarning);
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText, status, error);
            }
        });
    }

    function displayVideos(contents, user_content) {
        var videoContainer = $('.video-random');

        videoContainer.empty();

        contents.forEach((content, index) => {
            var eachContent = `
            <div class="video-parent">
                <div class="thumbnail-video" style="cursor: pointer;">
                    <video src="<?= base_url('asset/video/') ?>${content['user_id']}/${content['video']}.mp4"
                        id="thumbnail"
                        onclick="window.location.assign('<?= base_url() ?>Fullscreen/index/${content['user_id']}/${content['id']}')"></video>
                    <div class="view-count">
                        <svg width="15" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 8.91691V14.4325C1 16.2612 3.00608 17.4162 4.63929 16.5288L7.175 15.1497M1 5.75024V3.40137C1 1.57262 3.00608 0.417577 4.63929 1.30504L14.7821 6.82137C15.1624 7.02357 15.4804 7.32542 15.7022 7.69457C15.924 8.06372 16.0412 8.48625 16.0412 8.91691C16.0412 9.34757 15.924 9.7701 15.7022 10.1393C15.4804 10.5084 15.1624 10.8103 14.7821 11.0125L9.71071 13.7706"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span>
                            ${content['view']}
                        </span>
                    </div>
                </div>
                <div class="video-description">
                    <p>
                        ${content['caption']}
                    </p>
                </div>
                <div class="profile-reaction">
                    <div class="profile">
                        <img src="data:image/jpeg;base64,${user_content[index]['profile_picture']}" alt="">
                        <p>
                            ${user_content[index]['username']}
                        </p>
                    </div>
                    <div class="reaction">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.2027 12.1988L15.7314 9.13876C15.7624 8.95941 15.7539 8.77544 15.7064 8.59973C15.6589 8.42402 15.5736 8.26081 15.4565 8.12151C15.3393 7.98221 15.1931 7.87019 15.0282 7.79328C14.8632 7.71637 14.6834 7.67643 14.5014 7.67626H10.6157C10.525 7.67628 10.4354 7.65655 10.3531 7.61846C10.2708 7.58036 10.1978 7.52481 10.1391 7.45565C10.0804 7.3865 10.0375 7.3054 10.0134 7.218C9.98919 7.13059 9.98435 7.03897 9.99915 6.94951L10.4964 3.91576C10.5771 3.42318 10.5541 2.91919 10.4289 2.43601C10.3753 2.23636 10.2722 2.05349 10.129 1.9044C9.98578 1.75532 9.80723 1.64484 9.6099 1.58326L9.50115 1.54801C9.25528 1.46902 8.98848 1.48728 8.75565 1.59901C8.50065 1.72201 8.31465 1.94626 8.24565 2.21251L7.88865 3.58801C7.775 4.02573 7.60985 4.44843 7.39665 4.84726C7.0854 5.43001 6.6039 5.89726 6.1029 6.32851L5.02365 7.25851C4.87393 7.38789 4.75699 7.55091 4.68242 7.7342C4.60785 7.91749 4.57778 8.11585 4.59465 8.31301L5.20365 15.3578C5.23049 15.6693 5.37318 15.9595 5.60354 16.171C5.8339 16.3824 6.13519 16.4998 6.4479 16.5H9.9339C12.5454 16.5 14.7737 14.6805 15.2027 12.1988Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.22606 7.1137C2.371 7.10736 2.51279 7.15727 2.6218 7.25301C2.73082 7.34874 2.79862 7.4829 2.81106 7.62745L3.53856 16.0544C3.55088 16.1799 3.5375 16.3066 3.49922 16.4268C3.46094 16.5469 3.39857 16.658 3.31592 16.7532C3.23327 16.8485 3.13207 16.9258 3.01851 16.9806C2.90495 17.0355 2.78141 17.0665 2.65543 17.072C2.52946 17.0775 2.40369 17.0572 2.28581 17.0124C2.16794 16.9676 2.06042 16.8993 1.96984 16.8116C1.87926 16.7239 1.80751 16.6186 1.75898 16.5022C1.71044 16.3858 1.68614 16.2608 1.68756 16.1347V7.67545C1.68762 7.53046 1.74366 7.39109 1.844 7.28643C1.94433 7.18176 2.0812 7.11988 2.22606 7.1137Z"
                                fill="white" />
                        </svg>
                        <span>
                            ${content['likes']}
                        </span>
                    </div>
                </div>
            </div>
            `
            videoContainer.append(eachContent);
        });
    }
</script>
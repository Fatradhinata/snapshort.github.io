<style title="plus">
    .content-table p {
        margin: 0 !important;
    }

    .content {
        display: flex;
        gap: 15px;
        width: fit-content;
    }

    .content-table .content .video-parent-div {
        position: relative;
        height: fit-content;
        display: flex;
    }

    .content-table video {
        width: 65px;
        height: 100px;
        object-fit: cover;
    }

    .content-table .video-parent-div span {
        position: absolute;
        bottom: .7vh;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 9.5px;
        font-weight: 400;
        letter-spacing: .2px;
    }

    .video-div-forDark-bg {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgb(0 0 0 / 5%) 60%, rgb(0 0 0 / 37%) 100%);
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .content .user-action {
        display: flex;
        gap: 10px;
    }

    .content .video-right {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    .content .video-right p {
        font-weight: 400;
        font-size: 12px;
    }

    .content .action-u:not(:last-child) img {
        filter: brightness(0) saturate(100%) invert(41%) sepia(12%) saturate(1626%) hue-rotate(196deg) brightness(96%) contrast(99%);
    }

    .action-u:hover {
        filter: brightness(1.5) !important;
    }

    .action-u p {
        font-size: 10px !important;
        font-weight: 500 !important
    }

    .action-u {
        display: flex;
        gap: 3px;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .cat-inline {
        display: flex;
    }

    .cat-inline a {
        color: #787878;
        padding: 0px 10px;

        &:hover {
            text-decoration: none !important;
            filter: brightness(0.7)
        }
    }

    .cat-inline a:first-child {
        border-right: 1px solid #787878;
        padding-left: 0px !important;
    }

    .status-post {
        font-weight: 400;
    }

    .status-post label {
        background-color: #DDF0DE;
        color: #4CAF50;
        font-weight: 500;
        padding: 1px 4px;
        border-radius: 2px;
    }

    .privacy-select-div img {
        filter: brightness(0) saturate(100%) invert(33%) sepia(0%) saturate(0%) hue-rotate(247deg) brightness(94%) contrast(90%);
    }

    .privacy-select-div select {
        border: none;
        outline: none;
        cursor: pointer;
        font-family: 'Poppins';
    }

    .icon-parent {
        display: flex;
        gap: 10px;
    }

    .icon-parent img {
        filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7487%) hue-rotate(70deg) brightness(99%) contrast(103%);
        width: 15px;
        height: 15px;
    }

    .icon-parent .edit-content {
        background-color: #4CAF50;
    }
</style>
<div class="parent">
    <div class="title-table">
        <h5>Contents</h5>
        <div class="last-release">
            <img src="<?= base_url('asset/icon/date.svg') ?>" alt="Date">
            <select name="last-seen" id="last">
                <option value="7">Last 7 Days</option>
                <option value="7">Last 14 Days</option>
                <option value="7">Last 30 Days</option>
                <option value="7">Last 90 Days</option>
                <option value="7">Last 360 Days</option>
            </select>
        </div>
    </div>
    <div class="data-table">
        <div class="top-div">
            <div class="search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                    <path
                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
                </svg>
                <input type="text" id="search-input" placeholder="Search by name">
            </div>
            <div class="select-parent">
                <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 1H1M18 6H4M15 11H7" stroke="#858585" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                <select name="sort" id="sort">
                    <option value="" hidden>Sort by</option>
                    <option value="Name">Name</option>
                    <option value="Follower">Follower</option>
                    <option value="Following">Following</option>
                    <option value="Total Report">Total Report</option>
                    <option value="Total Content">Total Content</option>
                    <option value="Total Likes">Total Likes</option>
                </select>
            </div>
            <button>
                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2 18C1.45 18 0.979002 17.804 0.587002 17.412C0.195002 17.02 -0.000664969 16.5493 1.69779e-06 16V2C1.69779e-06 1.45 0.196002 0.979002 0.588002 0.587002C0.980002 0.195002 1.45067 -0.000664969 2 1.69779e-06H16C16.1333 1.69779e-06 16.2583 0.0126685 16.375 0.0380018C16.4917 0.0633351 16.6083 0.100668 16.725 0.150002L14.875 2H2V16H16V9.35L18 7.35V16C18 16.55 17.804 17.021 17.412 17.413C17.02 17.805 16.5493 18.0007 16 18H2ZM8.525 11.2L17.025 2.7C17.2083 2.51667 17.4333 2.425 17.7 2.425C17.9667 2.425 18.2 2.51667 18.4 2.7C18.6 2.88333 18.7 3.11667 18.7 3.4C18.7 3.68334 18.6 3.925 18.4 4.125L9.225 13.3C9.025 13.5 8.79167 13.6 8.525 13.6C8.25834 13.6 8.025 13.5 7.825 13.3L3.575 9.05C3.39167 8.86667 3.3 8.63334 3.3 8.35C3.3 8.06667 3.39167 7.83333 3.575 7.65C3.75833 7.46667 3.99167 7.375 4.275 7.375C4.55834 7.375 4.79167 7.46667 4.975 7.65L8.525 11.2Z"
                        fill="white" />
                </svg>
                Select
            </button>
        </div>
        <table class="content-table core-table">
            <thead>
                <tr>
                    <th style="width: 4%;">No</th>
                    <th style="width: 8%;"># ID Content</th>
                    <th style="width: 8%;"># User ID</th>
                    <th style="width: 8%;">Created By</th>
                    <th style="width: 35%;">Video</th>
                    <th style="width: 15%;">Status</th>
                    <th style="width: 10%;">Privacy</th>
                    <th style="width: 8%;">Action</th>
                </tr>
            </thead>
            <?php $i = $start + 1;
            foreach ($contents as $conten): ?>
            <tr>
                <td>
                    <p><?= $i++ ?></p>
                </td>
                <td>
                    <p><?= $conten['id'] ?></p>
                </td>
                <td>
                    <p><?= $conten['user_id'] ?></p>
                </td>
                <td>
                    <p>The Name</p>
                </td>
                <td>
                    <div class="content">
                        <div class="video-parent-div" onclick="window.location.assign('<?= base_url() ?>Fullscreen/index/<?= $conten['user_id'] . '/' . $conten['id'] ?>')" style="cursor: pointer">
                            <div class="video-div-forDark-bg"></div>
                            <video src="<?= base_url('asset/video/'. $conten['user_id'] . '/' . $conten['video'].'.mp4') ?>"></video>
                            <span>01:21</span>
                        </div>
                        <div class="video-right">
                            <p><?= $conten['caption'] ?> <span></span></p>
                            <div class="user-action">
                                <div class="action-u">
                                    <img src=" <?= base_url('asset/icon/view.svg') ?>" width="15px" height="15px">
                                    <p>17.5k</p>
                                </div>
                                <div class="action-u">
                                    <img src=" <?= base_url('asset/icon/like.svg') ?>" width="14px" height="14px">
                                    <p>17.5k</p>
                                </div>
                                <div class="action-u" onclick="window.location.assign('<?= site_url()?>adminTable/Comment/<?= $conten['id'] ?>')">
                                    <img src=" <?= base_url('asset/icon/comment-2.svg') ?>" width="13px" height="13px">
                                    <p>17.5k</p>
                                </div>
                                <div class="action-u">
                                    <img src=" <?= base_url('asset/icon/favorite.svg') ?>" width="13px" height="13px">
                                    <p>17.5k</p>
                                </div>
                                <div class="action-u">
                                    <img src=" <?= base_url('asset/icon/share.svg') ?>" width="13px" height="13px">
                                    <p>17.5k</p>
                                </div>
                                <div class="action-u">
                                    <img src=" <?= base_url('asset/icon/flag-red.svg') ?>" width="13px" height="13px">
                                    <p>17.5k</p>
                                </div>
                            </div>
                            <div class="cat-inline">
                                <a href="#">Nature</a>
                                <a href="#">Relax</a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="status-post"><label>Posted</label> Sep 10, 2023 03:00 PM</p>
                </td>
                <td>
                    <div class="privacy-select-div">
                        <img src="<?= base_url('asset/icon/eye.svg') ?>">
                        <select name="privacy-select" id="privacy-select">
                            <option value="Everyone">Everyone</option>
                            <option value="Onlyme">Only Me</option>
                            <option value="anyone-link">Not public</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="icon-parent">
                        <div class="edit-content">
                            <img src="<?= base_url('asset/icon/pencil.svg') ?>">
                        </div>
                        <div class="delete-user">
                            <img src="<?= base_url('asset/icon/trash.svg') ?>">
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="bottom-setting">
        <div class="select-limit-row">
            <span>Show Rows</span>
            <select name="row-limit" id="row-limit">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
                <option value="2000">2000</option>
            </select>
        </div>
        <div class="pagination-page">
            <p><span>
                    <?php echo ($start + 1) . '-' . ($start + count($contents)); ?>
                </span> of
                <?php echo $total_rows; ?>
            </p>
            <div class="chevron-parent">
                <?php if ($this->pagination->create_links()): ?>
                    <?php $previous_page = $start - $per_page; ?>
                    <?php $next_page = $start + $per_page; ?>

                    <?php if ($previous_page >= 0): ?>
                        <a href="<?php echo site_url("adminTable/Content/{$previous_page}"); ?>">
                            <svg class="chevron-left" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect x="14" width="14" height="14" transform="rotate(90 14 0)" fill="url(#pattern0)" />
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_619_64" transform="scale(0.0111111)" />
                                    </pattern>
                                    <image id="image0_619_64" width="90" height="90"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACmklEQVR4nO3aO4sUQRQF4BKfayCYqpiZ6B/QxNjMqANNRoc6p5igkf4FY7CBKK6xmcIKxhrNTxCDzTTYbIMV1xcYiIE6UtDCIvuYma7urqo5H1S43FuX7qk6s2OMiIiIiIiIiIiIiIiIiIiIiIiILJOiKE6QXCP5zS8AT6qqWjFLpqqqFb93AF/rWaz52QQrUA95unsBeGutvWCWhHPuvN/zHnN4HKwIgM//F6iLfCB5zWTOWnuV5PZeMyD5KVihfQr8G/ZPAEOTKefcLQA/DppBsGIHFdk18Kckj5tMFEVxFMCDWfYerOgsxeo1GY1GZ03iyrI8A+DVrPvuY9B+bVprr5hEOecukXw3z577GrRf351zN01iSN6or21z7bfPQfv1B8B9Y8wRkwAA90j+WmSvIZvYWnDYfr2IOdz43nyPDfb3JVgzJFcbNDKNNdzsF0LmXKvBGhqPx8dIrjdsaDumcHNICJl1rfvZRPU5xojCDcnbh4WQ3s+fRU9mRhBu5gkhUdyo6rvm+4YNT7oMNz6EkHzdsOdN59zlrnoO2rjtINwsEkL6fjCSexUZ6KOulUMvl8MFAQ5vkndNTEJclwC8JHm6aS9lWZ4k+azhm7ZD8rqJ0XA4PAfgTcMNbpC8mHIPnRgMBqcAPO/jabIRvVWd6TrcMNJzohNdhJsigZtP8uGmTDWEpBRuXILptBNFwFc8qxDSFmvtnToILDqg3341+Htfe2CWgQ3zXXBeIaQtwzDBIq8QEnm4mWYXQmINN8wxhLSFAW4S2YWQtrgwd+O8QkjE4WaSXQiJLdwg9xDSFs74jVyU/wnJMNzsLF0I6SHcbCxtCGn5x4iP/BMM4COAhzH/eFJERERERERERERERERERERETBL+ArzL1ry9zM9TAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if ($next_page < $total_rows): ?>
                        <a href="<?php echo site_url("adminTable/Content/{$next_page}"); ?>">
                            <svg class="chevron-right" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect x="14" width="14" height="14" transform="rotate(90 14 0)" fill="url(#pattern0)" />
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_619_64" transform="scale(0.0111111)" />
                                    </pattern>
                                    <image id="image0_619_64" width="90" height="90"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACmklEQVR4nO3aO4sUQRQF4BKfayCYqpiZ6B/QxNjMqANNRoc6p5igkf4FY7CBKK6xmcIKxhrNTxCDzTTYbIMV1xcYiIE6UtDCIvuYma7urqo5H1S43FuX7qk6s2OMiIiIiIiIiIiIiIiIiIiIiIiILJOiKE6QXCP5zS8AT6qqWjFLpqqqFb93AF/rWaz52QQrUA95unsBeGutvWCWhHPuvN/zHnN4HKwIgM//F6iLfCB5zWTOWnuV5PZeMyD5KVihfQr8G/ZPAEOTKefcLQA/DppBsGIHFdk18Kckj5tMFEVxFMCDWfYerOgsxeo1GY1GZ03iyrI8A+DVrPvuY9B+bVprr5hEOecukXw3z577GrRf351zN01iSN6or21z7bfPQfv1B8B9Y8wRkwAA90j+WmSvIZvYWnDYfr2IOdz43nyPDfb3JVgzJFcbNDKNNdzsF0LmXKvBGhqPx8dIrjdsaDumcHNICJl1rfvZRPU5xojCDcnbh4WQ3s+fRU9mRhBu5gkhUdyo6rvm+4YNT7oMNz6EkHzdsOdN59zlrnoO2rjtINwsEkL6fjCSexUZ6KOulUMvl8MFAQ5vkndNTEJclwC8JHm6aS9lWZ4k+azhm7ZD8rqJ0XA4PAfgTcMNbpC8mHIPnRgMBqcAPO/jabIRvVWd6TrcMNJzohNdhJsigZtP8uGmTDWEpBRuXILptBNFwFc8qxDSFmvtnToILDqg3341+Htfe2CWgQ3zXXBeIaQtwzDBIq8QEnm4mWYXQmINN8wxhLSFAW4S2YWQtrgwd+O8QkjE4WaSXQiJLdwg9xDSFs74jVyU/wnJMNzsLF0I6SHcbCxtCGn5x4iP/BMM4COAhzH/eFJERERERERERERERERERERETBL+ArzL1ry9zM9TAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
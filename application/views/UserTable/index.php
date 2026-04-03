
<div class="parent">
    <div class="title-table">
        <h5>User Profile</h5>
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
        <table class="user-table core-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th># User ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Report</th>
                    <th>Total Content</th>
                    <th>Total Likes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $i = $start + 1;
            foreach ($users as $user): ?>
                <tr>
                    <td>
                        <p>
                            <?= $i++ ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $user['user_id'] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $user['username'] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $user['name'] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $user['email'] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $user['total_content'] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $user['total_likes'] ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $user['total_report'] ?>
                        </p>
                    </td>
                    <td>
                        <div class="action">
                            <div class="view-user" onclick="window.location.assign('<?= site_url("Profile/anotherUser/" . $user['user_id']) ?>')"?>
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.5 4.91982C5.01956 4.91982 1.48438 9.5 1.48438 9.5C1.48438 9.5 5.01956 14.0808 9.5 14.0808C12.9259 14.0808 17.5156 9.5 17.5156 9.5C17.5156 9.5 12.9259 4.91982 9.5 4.91982ZM9.5 12.3536C7.92656 12.3536 6.64584 11.0734 6.64584 9.5C6.64584 7.92656 7.92656 6.64585 9.5 6.64585C11.0734 6.64585 12.3542 7.92656 12.3542 9.5C12.3542 11.0734 11.0734 12.3536 9.5 12.3536ZM9.5 7.83394C9.2786 7.82976 9.05859 7.86976 8.85283 7.95159C8.64707 8.03343 8.45969 8.15546 8.30164 8.31055C8.14359 8.46565 8.01804 8.65069 7.93233 8.85487C7.84663 9.05905 7.80249 9.27827 7.80249 9.49971C7.80249 9.72114 7.84663 9.94036 7.93233 10.1445C8.01804 10.3487 8.14359 10.5338 8.30164 10.6889C8.45969 10.844 8.64707 10.966 8.85283 11.0478C9.05859 11.1297 9.2786 11.1697 9.5 11.1655C9.93634 11.1572 10.352 10.9781 10.6577 10.6666C10.9634 10.3551 11.1346 9.93613 11.1346 9.49971C11.1346 9.06329 10.9634 8.64429 10.6577 8.33279C10.352 8.0213 9.93634 7.84218 9.5 7.83394Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="delete-user" onclick="openPopup(<?= '\''. $user['user_id'] . '\',\'' . $user['username']?>')">
                                    <svg width="13" height="15" viewBox="0 0 13 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.5237 1.17196H9.51179L8.65124 0.380951H4.34852L3.48798 1.17196H0.476074V2.75397H12.5237M1.33662 13.037C1.33662 13.4566 1.51795 13.859 1.84071 14.1557C2.16348 14.4524 2.60125 14.619 3.05771 14.619H9.94206C10.3985 14.619 10.8363 14.4524 11.1591 14.1557C11.4818 13.859 11.6631 13.4566 11.6631 13.037V3.54497H1.33662V13.037Z"
                                            fill="white" />
                                    </svg>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
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
                    <?php echo ($start + 1) . '-' . ($start + count($users)); ?>
                </span> of
                <?php echo $total_rows; ?>
            </p>
            <div class="chevron-parent">
                <?php if ($this->pagination->create_links()): ?>
                    <?php $previous_page = $start - $per_page; ?>
                    <?php $next_page = $start + $per_page; ?>

                    <?php if ($previous_page >= 0): ?>
                        <a href="<?php echo site_url("adminTable/index/{$previous_page}"); ?>">
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
                        <a href="<?php echo site_url("adminTable/index/{$next_page}"); ?>">
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
<script>
    function openPopup(id, username) {
        var popupDelete = document.querySelector('.popup-container');
        var usID = document.getElementById('us-id');
        var usName = document.getElementById('us-name');

        username = '@' + username;
        usID.innerHTML = id;
        usName.innerHTML = username
        popupDelete.style.display = 'flex'
    }
    
    function closePopup() {
        var popupDelete = document.querySelector('.popup-container');

        popupDelete.style.display = 'none';
    }
</script>
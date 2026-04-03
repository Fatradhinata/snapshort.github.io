<div class="parent-content">
    <div class="user-profile">
        <div class="core-user">
            <img src="data:image/jpeg;base64, <?= $user['profile_picture'] ?> " alt="Photo Profile">
            <div class="small-ident">
                <strong style="font-size: 18px;">
                    <?= $user['username'] ?>
                </strong>
                <p>
                    <?= $user['name'] ?>
                </p>
                <?php if (!isset($another_user)) { ?>
                    <button onclick="editActive()" class="edit-btn-btn">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 5.00012H3C2.46957 5.00012 1.96086 5.21084 1.58579 5.58591C1.21071 5.96098 1 6.46969 1 7.00012V16.0001C1 16.5306 1.21071 17.0393 1.58579 17.4143C1.96086 17.7894 2.46957 18.0001 3 18.0001H12C12.5304 18.0001 13.0391 17.7894 13.4142 17.4143C13.7893 17.0393 14 16.5306 14 16.0001V15.0001"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M13 3.00011L16 6.00011M17.385 4.58511C17.7788 4.19126 18.0001 3.65709 18.0001 3.10011C18.0001 2.54312 17.7788 2.00895 17.385 1.61511C16.9912 1.22126 16.457 1 15.9 1C15.343 1 14.8088 1.22126 14.415 1.61511L6 10.0001V13.0001H9L17.385 4.58511Z"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Edit Profile
                    </button>
                <?php } else {
                    if ($own_user != null && $user['is_following'] == '1') { ?>
                        <button class="button border-0 button-follow" id="<?= $user['user_id'] ?>"
                            style="background-color: #E1E1E1; color: #424874"><img src="<?= base_url('asset/icon/check.svg') ?>"
                                style="height: 14px; width: 14px;">
                            <p>Followed</p>
                            <span class="ripple"></span>
                        </button>
                    <?php }  else { ?>
                        <button class="button border-0 button-follow" <?php echo ($own_user == null) ? 'onclick="window.location.href=\''.site_url("Auth").'\'"' : 'id="'.$user['user_id'].'"'; ?>><img
                                src="<?= base_url('asset/icon/check.svg') ?>" style="height: 14px; width: 14px; display: none;">
                            <p>+ Follow</p>
                        </button>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="social-metrics">
            <p><span class="num-folls num-m">
                    <?= $user['followers'] ?>
                </span>Followers</p>
            <p><span class="num-following num-m">
                    <?= $user['followed'] ?>
                </span>Following</p>
            <p><span class="num-likes num-m">
                    <?= $user['total_liked'] ?>
                </span>Likes</p>
        </div>
    </div>
    <div class="tab-and-content">
        <div class="tab-opt">
            <button class="btn-video-type">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 21V3H4V21H2Z" fill="black" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 3H17V21H7V3ZM9 5V19H15V5H9Z" fill="black" />
                    <path d="M20 3V21H22V3H20Z" fill="black" />
                </svg>
                Videos
            </button>
            <?php if (!isset($another_user)) { ?>
                <button class="btn-video-type">
                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.875 7.04688H12.9531V4.8125C12.9531 3.76407 12.5366 2.75857 11.7953 2.01722C11.0539 1.27586 10.0484 0.859375 9 0.859375C7.95157 0.859375 6.94607 1.27586 6.20472 2.01722C5.46336 2.75857 5.04688 3.76407 5.04688 4.8125V7.04688H2.125C1.80591 7.04688 1.49989 7.17363 1.27426 7.39926C1.04863 7.62489 0.921875 7.93091 0.921875 8.25V17.875C0.921875 18.1941 1.04863 18.5001 1.27426 18.7257C1.49989 18.9514 1.80591 19.0781 2.125 19.0781H15.875C16.1941 19.0781 16.5001 18.9514 16.7257 18.7257C16.9514 18.5001 17.0781 18.1941 17.0781 17.875V8.25C17.0781 7.93091 16.9514 7.62489 16.7257 7.39926C16.5001 7.17363 16.1941 7.04688 15.875 7.04688ZM6.07812 4.8125C6.07812 4.03757 6.38596 3.29438 6.93392 2.74642C7.48188 2.19846 8.22507 1.89062 9 1.89062C9.77493 1.89062 10.5181 2.19846 11.0661 2.74642C11.614 3.29438 11.9219 4.03757 11.9219 4.8125V7.04688H6.07812V4.8125ZM16.0469 17.875C16.0469 17.9206 16.0288 17.9643 15.9965 17.9965C15.9643 18.0288 15.9206 18.0469 15.875 18.0469H2.125C2.07942 18.0469 2.0357 18.0288 2.00347 17.9965C1.97123 17.9643 1.95312 17.9206 1.95312 17.875V8.25C1.95312 8.20442 1.97123 8.1607 2.00347 8.12847C2.0357 8.09623 2.07942 8.07812 2.125 8.07812H15.875C15.9206 8.07812 15.9643 8.09623 15.9965 8.12847C16.0288 8.1607 16.0469 8.20442 16.0469 8.25V17.875ZM9.85938 13.0625C9.85938 13.2325 9.80897 13.3986 9.71454 13.5399C9.62012 13.6813 9.4859 13.7914 9.32887 13.8565C9.17184 13.9215 8.99905 13.9385 8.83234 13.9054C8.66564 13.8722 8.51252 13.7904 8.39233 13.6702C8.27214 13.55 8.1903 13.3969 8.15714 13.2302C8.12398 13.0635 8.141 12.8907 8.20604 12.7336C8.27109 12.5766 8.38123 12.4424 8.52256 12.348C8.66388 12.2535 8.83003 12.2031 9 12.2031C9.22792 12.2031 9.44651 12.2937 9.60767 12.4548C9.76884 12.616 9.85938 12.8346 9.85938 13.0625Z"
                            fill="#505050" />
                    </svg>
                    Private
                </button>
                <button class="btn-video-type">
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.8572 19.2857L5.85718 15L0.857178 19.2857V6.42857C0.857178 6.04969 1.00769 5.68633 1.2756 5.41842C1.54351 5.15051 1.90687 5 2.28575 5H9.42861C9.80749 5 10.1708 5.15051 10.4388 5.41842C10.7067 5.68633 10.8572 6.04969 10.8572 6.42857V19.2857Z"
                            stroke="#505050" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M5.14282 0.714294H13.7143C14.0931 0.714294 14.4565 0.864804 14.7244 1.13271C14.9923 1.40062 15.1428 1.76399 15.1428 2.14287V15"
                            stroke="#505050" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Favorite
                </button>
            <?php } ?>
            <button class="btn-video-type">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.72917 1.77664L9.4575 1.21414L9.72833 1.77664H9.72917ZM2.5 8.52831L3.1225 8.47497C3.10815 8.3149 3.0327 8.16651 2.9118 8.06061C2.79091 7.95472 2.63387 7.89947 2.4733 7.90633C2.31273 7.9132 2.16098 7.98165 2.04957 8.09748C1.93815 8.2133 1.87563 8.36759 1.875 8.52831H2.5ZM16.8633 10.0475L16.275 13.4475L17.5075 13.6608L18.095 10.2608L16.8633 10.0475ZM11.0375 17.7083H7.16333V18.9583H11.0375V17.7083ZM6.40417 17.0108L5.7275 9.18331L4.48167 9.29081L5.15917 17.1183L6.40417 17.0108ZM16.275 13.4475C15.8525 15.8891 13.6508 17.7083 11.0375 17.7083V18.9583C14.2258 18.9583 16.9758 16.7341 17.5075 13.6608L16.275 13.4475ZM11.0458 4.24997L10.4933 7.62081L11.7267 7.82247L12.2792 4.45247L11.0458 4.24997ZM5.99 8.53831L7.18917 7.50497L6.3725 6.55831L5.175 7.59164L5.99 8.53831ZM9.37 4.14331L9.76667 2.61497L8.55667 2.30164L8.16 3.82914L9.37 4.14331ZM10.365 2.31497L10.4858 2.35414L10.8683 1.16414L10.7475 1.12497L10.365 2.31497ZM8.76917 5.67997C9.02948 5.1933 9.23117 4.67748 9.37 4.14331L8.16 3.82914C8.04607 4.268 7.88047 4.6918 7.66667 5.09164L8.77 5.67997H8.76917ZM10.4858 2.35414C10.6047 2.39018 10.7126 2.45567 10.7994 2.54453C10.8863 2.6334 10.9492 2.74276 10.9825 2.86247L12.1925 2.54914C12.1064 2.22539 11.9398 1.92867 11.7083 1.68653C11.4768 1.44439 11.1879 1.26469 10.8683 1.16414L10.4858 2.35414ZM9.76667 2.61497C9.78328 2.55495 9.81275 2.49926 9.85304 2.45177C9.89334 2.40428 9.94348 2.36614 10 2.33997L9.4575 1.21414C9.01417 1.42747 8.68083 1.82247 8.55667 2.30164L9.76667 2.61497ZM10 2.33997C10.1141 2.2855 10.2446 2.27656 10.365 2.31497L10.7475 1.12497C10.3219 0.988572 9.86026 1.02048 9.4575 1.21414L9.99917 2.33997H10ZM11.795 9.15331H16.1117V7.90331H11.795V9.15331ZM3.9325 17.8383L3.1225 8.47497L1.8775 8.58247L2.68583 17.9458L3.9325 17.8383ZM3.125 17.9275V8.52831H1.875V17.9275H3.125ZM2.68583 17.9458C2.68329 17.9155 2.68791 17.885 2.69778 17.8563C2.70765 17.8275 2.72339 17.8012 2.744 17.7788C2.76461 17.7565 2.78964 17.7387 2.8175 17.7266C2.84536 17.7144 2.87544 17.7082 2.90583 17.7083V18.9583C3.51083 18.9583 3.98417 18.44 3.9325 17.8383L2.68667 17.9466L2.68583 17.9458ZM12.2792 4.45247C12.3831 3.81891 12.3536 3.17063 12.1925 2.54914L10.9825 2.86331C11.0999 3.31607 11.1215 3.78838 11.0458 4.24997L12.2792 4.45247ZM7.16333 17.7083C6.97251 17.708 6.78873 17.6362 6.64821 17.5071C6.50769 17.378 6.42062 17.2009 6.40417 17.0108L5.15917 17.1183C5.20253 17.6201 5.4324 18.0874 5.80342 18.4281C6.17444 18.7687 6.65966 18.9579 7.16333 18.9583V17.7083ZM7.18917 7.50497C7.75583 7.01664 8.36583 6.43581 8.77 5.67997L7.66667 5.09164C7.37833 5.63247 6.91917 6.08831 6.3725 6.55831L7.18917 7.50497ZM18.095 10.2608C18.1452 9.97163 18.1315 9.67498 18.055 9.39163C17.9784 9.10829 17.8409 8.84511 17.6519 8.62052C17.463 8.39593 17.2272 8.21536 16.9612 8.09147C16.6951 7.96758 16.4052 7.90336 16.1117 7.90331V9.15331C16.5842 9.15331 16.945 9.57997 16.8633 10.0475L18.095 10.2608ZM2.90583 17.7083C3.0275 17.7083 3.125 17.8066 3.125 17.9275H1.875C1.875 18.4958 2.33583 18.9583 2.90583 18.9583V17.7083ZM10.4933 7.62081C10.4623 7.80962 10.4727 8.00294 10.5238 8.18734C10.5749 8.37174 10.6655 8.54282 10.7893 8.68869C10.9132 8.83457 11.0673 8.95176 11.2409 9.03214C11.4146 9.11251 11.6036 9.15331 11.795 9.15331V7.90331C11.7848 7.90335 11.7748 7.90199 11.7656 7.8977C11.7563 7.89342 11.7482 7.88716 11.7416 7.87936C11.7351 7.87156 11.7304 7.86242 11.7278 7.85259C11.7252 7.84276 11.7248 7.83247 11.7267 7.82247L10.4933 7.62081ZM5.7275 9.18331C5.7172 9.06263 5.73487 8.94122 5.78065 8.82909C5.82643 8.71696 5.89818 8.61729 5.99 8.53831L5.17333 7.59081C4.93168 7.79917 4.74296 8.06194 4.62271 8.35749C4.50247 8.65304 4.45412 8.97292 4.48167 9.29081L5.7275 9.18247V9.18331Z"
                        fill="#505050" />
                </svg>
                Likes
            </button>
        </div>
        <hr>
        <?php if (isset($content)) { ?>
            <div class="content-content">
                <?php
                foreach ($content as $ctn) { ?>
                    <div class="video-parent">
                        <div class="thumbnail-video">
                            <video src="<?= base_url("asset/video/" . $user['user_id'] . '/' . $ctn['video'] . ".mp4") ?>"
                                id="thumbnail" loop
                                onclick="window.location.assign('<?= base_url('Fullscreen/index/' . $ctn['user_id'] . '/' . $ctn['id']) ?>')"></video>
                            <div class="view-count">
                                <svg width="15" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 8.91691V14.4325C1 16.2612 3.00608 17.4162 4.63929 16.5288L7.175 15.1497M1 5.75024V3.40137C1 1.57262 3.00608 0.417577 4.63929 1.30504L14.7821 6.82137C15.1624 7.02357 15.4804 7.32542 15.7022 7.69457C15.924 8.06372 16.0412 8.48625 16.0412 8.91691C16.0412 9.34757 15.924 9.7701 15.7022 10.1393C15.4804 10.5084 15.1624 10.8103 14.7821 11.0125L9.71071 13.7706"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span>
                                    <?= $ctn['view'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="video-description">
                            <p>
                                <?= $ctn['caption'] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="content-unavaible">
                <h3>You haven't uploaded content yet</h3>
            </div>
        <?php } ?>
    </div>
</div>
<?php if (!isset($another_user)) { ?>
    <div class="edit-profile-popup" id="edit-profile" style="display: none">
        <div class="core-edit">
            <div class="top-header-parent">
                <div class="top-header">
                    <svg onclick="closeEdit()" style="cursor: pointer" width="17" height="17" viewBox="0 0 17 17"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.29225 15.7091L8.50138 8.5L15.7105 15.7091M15.7105 1.29087L8.5 8.5L1.29225 1.29087"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h5 style="color: white">Edit Profile</h5>
                </div>
                <hr>
            </div>
            <form action="Profile/updateProfile" id="edit-profile-form" enctype="multipart/form-data" method="post">
                <div class="d-flex pp-parent">
                    <div class="user-pp-edit">
                        <img src="data:image/jpeg;base64, <?= $user['profile_picture'] ?> " alt="User" id="edit-pp"
                            style="object-fit: cover">
                        <input type="file" accept=".jpg, .png, .jpeg, .arw" style="display: none;" id="pp-input-change"
                            value="data:image/jpeg;base64,<?= $user['profile_picture'] ?>" name="profile-pictures">
                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"
                            id="change-pp">
                            <g clip-path="url(#clip0_347_536)">
                                <path
                                    d="M11.0998 10.9296L12.1465 9.88291H5.09744C4.89123 9.88282 4.68703 9.92337 4.49651 10.0022C4.30598 10.0811 4.13287 10.1967 3.98706 10.3426C3.84125 10.4884 3.72561 10.6615 3.64674 10.852C3.56788 11.0425 3.52733 11.2467 3.52742 11.4529V11.8556C3.52742 12.478 3.75071 13.0809 4.15543 13.5547C5.12884 14.6948 6.5572 15.3208 8.40982 15.4436C8.40703 15.3159 8.42098 15.1854 8.45448 15.0521L8.61497 14.4074C6.95913 14.3236 5.74847 13.8087 4.9509 12.875C4.70793 12.5909 4.57432 12.2294 4.5741 11.8556V11.4522C4.57428 11.3136 4.6295 11.1806 4.72763 11.0826C4.82575 10.9846 4.95876 10.9296 5.09744 10.9296H11.0998ZM9.10761 1.51299C9.56578 1.51299 10.0195 1.60323 10.4428 1.77856C10.8661 1.9539 11.2507 2.21089 11.5746 2.53487C11.8986 2.85884 12.1556 3.24346 12.331 3.66676C12.5063 4.09005 12.5965 4.54374 12.5965 5.00191C12.5965 5.46008 12.5063 5.91377 12.331 6.33706C12.1556 6.76036 11.8986 7.14497 11.5746 7.46895C11.2507 7.79293 10.8661 8.04992 10.4428 8.22525C10.0195 8.40059 9.56578 8.49083 9.10761 8.49083C8.18228 8.49083 7.29486 8.12325 6.64056 7.46895C5.98626 6.81465 5.61868 5.92723 5.61868 5.00191C5.61868 4.07659 5.98626 3.18917 6.64056 2.53487C7.29486 1.88057 8.18228 1.51299 9.10761 1.51299ZM9.10761 2.55966C8.78688 2.55966 8.4693 2.62283 8.173 2.74557C7.87669 2.8683 7.60746 3.0482 7.38068 3.27498C7.15389 3.50176 6.974 3.77099 6.85126 4.0673C6.72853 4.36361 6.66536 4.68119 6.66536 5.00191C6.66536 5.32263 6.72853 5.64021 6.85126 5.93652C6.974 6.23282 7.15389 6.50206 7.38068 6.72884C7.60746 6.95562 7.87669 7.13552 8.173 7.25825C8.4693 7.38099 8.78688 7.44416 9.10761 7.44416C9.75533 7.44416 10.3765 7.18685 10.8345 6.72884C11.2925 6.27083 11.5499 5.64963 11.5499 5.00191C11.5499 4.35419 11.2925 3.73299 10.8345 3.27498C10.3765 2.81697 9.75533 2.55966 9.10761 2.55966ZM14.0619 8.95486L9.94285 13.0732C9.70287 13.3133 9.5326 13.614 9.45022 13.9433L9.13063 15.221C9.09885 15.3481 9.10054 15.4813 9.13554 15.6075C9.17054 15.7338 9.23765 15.8489 9.33034 15.9415C9.42303 16.0341 9.53813 16.1011 9.66443 16.136C9.79073 16.1709 9.92392 16.1725 10.051 16.1406L11.328 15.8218C11.6576 15.7393 11.9586 15.5688 12.1988 15.3284L16.3171 11.2101C16.6047 10.9087 16.7629 10.5068 16.758 10.0902C16.7531 9.6737 16.5855 9.2756 16.2909 8.98105C15.9964 8.68649 15.5983 8.51885 15.1817 8.51395C14.7652 8.50906 14.3633 8.6673 14.0619 8.95486Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_347_536">
                                    <rect width="16.7468" height="16.7468" fill="white"
                                        transform="translate(0.734192 0.11393)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="ident-edit">
                    <div class="inp-div">
                        <p class="header-inp">Username</p>
                        <div class="quarter">
                            <input type="text" class="req-input" name="username" pattern="^\S+\S*$"
                                value="<?= $user['username'] ?>" required autocomplete="off" maxlength="50">
                            <span><label class="count-input">0</label>/50</span>
                        </div>
                    </div>
                    <div class="inp-div">
                        <p class="header-inp">Name</p>
                        <div class="quarter">
                            <input type="text" class="req-input" name="name" required value="<?= $user['name'] ?>"
                                autocomplete="off" maxlength="75">
                            <span><label class="count-input">0</label>/75</span>
                        </div>
                    </div>
                    <div class="inp-div">
                        <p class="header-inp">Bio</p>
                        <div class="quarter">
                            <textarea name="bio" class="req-input" id="bio-user-edit" cols="30" rows="2" autocomplete="off"
                                maxlength="150"></textarea>
                            <span><label class="count-input">0</label>/150</span>
                        </div>
                    </div>
                    <div class="personal-header">
                        <p class="header-inp">Personal Information</p>
                        <p>Provide your personal information, this will help you to log into this account if the data is
                            valid.
                            Your personal data will not be displayed on your profile</p>
                    </div>
                    <div class="inp-div">
                        <p class="header-inp">Email</p>
                        <div class="quarter">
                            <input type="text" name="email" value="<?= $user['email'] ?>" required>
                        </div>
                    </div>
                    <div class="inp-div" style="margin: 15px 0px;">
                        <p class="header-inp">Gender</p>
                        <div class="quarter">
                            <select name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="done-div">
                    <hr>
                    <button class="done-edit-btn" type="submit">Done</button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>

<script>
    var contentParent = document.querySelector('.content-content');
    var changePicture = document.getElementById('change-pp');
    var changeInput = document.getElementById('pp-input-change');
    var vParent = document.querySelectorAll('.video-parent');
    var formUpdate = document.getElementById('edit-profile-form');

    vParent.forEach(element => {
        element.onmouseenter = () => {
            element.getElementsByTagName('video')[0].muted = false;
            element.getElementsByTagName('video')[0].play();
        }

        element.onmouseleave = () => {
            element.getElementsByTagName('video')[0].currentTime = 0;
            element.getElementsByTagName('video')[0].pause();
        }
    });

    var reqInput = document.querySelectorAll('.req-input');

    var inputCount = 0;
    reqInput.forEach((element, index) => {
        element.oninput = () => {
            if (index == 0) {
                element.value = element.value.replace(/[^a-zA-Z0-9._]/g, '')
            }
            inputCount = element.value.length
            element.parentElement.querySelector('.count-input').innerHTML = inputCount;
        }
        inputCount = element.value.length
        element.parentElement.querySelector('.count-input').innerHTML = inputCount;
    });

    function editActive() {
        document.getElementById('edit-profile').style.display = 'flex';
    }

    function closeEdit() {
        document.getElementById('edit-profile').style.display = 'none';
    }

    if (changePicture != null) {
    changePicture.onclick = () => {
        changeInput.click();
    }
    
    changeInput.onchange = () => {
        const pp = changeInput.files[0];
        const ppURL = URL.createObjectURL(pp);
        document.getElementById('edit-pp').src = ppURL
    }
}

    // formUpdate.addEventListener('submit', function (e) {
    //     e.preventDefault();
    //     const file = changeInput.files[0];
    //     if (file) {
    //         const imageUrl = URL.createObjectURL(file);
    //         let input = document.createElement('input');
    //         input.type = "text";
    //         input.name = "profile-pictures";
    //         input.value = imageUrl;
    //         input.style.display = "none";
    //         formUpdate.appendChild(input);
    //         formUpdate.submit();
    //     }
    // });

    function createRipple(event) {
        const button = event.currentTarget;

        const circle = document.createElement("span");
        const diameter = Math.max(button.clientWidth, button.clientHeight);
        const radius = diameter / 2;
        console.log(radius, diameter, button.clientWidth, button.clientHeight);
        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `-10%`;
        circle.style.top = `-50%`;
        circle.classList.add("ripple");

        const ripple = button.getElementsByClassName("ripple")[0];

        if (ripple) {
            ripple.remove();
            button.getElementsByTagName('p')[0].textContent = '+ Follow';
            button.style.color = '#fff';
            button.style.backgroundColor = '#424874';
            button.getElementsByTagName('img')[0].style.display = 'none';
            followUser(button.getAttribute('id'))
        } else {

            button.getElementsByTagName('p')[0].textContent = 'Followed';
            button.getElementsByTagName('img')[0].style.display = 'block';
            button.style.color = '#424874'
            button.appendChild(circle);

            button.style.backgroundColor = '#E1E1E1';
            followUser(button.getAttribute('id'))
        }
    }   

    <?php if ($own_user != null) {?>
    const buttons = document.querySelectorAll(".button-follow");
    console.log(buttons);
    for (const button of buttons) {
        button.addEventListener("click", createRipple);
    }
    <?php } ?>

    function followUser(userId) {
        console.log(userId);
        $.ajax({
            url: '<?= base_url('UserMetrics/Follow/') ?>' + userId,
            method: 'POST',
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
            }
        });
    }
</script>
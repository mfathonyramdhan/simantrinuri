<!-- Sidebar chat start -->
<div id="sidebar" class="users p-chat-user showChat">
    <div class="had-container">
        <div class="card card_main p-fixed users-main">
            <div class="user-box">
                <div class="chat-inner-header">
                    <div class="back_chatBox">
                        <div class="right-icon-control">
                            <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                            <div class="form-icon">
                                <i class="icofont icofont-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-friend-list">
                    <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius img-radius" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image ">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Josephin Doe</div>
                        </div>
                    </div>
                    <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="..\files\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Lary Doe</div>
                        </div>
                    </div>
                    <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Alice</div>
                        </div>
                    </div>
                    <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Alia</div>
                        </div>
                    </div>
                    <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                        <a class="media-left" href="#!">
                            <img class="media-object img-radius" src="..\files\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                            <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                            <div class="f-13 chat-header">Suzen</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar inner chat start-->
<div class="showChat_inner">
    <div class="media chat-inner-header">
        <a class="back_chatBox">
            <i class="feather icon-chevron-left"></i> Josephin Doe
        </a>
    </div>
    <div class="media chat-messages">
        <a class="media-left photo-table" href="#!">
            <img class="media-object img-radius img-radius m-t-5" src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image">
        </a>
        <div class="media-body chat-menu-content">
            <div class="">
                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                <p class="chat-time">8:20 a.m.</p>
            </div>
        </div>
    </div>
    <div class="media chat-messages">
        <div class="media-body chat-menu-reply">
            <div class="">
                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                <p class="chat-time">8:20 a.m.</p>
            </div>
        </div>
        <div class="media-right photo-table">
            <a href="#!">
                <img class="media-object img-radius img-radius m-t-5" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
            </a>
        </div>
    </div>
    <div class="chat-reply-box p-b-20">
        <div class="right-icon-control">
            <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
            <div class="form-icon">
                <i class="feather icon-navigation"></i>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar inner chat end-->


<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Navigation</div>
                <ul class="pcoded-item pcoded-left-item">
                    <?php if ($role == 1) { ?><li class="">
                            <a href="index.php">
                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                        </li> <?php } ?>
                    <li class="">
                        <a href="sekolah.php">
                            <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                            <span class="pcoded-mtext">PP. Nurul Iman</span>
                        </a>
                    </li>

                    <?php if ($role == 1) { ?>

                        <li class="pcoded-hasmenu p">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                <span class="pcoded-mtext">Akun</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="admin.php">
                                        <span class="pcoded-mtext">Admin</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="siswa.php">
                                        <span class="pcoded-mtext">Santri</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="">
                            <a href="kelas.php">
                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                <span class="pcoded-mtext">Kelas</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="semester.php">
                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                <span class="pcoded-mtext">Semester</span>
                            </a>
                        </li>



                        <li class="pcoded-hasmenu p">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                <span class="pcoded-mtext">Potongan</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="potongan.php">
                                        <span class="pcoded-mtext">Persentase Potongan</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="potongan_s.php">
                                        <span class="pcoded-mtext">Potongan SPP Santri</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    <?php } ?>






                    <li class="">
                        <a href="transaksi.php">
                            <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                            <span class="pcoded-mtext">Transaksi</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>


        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
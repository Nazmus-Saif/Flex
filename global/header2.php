<!-- Header Start -->
<header class="header">
    <div class="header-wrapper">
        <span class="header-bars"><i class="fa-solid fa-bars"></i></span>
        <span class="header-start"><a href="./homepage.php"><img src="./media/images/logo.png" alt="FLEX" ></a></span>
        <nav class="navigation-bar">
            <ul>
                    <a href="./homepage.php"><div><li class="navbar-item1">Home</li></div></a>
                    <div class="navbar-item2"><li class="navbar-item2"><p>Genres<i class="fas fa-caret-down"></i></P></li></div>
                    <a href="./search.php"><div><li class="navbar-item3">Search</li></div></a>
                <?php
                if (isset($_SESSION['uid'])) {
                    if ($_SESSION['uid'] > 3) {
                    echo '<a href="./profile.php"><div><li class="navbar-item4">Profile</li></div></a>';
                    }
                }
                if (isset($_SESSION['uid'])) {
                    if ($_SESSION['uid'] == 1 || $_SESSION['uid'] == 2 || $_SESSION['uid'] == 3) {
                    echo '<a href="./admin.php"><div><li class="navbar-item5">Administrator</li></div></a>';
                    }
                }
                ?>
            </ul>
        </nav>
        <div class="profile-wrapper">
            <div class="profile-picture">
                <?php
                    if (!empty($profile_image)) {
                        echo '<img src="' . $profile_image . '" alt="Profile Image">';
                    } else {
                        echo '<div class="no-image-text">None</div>';
                    }
                ?>
            </div>
            <div class="name-role">
                <?php echo $user_data['name']; ?>
            </div>
        </div>
        <div class="header-end"><a class="button" href="./handlers/logoutHandler.php">
        <button><i class="fa-solid fa-arrow-right-from-bracket"></i></button></a></div>
    </div>
</header>
<!-- Header End -->
<!-- side bar starts -->
<div class="side-bar">
    <div class="sidebar-head"><h2>Popular Categories</h2></div>
    <div class="content">
        <ul>
            <a href="./HindiMovies.php"><div><li>HINDI MOVIES</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./EnglishMovies.php"><div><li>ENGLISH MOVIES</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./AnimationMovies.php"><div><li>ANIMATION MOVIES</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./SouthDubMovies.php"><div><li>SOUTH INDIAN DUBBED MOVIES</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./EngHinDubMovies.php"><div><li>ENGLISH HINDI DUBBED MOVIES</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./Eng&ForTVSeries.php"><div><li>ENGLISH & FOREIGN TV SERIES</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./DubTVSeries&Shows.php"><div><li>DUBBED TV SERIES & SHOWS</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./IndianTVSeries.php"><div><li>INDIAN TV SERIES</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./HindiTVSerials.php"><div><li>HINDI TV SERIALS</li><i class="fa-solid fa-angle-right"></i></div></a>
            <a href="./BanglaMovies.php"><div><li>BANGLA MOVIES</li><i class="fa-solid fa-angle-right"></i></div></a>
        </ul>
    </div>
</div>
<span class="cross-mark"><i class="fa-solid fa-xmark"></i></span> <!--this is for the cross sign of the side bar -->
<div class="black"></div> <!--for darkar the rest of the part of the screen when side bar is open -->
<!-- side bar ends -->
<!-- Genres show when hover navbar Movies -->
<div class="navbar-movies2">
    <ul>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./action.php">Action</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./horror.php">Horror</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./sci-fi.php">Sci-fi</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./comedy.php">Comedy</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./crime.php">Crime</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./war.php">War</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./thriller.php">Thriller</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./mystery.php">Mystery</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./fantasy.php">Fantasy</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./romance.php">Romance</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./adventure.php">Adventure</a></li>
        <li class="item"><i class="fa-solid fa-play"></i><a href="./documentary.php">Documentary</a></li>
    </ul>
</div>
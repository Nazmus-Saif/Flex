<?php
    session_start();
    // Only Allow Admin
    if (!(isset($_SESSION['loggedinflex']) && $_SESSION['loggedinflex'] == true && $_SESSION['uid'] == 1 || $_SESSION['uid'] == 2 || $_SESSION['uid'] == 3)) {
        header("Location: ./homepage.php");
    }
    include './db.php';
    // get the user id and profile picture
    include './handlers/getUserName&Profile.php';
    // get some information to show in admin
    include './handlers/QueryForAdminPage.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Panel | FLEX</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global_style.css">
    <link rel="stylesheet" href="./css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- the following php line will get the header content from the global/header1 file -->
        <?php include './global/header1.php'; ?>
    <!-- admin container -->
    <div class="admin-box">
        <div class="admin-profile">
            <div class="profile-header">
                <?php
                if ($_SESSION['uid'] == 1 || $_SESSION['uid'] == 2 || $_SESSION['uid'] == 3){
                        echo '<i class="fa-solid fa-gear"></i>';
                        }
                ?>
                <div class="rank">
                    <p>Administrator Panel</p>
                </div>
            </div>
            <div class="task-container">
                <ul>
                    <a href="./admin.php"><div class="dashboard-button"><i class="fa-solid fa-house"></i><li>Dashboard</li></div></a>
                    <div class="user-list-button"><i class="fa-solid fa-users"></i><li>All Users</li></div>
                    <div class="movie-list-button"><i class="fa-solid fa-video"></i><li>All Movies</li></div>
                    <div class="webseries-button"><i class="fa-solid fa-film"></i><li>Webseries</li></div>
                    <div class="categories-button"><i class="fa-solid fa-list-ul"></i><li>Categories</li></div>
                    <div class="see-comment-button"><i class="fa-solid fa-comments"></i><li>Comments</li></div>
                    <!-- <div class="account-update-button"><i class="fa-solid fa-wrench"></i><li>Acct Update</li></div> -->
                </ul>
            </div>
        </div>
        <div class="admin-task">
            <div class="top-views">
                <div class="top-views-today"><p>TOP VIEWS TODAY</p></div>
                <div class="result-table">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Release</th>
                            <th>Today View</th>
                        </tr>
                        <!-- Add more rows as needed -->
                    </table>
                </div>
                <!-- show alert message -->
                <div class="alert-message">
                    <?php
                        if (isset($_SESSION['admin_success'])) {
                            echo '<p>' . $_SESSION['admin_success'] . '</p>';
                            unset($_SESSION['admin_success']); // Clear the success message from the session
                        }

                        if (isset($_SESSION['admin_error'])) {
                            echo '<p>' . $_SESSION['admin_error'] . '</p>';
                            unset($_SESSION['admin_error']); // Clear the error message from the session
                        }
                    ?>
                </div>
            </div>
            <div class="grid-item">
                <span class="dashboard total-admins">
                    <div class="sign1 grp1-sign"><i class="fa-solid fa-user-shield"></i></div>
                    <div class="total"><?php echo $totalAdmins; ?><p>Admins</p></div>
                </span>
                <span class="dashboard total-users">
                    <div class="sign2 grp3-sign"><i class="fa-solid fa-user"></i></div>
                    <div class="total"><?php echo $totalUsers; ?><p>Users</p></div>
                </span>
                <span class="dashboard total-movies">
                    <div class="sign3 grp2-sign"><i class="fa-solid fa-video"></i></div>
                    <div class="total"><?php echo $totalMovies; ?><p>Movies</p></div>
                </span>
                <span class="dashboard total-webseries">
                    <div class="sign4"><i class="fa-solid fa-film"></i></div>
                    <div class="total"><?php echo 0; ?><p>Webseries</p></div>
                </span>
                <span class="dashboard total-genres">
                    <div class="sign5 grp2-sign"><i class="fa-brands fa-google"></i></div>
                    <div class="total"><?php echo $totalGenres; ?><p>Genres</p></div>
                </span>
                <span class="dashboard total-categories">
                    <div class="sign6"><i class="fa-solid fa-list-ul"></i></div>
                    <div class="total"><?php echo $totalCategories; ?><p>Categories</p></div>
                </span>
                <span class="dashboard total-views">
                    <div class="sign7 grp3-sign"><i class="fa-solid fa-film"></i></div>
                    <div class="total"><?php echo 0; ?><p>Views</p></div>
                </span>
                <span class="dashboard total-comments">
                    <div class="sign8"><i class="fa-solid fa-film"></i></div>
                    <div class="total"><?php echo 0; ?><p>Comments</p></div>
                </span>
            </div>
            <!-- print all of movies from database -->
            <div class="movie-list">
                <span class="all-movies">
                    <?php
                        // show all movies in admin page
                        include './handlers/adminPageMovieTable.php';
                    ?>
                </span>
                <button class="add-movie-button">Add Movie</button>
            </div>
            <!-- add movies -->
            <span class="add-movie">
                <form action="./handlers/addMovieHandler.php" method="POST" class="add-movie-form" enctype="multipart/form-data">
                    <div>
                        <label htmlFor="movie_name">Movie Name</label>
                        <input type="text" name="movie_name" id="movie_name" placeholder="Enter movie name" value=""required />
                    </div>
                    <div>
                        <label htmlFor="movie_genre">Movie Genre</label>
                        <input type="text" name="movie_genre" id="movie_genre" placeholder="Enter movie genre" value=""required />
                    </div>
                    <div>
                        <label htmlFor="movie_category">Movie Category</label>
                        <input type="text" name="movie_category" id="movie_category" placeholder="Enter Category ID" value=""required />
                    </div>
                    <div>
                        <label htmlFor="movie_cover">Movie Cover</label>
                        <input type="file" name="movie_cover" id="movie_cover" required />
                    </div>
                    <div>
                        <label htmlFor="movie_file">Movie File</label>
                        <input type="file" name="movie_file" id="movie_file" required />
                    </div>
                    <button type="submit" class="btn btn-primary" name="admin_form" value="Submit">Submit</button>
                </form>
                <h2>Add Movie.....</h2>
            </span>
            <!-- print all of user from database -->
            <div class="user-list">
                <span class="all-users">
                    <?php
                        // show all users in admin page
                        include './handlers/adminPageUserTable.php';
                    ?>
                </span>
                <button class="add-user-button">Add User</button>
            </div>
            <!-- add user -->
            <span class="add-user">
                <form action="./handlers/addUserHandler.php" method="POST" class="register-box-form" enctype="multipart/form-data">
                    <div>
                    <label htmlFor="user_name">User Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter name" value="" required />
                    </div>
                    <div>
                        <label htmlFor="user_email">User Email</label>
                        <input type="email" name="email" id="email" placeholder="Email address" value="" required />
                    </div>
                    <div>
                        <label htmlFor="password">User Password</label>
                        <input type="password" name="password" id="password" autoComplete="true"placeholder="Enter password" value="" required />
                    </div>
                    <div>
                        <label htmlFor="confirmpass">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" autoComplete="true"placeholder="Confirm password" value="" required />
                    </div>
                    <div>
                        <label htmlFor="profile_image">Profile Image [Upload Image Size < 1MB]</label>
                        <input type="file" name="profile_image" id="profile_image" accept="image/jpg, image/jpeg, image/png" required/>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register_form">Continue</button>
                <h2>Add User.....</h2>
                </form>
            </span>
            <!-- print all of genres from database -->
            <span class="categories">
                <div class="all-category">
                    <?php
                        // show all categories in admin page 
                        include './handlers/adminPageCategoryTable.php';
                    ?>
                </div>
            </span> 
            <!-- print all of comments from database -->
            <div class="comment-list">
                <span class="all-comments">
                    <?php
                        // show all comments in admin page
                        include './handlers/adminPageCommentTable.php';
                    ?>
                </span>
            </div>
            <!-- account update -->
            <?php 
                // get user all info
                include './handlers/getUserInfoAll.php';
            ?>
            <span class="account-box">
                <form action="./handlers/adminAccountHandler.php" method="POST" class="account-box-form">
                    <div>
                        <label htmlFor="name">Enter new name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name"
                            value="<?php echo ucwords($user['name']) ?>" required />
                    </div>
                    <div>
                        <label htmlFor="email">Enter new email</label>
                        <input type="email" name="email" id="email" placeholder="Enter email address"
                            value="<?php echo $user['email'] ?>" required />
                    </div>
                    <div>
                        <label htmlFor="password">Enter new password</label>
                        <input type="password" name="password" id="password" autoComplete="true"
                            placeholder="Enter new password" value="<?php echo $user['password'] ?>" required />
                    </div>
                    <div>
                        <label htmlFor="confirmpassword">Confirm new password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" autoComplete="true"
                            placeholder="Confirm new password" value="<?php echo $user['password'] ?>" required />
                    </div>
                    <h2>Update Account.....</h2>
                    <button type="submit" class="btn btn-primary" name="account_form" value="Update">Update</button>
                </form>
            </span>
        </div>
    </div>
    <!-- Add Movie Ends -->
    <!-- the following php line will get the footer content from the global/footer file -->
    <?php include './global/footer.php'; ?>
    <!-- JS Scripts -->
    <script src="./scripts/script2.js"></script>
    <script src="./scripts/script3.js"></script>
    <script src="./scripts/script5.js"></script>
</body>
</html>
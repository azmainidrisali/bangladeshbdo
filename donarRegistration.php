<?php /* Template Name: Donar Registration */

get_header();

global $wpdb;

if ($_POST) {

    $username = $wpdb->escape($_POST['DonarFullname']);
    $email = $wpdb->escape($_POST['Donaremail']);
    $password = $wpdb->escape($_POST['DonarPassword']);
    $ConfPassword = $wpdb->escape($_POST['DonarconfirmPassword']);

    $error = array();
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username has Space";
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="bdoRegisterWarning">
                            <div class="alert alert-danger" role="alert">
                                <p><i class="fas fa-exclamation-circle"></i> Your '<?php echo $username ?>' Username has Space</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php
    }

    if (empty($username)) {
        $error['username_empty'] = "Needed Username must";
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="bdoRegisterWarning">
                            <div class="alert alert-danger" role="alert">
                                <p><i class="fas fa-exclamation-circle"></i> Needed Username must</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php
    }

    if (username_exists($username)) {
        $error['username_exists'] = "Username already exists";
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="bdoRegisterWarning">
                            <div class="alert alert-danger" role="alert">
                                <p><i class="fas fa-exclamation-circle"></i> <?php echo $username ?> Username already exists</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php
    }

    if (!is_email($email)) {
        $error['email_valid'] = "Email has no valid value";
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="bdoRegisterWarning">
                            <div class="alert alert-danger" role="alert">
                                <p><i class="fas fa-exclamation-circle"></i> <?php echo $email ?> has no valid value</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php
    }

    if (email_exists($email)) {
        $error['email_existence'] = "Email already exists";
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="bdoRegisterWarning">
                            <div class="alert alert-danger" role="alert">
                                <p><i class="fas fa-exclamation-circle"></i> <?php echo $email ?> Email already exists</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php
    }

    if (strcmp($password, $ConfPassword) !== 0) {
        $error['password'] = "Password didn't match";
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="bdoRegisterWarning">
                            <div class="alert alert-danger" role="alert">
                                <p><i class="fas fa-exclamation-circle"></i> Password didn't match</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php
    }

    if (count($error) == 0) {

        wp_create_user($username, $password, $email);
        $loginPageLinkreg = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
        echo "<meta http-equiv='refresh' content='0;url=$loginPageLinkreg' />";
        // wp_redirect(home_url());
        exit();
    }else{

        // var_dump($error);
        //print_r($error);
        
    }
}

global $bangladeshbdooption;
$loginPageLink = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];

?>

<main>
    <div class="container">
        <div class="loginBody">
            <div class="row">
                <div class="col-md-6">
                    <div class="loginArea">
                        <h1>Donar Registration</h1>
                        <form method="post">
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Email address</label>
                                <input type="email" name="Donaremail" class="form-control" id="floatingInput" placeholder="name@example.com">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">username</label>
                                <input type="text" name="DonarFullname" class="form-control" id="floatingInput" placeholder="Your name">
                            </div>
                            <div class="form-floating">
                                <label for="floatingPassword">Password</label>
                                <input type="password" name="DonarPassword" class="form-control" id="floatingPassword" placeholder="Password">
                            </div>
                            <div class="form-floating">
                                <label for="floatingPassword">confirm Password</label>
                                <input type="password" name="DonarconfirmPassword" class="form-control" id="floatingPassword" placeholder="Password">
                            </div>

                            <input type="submit" name="btnsubmit">

                        </form>
                        <div class="alreadyAccount">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="loginVectorImageAlready">
                                        <img src="<?php echo $bangladeshbdooption['logo-alreadyHaveAccount']['url']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <p>Already have an account login here</p>
                                    <a href="<?php echo $loginPageLink ?>"><button type="button"><i class="fas fa-sign-in-alt"></i> LOGIN</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="loginVectorImage">
                        <img src="<?php echo $bangladeshbdooption['logo-register']['url']; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();

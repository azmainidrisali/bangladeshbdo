<?php 

/* Template Name: Donar Login Screen */


get_header();?>

<div id="login-register-password">

	<?php global $user_ID, $user_identity; if (!$user_ID) { ?>

	
        <main>
            <div class="container">
                <div class="loginBody">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="loginArea">
                                <h1>BANGLADESH BDO</h1>
                                <h1>DONAR LOGIN</h1>
                                <?php 
                                
                                    // Check if the user just requested a new password 
                                    $attributes['lost_password_sent'] = isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] == 'confirm';

                                    if ( $attributes['lost_password_sent'] ) : ?>
                                        <p class="login-info">
                                            <?php _e( 'Check your email for a link to reset your password.', 'personalize-login' ); ?>
                                        </p>
                                    <?php endif;

                                    // Check if user just updated password
                                    $attributes['password_updated'] = isset( $_REQUEST['password'] ) && $_REQUEST['password'] == 'changed';
                                    
                                    if ( $attributes['password_updated'] ) : ?>
                                        <p class="login-info">
                                            <?php _e( 'Your password has been changed. You can sign in now.', 'personalize-login' ); ?>
                                        </p>
                                    <?php endif;

                                ?>
                                
                                
                                <form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" placeholder="user or email" />
                                        <!-- <label for="floatingInput">User Name</label> -->
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" name="pwd" value="" size="20" class="form-control" id="user_pass" tabindex="12" placeholder="********"/>
                                        <!-- <label for="floatingPassword">Password</label> -->
                                    </div>

                                    <?php do_action('login_form'); ?>
					                <input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />

                                    <!-- <input type="submit" name="btnsubmit">

                                    <button type="submit"><i class="fas fa-sign-in-alt"></i> LOGIN</button>
                                    <button type="submit"><i class="fas fa-user-plus"></i> REGISTER</button> -->

                                </form>
                            </div>
                            <div class="forgetRegisterField">
                                <?php $forgetPasswordPage = home_url().'/'.$bangladeshbdooption['donar_forgot_password']; ?>
                                <?php $registrationLink = home_url().'/'.$bangladeshbdooption['donar_Profile_registration']; ?>
                                <a href="<?php echo $registrationLink ?>"><button>Registration</button></a>
                                <a href="<?php echo $forgetPasswordPage ?>"><button>Forget Password</button></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="loginVectorImage">
                                <img src="<?php echo $bangladeshbdooption['LoginPageImageUploader']['url']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


	<?php }else{ // is logged in ?>

		<div class="container">

			<div class="sidebox">
				<h3>Welcome, <?php echo $user_identity; ?></h3>
				<div class="usericon">
					<?php global $userdata; echo get_avatar($userdata->ID, 60); ?>

				</div>
				<div class="userinfo">
					<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
					<!-- <p>
						<a href="</?php echo wp_logout_url('index.php'); ?>">Log out</a> | 
						<?php if (current_user_can('manage_options')) { 
							echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
							echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>

					</p> -->
				</div>
			</div>

		</div>

	<?php } ?>

</div>

<?php get_footer();?>
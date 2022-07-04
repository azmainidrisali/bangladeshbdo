<?php

/* Template Name: Password reset */

get_header();

?>

<?php

    $default_attributes = array( 'show_title' => false );
    $attributes = shortcode_atts( $default_attributes, $attributes );
 
    if ( is_user_logged_in() ) {
        return __( 'You are already signed in.', 'personalize-login' );
    } else {
        if ( isset( $_REQUEST['login'] ) && isset( $_REQUEST['key'] ) ) {
            $attributes['login'] = $_REQUEST['login'];
            $attributes['key'] = $_REQUEST['key'];
 
            // Error messages
            $errors = array();
            if ( isset( $_REQUEST['error'] ) ) {
                $error_codes = explode( ',', $_REQUEST['error'] );
 
                foreach ( $error_codes as $code ) {
                    $errors []= $this->get_error_message( $code );
                }
            }
            $attributes['errors'] = $errors;
 
            ?>
                <div class="container">
                    <div class="bdoPassRestForm">
                        <div id="password-reset-form" class="widecolumn">
                            <?php if ( $attributes['show_title'] ) : ?>
                                <h3><?php _e( 'Pick a New Password', 'personalize-login' ); ?></h3>
                            <?php endif; ?>
                            <form name="resetpassform" id="resetpassform" action="<?php echo site_url( 'wp-login.php?action=resetpass' ); ?>" method="post" autocomplete="off">
                                <input type="hidden" id="user_login" name="rp_login" value="<?php echo esc_attr( $attributes['login'] ); ?>" autocomplete="off" />
                                <input type="hidden" name="rp_key" value="<?php echo esc_attr( $attributes['key'] ); ?>" />
                                
                                <?php if ( count( $attributes['errors'] ) > 0 ) : ?>
                                    <?php foreach ( $attributes['errors'] as $error ) : ?>
                                    <p>
                                            <?php echo $error; ?>
                                        </p>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <div class="placeTitle">
                                    <p>Please Set Your new Password</p>
                                </div>

                                <p>
                                    <!-- <label for="pass1"><?php _e( 'New password', 'personalize-login' ) ?></label> -->
                                    <input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" placeholder='New Password' required/>
                                </p>
                                <p>
                                    <!-- <label for="pass2"><?php _e( 'Repeat new password', 'personalize-login' ) ?></label> -->
                                    <input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" placeholder='Confirm Password Password' required/>
                                </p>
                                
                                <p class="description"></?php echo wp_get_password_hint(); ?></p>
                                
                                <p class="resetpass-submit">
                                    <input type="submit" name="submit" id="resetpass-button" class="button" value="<?php _e( 'Reset Password', 'personalize-login' ); ?>" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            
        } else {
            return __( 'Invalid password reset link.', 'personalize-login' );
        }
    }

get_footer();
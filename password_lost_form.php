<?php /* Template Name: Password Lost Form */

get_header();

?>

<div class="container">
    <div class="bdoPassrestReq">
        <div id="password-lost-form" class="widecolumn">
            <?php if ( $attributes['show_title'] ) : ?>
                <h3><?php _e( 'Forgot Your Password?', 'personalize-login' ); ?></h3>
            <?php endif; ?>

            <?php
            
                $attributes['errors'] = array();
                if ( isset( $_REQUEST['errors'] ) ) {
                    $error_codes = explode( ',', $_REQUEST['errors'] );
                
                    foreach ( $error_codes as $error_code ) {
                        $attributes['errors'] []= $this->get_error_message( $error_code );
                    }
                }

                if ( count( $attributes['errors'] ) > 0 ) : ?>
                    <?php foreach ( $attributes['errors'] as $error ) : ?>
                        <p>
                            <?php echo $error; ?>
                        </p>
                    <?php endforeach; ?>
                <?php endif;?>
        
            <p>
                <?php
                    _e(
                        "Enter your email address and we'll send you a link you can use to pick a new password.",
                        'personalize_login'
                    );
                ?>
            </p>
        
            <form id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
                <p class="form-row">
                    <!-- <label for="user_login"><?php _e( 'Email', 'personalize-login' ); ?> -->
                    <input type="text" name="user_login" id="user_login">
                </p>
        
                <p class="lostpassword-submit">
                    <input type="submit" name="submit" class="lostpassword-button"
                        value="<?php _e( 'Reset Password', 'personalize-login' ); ?>"/>
                </p>
            </form>
        </div>
    </div>
    
</div>



<?php

get_footer();
<?php
    $district=$_GET['location'];
    
    $zilla=$_GET['minsqft'];
    $upzilla=$_GET['maxsqft'];
    
    $donargroup=$_GET['price'];
						
    $blood_query = array(
        'relation' => 'AND',
        array(
            'key'     => 'District',
            'value'   => $district,
            'compare' => 'LIKE',
            'type'    => 'CHAR',
        ),
        array(
            'key'     => 'zilla',
            'value'   => $zilla,
            'compare' => 'LIKE',
            'type'    => 'CHAR',
        ),
        array(
            'key'     => 'upzilla',
            'value'   => $upzilla,
            'compare' => 'LIKE',
            'type'    => 'CHAR',
        ),
        array(
            'key'     => 'donarGroup',
            'value'   => $donargroup,
            'compare' => 'LIKE',
            'type'    => 'CHAR',
        ),
    );
				        
						
    while ( $blood_query->have_posts() ) : $blood_query->the_post();
    ?> 
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="flat-item">
                <div class="flat-item-image">
                    <span class="for-sale">For Sale</span>
                    <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></a>
                    <div class="flat-link">
                        <a href="<?php the_permalink();?>">More Details</a>
                    </div>
                    <ul class="flat-desc">
                        <li>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/4.png" alt="">
                            <span><?php echo get_field( 'prp_sqft'); ?> sqft</span>
                        </li>
                        <li>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/5.png" alt="">
                            <span>5</span>
                        </li>
                        <li>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/6.png" alt="">
                            <span>3</span>
                        </li>
                    </ul>
                </div>
                <div class="flat-item-info">
                    <div class="flat-title-price">
                        <h5><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h5>
                        <span class="price">&#8377 <?php echo get_field( 'prp_uprice'); ?> / SQFT</span>
                    </div>
                    <p><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/location.png" alt=""><?php echo get_field( 'prp_ulocation'); ?></p>
                </div>
            </div>
        </div>
        <!-- flat-item -->
    <?php endwhile; ?>

<?php


home_url().'/'.$bangladeshbdooption['donar_forgot_password_reset'].'?action=rp&key=$key&login='. rawurlencode( $user_login ), 'login' ) . "\r\n\r\n";













// <div id="password-reset-form" class="widecolumn">
//     <?php if ( $attributes['show_title'] ) : ?>
<!-- //         <h3><?php _e( 'Pick a New Password', 'personalize-login' ); ?></h3>
//     </?php endif; ?> -->
 
<!-- //     <form name="resetpassform" id="resetpassform" action="<?php echo site_url( 'wp-login.php?action=resetpass' ); ?>" method="post" autocomplete="off">
//         <input type="hidden" id="user_login" name="rp_login" value="<?php echo esc_attr( $attributes['login'] ); ?>" autocomplete="off" />
//         <input type="hidden" name="rp_key" value="<?php echo esc_attr( $attributes['key'] ); ?>" />
         
//         <?php if ( count( $attributes['errors'] ) > 0 ) : ?>
//             <?php foreach ( $attributes['errors'] as $error ) : ?>
//                 <p>
//                     <?php echo $error; ?>
//                 </p>
//             <?php endforeach; ?>
//         <?php endif; ?>
 
//         <p>
//             <label for="pass1"><?php _e( 'New password', 'personalize-login' ) ?></label>
//             <input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" />
//         </p>
//         <p>
//             <label for="pass2"><?php _e( 'Repeat new password', 'personalize-login' ) ?></label>
//             <input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" />
//         </p>
         
//         <p class="description"><?php echo wp_get_password_hint(); ?></p>
         
//         <p class="resetpass-submit">
//             <input type="submit" name="submit" id="resetpass-button"
//                    class="button" value="<?php _e( 'Reset Password', 'personalize-login' ); ?>" />
//         </p>
//     </form>
// </div> -->
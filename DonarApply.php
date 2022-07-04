<?php /* Template Name: Donar Apply */
    get_header();

    global $wp_error, $current_user, $wp_roles, $post_id;

?>

<main>

    <?php

        $my_query = new WP_Query( array(
            'post_type' => 'bangladesh_bdo_donar',
            'author' => get_current_user_id()
        ));
        if($my_query->have_posts()) {
            ?>
                <div class="container">
                
                    <div class="col-md-12">
                    
                        <div class="messegeBoxAppliedAlready">
                            <h1>You have Already Applied for Blood Donar Listing</h1>
                            <h1>Please contact administrator for profile update</h1>
                        </div>
                    
                    </div>
                
                </div>
            <?php
            // wp_redirect(site_url()."/donor-dashboard");
        } else {
            ?>

            <?php

                if (isset( $_POST['cpt_nonce_field'] ) && wp_verify_nonce( $_POST['cpt_nonce_field'], 'cpt_nonce_action' ) ) {

                    // create post object with the form values

                    $post_Donar_age_register                     = $_POST['donarAge'];
                    $post_Donar_gender_register                  = $_POST['donargender'];
                    $post_Donar_bloodGroup_register              = $_POST['donarBloodGroup'];
                    $post_Donar_presentdivision_register         = $_POST['donarPresentdivision'];
                    $post_Donar_presentdistrict_register         = $_POST['donarPresentdistrict'];
                    $post_Donar_presentzilla_register            = $_POST['donarPresentzilla'];
                    $post_Donar_presentupzilla_register          = $_POST['donarPresentupzilla'];
                    $post_Donar_presentFullAddress_register      = $_POST['donarPresentFullAddress'];
                    $post_Donar_permanentdivision_register       = $_POST['donarPermanentdivision'];
                    $post_Donar_permanentdistrict_register       = $_POST['donarPermanentdistrict'];
                    $post_Donar_permanentzilla_register          = $_POST['donarPermanentzilla'];
                    $post_Donar_permanentupzilla_register        = $_POST['donarPermanentupzilla'];
                    $post_Donar_permanentFullAddress_register    = $_POST['donarPermanentFullAddress'];
                    

                    $my_cptpost_args = array(

                    'post_title'    => $_POST['donarNAme'],
                    'post_author'  => get_current_user_id(),

                    'post_status'   => 'publish',

                    'post_type' => 'bangladesh_bdo_donar',

                    );

                    $cpt_id = wp_insert_post( $my_cptpost_args, $wp_error);

                    add_post_meta( $cpt_id, 'Donar_age_register', $post_Donar_age_register, false );
                    add_post_meta( $cpt_id, 'Donar_gender_register', $post_Donar_gender_register, false );
                    add_post_meta( $cpt_id, 'Donar_bloodGroup_register', $post_Donar_bloodGroup_register, false );
                    add_post_meta( $cpt_id, 'Donar_presentdivision_register', $post_Donar_presentdivision_register, false );
                    add_post_meta( $cpt_id, 'Donar_presentdistrict_register', $post_Donar_presentdistrict_register, false );
                    add_post_meta( $cpt_id, 'Donar_presentzilla_register', $post_Donar_presentzilla_register, false );
                    add_post_meta( $cpt_id, 'Donar_presentupzilla_register', $post_Donar_presentupzilla_register, false );
                    add_post_meta( $cpt_id, 'Donar_presentFullAddress_register', $post_Donar_presentFullAddress_register, false );
                    add_post_meta( $cpt_id, 'Donar_permanentdivision_register', $post_Donar_permanentdivision_register, false );
                    add_post_meta( $cpt_id, 'Donar_permanentdistrict_register', $post_Donar_permanentdistrict_register, false );
                    add_post_meta( $cpt_id, 'Donar_permanentzilla_register', $post_Donar_permanentzilla_register, false );
                    add_post_meta( $cpt_id, 'Donar_permanentupzilla_register', $post_Donar_permanentupzilla_register, false );
                    add_post_meta( $cpt_id, 'Donar_presentFullAddress_register', $post_Donar_permanentFullAddress_register, false );

                    $location = home_url().'/'.$bangladeshbdooption['donar_Profile_dashboard']; 

                    echo "<meta http-equiv='refresh' content='0;url=$location' />";
                    exit;

                }


            ?>

                <div class="container">
                    <div class="profileBody">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                        <!-- New Post Form -->
                                        <div id="postbox">
                                            <form method='post'>

                                                <div class="container">
                                                    <div class="applyform">

                                                        <div class="titleApplform">
                                                            <h3>Personal Information</h3>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <input type='text' name='donarNAme' id='donarNAme' value="<?php the_author_meta( 'first_name', $current_user->ID ); ?> <?php the_author_meta( 'last_name', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type='text' name='donarAge' id='donarAge' value="<?php the_author_meta( 'donar_age', $current_user->ID ); ?>"/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type='text' name='donargender' id='donargender' value="<?php the_author_meta( 'donar_gender', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type='text' name='donarBloodGroup' id='donarBloodGroup' value="<?php the_author_meta( 'donar_blood_group', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                        </div>

                                                        <div class="titleApplform">
                                                            <h3>Present Address</h3>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type='text' name='donarPresentdivision' id='donarPresentdivision' value="<?php the_author_meta( 'donar_Presentdivision', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type='text' name='donarPresentdistrict' id='donarPresentdistrict' value="<?php the_author_meta( 'donar_Presentdistrict', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type='text' name='donarPresentzilla' id='donarPresentzilla' value="<?php the_author_meta( 'donar_Presentzilla', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <input type='text' name='donarPresentFullAddress' id='donarPresentFullAddress' value="<?php the_author_meta( 'donar_PresentFullAddress', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                        </div>

                                                        <div class="titleApplform">
                                                            <h3>Permanent Address</h3>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type='text' name='donarPermanentdivision' id='donarPermanentdivision' value="<?php the_author_meta( 'donar_Permanentdivision', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type='text' name='donarPermanentdistrict' id='donarPermanentdistrict' value="<?php the_author_meta( 'donar_Permanentdistrict', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type='text' name='donarPermanentzilla' id='donarPermanentzilla' value="<?php the_author_meta( 'donar_Permanentzilla', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <input type='text' name='donarPermanentFullAddress' id='donarPermanentFullAddress' value="<?php the_author_meta( 'donar_PermanentFullAddress', $current_user->ID ); ?>" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="termsCondition">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                                                                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to 
                                                                        make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
                                                                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
                                                                        Lorem Ipsum passages, and more recently with desktop publishing
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                

                                                    <!-- <textarea name='cptContent' id='cptContent' rows='4″ cols='20″></textarea> </p> -->

                                                    <button type='submit'><?php _e('Submit', 'mytextdomain') ?></button>


                                                    <input type='hidden' name='post_type' id='post_type' value='my_custom_post_type' />


                                                    <?php wp_nonce_field( 'cpt_nonce_action', 'cpt_nonce_field' ); ?>

                                                </div>
                                            </form>
                                        </div>
                                    <!--// New Post Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    
    ?>
        
</main>

<?php get_footer();?>
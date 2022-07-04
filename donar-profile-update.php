<?php 

/**
 * Template Name: Donar User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */

global $current_user, $wp_roles;

$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
    // if ( !empty( $_POST['testAge'] ) )
        //     update_user_meta( $current_user->ID, 'donar_age', esc_attr( $_POST['testAge'] ) );

            // update_user_meta( $current_user->ID;, 'donar_age', $_POST['testAge'] );
            
        // // Get New User Meta
            // if(isset($_POST['donar_weight_input'])) {
            //     $strasse = $_POST['donar_weight_input'];
            //     // Update/Create User Meta
            //     update_user_meta( $current_user->ID, 'donar_weight', $strasse);     
            // }else {

            //     // Get User Meta
            //     $strasse = get_user_meta( $current_user->ID, 'donar_weight', true);
            // }

            // if ( !empty( $_POST['donar_weight_input'] ) )
            // add_user_meta( $current_user->ID, 'donar_weight', esc_attr( $_POST['donar_weight_input'] ) );
            // if ( !empty( $_POST['donar_age_input'] ) )
            // update_user_meta($current_user->ID, 'donar_age', esc_attr( $_POST['donar_age_input'] ) );
            // if ( !empty( $_POST['donar_gender_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_gender', esc_attr( $_POST['donar_gender_input'] ) );
                
            // if ( !empty( $_POST['donar_blood_group_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_blood_group', esc_attr( $_POST['donar_blood_group_input'] ) );
                
            // if ( !empty( $_POST['donar_Presentdivision_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Presentdivision', esc_attr( $_POST['donar_Presentdivision_input'] ) );
                
            // if ( !empty( $_POST['donar_Presentdistrict_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Presentdistrict', esc_attr( $_POST['donar_Presentdistrict_input'] ) );
                
            // if ( !empty( $_POST['donar_Presentzilla_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Presentzilla', esc_attr( $_POST['donar_Presentzilla_input'] ) );
                
            // if ( !empty( $_POST['donar_Presentupzilla_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Presentupzilla', esc_attr( $_POST['donar_Presentupzilla_input'] ) );
                
            // if ( !empty( $_POST['donar_PresentFullAddress_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_PresentFullAddress', esc_attr( $_POST['donar_PresentFullAddress_input'] ) );
                
            // if ( !empty( $_POST['donar_Permanentdivision_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Permanentdivision', esc_attr( $_POST['donar_Permanentdivision_input'] ) );
                
            // if ( !empty( $_POST['donar_Permanentdistrict_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Permanentdistrict', esc_attr( $_POST['donar_Permanentdistrict_input'] ) );
                
            // if ( !empty( $_POST['donar_Permanentzilla_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Permanentzilla', esc_attr( $_POST['donar_Permanentzilla_input'] ) );
                
            // if ( !empty( $_POST['donar_Permanentupzilla_input'] ) )
            // update_user_meta( $current_user->ID, 'donar_Permanentupzilla', esc_attr( $_POST['donar_Permanentupzilla_input'] ) );
                
            // if ( !empty( $_POST['donar_PermanentFullAddress_input'] ) )
        // update_user_meta( $current_user->ID, 'donar_PermanentFullAddress', esc_attr( $_POST['donar_PermanentFullAddress_input'] ) );
        


    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( home_url().'/donor-dashboard' );
        exit;
    }
}


get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class='container' id="post-<?php the_ID(); ?>">
        <div class="entry-content entry">
            <?php if ( !is_user_logged_in() ) : ?>
                    <p class="warning">
                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                    </p><!-- .warning -->
            <?php else : ?>
                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                <form method="post" id="adduser" action="<?php the_permalink(); ?>">

                    <div class="container">
                        <div class="form-personaldetails">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                                </div>
                                <div class="col-md-6">
                                    <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                                </div>
                                <div class="col-md-6">
                                    <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="text-input" name="pass1" type="password" id="pass1" placeholder="to change enter New password"/>
                                </div>
                                <div class="col-md-6">
                                    <input class="text-input" name="pass2" type="password" id="pass2" placeholder="to change enter New password Again"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="description" id="description" rows="3" cols="50" placeholder="Update Your Bio"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="text-input" name="testAge" type="text" id="testAge" placeholder="to change enter New password" value="<?php the_author_meta( 'donar_age', $current_user->ID ); ?>"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="testTask">
                        <?php 
                        
                            do_action('edit_user_profile',$current_user); 
                            //action hook for plugin and extra fields
                        ?>
                        </div>
                    
                        <p class="form-submit">
                            <//?php echo $referer; ?>
                            <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                            <?php wp_nonce_field( 'update-user' ) ?>
                            <input name="action" type="hidden" id="action" value="update-user" />
                        </p><!-- .form-submit -->
                    </div>
                </form><!-- #adduser -->
            <?php endif; ?>
        </div><!-- .entry-content -->
    </div>

    <script>

        $(document).ready(function(){

            $("#bloodDOnarDIvision").change(function(){

                var val = $(this).val();

                if (val == "Dhaka") {

                    $("#bloodDonarDistrict").html("<option value='Dhaka'>Dhaka</option> <option value='faridpur'>Faridpur</option> <option value='gazipur'>Gazipur</option> <option value='gopalganj'>Gopalganj</option> <option value='kishoreganj'>Kishoreganj</option> <option value='madaripur'>Madaripur</option> <option value='Manikganj'>Manikganj</option> <option value='Munshiganj'>Munshiganj</option> <option value='Narayanganj'>Narayanganj</option> <option value='Narsingdi'>Narsingdi</option> <option value='Rajbari'>Rajbari</option> <option value='Shariatpur'>Shariatpur</option>");

                } else if (val == "Rajshahi") {
                    
                    $("#bloodDonarDistrict").html("<option value='Rajshahi'>Rajshahi</option> <option value='Bogura'>Bogura</option> <option value='Joypurhat'>Joypurhat</option> <option value='Naogaon'>Naogaon</option> <option value='Natore'>Natore</option> <option value='Chapainawabganj'>Chapainawabganj</option> <option value='Pabna'>Pabna</option> <option value='Sirajganj'>Sirajganj</option>");

                } else if (val == "Mymensingh") {
                    
                    $("#bloodDonarDistrict").html("<option value='Mymensingh'>Mymensingh</option> <option value='Jamalpur'>Jamalpur</option> <option value='Netrokona'>Netrokona</option> <option value='Sherpur'>Sherpur</option>");

                } else if (val == "Barisal") {
                    
                    $("#bloodDonarDistrict").html("<option value='Barisal'>Barisal</option> <option value='Barguna'>Barguna</option> <option value='Bhola'>Bhola</option> <option value='Jhalokati'>Jhalokati</option> <option value='Patuakhali'>Patuakhali</option> <option value='Pirojpur'>Pirojpur</option>");

                } else if (val == "Chittagong") {
                    
                    $("#bloodDonarDistrict").html("<option value='Chittagong'>Chittagong</option> <option value='Bandarban'>Bandarban</option> <option value='Brahmanbaria'>Brahmanbaria</option> <option value='Chandpur'>Chandpur</option> <option value='Cumilla'>Cumilla</option> <option value='CoxsBazar'>Coxs Bazar</option> <option value='Feni'>Feni</option> <option value='Khagrachhari'>Khagrachhari</option> <option value='Lakshmipur'>Lakshmipur</option> <option value='Noakhali'>Noakhali</option> <option value='Rangamati'>Rangamati</option>");

                } else if (val == "Khulna") {
                    
                    $("#bloodDonarDistrict").html("<option value='Khulna'>Khulna</option> <option value='Bagerhat'>Bagerhat</option> <option value='Chuadanga'>Chuadanga</option> <option value='Jessore'>Jessore</option> <option value='Jhenaidah'>Jhenaidah</option> <option value='Kushtia'>Kushtia</option> <option value='Magura'>Magura</option> <option value='Meherpur'>Meherpur</option> <option value='Narail'>Narail</option> <option value='Satkhira'>Satkhira</option>");

                } else if (val == "Sylhet") {
                    
                    $("#bloodDonarDistrict").html("<option value='Habiganj'>Habiganj</option> <option value='Moulvibazar'>Moulvibazar</option> <option value='Sunamganj'>Sunamganj</option> <option value='Sylhet'>Sylhet</option>");

                } else if (val == "Rangpur") {
                    
                    $("#bloodDonarDistrict").html("<option value='Rangpur'>Rangpur</option> <option value='Dinajpur'>Dinajpur</option> <option value='Gaibandha'>Gaibandha</option> <option value='Kurigram'>Kurigram</option> <option value='Lalmonirhat'>Lalmonirhat</option> <option value='Nilphamari'>Nilphamari</option> <option value='Panchagarh'>Panchagarh</option> <option value='Rangpur'>Rangpur</option> <option value='Thakurgaon'>Thakurgaon</option>");

                }
            });

            $("#bloodDonarDistrict").change(function(){

                var val = $(this).val();

                if (val == "faridpur") {

                    $("#bloodDonarUpzilla").html("<option value='faridpur'>faridpur</option> <option value='Alfadanga'>Alfadanga</option> <option value='Bhanga'>Bhanga</option> <option value='Boalmari'>Boalmari</option> <option value='Charbhadrasan'>Charbhadrasan</option> <option value='FaridpurSadar'>Faridpur Sadar</option> <option value='Madhukhali'>Madhukhali</option> <option value='Nagarkanda'>Nagarkanda</option> <option value='Sadarpur'>Sadarpur</option> <option value='Saltha'>Saltha</option>");

                }  else if (val == "gazipur") {
                    
                    $("#bloodDonarUpzilla").html("<option value='gazipur'>Gazipur</option> <option value='GazipurSadar'>Gazipur Sadar</option> <option value='Kaliakair'>Kaliakair</option> <option value='Kaliganj'>Kaliganj</option> <option value='Kapasia'>Kapasia</option> <option value='Sreepur'>Sreepur</option>");

                }  else if (val == "gopalganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='gopalganj'>Gopalganj</option> <option value='GopalganjSadar'>Gopalganj Sadar</option> <option value='Kashiani'>Kashiani</option> <option value='Kotalipara'>Kotalipara</option> <option value='Muksudpur'>Muksudpur</option> <option value='Tungipara'>Tungipara</option>");

                }  else if (val == "kishoreganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='kishoreganj'>kishoreganj</option> <option value='Austagram'>Austagram</option> <option value='Bajitpur'>Bajitpur</option> <option value='Bhairab'>Bhairab</option> <option value='Hossainpur'>Hossainpur</option> <option value='Itna'>Itna</option> <option value='Karimganj'>Karimganj</option> <option value='Katiadi'>Katiadi</option> <option value='KishoreganjSadar'>Kishoreganj Sadar</option> <option value='Kuliarchar'>Kuliarchar</option> <option value='Mithamain'>Mithamain</option> <option value='Nikli'>Nikli</option> <option value='Pakundia'>Pakundia</option> <option value='Tarail'>Tarail</option> ");

                }  else if (val == "madaripur") {
                    
                    $("#bloodDonarUpzilla").html("<option value='madaripur'>madaripur</option> <option value='Rajoir'>Rajoir</option> <option value='MadaripurSadar'>Madaripur Sadar</option> <option value='Kalkini'>Kalkini</option> <option value='Shibchar'>Shibchar</option>");

                }  else if (val == "Manikganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Manikganj'>Manikganj</option> <option value='Daulatpur'>Daulatpur</option> <option value='Ghior'>Ghior</option> <option value='Harirampur'>Harirampur</option> <option value='ManikgonjSadar'>Manikgonj Sadar</option> <option value='Saturia'>Saturia</option> <option value='Shivalaya'>Shivalaya</option> <option value='Singair'>Singair</option>");

                }  else if (val == "Munshiganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Munshiganj'>Munshiganj</option> <option value='Gazaria'>Gazaria</option> <option value='Lohajang'>Lohajang</option> <option value='Munshiganj'>Munshiganj Sadar</option> <option value='Sirajdikhan'>Sirajdikhan</option> <option value='Sreenagar'>Sreenagar</option> <option value='Tongibari'>Tongibari</option>");

                }  else if (val == "Narayanganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Narayanganj'>Narayanganj</option> <option value='Araihazar'>Araihazar</option> <option value='Bandar'>Bandar</option> <option value='NarayanganjSadar'>Narayanganj Sadar</option> <option value='MunshiganjRupganj'>Rupganj</option> <option value='MunshiganjSonargaon'>Sonargaon</option>");

                }  else if (val == "Narsingdi") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Narsingdi'>Narsingdi</option> <option value='NarsingdiSadar'>Narsingdi Sadar</option> <option value='Belabo'>Belabo</option> <option value='Monohardi'>Monohardi</option> <option value='Palash'>Palash</option> <option value='Raipura'>Raipura</option> <option value='Shibpur'>Shibpur</option>");

                }  else if (val == "Rajbari") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Rajbari'>Rajbari</option> <option value='Baliakandi'>Baliakandi</option> <option value='Goalandaghat'>Goalandaghat</option> <option value='Pangsha'>Pangsha</option> <option value='RajbariSadar'>Rajbari Sadar</option> <option value='Kalukhali'>Kalukhali</option>");

                }  else if (val == "Shariatpur") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Shariatpur'>Shariatpur</option> <option value='Bhedarganj'>Bhedarganj</option> <option value='Damudya'>Damudya</option> <option value='Gosairhat'>Gosairhat</option> <option value='Naria'>Naria</option> <option value='ShariatpurSadar'>Shariatpur Sadar</option> <option value='Zajira'>Zajira</option> <option value='Shakhipur'>Shakhipur</option>");

                }  else if (val == "Bogura") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Bogura'>Bogura</option> <option value='Adamdighi'>Adamdighi</option> <option value='BoguraSadar'>Bogura Sadar</option> <option value='Dhunat'>Dhunat</option> <option value='Dhupchanchia'>Dhupchanchia</option> <option value='Gabtali'>Gabtali</option> <option value='Kahaloo'>Kahaloo</option> <option value='Nandigram'>Nandigram</option> <option value='Sariakandi'>Sariakandi</option> <option value='Shajahanpur'>Shajahanpur</option> <option value='Sherpur'>Sherpur</option> <option value='Shibganj'>Shibganj</option> <option value='Sonatola'>Sonatola</option>");

                }  else if (val == "Joypurhat") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Joypurhat'>Joypurhat</option> <option value='Akkelpur'>Akkelpur</option> <option value='JoypurhatSadar'>Joypurhat Sadar</option> <option value='Kalai'>Kalai</option> <option value='Khetlal'>Khetlal</option> <option value='Panchbibi'>Panchbibi</option>");

                }  else if (val == "Naogaon") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Naogaon'>Naogaon</option> <option value='Atrai'>Atrai</option> <option value='Badalgachhi'>Badalgachhi</option> <option value='Manda'>Manda</option> <option value='Dhamoirhat'>Dhamoirhat</option> <option value='Mohadevpur'>Mohadevpur</option> <option value='NaogaonSadar'>Naogaon Sadar</option> <option value='Niamatpur'>Niamatpur</option> <option value='Patnitala'>Patnitala</option> <option value='Porsha'>Porsha</option> <option value='Raninagar'>Raninagar</option> <option value='Sapahar'>Sapahar</option>");

                }  else if (val == "Natore") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Natore'>Natore</option> <option value='Bagatipara'>Bagatipara</option> <option value='Baraigram'>Baraigram</option> <option value='Gurudaspur'>Gurudaspur</option> <option value='Lalpur'>Lalpur</option> <option value='NatoreSadar'>Natore Sadar</option> <option value='Singra'>Singra</option> <option value='Naldanga'>Naldanga</option>");

                }  else if (val == "Chapainawabganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Chapainawabganj'>Chapainawabganj</option> <option value='Bholahat'>Bholahat</option> <option value='ChapaiNawabganjSadar'>Chapai Nawabganj Sadar</option> <option value='Dogachi'>Dogachi</option> <option value='Gomostapur'>Gomostapur</option> <option value='Nachol'>Nachol</option>");

                }  else if (val == "Pabna") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Pabna'>Pabna</option> <option value='Atgharia'>Atgharia</option> <option value='Bera'>Bera</option> <option value='Bhangura'>Bhangura</option> <option value='Chatmohar'>Chatmohar</option> <option value='Faridpur'>Faridpur</option> <option value='Ishwardi'>Ishwardi</option> <option value='PabnaSadar'>Pabna Sadar</option> <option value='Santhia'>Santhia</option> <option value='Sujanagar'>Sujanagar</option>");

                }  else if (val == "Sirajganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Sirajganj'>Sirajganj</option> <option value='Belkuchi'>Belkuchi</option> <option value='Chauhali'>Chauhali</option> <option value='Kamarkhanda'>Kamarkhanda</option> <option value='Kazipur'>Kazipur</option> <option value='Raiganj'>Raiganj</option> <option value='Shahjadpur'>Shahjadpur</option> <option value='SirajganjSadar'>Sirajganj Sadar</option> <option value='Tarash'>Tarash</option> <option value='Ullahpara'>Ullahpara</option>");

                }  else if (val == "Rajshahi") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Bagha'>Bagha</option> <option value='Bagmara'>Bagmara</option> <option value='Charghat'>Charghat</option> <option value='Durgapur'>Durgapur</option> <option value='Godagari'>Godagari</option> <option value='Mohanpur'>Mohanpur</option> <option value='Paba'>Paba</option> <option value='Puthia'>Puthia</option> <option value='Tanore'>Tanore</option>");

                }  else if (val == "Mymensingh") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Trishal'>Trishal</option> <option value='Dhobaura'>Dhobaura</option> <option value='Fulbaria'>Fulbaria</option> <option value='Gafargaon'>Gafargaon</option> <option value='Gauripur'>Gauripur</option> <option value='Haluaghat'>Haluaghat</option> <option value='Ishwarganj'>Ishwarganj</option> <option value='MymensinghSadar'>Mymensingh Sadar</option> <option value='Muktagachha'>Muktagachha</option> <option value='Nandail'>Nandail</option> <option value='Phulpur'>Phulpur</option> <option value='Bhaluka'>Bhaluka</option> <option value='TaraKhanda'>Tara Khanda</option>");

                }  else if (val == "Dhaka") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Dhamrai'>Dhamrai</option> <option value='Dohar'>Dohar</option> <option value='Keraniganj'>Keraniganj</option> <option value='Nawabganj'>Nawabganj</option> <option value='Savar'>Savar</option> <option value='TejgaonCircle'>Tejgaon Circle</option>");

                }  else if (val == "Jamalpur") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Baksiganj'>Baksiganj</option> <option value='Dewanganj'>Dewanganj</option> <option value='Islampur'>Islampur</option> <option value='JamalpurSadar'>Jamalpur Sadar</option> <option value='Madarganj'>Madarganj</option> <option value='Melandaha'>Melandaha</option> <option value='Sarishabari'>Sarishabari</option>");

                }  else if (val == "Netrokona") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Atpara'>Atpara</option> <option value='Barhatta'>Barhatta</option> <option value='Durgapur'>Durgapur</option> <option value='Khaliajuri'>Khaliajuri</option> <option value='Kalmakanda'>Kalmakanda</option> <option value='Kendua'>Kendua</option> <option value='Madan'>Madan</option> <option value='Mohanganj'>Mohanganj</option> <option value='NetrokonaSadar'>Netrokona Sadar</option> <option value='Purbadhala'>Purbadhala</option>");

                }  else if (val == "Sherpur") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Jhenaigati'>Jhenaigati</option> <option value='Nakla'>Nakla</option> <option value='Nalitabari'>Nalitabari</option> <option value='SherpurSadar'>Sherpur Sadar</option> <option value='Sreebardi'>Sreebardi</option>");

                }  else if (val == "Barisal") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Agailjhara'>Agailjhara</option> <option value='Babuganj'>Babuganj</option> <option value='Bakerganj'>Bakerganj</option> <option value='Banaripara'>Banaripara</option> <option value='Gaurnadi'>Gaurnadi</option> <option value='Hizla'>Hizla</option> <option value='BarishalSadar'>Barishal Sadar</option> <option value='Mehendiganj'>Mehendiganj</option> <option value='Muladi'>Muladi</option> <option value='Wazirpur'>Wazirpur</option>");

                }  else if (val == "Barguna") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Amtali'>Amtali</option> <option value='Bamna'>Bamna</option> <option value='BargunaSadar'>Barguna Sadar</option> <option value='Betagi'>Betagi</option> <option value='Patharghata'>Patharghata</option> <option value='Taltali'>Taltali</option>");

                }  else if (val == "Bhola") {
                    
                    $("#bloodDonarUpzilla").html("<option value='BholaSadar'>Bhola Sadar</option> <option value='Burhanuddin'>Burhanuddin</option> <option value='CharFasson'>Char Fasson</option> <option value='Daulatkhan'>Daulatkhan</option> <option value='Lalmohan'>Lalmohan</option> <option value='Manpura'>Manpura</option> <option value='Tazumuddin'>Tazumuddin</option>");

                }  else if (val == "Jhalokati") {
                    
                    $("#bloodDonarUpzilla").html("<option value='JhalokatiSadar'>Jhalokati Sadar</option> <option value='Kathalia'>Kathalia</option> <option value='Nalchity'>Nalchity</option> <option value='Rajapur'>Rajapur</option>");

                }  else if (val == "Patuakhali") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Bauphal'>Bauphal</option> <option value='Dashmina'>Dashmina</option> <option value='Galachipa'>Galachipa</option> <option value='Kalapara'>Kalapara</option> <option value='Mirzaganj'>Mirzaganj</option> <option value='PatuakhaliSadar'>Patuakhali Sadar</option> <option value='Rangabali'>Rangabali</option> <option value='Dumki'>Dumki</option>");

                }  else if (val == "Pirojpur") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Bhandaria'>Bhandaria</option> <option value='Kawkhali'>Kawkhali</option> <option value='Mathbaria'>Mathbaria</option> <option value='Nazirpur'>Nazirpur</option> <option value='PirojpurSadar'>Pirojpur Sadar</option> <option value='NesarabadSwarupkati'>Nesarabad Swarupkati</option> <option value='Indurkani'>Indurkani</option>");

                }  else if (val == "Chittagong") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Anwara'>Anwara</option> <option value='Banshkhali'>Banshkhali</option> <option value='Boalkhali'>Boalkhali</option> <option value='Chandanaish'>Chandanaish</option> <option value='Fatikchhari'>Fatikchhari</option> <option value='Hathazari'>Hathazari</option> <option value='Karnaphuli'>Karnaphuli</option> <option value='Lohagara'>Lohagara</option> <option value='Mirsharai'>Mirsharai</option> <option value='Patiya'>Patiya</option> <option value='Rangunia'>Rangunia</option> <option value='Raozan'>Raozan</option> <option value='Sandwip'>Sandwip</option> <option value='Satkania'>Satkania</option> <option value='Sitakunda'>Sitakunda</option>");

                }  else if (val == "Bandarban") {
                    
                    $("#bloodDonarUpzilla").html("<option value='AliKadam'>Ali Kadam</option> <option value='BandarbanSadar'>Bandarban Sadar</option> <option value='Lama'>Lama</option> <option value='Naikhongchhari'>Naikhongchhari</option> <option value='Rowangchhari'>Rowangchhari</option> <option value='Ruma'>Ruma</option> <option value='Thanchi'>Thanchi</option>");

                }  else if (val == "Brahmanbaria") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Akhaura'>Akhaura</option><option value='Bancharampur'>Bancharampur</option><option value='BrahmanbariaSadar'>Brahmanbaria Sadar</option><option value='Kasba'>Kasba</option><option value='Nabinagar'>Nabinagar</option><option value='Nasirnagar'>Nasirnagar</option><option value='Sarail'>Sarail</option><option value='Ashuganj'>Ashuganj</option><option value='Bijoynagar'>Bijoynagar</option>");

                }  else if (val == "Chandpur") {
                    
                    $("#bloodDonarUpzilla").html("<option value='ChandpurSadar'>Chandpur Sadar</option> <option value='Faridganj'>Faridganj</option> <option value='Haimchar'>Haimchar</option> <option value='Haziganj'>Haziganj</option> <option value='Kachua'>Kachua</option> <option value='MatlabDakshin'>Matlab Dakshin</option> <option value='MatlabUttar'>Matlab Uttar</option> <option value='Shahrasti'>Shahrasti</option>");

                }  else if (val == "Cumilla") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Barura'>Barura</option> <option value='Brahmanpara'>Brahmanpara</option> <option value='Burichang'>Burichang</option> <option value='Chandina'>Chandina</option> <option value='Chauddagram'>Chauddagram</option> <option value='Daudkandi'>Daudkandi</option> <option value='Debidwar'>Debidwar</option> <option value='Homna'>Homna</option> <option value='Laksam'>Laksam</option> <option value='Lalmai'>Lalmai</option> <option value='Muradnagar'>Muradnagar</option> <option value='Nangalkot'>Nangalkot</option> <option value='CumillaAdarshaSadar'>Cumilla Adarsha Sadar</option> <option value='Meghna'>Meghna</option> <option value='Meghna'>Titas</option> <option value='Monohargonj'>Monohargonj</option> <option value='CumillaSadarDakshin'>Cumilla Sadar Dakshin</option>");

                }  else if (val == "CoxsBazar") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Chakaria'>Chakaria</option> <option value='CoxsBazarSadar'>Cox's Bazar Sadar</option> <option value='Kutubdia'>Kutubdia</option> <option value='Maheshkhali'>Maheshkhali</option> <option value='Ramu'>Ramu</option> <option value='Teknaf'>Teknaf</option> <option value='Ukhia'>Ukhia</option> <option value='Pekua'>Pekua</option>");

                }  else if (val == "Feni") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Chhagalnaiya'>Chhagalnaiya</option> <option value='Daganbhuiyan'>Daganbhuiyan</option> <option value='FeniSadar'>Feni Sadar</option> <option value='Parshuram'>Parshuram</option> <option value='Sonagazi'>Sonagazi</option> <option value='Fulgazi'>Fulgazi</option>");

                }  else if (val == "Khagrachhari") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Dighinala'>Dighinala</option> <option value='Khagrachhari'>Khagrachhari</option> <option value='Lakshmichhari'>Lakshmichhari</option> <option value='Mahalchhari'>Mahalchhari</option> <option value='Manikchhari'>Manikchhari</option> <option value='Matiranga'>Matiranga</option> <option value='Panchhari'>Panchhari</option> <option value='Ramgarh'>Ramgarh</option>");

                }  else if (val == "Lakshmipur") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='LakshmipurSadar'>Lakshmipur Sadar</option> <option value='Raipur'>Raipur</option> <option value='Ramganj'>Ramganj</option> <option value='Ramgati'>Ramgati</option> <option value='Kamalnagar'>Kamalnagar</option>");

                }  else if (val == "Noakhali") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Begumganj'>Begumganj</option> <option value='NoakhaliSadar'>Noakhali Sadar</option> <option value='Chatkhil'>Chatkhil</option> <option value='Companiganj'>Companiganj</option> <option value='Hatiya'>Hatiya</option> <option value='Senbagh'>Senbagh</option> <option value='Sonaimuri'>Sonaimuri</option> <option value='Subarnachar'>Subarnachar</option> <option value='Kabirhat'>Kabirhat</option>");

                }  else if (val == "Rangamati") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Bagaichhari'>Bagaichhari</option> <option value='Barkal'>Barkal</option> <option value='KawkhaliBetbunia'>Kawkhali Betbunia</option> <option value='Belaichhari'>Belaichhari</option> <option value='Kaptai'>Kaptai</option> <option value='Juraichhari'>Juraichhari</option> <option value='Langadu'>Langadu</option> <option value='Naniyachar'>Naniyachar</option> <option value='Rajasthali'>Rajasthali</option> <option value='Rangamati'>Rangamati Sadar</option>");

                }  else if (val == "Khulna") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Batiaghata'>Batiaghata</option> <option value='Dacope'>Dacope</option> <option value='Dumuria'>Dumuria</option> <option value='Dighalia'>Dighalia</option> <option value='Koyra'>Koyra</option> <option value='Paikgachha'>Paikgachha</option> <option value='Phultala'>Phultala</option> <option value='Rupsha'>Rupsha</option> <option value='Terokhada'>Terokhada</option>");

                }  else if (val == "Bagerhat") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='BagerhatSadar'>Bagerhat Sadar</option> <option value='Chitalmari'>Chitalmari</option> <option value='Fakirhat'>Fakirhat</option> <option value='Kachua'>Kachua</option> <option value='Mollahat'>Mollahat</option> <option value='Mongla'>Mongla</option> <option value='Morrelganj'>Morrelganj</option> <option value='Rampal'>Rampal</option> <option value='Sarankhola'>Sarankhola</option>");

                }  else if (val == "Chuadanga") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Alamdanga'>Alamdanga</option> <option value='ChuadangaSadar'>Chuadanga Sadar</option> <option value='Damurhuda'>Damurhuda</option> <option value='Jibannagar'>Jibannagar</option>");

                }  else if (val == "Jessore") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Abhaynagar'>Abhaynagar</option> <option value='Bagherpara'>Bagherpara</option> <option value='Chaugachha'>Chaugachha</option> <option value='Jhikargachha'>Jhikargachha</option> <option value='Keshabpur'>Keshabpur</option> <option value='JashoreSadar'>Jashore Sadar</option> <option value='Manirampur'>Manirampur</option> <option value='Sharsha'>Sharsha</option>");

                }  else if (val == "Jhenaidah") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Harinakunda'>Harinakunda</option> <option value='JhenaidahSadar'>Jhenaidah Sadar</option> <option value='Kaliganj'>Kaliganj</option> <option value='Kotchandpur'>Kotchandpur</option> <option value='Maheshpur'>Maheshpur</option> <option value='Shailkupa'>Shailkupa</option>");

                }  else if (val == "Kushtia") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Bheramara'>Bheramara</option> <option value='Daulatpur'>Daulatpur</option> <option value='Khoksa'>Khoksa</option> <option value='Kumarkhali'>Kumarkhali</option> <option value='KushtiaSadar'>Kushtia Sadar</option> <option value='Mirpur'>Mirpur</option>");

                }  else if (val == "Magura") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='MaguraSadar'>Magura Sadar</option> <option value='Sadar'>Mohammadpur</option> <option value='Shalikha'>Shalikha</option> <option value='Sreepur'>Sreepur</option>");

                }  else if (val == "Meherpur") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Gangni'>Gangni</option> <option value='MeherpurSadar'>Meherpur Sadar</option> <option value='Mujibnagar'>Mujibnagar</option>");

                }  else if (val == "Narail") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Kalia'>Kalia</option> <option value='Lohagara'>Lohagara</option> <option value='NarailSadar'>Narail Sadar</option> <option value='NaragatiThana'>Naragati Thana</option>");

                }  else if (val == "Satkhira") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Assasuni'>Assasuni</option> <option value='Debhata'>Debhata</option> <option value='Kalaroa'>Kalaroa</option> <option value='Kaliganj'>Kaliganj</option> <option value='SatkhiraSadar'>Satkhira Sadar</option> <option value='Shyamnagar'>Shyamnagar</option> <option value='Tala'>Tala</option>");

                }  else if (val == "Habiganj") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Ajmiriganj'>Ajmiriganj</option> <option value='Bahubal'>Bahubal</option> <option value='Baniyachong'>Baniyachong</option> <option value='Chunarughat'>Chunarughat</option> <option value='HabiganjSadar'>Habiganj Sadar</option> <option value='Lakhai'>Lakhai</option> <option value='Madhabpur'>Madhabpur</option> <option value='Nabiganj'>Nabiganj</option> <option value='Sayestaganj'>Sayestaganj</option>");

                }  else if (val == "Moulvibazar") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Barlekha'>Barlekha</option> <option value='Juri'>Juri</option> <option value='Kamalganj'>Kamalganj</option> <option value='Kulaura'>Kulaura</option> <option value='Sadar'>Moulvibazar Sadar</option> <option value='Rajnagar'>Rajnagar</option> <option value='Sreemangal'>Sreemangal</option>");

                }  else if (val == "Sunamganj") {
                    
                    $("#bloodDonarUpzilla").html("<option value='Bishwamvarpur'>Bishwamvarpur</option> <option value='Chhatak'>Chhatak</option> <option value='DakshinSunamganj'>Dakshin Sunamganj</option> <option value='Derai'>Derai</option> <option value='Dharamapasha'>Dharamapasha</option> <option value='Dowarabazar'>Dowarabazar</option> <option value='Jagannathpur'>Jagannathpur</option> <option value='Jamalganj'>Jamalganj</option> <option value='Sullah'>Sullah</option> <option value='SunamganjSadar'>Sunamganj Sadar</option> <option value='Tahirpur'>Tahirpur</option>");

                }  else if (val == "Sylhet") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Balaganj'>Balaganj</option> <option value='Beanibazar'>Beanibazar</option> <option value='Bishwanath'>Bishwanath</option> <option value='Companigonj'>Companigonj</option> <option value='DakshinSurma'>Dakshin Surma</option> <option value='Fenchuganj'>Fenchuganj</option> <option value='Golapganj'>Golapganj</option> <option value='Gowainghat'>Gowainghat</option> <option value='Jaintiapur'>Jaintiapur</option> <option value='Kanaighat'>Kanaighat</option> <option value='OsmaniNagar'>Osmani Nagar</option> <option value='SylhetSadar'>Sylhet Sadar</option> <option value='Zakiganj'>Zakiganj</option>");

                }  else if (val == "Rangpur") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Badarganj'>Badarganj</option> <option value='Gangachhara'>Gangachhara</option> <option value='Kaunia'>Kaunia</option> <option value='RangpurSadar'>Rangpur Sadar</option> <option value='Mithapukur'>Mithapukur</option> <option value='Pirgachha'>Pirgachha</option> <option value='Pirganj'>Pirganj</option> <option value='Taraganj'>Taraganj</option>");

                }  else if (val == "Dinajpur") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Birampur'>Birampur</option> <option value='Birganj'>Birganj</option> <option value='Biral'>Biral</option> <option value='Bochaganj'>Bochaganj</option> <option value='Chirirbandar'>Chirirbandar</option> <option value='Phulbari'>Phulbari</option> <option value='Ghoraghat'>Ghoraghat</option> <option value='Hakimpur'>Hakimpur</option> <option value='Kaharole'>Kaharole</option> <option value='Khansama'>Khansama</option> <option value='DinajpurSadar'>Dinajpur Sadar</option> <option value='Nawabganj'>Nawabganj</option> <option value='Parbatipur'>Parbatipur</option>");

                }  else if (val == "Gaibandha") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Phulchhari'>Phulchhari</option> <option value='GaibandhaSadar'>Gaibandha Sadar</option> <option value='Gobindaganj'>Gobindaganj</option> <option value='Palashbari'>Palashbari</option> <option value='Sadullapur'>Sadullapur</option> <option value='Sughatta'>Sughatta</option> <option value='Sundarganj'>Sundarganj</option>");

                }  else if (val == "Kurigram") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Bhurungamari'>Bhurungamari</option> <option value='CharRajibpur'>Char Rajibpur</option> <option value='Chilmari'>Chilmari</option> <option value='Phulbari'>Phulbari</option> <option value='KurigramSadar'>Kurigram Sadar</option> <option value='Nageshwari'>Nageshwari</option> <option value='Rajarhat'>Rajarhat</option> <option value='Raomari'>Raomari</option> <option value='Ulipur'>Ulipur</option>");

                }  else if (val == "Lalmonirhat") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Aditmari'>Aditmari</option> <option value='Hatibandha'>Hatibandha</option> <option value='Kaliganj'>Kaliganj</option> <option value='LalmonirhatSadar'>Lalmonirhat Sadar</option> <option value='Patgram'>Patgram</option>");

                }  else if (val == "Nilphamari") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Dimla'>Dimla</option> <option value='Domar'>Domar</option> <option value='Jaldhaka'>Jaldhaka</option> <option value='Kishoreganj'>Kishoreganj</option> <option value='NilphamariSadar'>Nilphamari Sadar</option> <option value='Saidpur'>Saidpur</option>");

                }  else if (val == "Panchagarh") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Atwari'>Atwari</option> <option value='Boda'>Boda</option> <option value='Debiganj'>Debiganj</option> <option value='PanchagarhSadar'>Panchagarh Sadar</option> <option value='Tetulia'>Tetulia</option>");

                }  else if (val == "Rangpur") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Badarganj'>Badarganj</option> <option value='Gangachhara'>Gangachhara</option> <option value='Kaunia'>Kaunia</option> <option value='RangpurSadar'>Rangpur Sadar</option> <option value='Mithapukur'>Mithapukur</option> <option value='Pirgachha'>Pirgachha</option> <option value='Pirganj'>Pirganj</option> <option value='Taraganj'>Taraganj</option>");

                }  else if (val == "Thakurgaon") {
                    
                    $("#bloodDonarUpzilla").html(" <option value='Baliadangi'>Baliadangi</option> <option value='Haripur'>Haripur</option> <option value='Pirganj'>Pirganj</option> <option value='Ranisankail'>Ranisankail</option> <option value='ThakurgaonSadar'>Thakurgaon Sadar</option>");

                }
            });

        });



        $(document).ready(function(){

            $("#bloodDOnarDIvisionper").change(function(){

            var val = $(this).val();

            if (val == "Dhaka") {

            $("#bloodDonarDistrictper").html("<option value='Dhaka'>Dhaka</option> <option value='faridpur'>Faridpur</option> <option value='gazipur'>Gazipur</option> <option value='gopalganj'>Gopalganj</option> <option value='kishoreganj'>Kishoreganj</option> <option value='madaripur'>Madaripur</option> <option value='Manikganj'>Manikganj</option> <option value='Munshiganj'>Munshiganj</option> <option value='Narayanganj'>Narayanganj</option> <option value='Narsingdi'>Narsingdi</option> <option value='Rajbari'>Rajbari</option> <option value='Shariatpur'>Shariatpur</option>");

            } else if (val == "Rajshahi") {

            $("#bloodDonarDistrictper").html("<option value='Rajshahi'>Rajshahi</option> <option value='Bogura'>Bogura</option> <option value='Joypurhat'>Joypurhat</option> <option value='Naogaon'>Naogaon</option> <option value='Natore'>Natore</option> <option value='Chapainawabganj'>Chapainawabganj</option> <option value='Pabna'>Pabna</option> <option value='Sirajganj'>Sirajganj</option>");

            } else if (val == "Mymensingh") {

            $("#bloodDonarDistrictper").html("<option value='Mymensingh'>Mymensingh</option> <option value='Jamalpur'>Jamalpur</option> <option value='Netrokona'>Netrokona</option> <option value='Sherpur'>Sherpur</option>");

            } else if (val == "Barisal") {

            $("#bloodDonarDistrictper").html("<option value='Barisal'>Barisal</option> <option value='Barguna'>Barguna</option> <option value='Bhola'>Bhola</option> <option value='Jhalokati'>Jhalokati</option> <option value='Patuakhali'>Patuakhali</option> <option value='Pirojpur'>Pirojpur</option>");

            } else if (val == "Chittagong") {

            $("#bloodDonarDistrictper").html("<option value='Chittagong'>Chittagong</option> <option value='Bandarban'>Bandarban</option> <option value='Brahmanbaria'>Brahmanbaria</option> <option value='Chandpur'>Chandpur</option> <option value='Cumilla'>Cumilla</option> <option value='CoxsBazar'>Coxs Bazar</option> <option value='Feni'>Feni</option> <option value='Khagrachhari'>Khagrachhari</option> <option value='Lakshmipur'>Lakshmipur</option> <option value='Noakhali'>Noakhali</option> <option value='Rangamati'>Rangamati</option>");

            } else if (val == "Khulna") {

            $("#bloodDonarDistrictper").html("<option value='Khulna'>Khulna</option> <option value='Bagerhat'>Bagerhat</option> <option value='Chuadanga'>Chuadanga</option> <option value='Jessore'>Jessore</option> <option value='Jhenaidah'>Jhenaidah</option> <option value='Kushtia'>Kushtia</option> <option value='Magura'>Magura</option> <option value='Meherpur'>Meherpur</option> <option value='Narail'>Narail</option> <option value='Satkhira'>Satkhira</option>");

            } else if (val == "Sylhet") {

            $("#bloodDonarDistrictper").html("<option value='Habiganj'>Habiganj</option> <option value='Moulvibazar'>Moulvibazar</option> <option value='Sunamganj'>Sunamganj</option> <option value='Sylhet'>Sylhet</option>");

            } else if (val == "Rangpur") {

            $("#bloodDonarDistrictper").html("<option value='Rangpur'>Rangpur</option> <option value='Dinajpur'>Dinajpur</option> <option value='Gaibandha'>Gaibandha</option> <option value='Kurigram'>Kurigram</option> <option value='Lalmonirhat'>Lalmonirhat</option> <option value='Nilphamari'>Nilphamari</option> <option value='Panchagarh'>Panchagarh</option> <option value='Rangpur'>Rangpur</option> <option value='Thakurgaon'>Thakurgaon</option>");

            }
            });

            $("#bloodDonarDistrictper").change(function(){

                var val = $(this).val();

                if (val == "faridpur") {

                $("#bloodDonarUpzillaper").html("<option value='faridpur'>faridpur</option> <option value='Alfadanga'>Alfadanga</option> <option value='Bhanga'>Bhanga</option> <option value='Boalmari'>Boalmari</option> <option value='Charbhadrasan'>Charbhadrasan</option> <option value='FaridpurSadar'>Faridpur Sadar</option> <option value='Madhukhali'>Madhukhali</option> <option value='Nagarkanda'>Nagarkanda</option> <option value='Sadarpur'>Sadarpur</option> <option value='Saltha'>Saltha</option>");

                }  else if (val == "gazipur") {

                $("#bloodDonarUpzillaper").html("<option value='gazipur'>Gazipur</option> <option value='GazipurSadar'>Gazipur Sadar</option> <option value='Kaliakair'>Kaliakair</option> <option value='Kaliganj'>Kaliganj</option> <option value='Kapasia'>Kapasia</option> <option value='Sreepur'>Sreepur</option>");

                }  else if (val == "gopalganj") {

                $("#bloodDonarUpzillaper").html("<option value='gopalganj'>Gopalganj</option> <option value='GopalganjSadar'>Gopalganj Sadar</option> <option value='Kashiani'>Kashiani</option> <option value='Kotalipara'>Kotalipara</option> <option value='Muksudpur'>Muksudpur</option> <option value='Tungipara'>Tungipara</option>");

                }  else if (val == "kishoreganj") {

                $("#bloodDonarUpzillaper").html("<option value='kishoreganj'>kishoreganj</option> <option value='Austagram'>Austagram</option> <option value='Bajitpur'>Bajitpur</option> <option value='Bhairab'>Bhairab</option> <option value='Hossainpur'>Hossainpur</option> <option value='Itna'>Itna</option> <option value='Karimganj'>Karimganj</option> <option value='Katiadi'>Katiadi</option> <option value='KishoreganjSadar'>Kishoreganj Sadar</option> <option value='Kuliarchar'>Kuliarchar</option> <option value='Mithamain'>Mithamain</option> <option value='Nikli'>Nikli</option> <option value='Pakundia'>Pakundia</option> <option value='Tarail'>Tarail</option> ");

                }  else if (val == "madaripur") {

                $("#bloodDonarUpzillaper").html("<option value='madaripur'>madaripur</option> <option value='Rajoir'>Rajoir</option> <option value='MadaripurSadar'>Madaripur Sadar</option> <option value='Kalkini'>Kalkini</option> <option value='Shibchar'>Shibchar</option>");

                }  else if (val == "Manikganj") {

                $("#bloodDonarUpzillaper").html("<option value='Manikganj'>Manikganj</option> <option value='Daulatpur'>Daulatpur</option> <option value='Ghior'>Ghior</option> <option value='Harirampur'>Harirampur</option> <option value='ManikgonjSadar'>Manikgonj Sadar</option> <option value='Saturia'>Saturia</option> <option value='Shivalaya'>Shivalaya</option> <option value='Singair'>Singair</option>");

                }  else if (val == "Munshiganj") {

                $("#bloodDonarUpzillaper").html("<option value='Munshiganj'>Munshiganj</option> <option value='Gazaria'>Gazaria</option> <option value='Lohajang'>Lohajang</option> <option value='Munshiganj'>Munshiganj Sadar</option> <option value='Sirajdikhan'>Sirajdikhan</option> <option value='Sreenagar'>Sreenagar</option> <option value='Tongibari'>Tongibari</option>");

                }  else if (val == "Narayanganj") {

                $("#bloodDonarUpzillaper").html("<option value='Narayanganj'>Narayanganj</option> <option value='Araihazar'>Araihazar</option> <option value='Bandar'>Bandar</option> <option value='NarayanganjSadar'>Narayanganj Sadar</option> <option value='MunshiganjRupganj'>Rupganj</option> <option value='MunshiganjSonargaon'>Sonargaon</option>");

                }  else if (val == "Narsingdi") {

                $("#bloodDonarUpzillaper").html("<option value='Narsingdi'>Narsingdi</option> <option value='NarsingdiSadar'>Narsingdi Sadar</option> <option value='Belabo'>Belabo</option> <option value='Monohardi'>Monohardi</option> <option value='Palash'>Palash</option> <option value='Raipura'>Raipura</option> <option value='Shibpur'>Shibpur</option>");

                }  else if (val == "Rajbari") {

                $("#bloodDonarUpzillaper").html("<option value='Rajbari'>Rajbari</option> <option value='Baliakandi'>Baliakandi</option> <option value='Goalandaghat'>Goalandaghat</option> <option value='Pangsha'>Pangsha</option> <option value='RajbariSadar'>Rajbari Sadar</option> <option value='Kalukhali'>Kalukhali</option>");

                }  else if (val == "Shariatpur") {

                $("#bloodDonarUpzillaper").html("<option value='Shariatpur'>Shariatpur</option> <option value='Bhedarganj'>Bhedarganj</option> <option value='Damudya'>Damudya</option> <option value='Gosairhat'>Gosairhat</option> <option value='Naria'>Naria</option> <option value='ShariatpurSadar'>Shariatpur Sadar</option> <option value='Zajira'>Zajira</option> <option value='Shakhipur'>Shakhipur</option>");

                }  else if (val == "Bogura") {

                $("#bloodDonarUpzillaper").html("<option value='Bogura'>Bogura</option> <option value='Adamdighi'>Adamdighi</option> <option value='BoguraSadar'>Bogura Sadar</option> <option value='Dhunat'>Dhunat</option> <option value='Dhupchanchia'>Dhupchanchia</option> <option value='Gabtali'>Gabtali</option> <option value='Kahaloo'>Kahaloo</option> <option value='Nandigram'>Nandigram</option> <option value='Sariakandi'>Sariakandi</option> <option value='Shajahanpur'>Shajahanpur</option> <option value='Sherpur'>Sherpur</option> <option value='Shibganj'>Shibganj</option> <option value='Sonatola'>Sonatola</option>");

                }  else if (val == "Joypurhat") {

                $("#bloodDonarUpzillaper").html("<option value='Joypurhat'>Joypurhat</option> <option value='Akkelpur'>Akkelpur</option> <option value='JoypurhatSadar'>Joypurhat Sadar</option> <option value='Kalai'>Kalai</option> <option value='Khetlal'>Khetlal</option> <option value='Panchbibi'>Panchbibi</option>");

                }  else if (val == "Naogaon") {

                $("#bloodDonarUpzillaper").html("<option value='Naogaon'>Naogaon</option> <option value='Atrai'>Atrai</option> <option value='Badalgachhi'>Badalgachhi</option> <option value='Manda'>Manda</option> <option value='Dhamoirhat'>Dhamoirhat</option> <option value='Mohadevpur'>Mohadevpur</option> <option value='NaogaonSadar'>Naogaon Sadar</option> <option value='Niamatpur'>Niamatpur</option> <option value='Patnitala'>Patnitala</option> <option value='Porsha'>Porsha</option> <option value='Raninagar'>Raninagar</option> <option value='Sapahar'>Sapahar</option>");

                }  else if (val == "Natore") {

                $("#bloodDonarUpzillaper").html("<option value='Natore'>Natore</option> <option value='Bagatipara'>Bagatipara</option> <option value='Baraigram'>Baraigram</option> <option value='Gurudaspur'>Gurudaspur</option> <option value='Lalpur'>Lalpur</option> <option value='NatoreSadar'>Natore Sadar</option> <option value='Singra'>Singra</option> <option value='Naldanga'>Naldanga</option>");

                }  else if (val == "Chapainawabganj") {

                $("#bloodDonarUpzillaper").html("<option value='Chapainawabganj'>Chapainawabganj</option> <option value='Bholahat'>Bholahat</option> <option value='ChapaiNawabganjSadar'>Chapai Nawabganj Sadar</option> <option value='Dogachi'>Dogachi</option> <option value='Gomostapur'>Gomostapur</option> <option value='Nachol'>Nachol</option>");

                }  else if (val == "Pabna") {

                $("#bloodDonarUpzillaper").html("<option value='Pabna'>Pabna</option> <option value='Atgharia'>Atgharia</option> <option value='Bera'>Bera</option> <option value='Bhangura'>Bhangura</option> <option value='Chatmohar'>Chatmohar</option> <option value='Faridpur'>Faridpur</option> <option value='Ishwardi'>Ishwardi</option> <option value='PabnaSadar'>Pabna Sadar</option> <option value='Santhia'>Santhia</option> <option value='Sujanagar'>Sujanagar</option>");

                }  else if (val == "Sirajganj") {

                $("#bloodDonarUpzillaper").html("<option value='Sirajganj'>Sirajganj</option> <option value='Belkuchi'>Belkuchi</option> <option value='Chauhali'>Chauhali</option> <option value='Kamarkhanda'>Kamarkhanda</option> <option value='Kazipur'>Kazipur</option> <option value='Raiganj'>Raiganj</option> <option value='Shahjadpur'>Shahjadpur</option> <option value='SirajganjSadar'>Sirajganj Sadar</option> <option value='Tarash'>Tarash</option> <option value='Ullahpara'>Ullahpara</option>");

                }  else if (val == "Rajshahi") {

                $("#bloodDonarUpzillaper").html("<option value='Bagha'>Bagha</option> <option value='Bagmara'>Bagmara</option> <option value='Charghat'>Charghat</option> <option value='Durgapur'>Durgapur</option> <option value='Godagari'>Godagari</option> <option value='Mohanpur'>Mohanpur</option> <option value='Paba'>Paba</option> <option value='Puthia'>Puthia</option> <option value='Tanore'>Tanore</option>");

                }  else if (val == "Mymensingh") {

                $("#bloodDonarUpzillaper").html("<option value='Trishal'>Trishal</option> <option value='Dhobaura'>Dhobaura</option> <option value='Fulbaria'>Fulbaria</option> <option value='Gafargaon'>Gafargaon</option> <option value='Gauripur'>Gauripur</option> <option value='Haluaghat'>Haluaghat</option> <option value='Ishwarganj'>Ishwarganj</option> <option value='MymensinghSadar'>Mymensingh Sadar</option> <option value='Muktagachha'>Muktagachha</option> <option value='Nandail'>Nandail</option> <option value='Phulpur'>Phulpur</option> <option value='Bhaluka'>Bhaluka</option> <option value='TaraKhanda'>Tara Khanda</option>");

                }  else if (val == "Dhaka") {

                $("#bloodDonarUpzillaper").html("<option value='Dhamrai'>Dhamrai</option> <option value='Dohar'>Dohar</option> <option value='Keraniganj'>Keraniganj</option> <option value='Nawabganj'>Nawabganj</option> <option value='Savar'>Savar</option> <option value='TejgaonCircle'>Tejgaon Circle</option>");

                }  else if (val == "Jamalpur") {

                $("#bloodDonarUpzillaper").html("<option value='Baksiganj'>Baksiganj</option> <option value='Dewanganj'>Dewanganj</option> <option value='Islampur'>Islampur</option> <option value='JamalpurSadar'>Jamalpur Sadar</option> <option value='Madarganj'>Madarganj</option> <option value='Melandaha'>Melandaha</option> <option value='Sarishabari'>Sarishabari</option>");

                }  else if (val == "Netrokona") {

                $("#bloodDonarUpzillaper").html("<option value='Atpara'>Atpara</option> <option value='Barhatta'>Barhatta</option> <option value='Durgapur'>Durgapur</option> <option value='Khaliajuri'>Khaliajuri</option> <option value='Kalmakanda'>Kalmakanda</option> <option value='Kendua'>Kendua</option> <option value='Madan'>Madan</option> <option value='Mohanganj'>Mohanganj</option> <option value='NetrokonaSadar'>Netrokona Sadar</option> <option value='Purbadhala'>Purbadhala</option>");

                }  else if (val == "Sherpur") {

                $("#bloodDonarUpzillaper").html("<option value='Jhenaigati'>Jhenaigati</option> <option value='Nakla'>Nakla</option> <option value='Nalitabari'>Nalitabari</option> <option value='SherpurSadar'>Sherpur Sadar</option> <option value='Sreebardi'>Sreebardi</option>");

                }  else if (val == "Barisal") {

                $("#bloodDonarUpzillaper").html("<option value='Agailjhara'>Agailjhara</option> <option value='Babuganj'>Babuganj</option> <option value='Bakerganj'>Bakerganj</option> <option value='Banaripara'>Banaripara</option> <option value='Gaurnadi'>Gaurnadi</option> <option value='Hizla'>Hizla</option> <option value='BarishalSadar'>Barishal Sadar</option> <option value='Mehendiganj'>Mehendiganj</option> <option value='Muladi'>Muladi</option> <option value='Wazirpur'>Wazirpur</option>");

                }  else if (val == "Barguna") {

                $("#bloodDonarUpzillaper").html("<option value='Amtali'>Amtali</option> <option value='Bamna'>Bamna</option> <option value='BargunaSadar'>Barguna Sadar</option> <option value='Betagi'>Betagi</option> <option value='Patharghata'>Patharghata</option> <option value='Taltali'>Taltali</option>");

                }  else if (val == "Bhola") {

                $("#bloodDonarUpzillaper").html("<option value='BholaSadar'>Bhola Sadar</option> <option value='Burhanuddin'>Burhanuddin</option> <option value='CharFasson'>Char Fasson</option> <option value='Daulatkhan'>Daulatkhan</option> <option value='Lalmohan'>Lalmohan</option> <option value='Manpura'>Manpura</option> <option value='Tazumuddin'>Tazumuddin</option>");

                }  else if (val == "Jhalokati") {

                $("#bloodDonarUpzillaper").html("<option value='JhalokatiSadar'>Jhalokati Sadar</option> <option value='Kathalia'>Kathalia</option> <option value='Nalchity'>Nalchity</option> <option value='Rajapur'>Rajapur</option>");

                }  else if (val == "Patuakhali") {

                $("#bloodDonarUpzillaper").html("<option value='Bauphal'>Bauphal</option> <option value='Dashmina'>Dashmina</option> <option value='Galachipa'>Galachipa</option> <option value='Kalapara'>Kalapara</option> <option value='Mirzaganj'>Mirzaganj</option> <option value='PatuakhaliSadar'>Patuakhali Sadar</option> <option value='Rangabali'>Rangabali</option> <option value='Dumki'>Dumki</option>");

                }  else if (val == "Pirojpur") {

                $("#bloodDonarUpzillaper").html("<option value='Bhandaria'>Bhandaria</option> <option value='Kawkhali'>Kawkhali</option> <option value='Mathbaria'>Mathbaria</option> <option value='Nazirpur'>Nazirpur</option> <option value='PirojpurSadar'>Pirojpur Sadar</option> <option value='NesarabadSwarupkati'>Nesarabad Swarupkati</option> <option value='Indurkani'>Indurkani</option>");

                }  else if (val == "Chittagong") {

                $("#bloodDonarUpzillaper").html("<option value='Anwara'>Anwara</option> <option value='Banshkhali'>Banshkhali</option> <option value='Boalkhali'>Boalkhali</option> <option value='Chandanaish'>Chandanaish</option> <option value='Fatikchhari'>Fatikchhari</option> <option value='Hathazari'>Hathazari</option> <option value='Karnaphuli'>Karnaphuli</option> <option value='Lohagara'>Lohagara</option> <option value='Mirsharai'>Mirsharai</option> <option value='Patiya'>Patiya</option> <option value='Rangunia'>Rangunia</option> <option value='Raozan'>Raozan</option> <option value='Sandwip'>Sandwip</option> <option value='Satkania'>Satkania</option> <option value='Sitakunda'>Sitakunda</option>");

                }  else if (val == "Bandarban") {

                $("#bloodDonarUpzillaper").html("<option value='AliKadam'>Ali Kadam</option> <option value='BandarbanSadar'>Bandarban Sadar</option> <option value='Lama'>Lama</option> <option value='Naikhongchhari'>Naikhongchhari</option> <option value='Rowangchhari'>Rowangchhari</option> <option value='Ruma'>Ruma</option> <option value='Thanchi'>Thanchi</option>");

                }  else if (val == "Brahmanbaria") {

                $("#bloodDonarUpzillaper").html("<option value='Akhaura'>Akhaura</option><option value='Bancharampur'>Bancharampur</option><option value='BrahmanbariaSadar'>Brahmanbaria Sadar</option><option value='Kasba'>Kasba</option><option value='Nabinagar'>Nabinagar</option><option value='Nasirnagar'>Nasirnagar</option><option value='Sarail'>Sarail</option><option value='Ashuganj'>Ashuganj</option><option value='Bijoynagar'>Bijoynagar</option>");

                }  else if (val == "Chandpur") {

                $("#bloodDonarUpzillaper").html("<option value='ChandpurSadar'>Chandpur Sadar</option> <option value='Faridganj'>Faridganj</option> <option value='Haimchar'>Haimchar</option> <option value='Haziganj'>Haziganj</option> <option value='Kachua'>Kachua</option> <option value='MatlabDakshin'>Matlab Dakshin</option> <option value='MatlabUttar'>Matlab Uttar</option> <option value='Shahrasti'>Shahrasti</option>");

                }  else if (val == "Cumilla") {

                $("#bloodDonarUpzillaper").html(" <option value='Barura'>Barura</option> <option value='Brahmanpara'>Brahmanpara</option> <option value='Burichang'>Burichang</option> <option value='Chandina'>Chandina</option> <option value='Chauddagram'>Chauddagram</option> <option value='Daudkandi'>Daudkandi</option> <option value='Debidwar'>Debidwar</option> <option value='Homna'>Homna</option> <option value='Laksam'>Laksam</option> <option value='Lalmai'>Lalmai</option> <option value='Muradnagar'>Muradnagar</option> <option value='Nangalkot'>Nangalkot</option> <option value='CumillaAdarshaSadar'>Cumilla Adarsha Sadar</option> <option value='Meghna'>Meghna</option> <option value='Meghna'>Titas</option> <option value='Monohargonj'>Monohargonj</option> <option value='CumillaSadarDakshin'>Cumilla Sadar Dakshin</option>");

                }  else if (val == "CoxsBazar") {

                $("#bloodDonarUpzillaper").html(" <option value='Chakaria'>Chakaria</option> <option value='CoxsBazarSadar'>Cox's Bazar Sadar</option> <option value='Kutubdia'>Kutubdia</option> <option value='Maheshkhali'>Maheshkhali</option> <option value='Ramu'>Ramu</option> <option value='Teknaf'>Teknaf</option> <option value='Ukhia'>Ukhia</option> <option value='Pekua'>Pekua</option>");

                }  else if (val == "Feni") {

                $("#bloodDonarUpzillaper").html(" <option value='Chhagalnaiya'>Chhagalnaiya</option> <option value='Daganbhuiyan'>Daganbhuiyan</option> <option value='FeniSadar'>Feni Sadar</option> <option value='Parshuram'>Parshuram</option> <option value='Sonagazi'>Sonagazi</option> <option value='Fulgazi'>Fulgazi</option>");

                }  else if (val == "Khagrachhari") {

                $("#bloodDonarUpzillaper").html(" <option value='Dighinala'>Dighinala</option> <option value='Khagrachhari'>Khagrachhari</option> <option value='Lakshmichhari'>Lakshmichhari</option> <option value='Mahalchhari'>Mahalchhari</option> <option value='Manikchhari'>Manikchhari</option> <option value='Matiranga'>Matiranga</option> <option value='Panchhari'>Panchhari</option> <option value='Ramgarh'>Ramgarh</option>");

                }  else if (val == "Lakshmipur") {

                $("#bloodDonarUpzillaper").html(" <option value='LakshmipurSadar'>Lakshmipur Sadar</option> <option value='Raipur'>Raipur</option> <option value='Ramganj'>Ramganj</option> <option value='Ramgati'>Ramgati</option> <option value='Kamalnagar'>Kamalnagar</option>");

                }  else if (val == "Noakhali") {

                $("#bloodDonarUpzillaper").html("<option value='Begumganj'>Begumganj</option> <option value='NoakhaliSadar'>Noakhali Sadar</option> <option value='Chatkhil'>Chatkhil</option> <option value='Companiganj'>Companiganj</option> <option value='Hatiya'>Hatiya</option> <option value='Senbagh'>Senbagh</option> <option value='Sonaimuri'>Sonaimuri</option> <option value='Subarnachar'>Subarnachar</option> <option value='Kabirhat'>Kabirhat</option>");

                }  else if (val == "Rangamati") {

                $("#bloodDonarUpzillaper").html("<option value='Bagaichhari'>Bagaichhari</option> <option value='Barkal'>Barkal</option> <option value='KawkhaliBetbunia'>Kawkhali Betbunia</option> <option value='Belaichhari'>Belaichhari</option> <option value='Kaptai'>Kaptai</option> <option value='Juraichhari'>Juraichhari</option> <option value='Langadu'>Langadu</option> <option value='Naniyachar'>Naniyachar</option> <option value='Rajasthali'>Rajasthali</option> <option value='Rangamati'>Rangamati Sadar</option>");

                }  else if (val == "Khulna") {

                $("#bloodDonarUpzillaper").html(" <option value='Batiaghata'>Batiaghata</option> <option value='Dacope'>Dacope</option> <option value='Dumuria'>Dumuria</option> <option value='Dighalia'>Dighalia</option> <option value='Koyra'>Koyra</option> <option value='Paikgachha'>Paikgachha</option> <option value='Phultala'>Phultala</option> <option value='Rupsha'>Rupsha</option> <option value='Terokhada'>Terokhada</option>");

                }  else if (val == "Bagerhat") {

                $("#bloodDonarUpzillaper").html(" <option value='BagerhatSadar'>Bagerhat Sadar</option> <option value='Chitalmari'>Chitalmari</option> <option value='Fakirhat'>Fakirhat</option> <option value='Kachua'>Kachua</option> <option value='Mollahat'>Mollahat</option> <option value='Mongla'>Mongla</option> <option value='Morrelganj'>Morrelganj</option> <option value='Rampal'>Rampal</option> <option value='Sarankhola'>Sarankhola</option>");

                }  else if (val == "Chuadanga") {

                $("#bloodDonarUpzillaper").html(" <option value='Alamdanga'>Alamdanga</option> <option value='ChuadangaSadar'>Chuadanga Sadar</option> <option value='Damurhuda'>Damurhuda</option> <option value='Jibannagar'>Jibannagar</option>");

                }  else if (val == "Jessore") {

                $("#bloodDonarUpzillaper").html(" <option value='Abhaynagar'>Abhaynagar</option> <option value='Bagherpara'>Bagherpara</option> <option value='Chaugachha'>Chaugachha</option> <option value='Jhikargachha'>Jhikargachha</option> <option value='Keshabpur'>Keshabpur</option> <option value='JashoreSadar'>Jashore Sadar</option> <option value='Manirampur'>Manirampur</option> <option value='Sharsha'>Sharsha</option>");

                }  else if (val == "Jhenaidah") {

                $("#bloodDonarUpzillaper").html(" <option value='Harinakunda'>Harinakunda</option> <option value='JhenaidahSadar'>Jhenaidah Sadar</option> <option value='Kaliganj'>Kaliganj</option> <option value='Kotchandpur'>Kotchandpur</option> <option value='Maheshpur'>Maheshpur</option> <option value='Shailkupa'>Shailkupa</option>");

                }  else if (val == "Kushtia") {

                $("#bloodDonarUpzillaper").html(" <option value='Bheramara'>Bheramara</option> <option value='Daulatpur'>Daulatpur</option> <option value='Khoksa'>Khoksa</option> <option value='Kumarkhali'>Kumarkhali</option> <option value='KushtiaSadar'>Kushtia Sadar</option> <option value='Mirpur'>Mirpur</option>");

                }  else if (val == "Magura") {

                $("#bloodDonarUpzillaper").html(" <option value='MaguraSadar'>Magura Sadar</option> <option value='Sadar'>Mohammadpur</option> <option value='Shalikha'>Shalikha</option> <option value='Sreepur'>Sreepur</option>");

                }  else if (val == "Meherpur") {

                $("#bloodDonarUpzillaper").html(" <option value='Gangni'>Gangni</option> <option value='MeherpurSadar'>Meherpur Sadar</option> <option value='Mujibnagar'>Mujibnagar</option>");

                }  else if (val == "Narail") {

                $("#bloodDonarUpzillaper").html(" <option value='Kalia'>Kalia</option> <option value='Lohagara'>Lohagara</option> <option value='NarailSadar'>Narail Sadar</option> <option value='NaragatiThana'>Naragati Thana</option>");

                }  else if (val == "Satkhira") {

                $("#bloodDonarUpzillaper").html(" <option value='Assasuni'>Assasuni</option> <option value='Debhata'>Debhata</option> <option value='Kalaroa'>Kalaroa</option> <option value='Kaliganj'>Kaliganj</option> <option value='SatkhiraSadar'>Satkhira Sadar</option> <option value='Shyamnagar'>Shyamnagar</option> <option value='Tala'>Tala</option>");

                }  else if (val == "Habiganj") {

                $("#bloodDonarUpzillaper").html(" <option value='Ajmiriganj'>Ajmiriganj</option> <option value='Bahubal'>Bahubal</option> <option value='Baniyachong'>Baniyachong</option> <option value='Chunarughat'>Chunarughat</option> <option value='HabiganjSadar'>Habiganj Sadar</option> <option value='Lakhai'>Lakhai</option> <option value='Madhabpur'>Madhabpur</option> <option value='Nabiganj'>Nabiganj</option> <option value='Sayestaganj'>Sayestaganj</option>");

                }  else if (val == "Moulvibazar") {

                $("#bloodDonarUpzillaper").html(" <option value='Barlekha'>Barlekha</option> <option value='Juri'>Juri</option> <option value='Kamalganj'>Kamalganj</option> <option value='Kulaura'>Kulaura</option> <option value='Sadar'>Moulvibazar Sadar</option> <option value='Rajnagar'>Rajnagar</option> <option value='Sreemangal'>Sreemangal</option>");

                }  else if (val == "Sunamganj") {

                $("#bloodDonarUpzillaper").html("<option value='Bishwamvarpur'>Bishwamvarpur</option> <option value='Chhatak'>Chhatak</option> <option value='DakshinSunamganj'>Dakshin Sunamganj</option> <option value='Derai'>Derai</option> <option value='Dharamapasha'>Dharamapasha</option> <option value='Dowarabazar'>Dowarabazar</option> <option value='Jagannathpur'>Jagannathpur</option> <option value='Jamalganj'>Jamalganj</option> <option value='Sullah'>Sullah</option> <option value='SunamganjSadar'>Sunamganj Sadar</option> <option value='Tahirpur'>Tahirpur</option>");

                }  else if (val == "Sylhet") {

                $("#bloodDonarUpzillaper").html(" <option value='Balaganj'>Balaganj</option> <option value='Beanibazar'>Beanibazar</option> <option value='Bishwanath'>Bishwanath</option> <option value='Companigonj'>Companigonj</option> <option value='DakshinSurma'>Dakshin Surma</option> <option value='Fenchuganj'>Fenchuganj</option> <option value='Golapganj'>Golapganj</option> <option value='Gowainghat'>Gowainghat</option> <option value='Jaintiapur'>Jaintiapur</option> <option value='Kanaighat'>Kanaighat</option> <option value='OsmaniNagar'>Osmani Nagar</option> <option value='SylhetSadar'>Sylhet Sadar</option> <option value='Zakiganj'>Zakiganj</option>");

                }  else if (val == "Rangpur") {

                $("#bloodDonarUpzillaper").html(" <option value='Badarganj'>Badarganj</option> <option value='Gangachhara'>Gangachhara</option> <option value='Kaunia'>Kaunia</option> <option value='RangpurSadar'>Rangpur Sadar</option> <option value='Mithapukur'>Mithapukur</option> <option value='Pirgachha'>Pirgachha</option> <option value='Pirganj'>Pirganj</option> <option value='Taraganj'>Taraganj</option>");

                }  else if (val == "Dinajpur") {

                $("#bloodDonarUpzillaper").html(" <option value='Birampur'>Birampur</option> <option value='Birganj'>Birganj</option> <option value='Biral'>Biral</option> <option value='Bochaganj'>Bochaganj</option> <option value='Chirirbandar'>Chirirbandar</option> <option value='Phulbari'>Phulbari</option> <option value='Ghoraghat'>Ghoraghat</option> <option value='Hakimpur'>Hakimpur</option> <option value='Kaharole'>Kaharole</option> <option value='Khansama'>Khansama</option> <option value='DinajpurSadar'>Dinajpur Sadar</option> <option value='Nawabganj'>Nawabganj</option> <option value='Parbatipur'>Parbatipur</option>");

                }  else if (val == "Gaibandha") {

                $("#bloodDonarUpzillaper").html(" <option value='Phulchhari'>Phulchhari</option> <option value='GaibandhaSadar'>Gaibandha Sadar</option> <option value='Gobindaganj'>Gobindaganj</option> <option value='Palashbari'>Palashbari</option> <option value='Sadullapur'>Sadullapur</option> <option value='Sughatta'>Sughatta</option> <option value='Sundarganj'>Sundarganj</option>");

                }  else if (val == "Kurigram") {

                $("#bloodDonarUpzillaper").html(" <option value='Bhurungamari'>Bhurungamari</option> <option value='CharRajibpur'>Char Rajibpur</option> <option value='Chilmari'>Chilmari</option> <option value='Phulbari'>Phulbari</option> <option value='KurigramSadar'>Kurigram Sadar</option> <option value='Nageshwari'>Nageshwari</option> <option value='Rajarhat'>Rajarhat</option> <option value='Raomari'>Raomari</option> <option value='Ulipur'>Ulipur</option>");

                }  else if (val == "Lalmonirhat") {

                $("#bloodDonarUpzillaper").html(" <option value='Aditmari'>Aditmari</option> <option value='Hatibandha'>Hatibandha</option> <option value='Kaliganj'>Kaliganj</option> <option value='LalmonirhatSadar'>Lalmonirhat Sadar</option> <option value='Patgram'>Patgram</option>");

                }  else if (val == "Nilphamari") {

                $("#bloodDonarUpzillaper").html(" <option value='Dimla'>Dimla</option> <option value='Domar'>Domar</option> <option value='Jaldhaka'>Jaldhaka</option> <option value='Kishoreganj'>Kishoreganj</option> <option value='NilphamariSadar'>Nilphamari Sadar</option> <option value='Saidpur'>Saidpur</option>");

                }  else if (val == "Panchagarh") {

                $("#bloodDonarUpzillaper").html(" <option value='Atwari'>Atwari</option> <option value='Boda'>Boda</option> <option value='Debiganj'>Debiganj</option> <option value='PanchagarhSadar'>Panchagarh Sadar</option> <option value='Tetulia'>Tetulia</option>");

                }  else if (val == "Rangpur") {

                $("#bloodDonarUpzillaper").html(" <option value='Badarganj'>Badarganj</option> <option value='Gangachhara'>Gangachhara</option> <option value='Kaunia'>Kaunia</option> <option value='RangpurSadar'>Rangpur Sadar</option> <option value='Mithapukur'>Mithapukur</option> <option value='Pirgachha'>Pirgachha</option> <option value='Pirganj'>Pirganj</option> <option value='Taraganj'>Taraganj</option>");

                }  else if (val == "Thakurgaon") {

                $("#bloodDonarUpzillaper").html(" <option value='Baliadangi'>Baliadangi</option> <option value='Haripur'>Haripur</option> <option value='Pirganj'>Pirganj</option> <option value='Ranisankail'>Ranisankail</option> <option value='ThakurgaonSadar'>Thakurgaon Sadar</option>");

                }
            });

        });


    </script>


    <?php endwhile; ?>
    <?php else: ?>
    <p class="no-data">
        <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
    </p>
<?php endif; ?>

<?php get_footer();?>
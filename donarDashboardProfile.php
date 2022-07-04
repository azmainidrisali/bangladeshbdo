<?php /* Template Name: Donar Dashboard profile */
    get_header();
    global $bangladeshbdooption, $current_user, $wp_roles;

?>

<main>

    <div class="container">
        <?php

            if( get_the_author_meta( 'first_name', $current_user->ID ) !== '' && get_the_author_meta( 'last_name', $current_user->ID ) !== ''){
                ?>
                    <div class="profileBody">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="ProfileInfoBody">
                                    <div class="userProfile">
                                        <div class="profileimg">
                                            <?php global $userdata; echo get_avatar($userdata->ID, 60); ?>
                                        </div>
                                        <div class="ProfileUserName">
                                        
                                            <h1><?php the_author_meta( 'first_name', $current_user->ID ); ?> <?php the_author_meta( 'last_name', $current_user->ID ); ?></h1>
                                        </div>
                                        <div class="personalInfo">
                                            <ul>
                                                <li><i class="fas fa-weight"></i> <?php the_author_meta( 'donar_weight', $current_user->ID ); ?> kg</li>
                                                <li><i class="fas fa-calendar-week"></i> <?php the_author_meta( 'donar_age', $current_user->ID ); ?></li>
                                                <li><i class="fas fa-venus-mars"></i> <?php the_author_meta( 'donar_gender', $current_user->ID ); ?></li>
                                                <li><i class="fas fa-tint"></i> <?php the_author_meta( 'donar_blood_group', $current_user->ID ); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="presentAddress">
                                        <div class="presentAddressTitle">
                                            <h1><i class="fas fa-map-marked-alt"></i> PRESENT ADDRESS</h1>
                                        </div>
                                        <ul>
                                            <li><?php the_author_meta( 'donar_Presentdivision', $current_user->ID ); ?></li>
                                            <li><?php the_author_meta( 'donar_Presentdistrict', $current_user->ID ); ?></li>
                                            <li><?php the_author_meta( 'donar_Presentzilla', $current_user->ID ); ?></li>
                                            <li><?php the_author_meta( 'donar_Presentupzilla', $current_user->ID ); ?></li>
                                        </ul>
                                        <p><?php the_author_meta( 'donar_PresentFullAddress', $current_user->ID ); ?></p>
                                    </div>
                                    <div class="PermanentAddress">
                                        <div class="PermanentAddressTitle">
                                            <h1><i class="fas fa-map-marked-alt"></i> PERMANENT ADDRESS</h1>
                                        </div>
                                        <ul>
                                            <li><?php the_author_meta( 'donar_Permanentdivision', $current_user->ID ); ?></li>
                                            <li><?php the_author_meta( 'donar_Permanentdistrict', $current_user->ID ); ?></li>
                                            <li><?php the_author_meta( 'donar_Permanentzilla', $current_user->ID ); ?></li>
                                            <li><?php the_author_meta( 'donar_Permanentupzilla', $current_user->ID ); ?></li>
                                        </ul>
                                        <p><?php the_author_meta( 'donar_PermanentFullAddress', $current_user->ID ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <?php
                                    $my_query = new WP_Query( array(
                                        'post_type' => 'bangladesh_bdo_donar',
                                        'author' => get_current_user_id(),
                                        'post_status' => array(
                                            'publish',
                                            'draft',
                                        )
                                    ));
                                    
                                    if ( $my_query->have_posts() ) {
                                        ?>
                                            <!-- <div class="achivementBody">
                                                <div class="achivement1 owl-carousel">
                                                    <div class="item">
                                                        <div class="AchivementSingle">
                                                            <div class="AchivementSingleBody">
                                                                <i class="fas fa-medal"></i>
                                                                <h1>SHERA ROKTO DATA</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="AchivementSingle">
                                                            <div class="AchivementSingleBody">
                                                                <i class="fas fa-medal"></i>
                                                                <h1>SHERA ROKTO DATA</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <?php

                                            $query = new WP_Query( array(
                                                'post_type' => 'bangladesh_bdo_donar',
                                                'author' => get_current_user_id(),
                                                'post_status' => array(
                                                    'publish',
                                                    'pending',
                                                    'draft',
                                                    'private',
                                                    'trash'
                                                )
                                            ) );

                                            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                                    <div class="donationStatusBody">
                                                        <div class="donationAfter">
                                                                <div class="donationStatus">
                                                                <form action="" method="POST" >
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                                    Launch demo modal
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                            <select name="selectDonar" id="donar">
                                                                                <option value="draft">Take a break</option>
                                                                                <option value="publish">Iam active</option>
                                                                            </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <input type="submit" value="done">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <select name="selectDonar" id="donar">
                                                                        <option value="draft">Take a break</option>
                                                                        <option value="publish">Iam active</option>
                                                                    </select>
                                                                    <input type="submit" value="done">
                                                                </form>
                                                                    <h1><i class="fas fa-traffic-light"></i> BLOOD DONATION STATUS <span><?php toPublish($post->ID);?> <?php toDraft($post->ID);?></span></h1>
                                                                </div>
                                                                <!-- <p><i class="fas fa-calendar-alt"></i> YOUR  LAST DONATION DATE 16 NOVEMBER 2020</p>
                                                                <p><i class="fas fa-calendar-check"></i> YOU CAN DONATE AFTER 16 JANUARY 2020</p> -->
                                                        </div>
                                                        <!-- <div class="remaningDays">
                                                            <div class="remaningDaysBody">
                                                                <div class="titleRemaning">
                                                                    <h1 class="text-start"><i class="fas fa-stopwatch"></i> REMAINING DAYS</h1>
                                                                    <h1 class="rightSide">80 DAYS/90</h1>
                                                                </div>
                                                            </div>
                                                            <div class="progresBarLeft">
                                                                <div class="progress">
                                                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <!-- <form action="" method="POST" >
                                                        <select name="selectDonar" id="donar">
                                                            <option value="draft">Draft</option>
                                                            <option value="publish">Publish</option>
                                                        </select>
                                                        <input type="submit" value="done">
                                                    </form>
                                                    </?php toPublish($post->ID);?>
                                                    </?php toDraft($post->ID);?> -->
                                                
                                                <?php endwhile; 
                                            endif; ?>
                                            <!-- <div class="donationStatusBody">
                                                <div class="donationAfter">
                                                    <div class="donationStatus">
                                                    <form action="" method="POST" >
                                                        <select name="selectDonar" id="donar">
                                                            <option value="draft">Draft</option>
                                                            <option value="publish">Publish</option>
                                                        </select>
                                                        <input type="submit" value="done">
                                                    </form>
                                                    </?php toPublish($post->ID);?>
                                                    </?php toDraft($post->ID);?>
                                                        <h1><i class="fas fa-traffic-light"></i> BLOOD DONATION STATUS <span></span></h1>
                                                    </div>
                                                    <!-- <p><i class="fas fa-calendar-alt"></i> YOUR  LAST DONATION DATE 16 NOVEMBER 2020</p>
                                                    <p><i class="fas fa-calendar-check"></i> YOU CAN DONATE AFTER 16 JANUARY 2020</p> -->
                                                <!-- </div> -->
                                                <!-- <div class="remaningDays">
                                                    <div class="remaningDaysBody">
                                                        <div class="titleRemaning">
                                                            <h1 class="text-start"><i class="fas fa-stopwatch"></i> REMAINING DAYS</h1>
                                                            <h1 class="rightSide">80 DAYS/90</h1>
                                                        </div>
                                                    </div>
                                                    <div class="progresBarLeft">
                                                        <div class="progress">
                                                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            <!-- </div> -->
                                            <!-- <div class="donatedList">
                                                <h1>DONATED LIST</h1>
                                                <table class="table table-sm">
                                                    <thead class="table-dark">
                                                        <td>Name</td>
                                                        <td>Gender</td>
                                                        <td>Address</td>
                                                        <td>Date</td>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                            <td>Shopnil Rifat</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->
                                        <?php
                                    } else {
                                        ?>
                                            <div class="applyForDonar">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="applyImages">
                                                            <img src="<?php echo $bangladeshbdooption['uploadApplyImage']['url'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h1>You are now eligble for applying blood donar listing</h1>
                                                        <a href="<?php echo home_url().'/'.$bangladeshbdooption['donar_Profile_apply'] ?>"><button>Apply</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                <?php
            }else{
                ?>

                    <div class="profileUpdate">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="applyImages">
                                    <img src="<?php echo $bangladeshbdooption['uploadProfileInfo']['url'] ?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h1>Please Update Your Profile Before Getting Started</h1>
                                <a href="<?php echo home_url().'/'.$bangladeshbdooption['donar_Profile_update'] ?>"><button>UPDATE PROFILE</button></a>
                            </div>
                        </div>
                    </div>
                    
                <?php
            }
        
        ?>
    </div>

</main>

<?php get_footer();?>
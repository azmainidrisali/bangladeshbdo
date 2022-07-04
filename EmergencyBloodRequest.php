<?php

/* Template Name: BloodDonar Request */

get_header();
?>

    
<div class="container">
    <div class="requestSinglePage">
        <section id="bloodDonationRequest">
            <?php 
                $i = 0;
                $featuredItem = new WP_Query(array(
                    'post_type' => 'emergencyBlood',
                ));
                    if($featuredItem->have_posts()) {
                        while($featuredItem->have_posts()) : $featuredItem->the_post();
                            if( $i % 2 == 0){
                                ?>
                                    <div class="row">
                                <?php
                            }
                            ?>
                                <div class="col-md-6">
                                    <div class="bloodDonationReqBody">
                                        <div class="reqDetails">
                                            <div class="requestTitle">
                                                <h1><?php echo get_post_meta( get_the_ID(), 'blood_group', true ); ?> BLOOD REQUIRED <?php echo get_post_meta( get_the_ID(), 'Bags_required', true ); ?>BAGS</h1>
                                            </div>
                                            <div class="reqMetaDescription">
                                                <ul>
                                                    <li><?php echo get_post_meta( get_the_ID(), 'blood_required_date', true ); ?></li>
                                                    <li><?php echo get_post_meta( get_the_ID(), 'blood_required_time_12h', true ); ?></li>
                                                    <li><?php echo get_post_meta( get_the_ID(), 'injury_type', true ); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="hospitalLocation">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h1><?php echo get_post_meta( get_the_ID(), 'hospital_name', true ); ?></h1>
                                                    <p><?php echo get_post_meta( get_the_ID(), 'hospital_address', true ); ?></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="icon">
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $i++;
                                if( $i != 0 && $i % 2 == 0){
                                    ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php
                                }
                        endwhile;
                    }
                wp_reset_query();    
            ?>
        </section>
    </div>
</div>




<?php

get_footer();
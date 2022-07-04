<?php /* Template Name: Donar Search Result */


get_header();
?>

<?php
    
    $division = $_GET['bloodDOnarDIvision'];
    $district = $_GET['bloodDonarDistrict'];
    $bloodgroup = $_GET['bloodDOnarGroup'];

    $the_query = new WP_Query( array( 
    'post_type' => 'bangladesh_bdo_donar',
    'paged' => $paged,
    'meta_query' => array(
        array(
        'key'=>'Donar_presentdivision_register',
        'type'=>'TEXT',
        'value'=>$division,
        'compare'=>'LIKE'
            ),
        array(
        'key'=>'Donar_presentdistrict_register',
        'type'=>'TEXT',
        'value'=>$district,
        'compare'=>'LIKE'
            ),
        array(
            'key'=>'Donar_bloodGroup_register',
            'type'=>'TEXT',
            'value'=>$bloodgroup,
            'compare'=>'LIKE'
            )	  	 	  	
    )));

    ?>

    <div class="container">
        <section id="topDonarSearch">
            <div class="topDonarBody">
                <?php
                $i = 0;
                while ( $the_query->have_posts() ) : $the_query->the_post();
                
                    if( $i % 4 == 0){
                        ?>
                            <div class="row">
                        <?php
                    }
                    //<//?php the_permalink();
                    ?>
                        <div class="col-md-4">
                            <a href="#">
                                <div class="topDonarSingle">
                                    <div class="topDonarSingleBody">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="donarInfo">
                                                    <h1><?php the_title() ?></h1>
                                                    <p><?php $custom_post_type_3 = get_post_meta($post->ID, 'Donar_presentdivision_register', true); echo $custom_post_type_3; ?> - <?php $custom_post_type_2 = get_post_meta($post->ID, 'Donar_presentdistrict_register', true); echo $custom_post_type_2; ?></p>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="donarContactDetails">
                                                                <p>Call : 01735487154</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="bloodDonarType">
                                                    <h1><?php $custom_post_type_1 = get_post_meta($post->ID, 'Donar_bloodGroup_register', true); echo $custom_post_type_1; ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="socialMediaContact">
                                                    <ul class="socialMediaLinks">
                                                        <a href="<?php echo $bangladeshbdooption['facebookLink']?>"><li><i class="fab fa-facebook"></i></li></a>
                                                        <a href="<?php echo $bangladeshbdooption['instagramLink']?>"><li><i class="fab fa-instagram"></i></li></a>
                                                        <a href="<?php echo $bangladeshbdooption['twitterLink']?>"><li><i class="fab fa-twitter"></i></li></a>
                                                        <a href="<?php echo $bangladeshbdooption['messengerkLink']?>"><li><i class="fab fa-facebook-messenger"></i></li></a>
                                                        <a href="<?php echo $bangladeshbdooption['DonateLink']?>"><li><i class="fas fa-donate"></i></i></li></a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        $i++;
                        if( $i != 0 && $i % 4 == 0){
                            ?>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                        }
                    ?>
                <?php 
                endwhile; 
                ?>
            </div>
        </section>
    </div>


<?php
get_footer();

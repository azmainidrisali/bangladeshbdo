<?php
get_header();
?>

    
    <header>
        <div class="headerBAckgriundImg">
            <!-- <img src="<?php echo $bangladeshbdooption['logo-Uploader']['url'] ?>"> -->
        </div>
        <div class="headerStart">
            <div class="container">
                <div class="headerIntroLogo">
                    <div class="row">
                        <div class="col-md-6">
                            <h1><?php echo $bangladeshbdooption['headerMaintext']?></h1>
                            <p><?php echo $bangladeshbdooption['headersubtext']?></p>
                            <div class="btnLink">
                                <a href="#"><?php echo $bangladeshbdooption['ButtonText']?></a>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <div class="bloodDonarSearch">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bloodDonarSearchBody">
                                <form action="<?php bloginfo('url');?>/donarsearchresult/" method="get">
                                <!-- <input type="text" name="bloodDOnarDIvision" id="bloodDOnarDIvision">
                                <input type="text" name="bloodDonarDistrict" id="bloodDonarDistrict">
                                <input type="text" name="bloodDOnarGroup" id="bloodDonarDistrict"> -->
                                    <div class="donarQuerySelect">
                                        <select name="bloodDOnarDIvision" id="bloodDOnarDIvision">
                                            <option value="#">Select Division</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Barisal">Barisal</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Rangpur">Rangpur</option>
                                        </select>
                                        <select name="bloodDonarDistrict" id="bloodDonarDistrict">
                                            <option value="#">select District</option>
                                        </select>
                                        <select name="bloodDonarUpzilla" id="bloodDonarUpzilla">
                                            <option value="">select District</option>
                                        </select>
                                        <select name="bloodDOnarGroup" id="bloodDOnarGroup">
                                            <option value="#">Select Group type</option>
                                            <option value="O−">O−</option>
                                            <option value="O+">O+</option>	
                                            <option value="A−">A−</option>
                                            <option value="A+">A+</option>
                                            <option value="B−">B−</option>
                                            <option value="B+">B+</option>
                                            <option value="AB−">AB−</option>
                                            <option value="B+">AB+</option>
                                        </select>
                                    </div>
                                    <div class="searchDonarBtn">
                                        <button type="submit"><?php echo $bangladeshbdooption['searchBarText']?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<main>

    <div class="container">
        <section id="bloodDonationRequest">
            <?php 
                $i = 0;
                $featuredItem = new WP_Query(array(
                    'post_type' => 'emergencyBlood',
                    'posts_per_page' => 2,
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
        <a href="<?php echo $bangladeshbdooption['donar_Blood_bag_request']?>">
            <div class="donarRequestSeeMore">
                <div class="bodyDoanrRequest">
                    <h1>See more blood request</h1>
                </div>
            </div>
        </a>
    </div>

    <!-- <div class="container">
        <section id="bloodDonarCount">
            <div class="row">
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="donarCountSingle">
                        <div class="donarType">
                            <h1>A+</h1>
                        </div>
                        <div class="Count">
                            <p>9K</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> -->

    <!-- <div class="container">
        <section id="topDonar">
            <div class="topDonarBody">
                <div class="row">
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topDonarSingle">
                            <div class="topDonarSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="donarInfo">
                                            <h1>Shopnil Rifat</h1>
                                            <p>SAVAR - DHAKA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="bloodDonarType">
                                            <h1>B+</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> -->

    <div class="container">
        <section id="DivisionBasedDonar">
            <div class="divisionsBody">
                <div class="row">
                    <div class="col-md-4">
                        <div class="DivisionSingle">
                            <div class="DivisionSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="DivisionName">
                                            <h1>DHAKA</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="Icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="DivisionSingle">
                            <div class="DivisionSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="DivisionName">
                                            <h1>DHAKA</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="Icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="DivisionSingle">
                            <div class="DivisionSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="DivisionName">
                                            <h1>DHAKA</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="Icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="DivisionSingle">
                            <div class="DivisionSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="DivisionName">
                                            <h1>DHAKA</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="Icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="DivisionSingle">
                            <div class="DivisionSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="DivisionName">
                                            <h1>DHAKA</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="Icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="DivisionSingle">
                            <div class="DivisionSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="DivisionName">
                                            <h1>DHAKA</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="Icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="DivisionSingle">
                            <div class="DivisionSingleBody">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="DivisionName">
                                            <h1>DHAKA</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="Icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <section id="feedBack">
            <div class="feedBackBody">
                <div class="owl-carousel-1 owl-theme owl-carousel">
                    <div class="item">
                        <div class="feedbackSingle">
                            <div class="feedBackSingleBoy">
                                <p>Lorem Ipsum is simply dummy text of the printing and 
                                    typesetting industry. Lorem Ipsum has been the 
                                    industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and
                                </p>
                                <h1>Shopnil Rifat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feedbackSingle">
                            <div class="feedBackSingleBoy">
                                <p>Lorem Ipsum is simply dummy text of the printing and 
                                    typesetting industry. Lorem Ipsum has been the 
                                    industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and
                                </p>
                                <h1>Shopnil Rifat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feedbackSingle">
                            <div class="feedBackSingleBoy">
                                <p>Lorem Ipsum is simply dummy text of the printing and 
                                    typesetting industry. Lorem Ipsum has been the 
                                    industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and
                                </p>
                                <h1>Shopnil Rifat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feedbackSingle">
                            <div class="feedBackSingleBoy">
                                <p>Lorem Ipsum is simply dummy text of the printing and 
                                    typesetting industry. Lorem Ipsum has been the 
                                    industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and
                                </p>
                                <h1>Shopnil Rifat</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>

<script>

    $(document).ready(function(){

        $("#bloodDOnarDIvision").change(function(){

            var val = $(this).val();

            if (val == "Dhaka") {

                -
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Dhaka'>Dhaka</option> <option value='faridpur'>Faridpur</option> <option value='gazipur'>Gazipur</option> <option value='gopalganj'>Gopalganj</option> <option value='kishoreganj'>Kishoreganj</option> <option value='madaripur'>Madaripur</option> <option value='Manikganj'>Manikganj</option> <option value='Munshiganj'>Munshiganj</option> <option value='Narayanganj'>Narayanganj</option> <option value='Narsingdi'>Narsingdi</option> <option value='Rajbari'>Rajbari</option> <option value='Shariatpur'>Shariatpur</option>");

            } else if (val == "Rajshahi") {
                
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Rajshahi'>Rajshahi</option> <option value='Bogura'>Bogura</option> <option value='Joypurhat'>Joypurhat</option> <option value='Naogaon'>Naogaon</option> <option value='Natore'>Natore</option> <option value='Chapainawabganj'>Chapainawabganj</option> <option value='Pabna'>Pabna</option> <option value='Sirajganj'>Sirajganj</option>");

            } else if (val == "Mymensingh") {
                
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Mymensingh'>Mymensingh</option> <option value='Jamalpur'>Jamalpur</option> <option value='Netrokona'>Netrokona</option> <option value='Sherpur'>Sherpur</option>");

            } else if (val == "Barisal") {
                
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Barisal'>Barisal</option> <option value='Barguna'>Barguna</option> <option value='Bhola'>Bhola</option> <option value='Jhalokati'>Jhalokati</option> <option value='Patuakhali'>Patuakhali</option> <option value='Pirojpur'>Pirojpur</option>");

            } else if (val == "Chittagong") {
                
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Chittagong'>Chittagong</option> <option value='Bandarban'>Bandarban</option> <option value='Brahmanbaria'>Brahmanbaria</option> <option value='Chandpur'>Chandpur</option> <option value='Cumilla'>Cumilla</option> <option value='CoxsBazar'>Coxs Bazar</option> <option value='Feni'>Feni</option> <option value='Khagrachhari'>Khagrachhari</option> <option value='Lakshmipur'>Lakshmipur</option> <option value='Noakhali'>Noakhali</option> <option value='Rangamati'>Rangamati</option>");

            } else if (val == "Khulna") {
                
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Khulna'>Khulna</option> <option value='Bagerhat'>Bagerhat</option> <option value='Chuadanga'>Chuadanga</option> <option value='Jessore'>Jessore</option> <option value='Jhenaidah'>Jhenaidah</option> <option value='Kushtia'>Kushtia</option> <option value='Magura'>Magura</option> <option value='Meherpur'>Meherpur</option> <option value='Narail'>Narail</option> <option value='Satkhira'>Satkhira</option>");

            } else if (val == "Sylhet") {
                
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Habiganj'>Habiganj</option> <option value='Moulvibazar'>Moulvibazar</option> <option value='Sunamganj'>Sunamganj</option> <option value='Sylhet'>Sylhet</option>");

            } else if (val == "Rangpur") {
                
                $("#bloodDonarDistrict").html("<option value='select'>Select District</option> <option value='Rangpur'>Rangpur</option> <option value='Dinajpur'>Dinajpur</option> <option value='Gaibandha'>Gaibandha</option> <option value='Kurigram'>Kurigram</option> <option value='Lalmonirhat'>Lalmonirhat</option> <option value='Nilphamari'>Nilphamari</option> <option value='Panchagarh'>Panchagarh</option> <option value='Rangpur'>Rangpur</option> <option value='Thakurgaon'>Thakurgaon</option>");

            }
        });

        $("#bloodDonarDistrict").change(function(){

            var val = $(this).val();

            if (val == "faridpur") {

                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='faridpur'>faridpur</option> <option value='Alfadanga'>Alfadanga</option> <option value='Bhanga'>Bhanga</option> <option value='Boalmari'>Boalmari</option> <option value='Charbhadrasan'>Charbhadrasan</option> <option value='FaridpurSadar'>Faridpur Sadar</option> <option value='Madhukhali'>Madhukhali</option> <option value='Nagarkanda'>Nagarkanda</option> <option value='Sadarpur'>Sadarpur</option> <option value='Saltha'>Saltha</option>");

            }  else if (val == "gazipur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='gazipur'>Gazipur</option> <option value='GazipurSadar'>Gazipur Sadar</option> <option value='Kaliakair'>Kaliakair</option> <option value='Kaliganj'>Kaliganj</option> <option value='Kapasia'>Kapasia</option> <option value='Sreepur'>Sreepur</option>");

            }  else if (val == "gopalganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='gopalganj'>Gopalganj</option> <option value='GopalganjSadar'>Gopalganj Sadar</option> <option value='Kashiani'>Kashiani</option> <option value='Kotalipara'>Kotalipara</option> <option value='Muksudpur'>Muksudpur</option> <option value='Tungipara'>Tungipara</option>");

            }  else if (val == "kishoreganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='kishoreganj'>kishoreganj</option> <option value='Austagram'>Austagram</option> <option value='Bajitpur'>Bajitpur</option> <option value='Bhairab'>Bhairab</option> <option value='Hossainpur'>Hossainpur</option> <option value='Itna'>Itna</option> <option value='Karimganj'>Karimganj</option> <option value='Katiadi'>Katiadi</option> <option value='KishoreganjSadar'>Kishoreganj Sadar</option> <option value='Kuliarchar'>Kuliarchar</option> <option value='Mithamain'>Mithamain</option> <option value='Nikli'>Nikli</option> <option value='Pakundia'>Pakundia</option> <option value='Tarail'>Tarail</option> ");

            }  else if (val == "madaripur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='madaripur'>madaripur</option> <option value='Rajoir'>Rajoir</option> <option value='MadaripurSadar'>Madaripur Sadar</option> <option value='Kalkini'>Kalkini</option> <option value='Shibchar'>Shibchar</option>");

            }  else if (val == "Manikganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Manikganj'>Manikganj</option> <option value='Daulatpur'>Daulatpur</option> <option value='Ghior'>Ghior</option> <option value='Harirampur'>Harirampur</option> <option value='ManikgonjSadar'>Manikgonj Sadar</option> <option value='Saturia'>Saturia</option> <option value='Shivalaya'>Shivalaya</option> <option value='Singair'>Singair</option>");

            }  else if (val == "Munshiganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Munshiganj'>Munshiganj</option> <option value='Gazaria'>Gazaria</option> <option value='Lohajang'>Lohajang</option> <option value='Munshiganj'>Munshiganj Sadar</option> <option value='Sirajdikhan'>Sirajdikhan</option> <option value='Sreenagar'>Sreenagar</option> <option value='Tongibari'>Tongibari</option>");

            }  else if (val == "Narayanganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Narayanganj'>Narayanganj</option> <option value='Araihazar'>Araihazar</option> <option value='Bandar'>Bandar</option> <option value='NarayanganjSadar'>Narayanganj Sadar</option> <option value='MunshiganjRupganj'>Rupganj</option> <option value='MunshiganjSonargaon'>Sonargaon</option>");

            }  else if (val == "Narsingdi") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Narsingdi'>Narsingdi</option> <option value='NarsingdiSadar'>Narsingdi Sadar</option> <option value='Belabo'>Belabo</option> <option value='Monohardi'>Monohardi</option> <option value='Palash'>Palash</option> <option value='Raipura'>Raipura</option> <option value='Shibpur'>Shibpur</option>");

            }  else if (val == "Rajbari") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Rajbari'>Rajbari</option> <option value='Baliakandi'>Baliakandi</option> <option value='Goalandaghat'>Goalandaghat</option> <option value='Pangsha'>Pangsha</option> <option value='RajbariSadar'>Rajbari Sadar</option> <option value='Kalukhali'>Kalukhali</option>");

            }  else if (val == "Shariatpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Shariatpur'>Shariatpur</option> <option value='Bhedarganj'>Bhedarganj</option> <option value='Damudya'>Damudya</option> <option value='Gosairhat'>Gosairhat</option> <option value='Naria'>Naria</option> <option value='ShariatpurSadar'>Shariatpur Sadar</option> <option value='Zajira'>Zajira</option> <option value='Shakhipur'>Shakhipur</option>");

            }  else if (val == "Bogura") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bogura'>Bogura</option> <option value='Adamdighi'>Adamdighi</option> <option value='BoguraSadar'>Bogura Sadar</option> <option value='Dhunat'>Dhunat</option> <option value='Dhupchanchia'>Dhupchanchia</option> <option value='Gabtali'>Gabtali</option> <option value='Kahaloo'>Kahaloo</option> <option value='Nandigram'>Nandigram</option> <option value='Sariakandi'>Sariakandi</option> <option value='Shajahanpur'>Shajahanpur</option> <option value='Sherpur'>Sherpur</option> <option value='Shibganj'>Shibganj</option> <option value='Sonatola'>Sonatola</option>");

            }  else if (val == "Joypurhat") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Joypurhat'>Joypurhat</option> <option value='Akkelpur'>Akkelpur</option> <option value='JoypurhatSadar'>Joypurhat Sadar</option> <option value='Kalai'>Kalai</option> <option value='Khetlal'>Khetlal</option> <option value='Panchbibi'>Panchbibi</option>");

            }  else if (val == "Naogaon") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Naogaon'>Naogaon</option> <option value='Atrai'>Atrai</option> <option value='Badalgachhi'>Badalgachhi</option> <option value='Manda'>Manda</option> <option value='Dhamoirhat'>Dhamoirhat</option> <option value='Mohadevpur'>Mohadevpur</option> <option value='NaogaonSadar'>Naogaon Sadar</option> <option value='Niamatpur'>Niamatpur</option> <option value='Patnitala'>Patnitala</option> <option value='Porsha'>Porsha</option> <option value='Raninagar'>Raninagar</option> <option value='Sapahar'>Sapahar</option>");

            }  else if (val == "Natore") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Natore'>Natore</option> <option value='Bagatipara'>Bagatipara</option> <option value='Baraigram'>Baraigram</option> <option value='Gurudaspur'>Gurudaspur</option> <option value='Lalpur'>Lalpur</option> <option value='NatoreSadar'>Natore Sadar</option> <option value='Singra'>Singra</option> <option value='Naldanga'>Naldanga</option>");

            }  else if (val == "Chapainawabganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Chapainawabganj'>Chapainawabganj</option> <option value='Bholahat'>Bholahat</option> <option value='ChapaiNawabganjSadar'>Chapai Nawabganj Sadar</option> <option value='Dogachi'>Dogachi</option> <option value='Gomostapur'>Gomostapur</option> <option value='Nachol'>Nachol</option>");

            }  else if (val == "Pabna") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Pabna'>Pabna</option> <option value='Atgharia'>Atgharia</option> <option value='Bera'>Bera</option> <option value='Bhangura'>Bhangura</option> <option value='Chatmohar'>Chatmohar</option> <option value='Faridpur'>Faridpur</option> <option value='Ishwardi'>Ishwardi</option> <option value='PabnaSadar'>Pabna Sadar</option> <option value='Santhia'>Santhia</option> <option value='Sujanagar'>Sujanagar</option>");

            }  else if (val == "Sirajganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Sirajganj'>Sirajganj</option> <option value='Belkuchi'>Belkuchi</option> <option value='Chauhali'>Chauhali</option> <option value='Kamarkhanda'>Kamarkhanda</option> <option value='Kazipur'>Kazipur</option> <option value='Raiganj'>Raiganj</option> <option value='Shahjadpur'>Shahjadpur</option> <option value='SirajganjSadar'>Sirajganj Sadar</option> <option value='Tarash'>Tarash</option> <option value='Ullahpara'>Ullahpara</option>");

            }  else if (val == "Rajshahi") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bagha'>Bagha</option> <option value='Bagmara'>Bagmara</option> <option value='Charghat'>Charghat</option> <option value='Durgapur'>Durgapur</option> <option value='Godagari'>Godagari</option> <option value='Mohanpur'>Mohanpur</option> <option value='Paba'>Paba</option> <option value='Puthia'>Puthia</option> <option value='Tanore'>Tanore</option>");

            }  else if (val == "Mymensingh") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Trishal'>Trishal</option> <option value='Dhobaura'>Dhobaura</option> <option value='Fulbaria'>Fulbaria</option> <option value='Gafargaon'>Gafargaon</option> <option value='Gauripur'>Gauripur</option> <option value='Haluaghat'>Haluaghat</option> <option value='Ishwarganj'>Ishwarganj</option> <option value='MymensinghSadar'>Mymensingh Sadar</option> <option value='Muktagachha'>Muktagachha</option> <option value='Nandail'>Nandail</option> <option value='Phulpur'>Phulpur</option> <option value='Bhaluka'>Bhaluka</option> <option value='TaraKhanda'>Tara Khanda</option>");

            }  else if (val == "Dhaka") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Dhamrai'>Dhamrai</option> <option value='Dohar'>Dohar</option> <option value='Keraniganj'>Keraniganj</option> <option value='Nawabganj'>Nawabganj</option> <option value='Savar'>Savar</option> <option value='TejgaonCircle'>Tejgaon Circle</option>");

            }  else if (val == "Jamalpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Baksiganj'>Baksiganj</option> <option value='Dewanganj'>Dewanganj</option> <option value='Islampur'>Islampur</option> <option value='JamalpurSadar'>Jamalpur Sadar</option> <option value='Madarganj'>Madarganj</option> <option value='Melandaha'>Melandaha</option> <option value='Sarishabari'>Sarishabari</option>");

            }  else if (val == "Netrokona") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Atpara'>Atpara</option> <option value='Barhatta'>Barhatta</option> <option value='Durgapur'>Durgapur</option> <option value='Khaliajuri'>Khaliajuri</option> <option value='Kalmakanda'>Kalmakanda</option> <option value='Kendua'>Kendua</option> <option value='Madan'>Madan</option> <option value='Mohanganj'>Mohanganj</option> <option value='NetrokonaSadar'>Netrokona Sadar</option> <option value='Purbadhala'>Purbadhala</option>");

            }  else if (val == "Sherpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Jhenaigati'>Jhenaigati</option> <option value='Nakla'>Nakla</option> <option value='Nalitabari'>Nalitabari</option> <option value='SherpurSadar'>Sherpur Sadar</option> <option value='Sreebardi'>Sreebardi</option>");

            }  else if (val == "Barisal") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Agailjhara'>Agailjhara</option> <option value='Babuganj'>Babuganj</option> <option value='Bakerganj'>Bakerganj</option> <option value='Banaripara'>Banaripara</option> <option value='Gaurnadi'>Gaurnadi</option> <option value='Hizla'>Hizla</option> <option value='BarishalSadar'>Barishal Sadar</option> <option value='Mehendiganj'>Mehendiganj</option> <option value='Muladi'>Muladi</option> <option value='Wazirpur'>Wazirpur</option>");

            }  else if (val == "Barguna") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Amtali'>Amtali</option> <option value='Bamna'>Bamna</option> <option value='BargunaSadar'>Barguna Sadar</option> <option value='Betagi'>Betagi</option> <option value='Patharghata'>Patharghata</option> <option value='Taltali'>Taltali</option>");

            }  else if (val == "Bhola") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='BholaSadar'>Bhola Sadar</option> <option value='Burhanuddin'>Burhanuddin</option> <option value='CharFasson'>Char Fasson</option> <option value='Daulatkhan'>Daulatkhan</option> <option value='Lalmohan'>Lalmohan</option> <option value='Manpura'>Manpura</option> <option value='Tazumuddin'>Tazumuddin</option>");

            }  else if (val == "Jhalokati") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='JhalokatiSadar'>Jhalokati Sadar</option> <option value='Kathalia'>Kathalia</option> <option value='Nalchity'>Nalchity</option> <option value='Rajapur'>Rajapur</option>");

            }  else if (val == "Patuakhali") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bauphal'>Bauphal</option> <option value='Dashmina'>Dashmina</option> <option value='Galachipa'>Galachipa</option> <option value='Kalapara'>Kalapara</option> <option value='Mirzaganj'>Mirzaganj</option> <option value='PatuakhaliSadar'>Patuakhali Sadar</option> <option value='Rangabali'>Rangabali</option> <option value='Dumki'>Dumki</option>");

            }  else if (val == "Pirojpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bhandaria'>Bhandaria</option> <option value='Kawkhali'>Kawkhali</option> <option value='Mathbaria'>Mathbaria</option> <option value='Nazirpur'>Nazirpur</option> <option value='PirojpurSadar'>Pirojpur Sadar</option> <option value='NesarabadSwarupkati'>Nesarabad Swarupkati</option> <option value='Indurkani'>Indurkani</option>");

            }  else if (val == "Chittagong") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Anwara'>Anwara</option> <option value='Banshkhali'>Banshkhali</option> <option value='Boalkhali'>Boalkhali</option> <option value='Chandanaish'>Chandanaish</option> <option value='Fatikchhari'>Fatikchhari</option> <option value='Hathazari'>Hathazari</option> <option value='Karnaphuli'>Karnaphuli</option> <option value='Lohagara'>Lohagara</option> <option value='Mirsharai'>Mirsharai</option> <option value='Patiya'>Patiya</option> <option value='Rangunia'>Rangunia</option> <option value='Raozan'>Raozan</option> <option value='Sandwip'>Sandwip</option> <option value='Satkania'>Satkania</option> <option value='Sitakunda'>Sitakunda</option>");

            }  else if (val == "Bandarban") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='AliKadam'>Ali Kadam</option> <option value='BandarbanSadar'>Bandarban Sadar</option> <option value='Lama'>Lama</option> <option value='Naikhongchhari'>Naikhongchhari</option> <option value='Rowangchhari'>Rowangchhari</option> <option value='Ruma'>Ruma</option> <option value='Thanchi'>Thanchi</option>");

            }  else if (val == "Brahmanbaria") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Akhaura'>Akhaura</option><option value='Bancharampur'>Bancharampur</option><option value='BrahmanbariaSadar'>Brahmanbaria Sadar</option><option value='Kasba'>Kasba</option><option value='Nabinagar'>Nabinagar</option><option value='Nasirnagar'>Nasirnagar</option><option value='Sarail'>Sarail</option><option value='Ashuganj'>Ashuganj</option><option value='Bijoynagar'>Bijoynagar</option>");

            }  else if (val == "Chandpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='ChandpurSadar'>Chandpur Sadar</option> <option value='Faridganj'>Faridganj</option> <option value='Haimchar'>Haimchar</option> <option value='Haziganj'>Haziganj</option> <option value='Kachua'>Kachua</option> <option value='MatlabDakshin'>Matlab Dakshin</option> <option value='MatlabUttar'>Matlab Uttar</option> <option value='Shahrasti'>Shahrasti</option>");

            }  else if (val == "Cumilla") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Barura'>Barura</option> <option value='Brahmanpara'>Brahmanpara</option> <option value='Burichang'>Burichang</option> <option value='Chandina'>Chandina</option> <option value='Chauddagram'>Chauddagram</option> <option value='Daudkandi'>Daudkandi</option> <option value='Debidwar'>Debidwar</option> <option value='Homna'>Homna</option> <option value='Laksam'>Laksam</option> <option value='Lalmai'>Lalmai</option> <option value='Muradnagar'>Muradnagar</option> <option value='Nangalkot'>Nangalkot</option> <option value='CumillaAdarshaSadar'>Cumilla Adarsha Sadar</option> <option value='Meghna'>Meghna</option> <option value='Meghna'>Titas</option> <option value='Monohargonj'>Monohargonj</option> <option value='CumillaSadarDakshin'>Cumilla Sadar Dakshin</option>");

            }  else if (val == "CoxsBazar") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Chakaria'>Chakaria</option> <option value='CoxsBazarSadar'>Cox's Bazar Sadar</option> <option value='Kutubdia'>Kutubdia</option> <option value='Maheshkhali'>Maheshkhali</option> <option value='Ramu'>Ramu</option> <option value='Teknaf'>Teknaf</option> <option value='Ukhia'>Ukhia</option> <option value='Pekua'>Pekua</option>");

            }  else if (val == "Feni") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Chhagalnaiya'>Chhagalnaiya</option> <option value='Daganbhuiyan'>Daganbhuiyan</option> <option value='FeniSadar'>Feni Sadar</option> <option value='Parshuram'>Parshuram</option> <option value='Sonagazi'>Sonagazi</option> <option value='Fulgazi'>Fulgazi</option>");

            }  else if (val == "Khagrachhari") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Dighinala'>Dighinala</option> <option value='Khagrachhari'>Khagrachhari</option> <option value='Lakshmichhari'>Lakshmichhari</option> <option value='Mahalchhari'>Mahalchhari</option> <option value='Manikchhari'>Manikchhari</option> <option value='Matiranga'>Matiranga</option> <option value='Panchhari'>Panchhari</option> <option value='Ramgarh'>Ramgarh</option>");

            }  else if (val == "Lakshmipur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='LakshmipurSadar'>Lakshmipur Sadar</option> <option value='Raipur'>Raipur</option> <option value='Ramganj'>Ramganj</option> <option value='Ramgati'>Ramgati</option> <option value='Kamalnagar'>Kamalnagar</option>");

            }  else if (val == "Noakhali") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Begumganj'>Begumganj</option> <option value='NoakhaliSadar'>Noakhali Sadar</option> <option value='Chatkhil'>Chatkhil</option> <option value='Companiganj'>Companiganj</option> <option value='Hatiya'>Hatiya</option> <option value='Senbagh'>Senbagh</option> <option value='Sonaimuri'>Sonaimuri</option> <option value='Subarnachar'>Subarnachar</option> <option value='Kabirhat'>Kabirhat</option>");

            }  else if (val == "Rangamati") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bagaichhari'>Bagaichhari</option> <option value='Barkal'>Barkal</option> <option value='KawkhaliBetbunia'>Kawkhali Betbunia</option> <option value='Belaichhari'>Belaichhari</option> <option value='Kaptai'>Kaptai</option> <option value='Juraichhari'>Juraichhari</option> <option value='Langadu'>Langadu</option> <option value='Naniyachar'>Naniyachar</option> <option value='Rajasthali'>Rajasthali</option> <option value='Rangamati'>Rangamati Sadar</option>");

            }  else if (val == "Khulna") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Batiaghata'>Batiaghata</option> <option value='Dacope'>Dacope</option> <option value='Dumuria'>Dumuria</option> <option value='Dighalia'>Dighalia</option> <option value='Koyra'>Koyra</option> <option value='Paikgachha'>Paikgachha</option> <option value='Phultala'>Phultala</option> <option value='Rupsha'>Rupsha</option> <option value='Terokhada'>Terokhada</option>");

            }  else if (val == "Bagerhat") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='BagerhatSadar'>Bagerhat Sadar</option> <option value='Chitalmari'>Chitalmari</option> <option value='Fakirhat'>Fakirhat</option> <option value='Kachua'>Kachua</option> <option value='Mollahat'>Mollahat</option> <option value='Mongla'>Mongla</option> <option value='Morrelganj'>Morrelganj</option> <option value='Rampal'>Rampal</option> <option value='Sarankhola'>Sarankhola</option>");

            }  else if (val == "Chuadanga") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Alamdanga'>Alamdanga</option> <option value='ChuadangaSadar'>Chuadanga Sadar</option> <option value='Damurhuda'>Damurhuda</option> <option value='Jibannagar'>Jibannagar</option>");

            }  else if (val == "Jessore") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Abhaynagar'>Abhaynagar</option> <option value='Bagherpara'>Bagherpara</option> <option value='Chaugachha'>Chaugachha</option> <option value='Jhikargachha'>Jhikargachha</option> <option value='Keshabpur'>Keshabpur</option> <option value='JashoreSadar'>Jashore Sadar</option> <option value='Manirampur'>Manirampur</option> <option value='Sharsha'>Sharsha</option>");

            }  else if (val == "Jhenaidah") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Harinakunda'>Harinakunda</option> <option value='JhenaidahSadar'>Jhenaidah Sadar</option> <option value='Kaliganj'>Kaliganj</option> <option value='Kotchandpur'>Kotchandpur</option> <option value='Maheshpur'>Maheshpur</option> <option value='Shailkupa'>Shailkupa</option>");

            }  else if (val == "Kushtia") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bheramara'>Bheramara</option> <option value='Daulatpur'>Daulatpur</option> <option value='Khoksa'>Khoksa</option> <option value='Kumarkhali'>Kumarkhali</option> <option value='KushtiaSadar'>Kushtia Sadar</option> <option value='Mirpur'>Mirpur</option>");

            }  else if (val == "Magura") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='MaguraSadar'>Magura Sadar</option> <option value='Sadar'>Mohammadpur</option> <option value='Shalikha'>Shalikha</option> <option value='Sreepur'>Sreepur</option>");

            }  else if (val == "Meherpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Gangni'>Gangni</option> <option value='MeherpurSadar'>Meherpur Sadar</option> <option value='Mujibnagar'>Mujibnagar</option>");

            }  else if (val == "Narail") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Kalia'>Kalia</option> <option value='Lohagara'>Lohagara</option> <option value='NarailSadar'>Narail Sadar</option> <option value='NaragatiThana'>Naragati Thana</option>");

            }  else if (val == "Satkhira") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Assasuni'>Assasuni</option> <option value='Debhata'>Debhata</option> <option value='Kalaroa'>Kalaroa</option> <option value='Kaliganj'>Kaliganj</option> <option value='SatkhiraSadar'>Satkhira Sadar</option> <option value='Shyamnagar'>Shyamnagar</option> <option value='Tala'>Tala</option>");

            }  else if (val == "Habiganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Ajmiriganj'>Ajmiriganj</option> <option value='Bahubal'>Bahubal</option> <option value='Baniyachong'>Baniyachong</option> <option value='Chunarughat'>Chunarughat</option> <option value='HabiganjSadar'>Habiganj Sadar</option> <option value='Lakhai'>Lakhai</option> <option value='Madhabpur'>Madhabpur</option> <option value='Nabiganj'>Nabiganj</option> <option value='Sayestaganj'>Sayestaganj</option>");

            }  else if (val == "Moulvibazar") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Barlekha'>Barlekha</option> <option value='Juri'>Juri</option> <option value='Kamalganj'>Kamalganj</option> <option value='Kulaura'>Kulaura</option> <option value='Sadar'>Moulvibazar Sadar</option> <option value='Rajnagar'>Rajnagar</option> <option value='Sreemangal'>Sreemangal</option>");

            }  else if (val == "Sunamganj") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bishwamvarpur'>Bishwamvarpur</option> <option value='Chhatak'>Chhatak</option> <option value='DakshinSunamganj'>Dakshin Sunamganj</option> <option value='Derai'>Derai</option> <option value='Dharamapasha'>Dharamapasha</option> <option value='Dowarabazar'>Dowarabazar</option> <option value='Jagannathpur'>Jagannathpur</option> <option value='Jamalganj'>Jamalganj</option> <option value='Sullah'>Sullah</option> <option value='SunamganjSadar'>Sunamganj Sadar</option> <option value='Tahirpur'>Tahirpur</option>");

            }  else if (val == "Sylhet") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Balaganj'>Balaganj</option> <option value='Beanibazar'>Beanibazar</option> <option value='Bishwanath'>Bishwanath</option> <option value='Companigonj'>Companigonj</option> <option value='DakshinSurma'>Dakshin Surma</option> <option value='Fenchuganj'>Fenchuganj</option> <option value='Golapganj'>Golapganj</option> <option value='Gowainghat'>Gowainghat</option> <option value='Jaintiapur'>Jaintiapur</option> <option value='Kanaighat'>Kanaighat</option> <option value='OsmaniNagar'>Osmani Nagar</option> <option value='SylhetSadar'>Sylhet Sadar</option> <option value='Zakiganj'>Zakiganj</option>");

            }  else if (val == "Rangpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Badarganj'>Badarganj</option> <option value='Gangachhara'>Gangachhara</option> <option value='Kaunia'>Kaunia</option> <option value='RangpurSadar'>Rangpur Sadar</option> <option value='Mithapukur'>Mithapukur</option> <option value='Pirgachha'>Pirgachha</option> <option value='Pirganj'>Pirganj</option> <option value='Taraganj'>Taraganj</option>");

            }  else if (val == "Dinajpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Birampur'>Birampur</option> <option value='Birganj'>Birganj</option> <option value='Biral'>Biral</option> <option value='Bochaganj'>Bochaganj</option> <option value='Chirirbandar'>Chirirbandar</option> <option value='Phulbari'>Phulbari</option> <option value='Ghoraghat'>Ghoraghat</option> <option value='Hakimpur'>Hakimpur</option> <option value='Kaharole'>Kaharole</option> <option value='Khansama'>Khansama</option> <option value='DinajpurSadar'>Dinajpur Sadar</option> <option value='Nawabganj'>Nawabganj</option> <option value='Parbatipur'>Parbatipur</option>");

            }  else if (val == "Gaibandha") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Phulchhari'>Phulchhari</option> <option value='GaibandhaSadar'>Gaibandha Sadar</option> <option value='Gobindaganj'>Gobindaganj</option> <option value='Palashbari'>Palashbari</option> <option value='Sadullapur'>Sadullapur</option> <option value='Sughatta'>Sughatta</option> <option value='Sundarganj'>Sundarganj</option>");

            }  else if (val == "Kurigram") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Bhurungamari'>Bhurungamari</option> <option value='CharRajibpur'>Char Rajibpur</option> <option value='Chilmari'>Chilmari</option> <option value='Phulbari'>Phulbari</option> <option value='KurigramSadar'>Kurigram Sadar</option> <option value='Nageshwari'>Nageshwari</option> <option value='Rajarhat'>Rajarhat</option> <option value='Raomari'>Raomari</option> <option value='Ulipur'>Ulipur</option>");

            }  else if (val == "Lalmonirhat") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Aditmari'>Aditmari</option> <option value='Hatibandha'>Hatibandha</option> <option value='Kaliganj'>Kaliganj</option> <option value='LalmonirhatSadar'>Lalmonirhat Sadar</option> <option value='Patgram'>Patgram</option>");

            }  else if (val == "Nilphamari") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Dimla'>Dimla</option> <option value='Domar'>Domar</option> <option value='Jaldhaka'>Jaldhaka</option> <option value='Kishoreganj'>Kishoreganj</option> <option value='NilphamariSadar'>Nilphamari Sadar</option> <option value='Saidpur'>Saidpur</option>");

            }  else if (val == "Panchagarh") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Atwari'>Atwari</option> <option value='Boda'>Boda</option> <option value='Debiganj'>Debiganj</option> <option value='PanchagarhSadar'>Panchagarh Sadar</option> <option value='Tetulia'>Tetulia</option>");

            }  else if (val == "Rangpur") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Badarganj'>Badarganj</option> <option value='Gangachhara'>Gangachhara</option> <option value='Kaunia'>Kaunia</option> <option value='RangpurSadar'>Rangpur Sadar</option> <option value='Mithapukur'>Mithapukur</option> <option value='Pirgachha'>Pirgachha</option> <option value='Pirganj'>Pirganj</option> <option value='Taraganj'>Taraganj</option>");

            }  else if (val == "Thakurgaon") {
                
                $("#bloodDonarUpzilla").html("<option value='select'>Select District</option> <option value='Baliadangi'>Baliadangi</option> <option value='Haripur'>Haripur</option> <option value='Pirganj'>Pirganj</option> <option value='Ranisankail'>Ranisankail</option> <option value='ThakurgaonSadar'>Thakurgaon Sadar</option>");

            }
        });

    });

</script>

<?php
get_footer();
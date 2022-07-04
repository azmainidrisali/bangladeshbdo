<?php

function add_theme_scripts(){

    wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );

    wp_enqueue_style( 'bootstrapMin', get_template_directory_uri(). '/css/bootstrap.min.css', array(), '1.1', 'all' );
    wp_enqueue_style( 'owlcarousel', get_template_directory_uri(). '/plugins/OwlCarousel2-2.3.4/assets/owl.carousel.min.css', array(), '1.1', 'all' );
    wp_enqueue_style( 'owlCarouselDefult', get_template_directory_uri(). '/plugins/OwlCarousel2-2.3.4/assets/owlcarousel/owl.theme.default.min.css', array(), '1.1', 'all' );
    wp_enqueue_style( 'mainstyle', get_template_directory_uri(). '/css/mainstyle.css', array(), '1.1', 'all' );

    wp_enqueue_script( 'bootstrapmain', get_template_directory_uri(). '/css/bootstrap.min.js', true );
    wp_register_script( 'js_deliver', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js' );
    wp_enqueue_script('js_deliver');
    wp_register_script( 'Font_Awesome', 'https://kit.fontawesome.com/0792b01d82.js' );
    wp_enqueue_script('Font_Awesome');
    wp_enqueue_script( 'jquery3.5.1', get_template_directory_uri(). '/js/jquery3.5.1.js', true );
    wp_enqueue_script( 'coustomScript', get_template_directory_uri(). '/js/coustom.js', true );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function wpb_add_google_fonts() {
 
    wp_enqueue_style( 'wpb-google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', false );
    wp_enqueue_style( 'wpb-google-fonts-Roboto', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', false );

}    
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


require_once('lib/redux/ReduxCore/framework.php');
require_once('lib/redux/sample/sample-config.php');

add_filter( 'show_admin_bar', '__return_false' );


function bangladesh_theme_setup(){

    // Register Nav
    register_nav_menus(array(
        'footer_Colum_1' => __( 'Footer first Colum Menu' ),
        'footer_Colum_2' => __( 'Footer second Colum Menu' ),

        'HomeMainMenu'  => __( 'Main Menu' ),
    ));

    // Thumbnail Image
    add_theme_support('post-thumbnails');


    register_post_type('emergencyBlood', array(
        'labels' => array(
            'name' => 'Emergency Blood Donar',
            'add_new_item' => 'Add New Request',
            'not_found' => 'No New Emergency New Request Found',
            'edit_item' => 'Edit Emergency Request',
            'item_published' => 'Emergency Active Requests',
            'item_updated' => 'Emergency Request updated',
            'search_items' => 'Search Emergency Requests'
        ),
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'menu_icon'           => 'dashicons-feedback',
        'supports' => array(
            'title' 
        ),
    ));

    
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


    
}
add_action('after_setup_theme' , 'bangladesh_theme_setup');

// Register Custom Post Type
function custom_post_type_blood_donars() {

	$labels = array(
		'name'                  => _x( 'Donars List', 'Post Type General Name', 'bangladeshbdo' ),
		'singular_name'         => _x( 'Blood Donars List', 'Post Type Singular Name', 'bangladeshbdo' ),
		'menu_name'             => __( 'Blood Donar List', 'bangladeshbdo' ),
		'name_admin_bar'        => __( 'Blood donar list', 'bangladeshbdo' ),
		'archives'              => __( 'Blood donar Archives', 'bangladeshbdo' ),
		'attributes'            => __( 'Blood donar Attributes', 'bangladeshbdo' ),
		'parent_item_colon'     => __( 'Blood donar Parent Item:', 'bangladeshbdo' ),
		'all_items'             => __( 'All Items', 'bangladeshbdo' ),
		'add_new_item'          => __( 'Add New Blood donar', 'bangladeshbdo' ),
		'add_new'               => __( 'Add New Blood donar', 'bangladeshbdo' ),
		'new_item'              => __( 'New Blood donar', 'bangladeshbdo' ),
		'edit_item'             => __( 'Edit Blood donar', 'bangladeshbdo' ),
		'update_item'           => __( 'Update Blood donar', 'bangladeshbdo' ),
		'view_item'             => __( 'View Blood donar', 'bangladeshbdo' ),
		'view_items'            => __( 'View Blood donar', 'bangladeshbdo' ),
		'search_items'          => __( 'Search Blood donar', 'bangladeshbdo' ),
		'not_found'             => __( 'Blood donar Not found', 'bangladeshbdo' ),
		'not_found_in_trash'    => __( 'Blood donar Not found in Trash', 'bangladeshbdo' ),
		'featured_image'        => __( 'Blood donar Profile Image', 'bangladeshbdo' ),
		'set_featured_image'    => __( 'Set Blood donar profile image', 'bangladeshbdo' ),
		'remove_featured_image' => __( 'Remove Blood donar profile image', 'bangladeshbdo' ),
		'use_featured_image'    => __( 'Use as Blood donar profile image', 'bangladeshbdo' ),
		'insert_into_item'      => __( 'Insert into Blood donar', 'bangladeshbdo' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Blood donar', 'bangladeshbdo' ),
		'items_list'            => __( 'Blood donar list', 'bangladeshbdo' ),
		'items_list_navigation' => __( 'Blood donar list navigation', 'bangladeshbdo' ),
		'filter_items_list'     => __( 'Filter Blood donar list', 'bangladeshbdo' ),
	);
	$args = array(
		'label'                 => __( 'Blood Donars List', 'bangladeshbdo' ),
		'description'           => __( 'All the donars List', 'bangladeshbdo' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'comments', 'author' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 100,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'bangladesh_bdo_donar', $args );

}
add_action( 'init', 'custom_post_type_blood_donars', 0 );

function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(https://th.bing.com/th/id/Rdffd074e07993feab468788df34d7dfa?rik=KbsABYjO6WHBfw&pid=ImgRaw);
        height:100px;
        width:300px;
        background-size: 300px 100px;
        background-repeat: no-repeat;
        padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

//
    function LastDate(){
        add_meta_box("custom_bdo_field_01", "Blood Required Date", "dateFiled", "emergencyBlood", "normal", "low");
    }
    add_action("admin_init", "LastDate");

    function dateFiled(){

        global $post;

        $data = get_post_custom($post->ID);
        $val = isset($data['blood_required_date']) ? esc_attr($data['blood_required_date'][0]) : '17.05.2020';

        echo '<input type="text" name="blood_required_date" id="blood_required_date" value="'.$val.'" />';
    }

    function save_blood_required_date(){
        global $post;

        if(isset($_POST["blood_required_date"])):
         
            update_post_meta($post->ID, "blood_required_date", $_POST["blood_required_date"]);
         
        endif;

    }
    add_action("save_post", "save_blood_required_date");
//
//
    function BloodGroup_field(){
        add_meta_box("custom_bdo_field_02", "Blood Group", "bloodGroup", "emergencyBlood", "normal", "low");
    }
    add_action("admin_init", "BloodGroup_field");

    function bloodGroup(){

        global $post;

        $data = get_post_custom($post->ID);
        $val = isset($data['blood_group']) ? esc_attr($data['blood_group'][0]) : 'a+';

        echo '<input type="text" name="blood_group" id="blood_group" value="'.$val.'" />';
    }

    function save_blood_group(){
        global $post;

        if(isset($_POST["blood_group"])):
         
            update_post_meta($post->ID, "blood_group", $_POST["blood_group"]);
         
        endif;

    }
    add_action("save_post", "save_blood_group");
//
//
    function blood_required_time_field(){
        add_meta_box("custom_bdo_field_03", "Blood Required Time", "blood_required_time", "emergencyBlood", "normal", "low");
    }
    add_action("admin_init", "blood_required_time_field");

    function blood_required_time(){

        global $post;

        $data = get_post_custom($post->ID);
        $val = isset($data['blood_required_time_12h']) ? esc_attr($data['blood_required_time_12h'][0]) : '12:10 pm';

        echo '<input type="text" name="blood_required_time_12h" id="blood_required_time_12h" value="'.$val.'" />';
    }

    function save_blood_required_time_12h(){
        global $post;

        if(isset($_POST["blood_required_time_12h"])):
         
            update_post_meta($post->ID, "blood_required_time_12h", $_POST["blood_required_time_12h"]);
         
        endif;

    }
    add_action("save_post", "save_blood_required_time_12h");
//
//
    function injury_type_field(){
        add_meta_box("custom_bdo_field_04", "Injury Type", "injury_type", "emergencyBlood", "normal", "low");
    }
    add_action("admin_init", "injury_type_field");

    function injury_type(){

        global $post;

        $data = get_post_custom($post->ID);
        $val = isset($data['injury_type']) ? esc_attr($data['injury_type'][0]) : 'Accdient';

        echo '<input type="text" name="injury_type" id="injury_type" value="'.$val.'" />';
    }

    function save_injury_type(){
        global $post;

        if(isset($_POST["injury_type"])):
         
            update_post_meta($post->ID, "injury_type", $_POST["injury_type"]);
         
        endif;

    }
    add_action("save_post", "save_injury_type");
//
//
    function Bags_required_field(){
        add_meta_box("custom_bdo_field_05", "Bags Required", "Bags_required", "emergencyBlood", "normal", "low");
    }
    add_action("admin_init", "Bags_required_field");

    function Bags_required(){

        global $post;

        $data = get_post_custom($post->ID);
        $val = isset($data['Bags_required']) ? esc_attr($data['Bags_required'][0]) : '9';

        echo '<input type="text" name="Bags_required" id="Bags_required" value="'.$val.'" />';
    }

    function save_Bags_required(){
        global $post;

        if(isset($_POST["Bags_required"])):
         
            update_post_meta($post->ID, "Bags_required", $_POST["Bags_required"]);
         
        endif;

    }
    add_action("save_post", "save_Bags_required");
//
//
    function hospital_name_field(){
        add_meta_box("custom_bdo_field_06", "Hospital Name", "hospital_name", "emergencyBlood", "normal", "low");
    }
    add_action("admin_init", "hospital_name_field");

    function hospital_name(){

        global $post;

        $data = get_post_custom($post->ID);
        $val = isset($data['hospital_name']) ? esc_attr($data['hospital_name'][0]) : '9';

        echo '<input type="text" name="hospital_name" id="hospital_name" value="'.$val.'" />';
    }

    function save_hospital_name(){
        global $post;

        if(isset($_POST["hospital_name"])):
         
            update_post_meta($post->ID, "hospital_name", $_POST["hospital_name"]);
         
        endif;

    }
    add_action("save_post", "save_hospital_name");
//
//
    function hospital_address_field(){
        add_meta_box("custom_bdo_field_07", "Hospital Address", "hospital_address", "emergencyBlood", "normal", "low");
    }
    add_action("admin_init", "hospital_address_field");

    function hospital_address(){

        global $post;

        $data = get_post_custom($post->ID);
        $val = isset($data['hospital_address']) ? esc_attr($data['hospital_address'][0]) : '9';

        echo '<input type="text" name="hospital_address" id="hospital_address" value="'.$val.'" />';
    }

    function save_hospital_address(){
        global $post;

        if(isset($_POST["hospital_address"])):
         
            update_post_meta($post->ID, "hospital_address", $_POST["hospital_address"]);
         
        endif;

    }
    add_action("save_post", "save_hospital_address");
//


//Blood Donar Information

    //
        function DonarAge(){
            add_meta_box("custom_bdo_field_74", "Donar Age", "donarAgeField", "bangladesh_bdo_donar", "normal", "low");
            // add_meta_box( id, title, callback, screen, context, priority, callback_args )
            // add_action( tag, function_to_add, priority, accepted_args )
        }
        add_action("admin_init", "DonarAge");

        function donarAgeField(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_age_register']) ? esc_attr($data['Donar_age_register'][0]) : '';

            echo '<input type="text" name="Donar_age_register" id="Donar_age_register" value="'.$val.'" placeholder="Add Donar Age" readonly/>';
        }

        function save_Donar_age_register(){
            global $post;

            if(isset($_POST["Donar_age_register"])):
         
                update_post_meta($post->ID, "Donar_age_register", $_POST["Donar_age_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_age_register");
    //

    //
        function DonarGender(){
            add_meta_box("custom_bdo_field_75", "Donar gender", "donarGenderfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarGender");

        function donarGenderfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_gender_register']) ? esc_attr($data['Donar_gender_register'][0]) : '';

            echo '<input type="text" name="Donar_gender_register" id="Donar_gender_register" value="'.$val.'" placeholder="Donar Gender" readonly/>';
        }

        function save_Donar_gender_register(){
            global $post;

            if(isset($_POST["Donar_gender_register"])):
         
                update_post_meta($post->ID, "Donar_gender_register", $_POST["Donar_gender_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_gender_register");
    //

    //
        function DonarBloodGroup(){
            add_meta_box("custom_bdo_field_76", "Donar Blood Group", "DonarBloodGroupfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarBloodGroup");

        function DonarBloodGroupfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_bloodGroup_register']) ? esc_attr($data['Donar_bloodGroup_register'][0]) : '';

            echo '<input type="text" name="Donar_bloodGroup_register" id="Donar_bloodGroup_register" value="'.$val.'" placeholder="Blood Group register" readonly/>';
        }

        function save_Donar_bloodGroup_register(){
            global $post;

            if(isset($_POST["Donar_bloodGroup_register"])):
         
                update_post_meta($post->ID, "Donar_bloodGroup_register", $_POST["Donar_bloodGroup_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_bloodGroup_register");
    //

    //
        function DonarPresentDivision(){
            add_meta_box("custom_bdo_field_77", "Donar Present Division", "DonarPresentDivisionfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarPresentDivision");

        function DonarPresentDivisionfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_presentdivision_register']) ? esc_attr($data['Donar_presentdivision_register'][0]) : '';

            echo '<input type="text" name="Donar_presentdivision_register" id="Donar_presentdivision_register" value="'.$val.'" placeholder="Present Division" readonly/>';
        }

        function save_Donar_presentdivision_register(){
            global $post;

            if(isset($_POST["Donar_presentdivision_register"])):
         
                update_post_meta($post->ID, "Donar_presentdivision_register", $_POST["Donar_presentdivision_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_presentdivision_register");
    //

    //
        function DonarPresentDistrict(){
            add_meta_box("custom_bdo_field_78", "Donar Present District", "DonarPresentDistrictfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarPresentDistrict");

        function DonarPresentDistrictfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_presentdistrict_register']) ? esc_attr($data['Donar_presentdistrict_register'][0]) : '';

            echo '<input type="text" name="Donar_presentdistrict_register" id="Donar_presentdistrict_register" value="'.$val.'" placeholder="Present District" readonly/>';
        }

        function save_Donar_presentdistrict_register(){
            global $post;

            if(isset($_POST["Donar_presentdistrict_register"])):
         
                update_post_meta($post->ID, "Donar_presentdistrict_register", $_POST["Donar_presentdistrict_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_presentdistrict_register");
    //

    //
        function DonarPresentZilla(){
            add_meta_box("custom_bdo_field_79", "Donar Present Zilla", "DonarPresentZillafun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarPresentZilla");

        function DonarPresentZillafun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_presentzilla_register']) ? esc_attr($data['Donar_presentzilla_register'][0]) : '';

            echo '<input type="text" name="Donar_presentzilla_register" id="Donar_presentzilla_register" value="'.$val.'" placeholder="Present zilla" readonly/>';
        }

        function save_Donar_presentzilla_register(){
            global $post;

            if(isset($_POST["Donar_presentzilla_register"])):
         
                update_post_meta($post->ID, "Donar_presentzilla_register", $_POST["Donar_presentzilla_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_presentzilla_register");
    //

    //
        function DonarPresentFullAddress(){
            add_meta_box("custom_bdo_field_81", "Donar Present FullAddress", "DonarPresentFullAddressfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarPresentFullAddress");

        function DonarPresentFullAddressfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_presentFullAddress_register']) ? esc_attr($data['Donar_presentFullAddress_register'][0]) : '';

            echo '<input type="text" name="Donar_presentFullAddress_register" id="Donar_presentFullAddress_register" value="'.$val.'" placeholder="Present Full Address" readonly/>';
        }

        function save_Donar_presentFullAddress_register(){
            global $post;

            if(isset($_POST["Donar_presentFullAddress_register"])):
         
                update_post_meta($post->ID, "Donar_presentFullAddress_register", $_POST["Donar_presentFullAddress_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_presentFullAddress_register");
    //

    //
        function DonarpermanentDivision(){
            add_meta_box("custom_bdo_field_100", "Donar permanent Division", "DonarpermanentDivisionfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarpermanentDivision");

        function DonarpermanentDivisionfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_permanentdivision_register']) ? esc_attr($data['Donar_permanentdivision_register'][0]) : '';

            echo '<input type="text" name="Donar_permanentdivision_register" id="Donar_permanentdivision_register" value="'.$val.'" placeholder="permanent Division" readonly/>';
        }

        function save_Donar_permanentdivision_register(){
            global $post;

            if(isset($_POST["Donar_permanentdivision_register"])):
         
                update_post_meta($post->ID, "Donar_permanentdivision_register", $_POST["Donar_permanentdivision_register"]);
             
            endif;
            

        }
        add_action("save_post", "save_Donar_permanentdivision_register");
    //

    //
        function DonarpermanentDistrict(){
            add_meta_box("custom_bdo_field_101", "Donar permanent District", "DonarpermanentDistrictfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarpermanentDistrict");

        function DonarpermanentDistrictfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_permanentdistrict_register']) ? esc_attr($data['Donar_permanentdistrict_register'][0]) : '';

            echo '<input type="text" name="Donar_permanentdistrict_register" id="Donar_permanentdistrict_register" value="'.$val.'" placeholder="permanent District" readonly/>';
        }

        function save_Donar_permanentdistrict_register(){
            global $post;

            if(isset($_POST["Donar_permanentdistrict_register"])):
         
                update_post_meta($post->ID, "Donar_permanentdistrict_register", $_POST["Donar_permanentdistrict_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_permanentdistrict_register");
    //

    //
        function DonarpermanentZilla(){
            add_meta_box("custom_bdo_field_102", "Donar permanent Zilla", "DonarpermanentZillafun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarpermanentZilla");

        function DonarpermanentZillafun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_permanentzilla_register']) ? esc_attr($data['Donar_permanentzilla_register'][0]) : '';

            echo '<input type="text" name="Donar_permanentzilla_register" id="Donar_permanentzilla_register" value="'.$val.'" placeholder="permanent zilla" readonly/>';
        }

        function save_Donar_permanentzilla_register(){
            global $post;

            if(isset($_POST["Donar_permanentzilla_register"])):
         
                update_post_meta($post->ID, "Donar_permanentzilla_register", $_POST["Donar_permanentzilla_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_permanentzilla_register");
    //

    //
        function DonarpermanentFullAddress(){
            add_meta_box("custom_bdo_field_104", "Donar permanent FullAddress", "DonarpermanentFullAddressfun", "bangladesh_bdo_donar", "normal", "low");
        }
        add_action("admin_init", "DonarpermanentFullAddress");

        function DonarpermanentFullAddressfun(){

            global $post;

            $data = get_post_custom($post->ID);
            $val = isset($data['Donar_permanentFullAddress_register']) ? esc_attr($data['Donar_permanentFullAddress_register'][0]) : '';

            echo '<input type="text" name="Donar_permanentFullAddress_register" id="Donar_permanentFullAddress_register" value="'.$val.'" placeholder="permanent Full Address" readonly/>';
        }

        function save_Donar_permanentFullAddress_register(){
            global $post;

            if(isset($_POST["Donar_permanentFullAddress_register"])):
         
                update_post_meta($post->ID, "Donar_permanentFullAddress_register", $_POST["Donar_permanentFullAddress_register"]);
             
            endif;

        }
        add_action("save_post", "save_Donar_permanentFullAddress_register");
    //
//


if( !function_exists('tf_restrict_access_without_login') ):
 
    add_action( 'template_redirect', 'tf_restrict_access_without_login' );
 
    function tf_restrict_access_without_login(){
         
        /* get current page or post ID */
        $page_id = get_queried_object_id();

        global $bangladeshbdooption;
        $loginPageLink = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
        $accessReq1a = $bangladeshbdooption['donar_Profile_apply_access'];
        $accessReq2b = $bangladeshbdooption['donar_Profile_update_access'];
        $accessReq3c = $bangladeshbdooption['donar_Profile_dashboard_access'];
 
        /* add lists of page or post IDs for restriction */
        //$behind_login_pages = [ 21,25,29 ];
        $behind_login_pages = [ $accessReq1a,$accessReq2b,$accessReq3c ];
 
        if( ( !empty($behind_login_pages) && in_array($page_id, $behind_login_pages) ) && !is_user_logged_in() ):
 
            //wp_die('Please Login in first');
            wp_redirect($loginPageLink);
            return;
            exit;
 
        endif;
    }
 
endif;

add_role('blood_donar', 'Blood Donar', array(
    'read' => true, // True allows that capability
    'edit_posts' => true,
    'delete_posts' => true, // Use false to explicitly deny
));


function bangladesh_bdo_blood_donars_info($user) { 
    ?>
        <h3>Donar Information</h3>

        <table class="form-table">

            <tr>
                <th><label for="donar_weight"><?php _e("Donar weight"); ?></label></th>
                <td>
                    <input style="width: 50%;" type="text" name="donar_weight" id="donar_weight" value="<?php echo esc_attr( get_the_author_meta( 'donar_weight', $user->ID ) ); ?>" placeholder="Your Weight eg: 18KG"/><br/>
                    <span class="description"><?php _e("example : 10KG"); ?></span>
                </td>
            </tr>

            <tr>
                <th><label for="donar_age"><?php _e("Donar Age"); ?></label></th>
                <td>
                    <input style="width: 50%;" type="text" name="donar_age" id="donar_age" value="<?php echo esc_attr( get_the_author_meta( 'donar_age', $user->ID ) ); ?>" placeholder="Your age eg: 18"/><br/>
                    <span class="description"><?php _e("example : 18"); ?></span>
                </td>
            </tr>

            <tr>
                <th><label for="donar_gender"><?php _e("Donar gender"); ?></label></th>
                <td>
                    <input style="width: 50%;" type="text" name="donar_gender" id="donar_gender" value="<?php echo esc_attr( get_the_author_meta( 'donar_gender', $user->ID ) ); ?>" placeholder="Your gender eg: Male"/><br/>
                    <span class="description"><?php _e("example : male/female/trans gender/third gender"); ?></span>
                </td>
            </tr>

            <tr>
                <th><label for="donar_blood_group"><?php _e("Donar Blood Group"); ?></label></th>
                <td>
                    <select class="selectItem" name="donar_blood_group" id="bloodDOnarGroup">
                        <option value="<?php echo esc_attr( get_the_author_meta( 'donar_blood_group', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'donar_blood_group', $user->ID ) ); ?></option>
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
                </td>
            </tr>
            
            
        </table>

        <h3>Present Address</h3>

        <table class="form-table">

            <tr>
                <th><label for="donar_Presentdivision"><?php _e("Division"); ?></label></th>
                <td>
                
                    <select class="selectItem" name="donar_Presentdivision" id="bloodDOnarDIvision" >
                        <option value="<?php echo esc_attr( get_the_author_meta( 'donar_Presentdivision', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'donar_Presentdivision', $user->ID ) ); ?></option>
                        <option value="#">Select Division</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Rangpur">Rangpur</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <th><label for="donar_Presentdistrict"><?php _e("District"); ?></label></th>
                <td>
                    
                    <select class="selectItem" name="donar_Presentdistrict" id="bloodDonarDistrict">
                            <option value="<?php echo esc_attr( get_the_author_meta( 'donar_Presentdistrict', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'donar_Presentdistrict', $user->ID ) ); ?></option>
                            <option value="#">select District</option>
                    </select>
                    
                </td>
            </tr>
            
            <tr>
                <th><label for="donar_Presentzilla"><?php _e("zilla"); ?></label></th>
                <td>
                    
                <select class="selectItem" name="donar_Presentzilla" id="bloodDonarUpzilla">
                    <option value="<?php echo esc_attr( get_the_author_meta( 'donar_Presentzilla', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'donar_Presentzilla', $user->ID ) ); ?></option>
                    <option value="#">select District</option>
                </select>

                </td>
            </tr>
            
            <!-- <tr>
                <th><label for="donar_Presentupzilla"><?php _e("Upzilla"); ?></label></th>
                <td>
                    <input style="width: 50%;" type="text" name="donar_Presentupzilla" id="donar_Presentupzilla" value="<?php echo esc_attr( get_the_author_meta( 'donar_Presentupzilla', $user->ID ) ); ?>" placeholder="Your Upzilla eg: Santahar"/><br/>
                    <span class="description"><?php _e("example : 10KG"); ?></span>
                </td>
            </tr> -->

            <tr>
                <th><label for="donar_PresentFullAddress"><?php _e("Upzilla"); ?></label></th>
                <td>
                    <input style="width: 50%;" type="text" name="donar_PresentFullAddress" id="donar_PresentFullAddress" value="<?php echo esc_attr( get_the_author_meta( 'donar_PresentFullAddress', $user->ID ) ); ?>" placeholder="Your Present Address eg: Full Address"/><br/>
                    <span class="description"><?php _e("example : 10KG"); ?></span>
                </td>
            </tr>
            
            
        </table>

        <h3>Permanent Address</h3>

        <table class="form-table">

            <tr>
                <th><label for="donar_Permanentdivision"><?php _e("Division"); ?></label></th>
                <td>

                <select class="selectItem" name="donar_Permanentdivision" id="bloodDOnarDIvisionper" >
                        <option value="<?php echo esc_attr( get_the_author_meta( 'donar_Permanentdivision', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'donar_Permanentdivision', $user->ID ) ); ?></option>
                        <option value="#">Select Division</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Rangpur">Rangpur</option>
                    </select>

                </td>
            </tr>
            
            <tr>
                <th><label for="donar_Permanentdistrict"><?php _e("District"); ?></label></th>
                <td>

                <select class="selectItem" name="donar_Permanentdistrict" id="bloodDonarDistrictper">
                        <option value="<?php echo esc_attr( get_the_author_meta( 'donar_Permanentdistrict', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'donar_Permanentdistrict', $user->ID ) ); ?></option>
                        <option value="#">select District</option>
                </select>


                    
                </td>
            </tr>
            
            <tr>
                <th><label for="donar_Permanentzilla"><?php _e("zilla"); ?></label></th>
                <td>

                <select class="selectItem" name="donar_Permanentzilla" id="bloodDonarUpzillaper">
                    <option value="<?php echo esc_attr( get_the_author_meta( 'donar_Permanentzilla', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'donar_Permanentzilla', $user->ID ) ); ?></option>
                    <option value="#">select District</option>
                </select>


                </td>
            </tr>
            
            
            <tr>
                <th><label for="donar_PermanentFullAddress"><?php _e("Full Address"); ?></label></th>
                <td>
                    <input style="width: 50%;" type="text" name="donar_PermanentFullAddress" id="donar_PermanentFullAddress" value="<?php echo esc_attr( get_the_author_meta( 'donar_PermanentFullAddress', $user->ID ) ); ?>" placeholder="Your Present Address eg: Full Address"/><br/>
                    <span class="description"><?php _e("example : 10KG"); ?></span>
                </td>
            </tr>
            
            
        </table>

    <?php 
}
add_action( 'show_user_profile', 'bangladesh_bdo_blood_donars_info' );
add_action( 'edit_user_profile', 'bangladesh_bdo_blood_donars_info' );

function save_extra_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }

    update_user_meta( $user_id, 'donar_weight', $_POST['donar_weight'] );
    update_user_meta( $user_id, 'donar_age', $_POST['donar_age'] );
    update_user_meta( $user_id, 'donar_gender', $_POST['donar_gender'] );
    update_user_meta( $user_id, 'donar_blood_group', $_POST['donar_blood_group'] );
    update_user_meta( $user_id, 'donar_Presentdivision', $_POST['donar_Presentdivision'] );
    update_user_meta( $user_id, 'donar_Presentdistrict', $_POST['donar_Presentdistrict'] );
    update_user_meta( $user_id, 'donar_Presentzilla', $_POST['donar_Presentzilla'] );
    // update_user_meta( $user_id, 'donar_Presentupzilla', $_POST['donar_Presentupzilla'] );
    update_user_meta( $user_id, 'donar_PresentFullAddress', $_POST['donar_PresentFullAddress'] );
    update_user_meta( $user_id, 'donar_Permanentdivision', $_POST['donar_Permanentdivision'] );
    update_user_meta( $user_id, 'donar_Permanentdistrict', $_POST['donar_Permanentdistrict'] );
    update_user_meta( $user_id, 'donar_Permanentzilla', $_POST['donar_Permanentzilla'] );
    update_user_meta( $user_id, 'donar_Permanentupzilla', $_POST['donar_Permanentupzilla'] );
    update_user_meta( $user_id, 'donar_PermanentFullAddress', $_POST['donar_PermanentFullAddress'] );
}
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );


// function my_login_redirect( $redirect_to, $request, $user ) {
//     //validating user login and roles
//     if (isset($user->roles) && is_array($user->roles)) {
//         //is this a gold plan subscriber?
//         if (in_array('administrator', $user->roles)) {
//             // redirect them to their special plan page
//             $redirect_to = "https://mysite.com/gold-member";
//         } else {
//             //all other members
//             $redirect_to = "https://mysite.com/members";;
//         }
//     }
//     return $redirect_to;
// }
 
// add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

// add_action( 'template_redirect', 'redirect_to_specific_page' );

// function redirect_to_specific_page() {

// if ( is_page('wp-admin.php') && ! is_user_logged_in() ) {

//     global $bangladeshbdooption;
//     $loginPageLink = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
// wp_redirect( 'http://localhost/bangladeshbdo/donar-login/', 301 ); 
//   exit;
//     }
// }
// add_action( 'template_redirect', 'redirect_to_specific_pagess' );

// function redirect_to_specific_pagess() {

// if ( is_page('wp-login.php') && ! is_user_logged_in() ) {

//     global $bangladeshbdooption;
//     $loginPageLink = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
// wp_redirect( 'http://localhost/bangladeshbdo/donar-login/', 301 ); 
//   exit;
//     }
// }

//lOGIN PAGE
    //lOGIN PAGE REDIRECT//
    function goto_login_page() {
        global $page_id, $bangladeshbdooption;
        $login_page = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
        $page = basename($_SERVER['REQUEST_URI']);
        
            if( $page == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {
            wp_redirect($login_page);
            exit;
            }
        }
    add_action('init','goto_login_page');

    function goto_login_pageWWP() {
        global $page_id, $bangladeshbdooption;
        $login_page = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
        $page = basename($_SERVER['REQUEST_URI']);
        
            if( $page == 'wp-login' && $_SERVER['REQUEST_METHOD'] == 'GET') {
            wp_redirect($login_page);
            exit;
            }
        }
    add_action('init','goto_login_pageWWP');
//lOGIN PAGE REDIRECT//

//ADMIN PAGE wp//

    function goto_login_pageWP() {
        global $page_id, $bangladeshbdooption;
        $login_page = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
        $page = basename($_SERVER['REQUEST_URI']);

            if ( !current_user_can( 'manage_options') && $page == 'wp-admin.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {

                wp_redirect($login_page);
                exit;
                
            }else{}
        
           
        }
    add_action('init','goto_login_pageWP');

    function goto_login_pageWPWWP() {
        global $page_id, $bangladeshbdooption;
        $login_page = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
        // $login_pageadmin = home_url().'/wp-admin';
        $page = basename($_SERVER['REQUEST_URI']);

            if ( !current_user_can( 'manage_options') && $page == 'wp-admin' && $_SERVER['REQUEST_METHOD'] == 'GET') {

                wp_redirect($login_page);
                exit;
                
            }else{}

        }
    add_action('init','goto_login_pageWPWWP');
//ADMIN PAGE wp//

//lOGIN PAGE

add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit;
}

add_action( 'wp_login_failed', 'pippin_login_fail' );  // hook failed login
function pippin_login_fail( $username ) {
     $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
     // if there's a valid referrer, and it's not the default log-in screen
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
          wp_redirect(home_url());  // let's append some information (login=failed) to the URL for the theme to use
          exit;
     }
}

//Forgot Password Password

/**
 * Redirects the user to the custom "Forgot your password?" page instead of
 * wp-login.php?action=lostpassword.
 */
function redirect_to_custom_lostpassword() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        if ( is_user_logged_in() ) {
            $this->redirect_logged_in_user();
            exit;
        }else{
            global $bangladeshbdooption;
            $forgetPassword = home_url().'/'.$bangladeshbdooption['donar_forgot_password'];
            wp_redirect($forgetPassword);
        }
        
        exit;
    }
}

add_action( 'login_form_lostpassword', 'redirect_to_custom_lostpassword');

/**
 * Initiates password reset.
 */
function do_password_lost() {
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $errors = retrieve_password();
        if ( is_wp_error( $errors ) ) {
            // Errors found
            global $bangladeshbdooption;
            $redirect_url = home_url().'/'.$bangladeshbdooption['donar_forgot_password'];
            $redirect_url = add_query_arg( 'errors', join( ',', $errors->get_error_codes() ), $redirect_url );
        } else {
            // Email sent
            global $bangladeshbdooption;
            $redirect_url = home_url().'/'.$bangladeshbdooption['donar_Profile_login'];
            $redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_url );
        }
 
        wp_redirect( $redirect_url );
        exit;
    }
}

add_action( 'login_form_lostpassword', 'do_password_lost');


 /**
  * Returns the message body for the password reset mail.
  * Called through the retrieve_password_message filter.
  *
  * @param string  $message    Default mail message.
  * @param string  $key        The activation key.
  * @param string  $user_login The username for the user.
  * @param WP_User $user_data  WP_User object.
  *
  * @return string   The mail message to send.
  */
 function replace_retrieve_password_message( $message, $key, $user_login, $user_data ) {
     // Create new message
     $msg  = __( 'Hello!', 'bdo' ) . "\r\n\r\n";
     $msg .= sprintf( __( 'You asked us to reset your password for your account using the email address %s.', 'bdo' ), $user_login ) . "\r\n\r\n";
     $msg .= __( "If this was a mistake, or you didn't ask for a password reset, just ignore this email and nothing will happen.", 'bdo' ) . "\r\n\r\n";
     $msg .= __( 'To reset your password, visit the following address:', 'bdo' ) . "\r\n\r\n";
     global $bangladeshbdooption;
     $loginAccess = $bangladeshbdooption['donar_forgot_password_reset'];
     $msg .= site_url( $loginAccess."?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . "\r\n\r\n";
     $msg .= __( 'Thanks!', 'bdo' ) . "\r\n";
 
     return $msg;
 }

 add_filter( 'retrieve_password_message', 'replace_retrieve_password_message', 10, 4 );


/**
 * Redirects to the custom password reset page, or the login page
 * if there are errors.
 */
function redirect_to_custom_password_reset() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        // Verify key / login combo
        $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                global $bangladeshbdooption;
                $redirect_url_expired = $bangladeshbdooption['donar_forgot_password_reset'];
                wp_redirect( home_url( $redirect_url_expired.'?login=expiredkey' )  );
            } else {
                global $bangladeshbdooption;
                $redirect_url_invalid = $bangladeshbdooption['donar_forgot_password_reset'];
                wp_redirect( home_url( $redirect_url_invalid.'?login=invalidkey' )  );
            }
            exit;
        }
 
        global $bangladeshbdooption;
        $redirect_url = home_url().'/'.$bangladeshbdooption['donar_forgot_password_reset'];
        $redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
        $redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );
 
        wp_redirect( $redirect_url );
        exit;
    }
}

add_action( 'login_form_rp', 'redirect_to_custom_password_reset');
add_action( 'login_form_resetpass', 'redirect_to_custom_password_reset');

/**
 * Resets the user's password if the password reset form was submitted.
 */
add_action( 'login_form_rp', 'do_password_reset');
add_action( 'login_form_resetpass', 'do_password_reset');

function do_password_reset() {
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $rp_key = $_REQUEST['rp_key'];
        $rp_login = $_REQUEST['rp_login'];
        $user = check_password_reset_key( $rp_key, $rp_login );
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                global $bangladeshbdooption;
                $memberLogin = $bangladeshbdooption['donar_Profile_login'];
                wp_redirect( home_url( $memberLogin.'?login=expiredkey' ) );
            } else {
                global $bangladeshbdooption;
                $memberLoginPage = $bangladeshbdooption['donar_Profile_login'];
                wp_redirect( home_url( $memberLoginPage.'?login=invalidkey' ) );
            }
            exit;
        }
        if ( isset( $_POST['pass1'] ) ) {
            if ( $_POST['pass1'] != $_POST['pass2'] ) {
                // Passwords don't match
                global $bangladeshbdooption;
                $redirect_url = home_url().'/'.$bangladeshbdooption['donar_forgot_password_reset'];
                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );
                wp_redirect( $redirect_url );
                exit;
            }
            if ( empty( $_POST['pass1'] ) ) {
                // Password is empty
                global $bangladeshbdooption;
                $redirect_url = home_url().'/'.$bangladeshbdooption['donar_forgot_password_reset'];
                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'error', 'password_reset_empty', $redirect_url );
                wp_redirect( $redirect_url );
                exit;
            }
            // Parameter checks OK, reset password
            reset_password( $user, $_POST['pass1'] );
            global $bangladeshbdooption;
            $memberLogins = $bangladeshbdooption['donar_Profile_login'];
            wp_redirect( $memberLogins.'?password=changed' );
        } else {
            echo "Invalid request.";
        }
        exit;
    }
}



//

//

    /* auto-detect the server so you only have to enter the front/from half of the email address, including the @ sign */
function xyz_filter_wp_mail_from($email){
    /* start of code lifted from wordpress core, at http://svn.automattic.com/wordpress/tags/3.4/wp-includes/pluggable.php */
    $sitename = strtolower( $_SERVER['SERVER_NAME'] );
    if ( substr( $sitename, 0, 4 ) == 'www.' ) {
    $sitename = substr( $sitename, 4 );
    }
    /* end of code lifted from wordpress core */
    $myfront = "noreplay@";
    $myback = $sitename;
    $myfrom = $myfront . $myback;
    return $myfrom;
}
add_filter("wp_mail_from", "xyz_filter_wp_mail_from");

/* enter the full name you want displayed alongside the email address */
/* from http://miloguide.com/filter-hooks/wp_mail_from_name/ */
function xyz_filter_wp_mail_from_name($from_name){
    return "https://bangladeshbdo.com";
    }
    add_filter("wp_mail_from_name", "xyz_filter_wp_mail_from_name");

//

function toDraft($pid){

    $toDraft = $_POST['selectDonar'];
    if($toDraft == 'draft'){
        echo "YOU CANT";
        wp_update_post(array('ID' => $pid, 'post_status'   =>  'draft'));
    }
    
}

function toPublish($pid){

    $toPublish = $_POST['selectDonar'];
    if($toPublish == 'publish'){
        echo "YOU CAN";
        wp_update_post(array('ID' => $pid, 'post_status'   =>  'publish'));
    }
    
}

// function toDraft($pid){

    //     $toDraft = $_POST['draft'];
    //     if($toDraft == 'ok'){
    //         echo "Your status you cant";
    //         wp_update_post(array('ID' => $pid, 'post_status'   =>  'draft'));
    //     }
        
    // }

    // function toPublish($pid){

    //     $toPublish = $_POST['publish'];
    //     if($toPublish == 'done'){
    //         echo "Your Status You can";
    //         wp_update_post(array('ID' => $pid, 'post_status'   =>  'publish'));
    //     }
    
// }
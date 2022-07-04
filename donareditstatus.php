<?php /* Template Name: Donar status edit */

get_header();
?>

<div class="container">

<?php $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '-1' ) ); ?>
 
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
 
<?
if ( isset( $_GET['post'] ) ) {

    global $current_post;
    $post_information = array(
        'ID' => $current_post,
        'post_title' =>  wp_strip_all_tags( $_POST['postTitle'] ),
        'post_content' => $_POST['postContent'],
        'post_type' => 'post',
        'post_status' => 'pending'
    );
    $post_id = wp_update_post( $post_information );
     
     if ( $_GET['post'] == $post->ID )
     {
         $current_post = $post->ID;
         $title = get_the_title();
         $content = get_the_content();
     }
 }
 ?>
    <form action="" id="primaryPostForm" method="POST">
 
        <fieldset>

            <label for="postTitle"><?php _e( 'Post\'s Title:', 'framework' ); ?></label>

            <input type="text" name="postTitle" id="postTitle" value="<?php echo $title; ?>" class="required" />

        </fieldset>

        <?php if ( $postTitleError != '' ) { ?>
            <span class="error"><?php echo $postTitleError; ?></span>
            <div class="clearfix"></div>
        <?php } ?>

        <fieldset>
                    
            <label for="postContent"><?php _e( 'Post\'s Content:', 'framework' ); ?></label>

            <textarea name="postContent" id="postContent" rows="8" cols="30"><?php echo $content; ?></textarea>

        </fieldset>

        <fieldset>
            
            <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>

            <input type="hidden" name="submitted" id="submitted" value="true" />
            <button type="submit"><?php _e( 'Update Post', 'framework'); ?></button>

        </fieldset>

    </form>
 
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>



</div>





<?php
get_footer();

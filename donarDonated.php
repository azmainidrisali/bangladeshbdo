<?php /* Template Name: Donar Donation Status Update */


get_header();
?>

<div class="container">
    <table>
    
    <tr>
        <th>Post Title</th>
        <th>Post Excerpt</th>
        <th>Post Status</th>
        <th>Actions</th>
    </tr>

    <?php
        $query = new WP_Query( array(
            'post_type' => 'bangladesh_bdo_donar',
            'posts_per_page' => '-1',
            'post_status' => array(
                'publish',
                'pending',
                'draft',
                'private',
                'trash'
            )
        ) );
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        
            <tr>
                <td><?php echo get_the_title(); ?></td>
                <td><?php the_excerpt(); ?></td>
                <td><?php echo get_post_status( get_the_ID() ) ?></td>
                <form action="" method="POST" >
                    <select name="selectDonar" id="donar">
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                    </select>
                    <input type="submit" value="done">
                </form>
                <?php toPublish($post->ID);?>
                <?php toDraft($post->ID);?>
            </tr>
            
        <?php endwhile; 
        endif; ?>

        </table>
    </div>
    
<?php
get_footer();
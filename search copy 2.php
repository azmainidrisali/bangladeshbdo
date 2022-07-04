if($text!="" && $minsqft=="" && $maxsqft=="" && $price=="")
						{
						
						$the_query = new WP_Query( array( 
						'post_type' => 'property',
						'paged' => $paged,
						'meta_query'=>array(
						     array(
							  'key'=>'prp_ulocation',
							  'value'=>$text,
							  'compare'=>'LIKE'
						          )	  	   
						   )));
						}
						else if($text=="" && $minsqft!="" && $maxsqft!="" && $price=="")
						{
							$the_query = new WP_Query( array( 
							'post_type' => 'property',
							'paged' => $paged,
							'meta_query'=>array(
							
								array(
								  'key'=>'prp_sqft',
								  'type'=>'NUMERIC',
								  'value'=>array($minsqft,$maxsqft),
								  'compare'=>'BETWEEN'
									  )	  	   
							   )));
						}
						else if($text=="" && $minsqft=="" && $maxsqft=="" && $price!="")
						{
							$the_query = new WP_Query( array( 
								'post_type' => 'property',
								'paged' => $paged,
								'meta_query'=>array(
								
									array(
									  'key'=>'prp_uprice',
									  'type'=>'NUMERIC',
									  'value'=>$price,
									  'compare'=>'<='
										  )	  	  	   
								   )));	
						}
						else if($text!="" && $minsqft=="" && $maxsqft=="" && $price!="")
						{
							$the_query = new WP_Query( array( 
								'post_type' => 'property',
								'paged' => $paged,
								'meta_query'=>array(
								
									array(
									  'key'=>'prp_uprice',
									  'type'=>'NUMERIC',
									  'value'=>$price,
									  'compare'=>'<='
										  ),
									array(
									  'key'=>'prp_ulocation',
									  'value'=>$text,
									  'compare'=>'LIKE'
										  )		  
										  	  	   
								   )));	
						}
						else if($text=="" && $minsqft!="" && $maxsqft!="" && $price!="")
						{
							$the_query = new WP_Query( array( 
								'post_type' => 'property',
								'paged' => $paged,
								'meta_query'=>array(
								
									array(
									  'key'=>'prp_uprice',
									  'type'=>'NUMERIC',
									  'value'=>$price,
									  'compare'=>'<='
										  ),
									array(
									  'key'=>'prp_sqft',
									  'type'=>'NUMERIC',
									  'value'=>array($minsqft,$maxsqft),
									  'compare'=>'BETWEEN'
										  )		  
										  	  	   
								   )));	
						}
						else if($text!="" && $minsqft!="" && $maxsqft!="" && $price=="")
						{
							$the_query = new WP_Query( array( 
								'post_type' => 'property',
								'paged' => $paged,
								'meta_query'=>array(
								
									array(
										  'key'=>'prp_ulocation',
										  'value'=>$text,
										  'compare'=>'LIKE'
										  ),
									array(
									  'key'=>'prp_sqft',
									  'type'=>'NUMERIC',
									  'value'=>array($minsqft,$maxsqft),
									  'compare'=>'BETWEEN'
										  )		  
										  	  	   
								   )));	
						}
						else
						{
							$the_query = new WP_Query( array( 
							'post_type' => 'property',
							'paged' => $paged,
							'meta_query'=>array(
								 array(
								  'key'=>'prp_ulocation',
								  'value'=>$text,
								  'compare'=>'LIKE'
									  ),
								 array(
								  'key'=>'prp_sqft',
								  'type'=>'NUMERIC',
								  'value'=>array($minsqft,$maxsqft),
								  'compare'=>'BETWEEN'
									  ),
								 array(
									  'key'=>'prp_uprice',
									  'type'=>'NUMERIC',
									  'value'=>$price,
									  'compare'=>'<='
									  )	  	 	  	
							   )));  
						}


                        <?php
if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
    set_query_var( 'postid1', $_POST['postid'] );
    wp_update_post( array( 'ID' => get_query_var( 'postid1' ), 'post_status' => 'draft' ) ); 
}; ?>
    <?php query_posts( array( 'author' => $current_user->ID,'post_status' =>  'publish' , 'post_type' => array(    'bangladesh_bdo_donar' )  ) ); ?>
    <?php if ( !have_posts() ): ?>
    <div class="info" id="message">
        <p>
            <?php _e( 'No Lists found.', 'lists' ); ?>
        </p>
    </div>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title center">Your Lists</h1>
    </header>
    <div class="entry-content">
        <div class="table style1">
            <div class="tr">
                <div class="td style2">
                    <h2>Date And Time</h2>
                </div>
                <div class="td">
                    <h2>Delete</h2>
                </div>
            </div>
                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <?php echo '<div class="tr"><div class="td style2">';
                echo '<a href="'; the_permalink(); echo '">'; the_time('F j, Y'); ?> at
                <?php the_time('g:i a'); echo '</a>';
                    echo '</div><div class="td">'; ?>
                <?php  change_post_status( the_ID, 'private'); ?>
                <form class="delete-list" action="" method="post">
                    <input type="hidden" name="postid" value="<?php the_ID(); ?>" />
                    <input class="more-button" type="submit"  value="Delete" />
                </form>
                <?php  echo '</div></div>'; ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
                <div class="tr">
                    <div class="td style2">
                        <h2>Date And Time</h2>
                    </div>
                    <div class="td">
                        <h2>Delete</h2>
                    </div>
                </div>
            </div>
        </div><!-- .entry-content --> 
</article>
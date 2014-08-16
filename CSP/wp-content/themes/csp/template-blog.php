<?php
/*
Template Name Posts: Blog
*/
?>
<?php get_header(); ?>
	
		<!--sub head container--><div id="subhead_container">

			<div id="subhead_wrapper">
				<div id="subhead">
		
<h1><?php the_title(); ?> template</h1>
			
			</div>
			
			
			
			<div class="clear"></div>
			
		</div>
	</div>	


	<!--content-->
<div id="content_container">
	
	<div id="content">
		
		<div id="left-col">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	

			<div class="post-entry">

			<div class="meta-data">
			
			
			
			</div><!--meta data end-->
			<div class="clear"></div>

						<?php the_content( __( '', 'wpbootstrap' ) ); ?>
						<div class="clear"></div>
			
						
						
						
				 
						
					</div><!--post-entry end-->
	

				

<?php endwhile; ?>

</div> <!--left-col end-->



	</div> 
</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>
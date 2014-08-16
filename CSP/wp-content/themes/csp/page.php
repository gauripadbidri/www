<?php

/* for get the X words from perticuler string */
function run_get_counted_word( $new_string, $str_chr_count = 140 ) {
    
    
    
  	$new_string_arr = explode( ' ', $new_string );
  	$return_str = '';
  	for( $i=0; $i < count($new_string_arr); $i++ ) {
  	
  		
  		if( strlen($return_str.' '.$new_string_arr[$i]) >= $str_chr_count ) {
  			break;
  		} else {
  			$return_str = $return_str.' '.$new_string_arr[$i];  		
  		}
  	}  	
  	
	return $return_str."";
}
?>

<?php get_header(); ?>
<section id="body">
    <section class="col-md-offset-1 col-lg-12 col-md-12">
        <div id="image-section" class=" col-lg-10 col-md-7 img-responsive">
        </div>
        <div class="col-lg-3 col-md-3">
        </div>
    </section>
    <section>
        <div>

                        <div id="footer-heading">News & Events</div>
                       
                        <div id="footer-bar1">

                        </div><!--footer 1 end-->
                        <div id="footer-bar2">
                            <?php
                           $args = array( 'post_type' => 'news');
                           
                            $loop = new WP_Query( $args );

                                        echo '<div class="run-list-page">';
                                        while ( $loop->have_posts() ) : $loop->the_post();


                                                echo '<div class="run_list_news">';
                        //			echo '<div>'.get_the_date().'</div>';
                                                echo '<div class="news-content"><span class="news-title">' . get_the_title() . ': </span>'; //get_the_post_thumbnail($loop->ID,'thumbnail');

                                                $content_srt = get_the_content();

                                                echo run_get_counted_word($content_srt) . '<a href='.get_permalink().'>&nbsp;Read More</a></div>';
                        //			echo '<div class="readmore"></div>';
                        //			echo '<p>&nbsp;</p></div>';
                                                echo '<hr class="clearboth">';
                                        endwhile;
                                        echo '</div>';
                                        ?>
                        </div><!--footer 2 end-->

                        </ul>
        </div>
    </section>
    <section>
        <div>

        </div>
    </section>
</section>
<?php get_footer(); ?>
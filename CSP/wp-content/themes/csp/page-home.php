<?php
/*
  Template Name: Home
  MultiEdit: OrangeSection,GreenSection,BlueSection,ImageInfo
 */

/* for get the X words from perticuler string */

function run_get_counted_word($new_string, $str_chr_count = 140) {
    $new_string_arr = explode(' ', $new_string);
    $return_str = '';
    for ($i = 0; $i < count($new_string_arr); $i++) {
        if (strlen($return_str . ' ' . $new_string_arr[$i]) >= $str_chr_count) {
            break;
        } else {
            $return_str = $return_str . ' ' . $new_string_arr[$i];
        }
    }

    return $return_str . "";
}

get_header();
?>
<section id="body">    
  <div class="container home">
        <section id="datatitle" class="col-lg-12 col-md-12">
            <div class="col-lg-12 col-md-12" style="background:whitesmoke; height:5px"></div>
            <div id="image-section" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding: 0px;">
              <?php
                $argsThumb = array(
                 'posts_per_page' => 1,
                 'order'          => 'ASC',
                 'post_type'      => 'attachment',
                 'post_parent'    => $post->ID,
                 'post_mime_type' => 'image',
                 'post_status'    => null
                );
                $attachments = get_posts($argsThumb);
                if ($attachments) {
                 foreach ($attachments as $attachment) {
                  echo '<img id="news-img" class="img-responsive" src="'.wp_get_attachment_url($attachment->ID, 'thumbnail', false, false).'" />';
                 }
                } else {
                  echo '<img id="news-img" class="img-responsive" src="/wp-content/themes/csp/images/home.jpg" />';
                }
            ?>
              <div id="dialogContainer">
              <?php get_template_part('content', 'opaqueDiv');?>
            </div>
            </div>
            <div style="background-color: #ddd;color: black;" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 imageInfoSection">
                <p>
                    <h3><?php echo rwmb_meta('meta_ImageText'); ?></h3>
                </p>
                <span >
                  <?php multieditDisplay("ImageInfo") ?>
                </span>
                </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:whitesmoke; height:5px"></div>
        </section>
        <section id="colorSection" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div>            
            <div id="backup" class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div>
                  <h5>
                    <?php echo rwmb_meta('meta_GreenText'); ?>
                  </h5>
                  <p>
                    <?php multieditDisplay("GreenSection") ?>
                  </p>
                </div> 
            </div>
            <div id="cloud" class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div>
                  <h5><?php echo rwmb_meta('meta_BlueText'); ?>
                  </h5>
                  <p>
                    <?php multieditDisplay("BlueSection") ?>
                  </p>
                </div> 
            </div>
            <div id="network" class="col-md-4 col-lg-4  col-sm-12 col-xs-12">
              <div>
                <h5>
                  <?php echo rwmb_meta('meta_OrangeText'); ?>
                </h5>
                <p>
                  <?php multieditDisplay("OrangeSection") ?>
                </p>
              </div>
            </div>
                </div>
        </section>
        
        <section id="home_news" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="bodycontent">
            <section id="body_left" class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div>
                    <div id="news">News & Events</div>

                    <div id="news_content">
                        <?php
                          $args = array('post_type' => 'news', 'posts_per_page' => 5);
                          $loop = new WP_Query($args);
                          echo '<div class="run-list-page">';
                            while ($loop->have_posts()) : $loop->the_post();
                                echo '<div class="run_list_news">';
                                echo '<div class="news-content"><span class="news-title">' . get_the_title() . ': </span>'; 
                                $content_srt = get_the_content();
                                echo '<span class="news-text">' .run_get_counted_word($content_srt, 250) . '</span><a href=' . get_permalink() . '>&nbsp;Read More</a></div>';
                            endwhile;
                          echo '</div>';
                        ?>
                    </div><!--footer 2 end-->
                </div>               
            </section>
            <section id="body_right" class="mediaClear col-md-4 col-lg-4">
                    <div id="contact">
                      Help Desk
                    </div>
                  <?php get_template_part('template','contact'); ?>
                </section>
                </div>
        </section>
    </div>
</section>
<?php get_footer(); ?>
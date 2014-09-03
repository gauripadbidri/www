<?php
/*
  Template Name: Retail
  MultiEdit: ImageInfo,LeftRow1,LeftRow2,LeftRow3,RightRow1,RightRow2
 */
?>

<?php get_header(); ?>
<section id="body" class="retail-template">
    <div class="container retail">

        <section id="retailImgSection" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:whitesmoke; height:5px"></div>
            <div id="image-section" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding: 0px">
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
                  echo '<img id="news-img" class="img-responsive" src="/wp-content/themes/csp/images/retail.jpg" />';
                }
            ?>
              <div id="dialogContainer">
                <?php 
                  if (!is_page( 'Help Desk' ))
                    get_template_part('content', 'opaqueDiv');
                ?>
              </div>
            </div>
            <div id="image-description" style="background-color: gray; " class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <p>
                    <h3><?php echo rwmb_meta('meta_RetailImageHeader'); ?></h3>
                </p>
                <span style="color: white;">
                   <?php multieditDisplay("ImageInfo") ?>  
                </span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:whitesmoke; height:5px"></div>
        </section>
        <section id="retail2" class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section id="bottom_left" class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                    <div>
                        <span class="retail_title"><?php echo rwmb_meta('meta_LeftRow1Text'); ?></span><span class="retail_text"><?php multieditDisplay("LeftRow1") ?></span>
                    </div>
                    <div>
                        <span class="retail_title"><?php echo rwmb_meta('meta_LeftRow2Text'); ?></span><span class="retail_text"><?php multieditDisplay("LeftRow2") ?></span>
                    </div>
                    <div>
                        <span class="retail_title"><?php echo rwmb_meta('meta_LeftRow3Text'); ?></span><span class="retail_text"><?php multieditDisplay("LeftRow3") ?></span>
                    </div>
            </section>

            <section id="bottom_right" class="col-md-offset-1 col-lg-offset-1 col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div id="contact">
                    <span class="retail_title">Help Desk</span>
                    <?php get_template_part('template','contact'); ?>
                </div>
                <hr class="clearboth" />
                <div id="retail_sidebar">
                    <div>
                        <?php if (is_page ('Help Desk') ) {
                           echo '<span class="retail_title">Corporate Headquarters</span>';
                           echo '<span class="retail_text">' . get_template_part('template', 'headquarters') . '</span>';
                          } else {
                           echo '<span class="retail_title">' . rwmb_meta("meta_RightRow1Text") . '</span>';
                           echo '<span class="retail_text">' . multieditDisplay("RightRow1") . '</span>';
                          }
                        ?>
                    </div>
                    <hr class="clearboth" />
                    <div>
                      <?php if (is_page ('Help Desk') ) {
                           echo '<span class="retail_title">Corporate Emails</span>';
                           echo '<span class="retail_text">' . get_template_part('template', 'emails') . '</span>';
                          } else {
                           echo '<span class="retail_title">' . rwmb_meta("meta_RightRow2Text") . '</span>';
                           echo '<span class="retail_text">' . multieditDisplay("RightRow2") . '</span>';
                          }
                        ?>
                    </div>
                </div>
            </section>
        </section>


    </div>
</section>
<?php get_footer(); ?>
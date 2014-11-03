<?php
/*
  Template Name: Level 3
 * MultiEdit: CloudImageText,Row1Col1Text,Row1Col2Text,Row2Col1Text,Row2Col2Text
 */
?>

<?php get_header(); ?>
<section id="body" class="cloud-template">
    <div class="container cloud">        
        <!-- upper image container -->
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
                  echo '<img id="news-img" class="img-responsive" src="/wp-content/themes/csp/images/Cloud_Closed.jpg" />';
                }
            ?>
              <div id="dialogContainer">
                <?php get_template_part('content', 'opaqueDiv');?>
              </div>
            </div>
            <div style="background-color: #5590cc;" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 imageInfoSection">
                <p>
                    <h3><?php echo rwmb_meta('meta_CloudImageHeader'); ?></h3>
                </p>
                <span style="color: white;">
                   <?php multieditDisplay("CloudImageText") ?>  
                </span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:whitesmoke; height:5px"></div>
        </section>
        <section id="datadescription"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row datacontainer ">
                <section  class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sectiondata">
                    <div class="title">
						<!--[if lt IE 9]> <img src="/wp-content/themes/csp/images/Cloud_Open_im4.jpg" style="margin-top:-20px;"/> <![endif]-->
                      <span class="vAlignCenter"><?php echo rwmb_meta('meta_Row1Col1Text'); ?></span>
                    </div>
                    <div> <?php multieditDisplay("Row1Col1Text") ?> </div>
                </section>
                <section class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sectiondata">
                    <div class="title">
					<!--[if lt IE 9]> <img src="/wp-content/themes/csp/images/Cloud_Open_im4.jpg" style="margin-top:-20px;"/> <![endif]-->
                      <span class="vAlignCenter"><?php echo rwmb_meta('meta_Row1Col2Text'); ?></span>
                    </div>
                    <div><?php multieditDisplay("Row1Col2Text") ?></div>
                </section>
            </div>
            <div class="row datacontainer ">
                <section class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sectiondata">
                    <div class="title">
					<!--[if lt IE 9]> <img src="/wp-content/themes/csp/images/Cloud_Open_im4.jpg" style="margin-top:-20px;"/> <![endif]-->
                      <span class="vAlignCenter"><?php echo rwmb_meta('meta_Row2Col1Text'); ?></span>
                    </div>
                    <div><?php multieditDisplay("Row2Col1Text") ?></div>
                </section>
                <section class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sectiondata">
                    <div class="title">
					<!--[if lt IE 9]> <img src="/wp-content/themes/csp/images/Cloud_Open_im4.jpg" style="margin-top:-20px;"/> <![endif]-->
                      <span class="vAlignCenter"><?php echo rwmb_meta('meta_Row2Col2Text'); ?></span>
                    </div>
                    <div><?php multieditDisplay("Row2Col2Text") ?></div>
                </section>
            </div>
        </section>
</div>
</section>
<?php get_footer(); ?>
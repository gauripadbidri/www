<?php get_header(); ?>
<section id="body">
  <div class="container newsSingle">

    <section id="newsImgSection" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
              echo '<img id="news-img" class="img-responsive" src="/wp-content/themes/csp/images/default_news.jpg" />';
            }
        ?>
        <?php get_template_part('content', 'opaqueDiv');?>
      </div>
      <div id="image-description" style="background-color: gray;" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <p>
          <h3>
            <?php the_title(); ?>
          </h3>
        </p>
        <span style="color: white;">
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <div>
            <?php the_content(); ?>
          </div>
          <?php endwhile; ?>
        </span>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:whitesmoke; height:5px"></div>
    </section>
    <section id="2" class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <section id="bottom_left" class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
        <div>
          <span class="news_title">
            <h3>
              <?php the_title(); ?>
            </h3>
          </span>
          <span class="news_text">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <div>
              <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
          </span>
        </div>
      </section>

      <section id="bottom_right" class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
        <div id="contact">
          <span class="news_title">Help Desk</span>
          <?php get_template_part('template','contact'); ?>
        </div>
        <div id="news_sidebar">
        </div>
      </section>
    </section>
  </div>
</section>
<?php get_footer(); ?>
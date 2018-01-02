<?php get_header(); ?>
<section id="main-content">
    <div class="container">
        <div class="row">
            <?php get_sidebar(); ?>
            <div class="col-md-9 content-right">
                <?php
                while (have_posts()) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="page-title box-title">
                        <?php the_title(); ?>
                    </h2>
                    <?php the_content(); ?>
                </article><!-- #post -->
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- end main-content -->
<?php get_footer(); ?>
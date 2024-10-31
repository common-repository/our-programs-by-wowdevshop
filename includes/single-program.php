<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WOWDevShop
 * @subpackage OurPrograms
 * @author XicoOfficial
 * @since 1.2.0
 */

get_header(); ?>
<div id="layout" class="clearfix">
<div class="pagewidth">
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">

                    <?php the_content(); ?>

                        <?php
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'our-programs-by-wowdevshop') . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'our-programs-by-wowdevshop') . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );

                        if ( '' !== get_the_author_meta( 'description' ) ) {
                            get_template_part( 'template-parts/biography' );
                        }
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php
                        edit_post_link(
                            sprintf(
                                /* translators: %s: Name of current post */
                                __( 'Edit<span class="screen-reader-text"> "%s"</span>' ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                    ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-## -->

<?php

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            if ( is_singular( 'attachment' ) ) {
                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'our-programs-by-wowdevshop' ),
                ) );
            } elseif ( is_singular( 'program' ) ) {
                // Previous/next post navigation.
?>
                    <!-- post-nav -->
                    <div class="post-nav clearfix">

                        <?php previous_post_link('<span class="prev">%link</span>', '<span class="arrow">' . __( '&laquo;','our-programs-by-wowdevshop') . '</span> %title') ?>

                        <?php next_post_link('<span class="next">%link</span>', '<span class="arrow">' . __( '&raquo;', 'our-programs-by-wowdevshop') . '</span> %title') ?>

                    </div><!-- /post-nav -->

  <?php               }

            // End of the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->

    <?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

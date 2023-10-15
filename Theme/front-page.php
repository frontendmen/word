<?php get_header(); ?>
<main id="main-content" role="main">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <?php if (comments_open() || get_comments_number()) : ?>
                            <div class="comments-section">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            </main>

<?php get_footer(); ?>
<?php
/*
 * Main template file
 */
get_header();
?>

<?php
$primary_posts = new WP_Query([
    'tag' => 'article',
    'posts_per_page' => 4
]);

if ($primary_posts->have_posts()):
?>

<div class="container px-4 sm:pl-4 sm:pr-4 md:mx-auto mt-5">
    <section id="primary-content" class="md:w-7/12 md:mx-auto flex flex-col">
        <!-- Lastest posts container -->
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <!-- Text container -->
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">Latest Articles</h2>
                    </div>
                </div>
            </div>
            <!-- End of Text container -->

            <!-- Article container -->
            <div class="flex flex-col md:grid md:grid-cols-2 md:gap-4 mx-4 mb-4">
                <?php
                    while ($primary_posts->have_posts()):
                        $primary_posts->the_post();
                        get_template_part('template-parts/posts/content');
                    endwhile;

                    wp_reset_postdata();
                ?>
            </div>
        </div>
        <!-- End of Latest posts container -->
    </section>
</div>
<?php else: ?>
    <section class="md:w-6/12 md:mx-auto container" id="primary-content">
        <header class="my-4">
            <div class="flex justify-center">
                <h1 class="font-extrabold dark:text-slate-100">No posts</h1>
            </div>
        </header>
    </section>
<?php endif; ?>

<?php
$tips_query = new WP_Query([
    'tag' => 'tips',
    'posts_per_page' => 4
]);

if ($tips_query->have_posts()):
?>
<div class="container px-4 mb-10 md:mx-auto my-5">
    <section id="tips-and-snippets" class="md:w-7/12 md:mx-auto flex flex-col">
        <!--  Tips container -->
        <div class="bg-slate-50 dark:bg-gray-950">
            <!-- Text container -->
            <div class="flex flex-row gap-3">
                <div class="">
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                    <h2 class="font-saira font-bold text-xl dark:text-gray-200">Tips & Snippets</h2>
                    </div>
                </div>
            </div>
            <!-- End of Text Container -->

            <!-- Article container -->
            <div class="flex flex-col md:grid md:grid-cols-2 pb-5 px-4 gap-3">
                <?php
                while ($tips_query->have_posts()):
                    $tips_query->the_post();
                ?>
                <article class="mb-5">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <div class="flex flex-row">
                            <div class="w-12/12">
                                <?php the_title('<h3 class="hover:underline font-sarabun font-bold mb-2 dark:text-gray-300">', '</h3>'); ?>
                                <div class="line-clamp-2 dark:text-gray-300"><?php the_excerpt(); ?></div>
                            </div>
                        </div>
                    </a>
                </article>
                <?php
                endwhile;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
</div>
<?php endif; ?>

<?php
get_footer();

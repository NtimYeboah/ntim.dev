<?php
/*
 * Main template file
 */
get_header();
?>

<div class="container flex flex-col px-4 mx-auto md:w-8/12 mb-5 mt-5">
    <div class="flex flex-col">
        <div class="flex flex-col md:w-8/12">
            <!-- Search for sm screens -->
            <div id="sm-search" class="hidden flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
                <div class="flex flex-row gap-3">
                    <div class="flex flex-col">
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200">Search</h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-4 mb-4 pr-4">
                    <div class="flex flex-row text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300 mb-1 gap-1">
                        <?php get_search_form() ?>
                    </div>
                </div>
            </div>
            <!-- End of search for sm screens -->
        </div>
    </div>
    <?php
    $args = [
        'tax_query' => [
            [
                'taxonomy' => 'post_tag',
                'field' => 'slug',
                'terms' => ['featured']
            ]
        ]
    ];
    $featured_article = new WP_Query($args);

    if ($featured_article):
    ?>
    <div class="flex flex-col">
        <!-- Featured Article -->
        <div class="flex flex-col mb-5 bg-slate-50 dark:bg-gray-950">
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">Featured Article</h2>
                    </div>
                </div>
            </div>
            <?php $featured_article->the_post(); ?>
            <div class="hidden flex-row md:grid md:grid-cols-2 dark:hover:bg-slate-900 hover:bg-slate-100 md:gap-4 mx-4 mb-4 bg-50% bg-no-repeat bg-right" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
                <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                    <a id="feature-article-<?php the_ID(); ?>" href="<?php echo esc_url(get_permalink()); ?>" class="">
                        <div class="flex flex-col px-4">
                            <div class="flex flex-col">
                                <?php the_title('<h3 class="font-sarabun mt-5 font-extrabold text-2xl text-left dark:text-gray-300 tracking-wide">', '</h3>'); ?>

                                <p class="text-lg text-gray-900 dark:text-gray-300 line-clamp-5 mt-5">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="flex flex-row py-4 gap-2 justify-left">
                                <div>
                                    <p class="inline-flex text-gray-600 text-sm font-semibold dark:text-gray-400"><?php echo the_time('m.d.Y'); ?></p>
                                </div>
                                <?php $cats = get_the_category(); ?>
                                <?php if (count($cats) > 0): ?>
                                <div>
                                    <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                                </div>
                                <div>
                                    <p class="inline-flex text-gray-600 text-sm font-semibold dark:text-gray-400 uppercase"><?php echo $cats[0]->name; ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </article>
            </div>

            <div class="md:hidden flex flex-col mx-4 mb-2">
                <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="">
                        <div class="flex-col">
                            <picture>
                                <img class="w-full h-48 object-cover object-center mb-2" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                            </picture>
                        </div>
                        <div class="flex flex-col px-4">
                            <div class="flex flex-col">
                                <?php the_title('<h3 class="font-sarabun mt-5 font-extrabold text-lg text-left dark:text-gray-300 tracking-wide">', '</h3>'); ?>

                                <p class="text-base text-gray-900 dark:text-gray-300 line-clamp-4 mt-5">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="flex flex-row py-4 gap-2 justify-left">
                                <div>
                                    <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400"><?php echo the_time('m.d.Y'); ?></p>
                                </div>
                                <?php $cats = get_the_category(); ?>
                                <?php if (count($cats) > 0): ?>
                                <div>
                                    <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                                </div>
                                <div>
                                    <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400 uppercase"><?php echo $cats[0]->name; ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        </div>
        <!-- End of featured article -->
    </div>
    <?php endif; ?>

    <?php
    $primary_posts = new WP_Query([
        'tag' => 'article',
        'posts_per_page' => 4
    ]);

    if ($primary_posts->have_posts()):
    ?>
    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex flex-col md:w-8/12">

            <!-- Articles -->
            <div class="flex flex-col mb-5 bg-slate-50 dark:bg-gray-950">
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
                <!-- End of Articles -->

            </div>
            <!-- End of Articles -->

            <?php
                $tips_query = new WP_Query([
                    'tag' => 'tips',
                    'posts_per_page' => 4
                ]);

                if ($tips_query->have_posts()):
            ?>
            <!-- Tips & Snipperts -->
            <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
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

                <!-- Tips container -->
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
                                    <p class="line-clamp-2 dark:text-gray-300"><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php
                        endwhile;

                        wp_reset_postdata();
                    ?>
                </div>
                <!-- End of tips container -->
            </div>
            <!-- End of Tips & Snippets -->
            <?php endif; ?>
        </div>

        <div class="flex flex-col md:w-4/12">

            <div class="flex-col hidden md:flex w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
                <div class="flex flex-row gap-3">
                    <div class="flex flex-col">
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200">Search</h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-4 mb-4 pr-4">
                    <?php get_search_form() ?>
                </div>
            </div>

            <?php
                $categories = get_categories();
                if ($categories && count($categories) > 0):
            ?>
            <div class="flex flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
                <div class="flex flex-row gap-3">
                    <div class="flex flex-col">
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200">Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mx-4 mb-4">
                    <div class="flex flex-col">
                        <?php foreach ($categories as $category):
                            printf(
                                '<a href="%1$s" class="hover:underline text-sm font-medium uppercase">
                                    <span class="dark:text-gray-300 dark:hover:underline">%2$s</span>
                                    <span class="text-gray-500 dark:text-gray-400">[%3$s]</span>
                                </a>',
                                esc_url(home_url('articles/category/' . $category->slug)),
                                $category->name,
                                $category->count
                            );
                        endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php
                $recent_articles = new WP_Query([
                    'tag' => 'article',
                    'posts_per_page' => 3
                ]);

                if ($recent_articles->have_posts()):
            ?>
            <div class="flex flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
                <div class="flex flex-row gap-3">
                    <div class="flex flex-col">
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200">Recent Articles</h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mx-4 mb-4 font-sarabun">
                    <?php while ($recent_articles->have_posts()):
                        $recent_articles->the_post();
                    ?>
                    <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-2">
                        <a id="recent-article-<?php the_ID(); ?>" href="<?php echo esc_url(get_permalink()); ?>" class="">
                            <div class="flex flex-col md:flex-row">
                                <div class="flex flex-col basis-1/3">
                                    <!-- Fix image height -->
                                    <picture>
                                        <img 
                                            class="w-full object-cover object-center md:h-auto h-28" 
                                            src="<?php echo the_post_thumbnail_url(); ?>"
                                            alt=""
                                        >
                                    </picture>
                                </div>
                                <div class="flex flex-col px-4 basis-2/3">
                                    <div class="flex flex-col">
                                        <?php the_title('<h3 class="font-sarabun mt-5 md:mt-0 font-bold text-sm text-left dark:text-gray-300 tracking-wide line-clamp-1">', '</h3>'); ?>

                                        <div>
                                            <p class="inline-flex text-gray-600 text-xs font-normal dark:text-gray-400"><?php echo the_time('m.d.Y'); ?></p>
                                        </div>
                                    </div>
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
            <?php endif; ?>

            <?php $tags = get_tags();
                if ($tags && count($tags) > 0):
            ?>
            <div class="flex flex-col w-12/12 bg-slate-50 dark:bg-gray-950 mb-4">
                <div class="flex flex-row gap-3">
                    <div class="flex flex-col">
                        <div class="h-5 my-3 border-l-2 border-l-rose-500">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="h-5 mt-2">
                            <h2 class="font-saira font-bold text-xl dark:text-gray-200">Tags</h2>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row mx-4 mb-2 font-sarabun flex-wrap dark:text-gray-300">
                    <?php foreach ($tags as $tag):
                        printf(
                            '<div class="mb-5 mr-2">
                                <a href="%1$s" class="border px-2 pt-1 pb-2">%2$s</a>
                            </div>',
                            esc_url(home_url('articles/tag/' . $tag->slug)),
                            $tag->name
                        );
                    endforeach;
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php else: ?>
    <section class="container md:w-6/12 md:mx-auto">
        <header class="my-4">
            <div class="flex justify-center">
                <h1 class="font-extrabold dark:text-slate-100">No articles available.</h1>
            </div>
        </header>
    </section>
<?php endif; ?>

<?php
get_footer();

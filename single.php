<?php
/*
 * Main template file
 */
get_header();
?>
<!-- Main content -->
<section class="container px-4 sm:pl-4 sm:pr-4 md:mx-auto mt-10">
    <!-- Main content container -->
    <div class="md:w-7/12 md:mx-auto flex flex-col">
        <div class="flex justify-center mb-10">
            <?php
                the_title('<h1 class="font-sarabun text-2xl font-extrabold text-slate-900 dark:text-gray-300">', '</h1>');
            ?>
        </div>
        <?php
            $category_slug = '';
            $cats = get_the_category();

            if (count($cats) > 0):
        ?>
        <div class="flex justify-center gap-5">
            <?php foreach ($cats as $cat):
                $category_slug .= $cat->slug . ',';
            ?>
            <span class="text-base font-bold text-gray-600 dark:text-gray-400"><?php echo $cat->name; ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="flex justify-center gap-5 mt-5">
        <span class="text-base font-normal text-gray-600 dark:text-gray-400"><?php the_time('m.d.Y')?></span>
        </div>

        <div class="flex justify-center">
            <img class="rounded-md w-full md:h-96 object-cover object-center mt-10" src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="feature-image">
        </div>

        <div id="content" class="mt-10 text-lg dark:text-gray-300">
            <?php the_content(); ?>
        </div>

        <!-- Comments section -->
        <div class="hidden md:block giscus mt-5 mb-10">
        </div>
        <!-- End of comments section-->
    </div>

    <!-- Posts upselling -->
    <?php
        $category_posts = [];

        if ($category_slug != '') {
            $category_posts = new WP_Query([
                'post_per_page' => 3,
                'category_name' => $category_slug,
                'post__not_in' => [get_the_ID()]
            ]);
        }
        
        if ($category_posts->have_posts()):
    ?>
    <div class="md:w-8/12 md:mx-auto flex flex-col mb-10 mt-5">
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <!-- Text container -->
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">You might be interested in these too</h2>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:grid md:grid-cols-3 md:gap-4 mx-4 mb-4">
                <?php
                    while ($category_posts->have_posts()):
                        $category_posts->the_post();
                        get_template_part('template-parts/posts/content');
                    endwhile;
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>


<?php
get_footer();

<?php
/*
 * Main template file
 */
get_header();
?>

<!-- Post header-->
<section class="md:w-6/12 md:mx-auto container">
    <div class="flex flex-col items-center">
        <p class="text-gray-500 m-5"><?php echo get_the_date(); ?></p>
        <?php
            the_title('<h1 class="font-extrabold text-2xl m-5 dark:text-slate-100">', '</h1>');
        ?>
        <?php
            $category_slug = '';
            $cats = get_the_category();

            if (count($cats) > 0):
        ?>
        <div class="flex flex-row gap-5 m-5">
            <?php foreach ($cats as $cat):
                $category_slug .= $cat->slug . ',';
            ?>
            <div class="bg-slate-200 p-2 dark:bg-cyan-900">
                <span class="dark:text-gray-200"><?php echo $cat->name; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Main content container -->
    <div class="flex flex-col px-5">
        <picture>
            <img class="rounded-md w-full md:h-96 object-cover object-center" src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="feature-image">
        </picture>

        <!-- Main conent -->
        <div class="md:w-10/12 md:mx-auto font-sans text-lg mt-5 dark:text-gray-200 font-medium">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<!-- End of Post header-->

<!-- Share plugin -->
<section class="container md:w-6/12 md:mx-auto m-5 border-b-2 border-t-2 border-slate-200 py-9">
    <div class="flex flex-col items-center space-y-5 text-slate-500">
        <div>
            <h3 class="uppercase text-base font-bold dark:dark:text-gray-200">Share this article</h3>
        </div>
        <div>
            <div class="flex flex-row gap-8">
                <a href="" class="hover:text-slate-900 dark:hover:text-gray-200">
                    <div class="flex flex-row gap-2">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"></path>
                        </svg>
                        <span>Twitter</span>
                    </div>
                </a>

                <a href="" class="hover:text-slate-900 dark:hover:text-gray-200">
                    <div class="flex flex-row gap-2">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"></path>
                        </svg>
                        <span>Facebook</span>
                    </div>
                </a>

                <a href="" class="hover:text-slate-900 dark:hover:text-gray-200">
                    <div class="flex flex-row gap-2">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"></path>
                        </svg>
                        <span>LinkedIn</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End of share plugin -->

<!-- Comments section -->
<section class="container md:w-6/12 md:mx-auto giscus mt-5 px-4 md:px-0">
</section>
<!-- End of comments section-->

<!-- Newletter section -->
<section id="action" class="bg-cyan-900 p-5 mt-5">
    <div class="container md:w-9/12 md:mx-auto flex flex-col md:flex md:flex-row md:gap-3">
        <div class="mb-5 md:basis-1/2">
            <h4 class="font-semibold text-xl text-slate-200">Want to know about future blog posts?</h4>
            <h4 class="font-semibold text-xl text-cyan-500">Then sign up for my newsletter!</h4>
        </div>
        <div class="mb-5 md:basis-1/2">
            <div>
                <input type="email" placeholder="Enter your email" class="w-3/4 p-2 rounded text-sm">
                <button class=" bg-sky-700 text-white p-2 rounded shadow-md text-sm">Notify Me</button>
            </div>
            <div class="mt-3">
                <p class="text-xs text-cyan-200">I'll only send mails if I actually have something to tell.</p>
            </div>
        </div>
    </div>
</section>
<!-- End of Newsletter section -->

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
<section class="container md:w-6/12 md:mx-auto mt-5">
    <div class="flex flex-col items-center">
        <h1 class="font-extrabold text-2xl mb-5 dark:text-slate-100">You might find this interesting too</h1>
    </div>
    <div class="flex flex-col items-center md:flex md:flex-row">
        <?php
            while ($category_posts->have_posts()):
                $category_posts->the_post();
        ?>
        <article class="md:basis-1/3 p-4 hover:bg-slate-100 mb-4 dark:hover:bg-slate-900">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <picture>
                    <img class="w-full md:h-44 h-64 object-cover object-center rounded mb-2" src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="">
                </picture>
                <?php
                    the_title('<h3 class="font-extrabold dark:text-slate-100">', '</h3>')
                ?>
                <?php
                    $cats = get_the_category();
                    if (count($cats) > 0):
                 ?>
                <h4 class="font-extrabold text-xs text-gray-500 mb-4 dark:text-slate-400"><?php echo $cats[0]->name; ?></h4>
                <?php endif; ?>
                <div class="text-sm text-gray-600 dark:text-slate-400"><?php the_excerpt(); ?></div>
            </a>
        </article>
        <?php endwhile; ?>
    </div>
</section>
<!-- End of post upselling -->
<?php endif; ?>

<?php
get_footer();

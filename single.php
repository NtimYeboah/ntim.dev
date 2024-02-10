<?php
get_header();
?>

<!-- Main content -->
<section class="container px-4 sm:pl-4 sm:pr-4 md:mx-auto mt-10">
    <!-- Main content container -->
    <div class="md:w-7/12 md:mx-auto flex flex-col mb-5">
        <div class="flex justify-center mb-10">
            <?php
                the_title('<h1 class="font-sarabun text-2xl font-extrabold text-slate-900 dark:text-gray-300">', '</h1>');
            ?>
        </div>
        <?php
            $category_slug = '';
            $categories = get_the_category();

            if (count($categories) > 0):
        ?>
        <div class="flex justify-center gap-5">
            <?php foreach ($categories as $category):
                $category_slug .= $category->slug . ',';
            ?>
            <span class="text-base font-bold text-gray-600 dark:text-gray-400"><?php echo $category->name; ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="flex justify-center gap-5 mt-5">
            <span class="text-base font-normal text-gray-600 dark:text-gray-400"><?php the_time('m.d.Y')?></span>
        </div>

        <div class="flex justify-center">
            <img class="rounded-md w-full md:h-96 object-cover object-center mt-10" src="<?php echo esc_url(the_post_thumbnail_url()); ?>" alt="feature-image">
        </div>

        <div id="content" class="mt-10 text-lg dark:text-gray-300 mb-10">
            <?php the_content(); ?>
        </div>

        <!-- Giscus comments section -->
        <!-- <div class="hidden md:block giscus mb-10">
        </div> -->
        <!-- End of Giscus comments section-->
    </div>

    <!-- Comments list container -->
    <?php            
        $numOfComments = get_comments_number();
        if ($numOfComments > 0):
    ?>
    <div class="md:w-7/12 md:mx-auto flex flex-col">
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="mt-2 mb-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">
                            <?php
                                echo esc_html($numOfComments);
                                if ($numOfComments > 1) echo ' comments'; else echo ' comment'
                            ?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mx-4 mb-4">
                <?php function comments_walker() {?>
                <figure class="flex flex-col" id="comment-<?php comment_ID(); ?>">
                    <div class="flex flex-row gap-4 mb-4">
                        <div>
                            <?php
                                $authorEmail = get_comment_author_email();
                                $gravatar = get_avatar($authorEmail);
                                $gravatarUrl = esc_url(home_url() . '/wp-content/uploads/2024/02/gravatar_400x400.png');

                                if ($gravatar) $gravatarUrl = $gravatar;
                            ?>
                            <img class="w-14 h-14" src="<?php echo $gravatarUrl ?>" alt="" width="60" height="60">
                        </div>
                        <figcaption>
                            <div class="flex flex-col dark:text-gray-300 font-sarabun">
                                <div>
                                    <p><?php echo get_comment_author(); ?></p>
                                </div>
                                <div class="flex flex-row gap-5">
                                    <span><?php echo get_comment_date(); ?></span>
                                </div>
                            </div>
                        </figcaption>
                    </div>

                    <!-- For comment -->
                    <div class="mb-4 dark:text-gray-300">
                        <p>
                            <?php echo get_comment_text(); ?>
                        </p>
                    </div>
                    <!-- End of for comment -->

                    <?php
                        comment_reply_link([
                            'add_below' => true,
                            'depth' => 20,
                            'max_depth' => 200,
                            'before' => '<a href="#" class="underline font-sarabun dark:text-gray-300">Reply',
                            'after' => '</a>',
                        ]);
                    ?>
                </figure>
                <?php } ?>
                
                <?php
                    wp_list_comments([
                        'type' => 'comment',
                        'reverse_top_level' => true,
                        'max_depth' => 20,
                        'callback' => 'comments_walker',
                    ]);
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- End of comments list container -->

    <!-- Comments Form -->
    <div class="md:w-7/12 md:mx-auto flex flex-col">
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="mt-2 mb-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">Leave a comment</h2>
                        <?php if (is_user_logged_in()):
                            global $wp;
                            $currentUrl = home_url(add_query_arg([], $wp->request));
                        ?>
                        <p class="font-sarabun dark:text-gray-300">Logged in as <?php echo wp_get_current_user()->display_name ?>. <a href="<?php echo wp_logout_url($currentUrl) ?>" class="hover:underline underline">Log out?</a> Required fields are marked *</p>
                        <?php else: ?>
                            <p>Your email address will not be published. Required fields are marked * </p>
                            <p>Having trouble posting comment? <a class="hover:underline underline" href="<?php echo wp_login_url(); ?>">Log in</a>.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mx-4 mb-4">
                <div class="flex flex-col">
                    <form action="<?php echo esc_url_raw(home_url() . '/wp-comments-post.php'); ?>" method="post" id="commentform">
                        <label for="comment" class="text-gray-700 dark:text-gray-400">Comment *</label>
                        <textarea name="comment" class="w-full form-textarea mb-2 dark:bg-gray-900 dark:text-gray-300" rows="5"></textarea>
                        <button type="submit" name="submit" class="bg-slate-600 p-2 text-white font-base inset-0 hover:bg-slate-700">Post Comment</button>
                        <input type="hidden" name="comment_post_ID" value="<?php the_ID(); ?>" id="comment_post_ID">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of comments form -->

    <!-- Post cross-sell -->
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
    <!-- End of Post cross-sell -->
</section>
<!-- End of main content -->

<?php
get_footer();

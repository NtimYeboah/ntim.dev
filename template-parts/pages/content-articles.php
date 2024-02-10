<div class="container px-4 sm:pl-4 sm:pr-4 md:mx-auto mt-5">
    <div class="flex flex-col md:w-7/12 md:mx-auto mb-5">
        <!-- All articles container -->
        <div class="flex flex-col bg-slate-50 dark:bg-gray-950">
            <!-- Text container -->
            <div class="flex flex-row gap-3">
                <div>
                    <div class="h-5 my-3 border-l-2 border-l-rose-500">
                    </div>
                </div>
                <div>
                    <div class="h-5 mt-2">
                        <h2 class="font-saira font-bold text-xl dark:text-gray-200">All Articles</h2>
                    </div>
                </div>
            </div>
            <!-- End of Text container -->

            <!-- Article container -->
            <?php
            $primary_posts = new WP_Query([
                'tag' => 'article',
                'posts_per_page' => 4
            ]);

            if ($primary_posts->have_posts()):
            ?>
            <div>
                <div class="flex flex-col md:grid md:grid-cols-2 md:gap-4 mx-4 mb-2">
                    <?php
                        while ($primary_posts->have_posts()):
                            $primary_posts->the_post();
                            get_template_part('template-parts/posts/content');
                        endwhile;
                    ?>
                </div>

                <div class="flex flex-row bg-slate-100 dark:bg-slate-900 justify-between px-4 font-semibold py-2 mb-4 mx-4 dark:text-gray-200">
                    <div>
                        <a href="#" class="hover:text-rose-500">Next</a>
                    </div>
                    <div class="flex flex-row justify-between gap-10">
                        <span><a class="text-rose-500" href="#">1</a></span>
                        <span><a href="#" class="hover:text-rose-500">2</a></span>
                        <span><a href="#" class="hover:text-rose-500">3</a></span>
                        <span><a href="#" class="hover:text-rose-500">4</a></span>
                        <span><a href="#" class="hover:text-rose-500">5</a></span>
                    </div>
                    <div>
                        <a href="#" class="hover:text-rose-500">Prev</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!-- End of all articles container -->
    </div>
</div>
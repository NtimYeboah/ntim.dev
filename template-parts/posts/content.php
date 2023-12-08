<?php
/**
 * Template part for displaying posts.
 */
?>

<article class="hover:bg-slate-100 dark:hover:bg-faccara">
    <a id="post-<?php the_ID(); ?>" href="<?php echo esc_url(get_permalink()); ?>">
        <div class="flex-col">
            <?php if (has_post_thumbnail()): ?>
                <picture>
                    <img class="w-full h-48 object-cover object-center mb-2" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                </picture>
            <?php endif; ?>
        </div>
        <div class="flex flex-col px-4">
            <div class="flex flex-col">
                <?php the_title('<h3 class="font-sarabun font-extrabold text-lg text-left dark:text-gray-300">', '</h3>'); ?>

                <p class="text-base text-gray-900 dark:text-gray-400 line-clamp-4 mt-5"><?php the_excerpt(); ?></p>
            </div>
            <div class="flex flex-row py-4 gap-6 justify-left">
                <div>
                    <p class="inline-flex gap-1">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" 
                            fill="currentColor" 
                            class="w-5 h-5 text-gray-500"
                        >
                            <path
                                fill-rule="evenodd" 
                                d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 003 3h15a3 3 0 01-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125zM12 9.75a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H12zm-.75-2.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5H12a.75.75 0 01-.75-.75zM6 12.75a.75.75 0 000 1.5h7.5a.75.75 0 000-1.5H6zm-.75 3.75a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75zM6 6.75a.75.75 0 00-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-3A.75.75 0 009 6.75H6z"
                                clip-rule="evenodd"
                            />
                            <path
                                d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 01-3 0V6.75z"
                            />
                        </svg>
                        <?php $cats = get_the_category(); ?>
                        <?php if (count($cats) > 0): ?>
                        <span class="text-sm font-normal text-gray-600"><?php echo $cats[0]->name; ?></span>
                        <?php endif; ?> 
                    </p>
                </div>

                <div>
                    <p class="inline-flex gap-1">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="w-5 h-5 text-gray-500"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span class="text-sm font-normal text-gray-600"><?php echo the_time('m.d.Y'); ?></span>  
                    </p>
                </div>
            </div>
        </div>
    </a>
</article>

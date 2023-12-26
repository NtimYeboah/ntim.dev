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
                <?php the_title('<h3 class="font-sarabun mt-2 font-extrabold text-lg text-left dark:text-gray-400 tracking-wide">', '</h3>'); ?>

                <p class="text-base text-gray-900 dark:text-gray-400 line-clamp-4 mt-5"><?php the_excerpt(); ?></p>
            </div>
            <div class="flex flex-row py-4 gap-2 justify-left">
                <div>
                    <p class="inline-flex text-gray-600 text-xs font-semibold"><?php echo the_time('m.d.Y'); ?></p>
                </div>
                <?php $cats = get_the_category(); ?>
                <?php if (count($cats) > 0): ?>
                    <div>
                        <span class="font-semibold text-gray-500">|</span>
                    </div>
                    <div>
                        <p class="inline-flex text-gray-600 text-xs font-semibold"><?php echo $cats[0]->name; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </a>
</article>

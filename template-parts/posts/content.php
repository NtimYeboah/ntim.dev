<?php
/**
 * Template part for displaying posts.
 */
?>
<article class="md:w-1/2 p-4 hover:bg-slate-100 mb-4 dark:hover:bg-slate-900">
    <a id="post-<?php the_ID(); ?>" href="<?php echo esc_url(get_permalink()); ?>">
        <?php if (has_post_thumbnail()): ?>
            <picture>
                <img class="w-full h-64 object-cover object-center rounded mb-2" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
            </picture>   
        <?php endif; ?>
        <?php the_title('<h3 class="font-extrabold dark:text-slate-100">', '</h3>'); ?>
        <?php $cats = get_the_category(); ?>
        <?php if (count($cats) > 0): ?>
        <h4 class="font-extrabold text-xs text-gray-500 mb-4 dark:text-slate-400"><?php echo $cats[0]->name; ?></h4>
        <?php endif; ?>
        <div class="text-sm text-gray-600 dark:text-slate-400"><?php the_excerpt(); ?></div>
    </a>
</article>

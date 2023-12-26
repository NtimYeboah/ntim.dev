
<?php
// Contains the header of all the views
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url'); ?>">
        
        <?php wp_head(); ?>

        <script>
            // It's best to inline this in `head` to avoid FOUC (flash of unstyled content) when changing pages or themes
            if (
                localStorage.getItem('color-theme') === 'dark' ||
                (!('color-theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
            ) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body <?php body_class('antialiased bg-white dark:bg-baccara scroll-smooth'); ?>>
        <header class="py-4">
            <div class="container pl-4 pr-4 sm:pl-4 sm:pr-4 md:mx-auto">
                <div class="md:w-8/12 md:mx-auto flex flex-row justify-between items-center">
                    <div class="basis-4/5 md:basis-4/12">
                        <?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            
                            if (has_custom_logo()) {
                                printf(
                                    '<a href="%1$s" class="font-mono font-bold dark:text-gray-400"><img src="%2$s" alt="logo image"></a>',
                                    esc_url(home_url()),
                                    esc_url($logo[0])
                                );
                            } else {
                                printf(
                                    '<a href="%1$s" class="font-sarabun text-lg font-extrabold dark:text-gray-200">ntim.dev</a>',
                                    esc_url(home_url())
                                );
                            }
                        ?>
                    </div>
                    <nav class="hidden md:block md:basis-4/12 basis-1/4">
                        <ul class="flex justify-center gap-12 font-saira text-xl font-semibold text-gray-900 dark:text-gray-200">
                            <?php
                                global $wp;
                                $current_url = home_url($wp->request);
                                $path = parse_url($current_url, PHP_URL_PATH);
                            ?>
                            <li><a href="/" class="py-1 hover:border-b-2 border-gray-900 <?php echo $path === null || str_contains($path, 'blog') ? 'border-b-2 border-gray-900': ''; ?>">Blog</a></li>
                            <li><a href="/projects" class="py-1 hover:border-b-2 border-gray-900 <?php echo $path === '/projects' ? 'border-b-2 border-gray-900': ''; ?>">Projects</a></li>
                            <li><a href="/about" class="py-1 hover:border-b-2 border-gray-900 <?php echo $path === '/about' ? 'border-b-2 border-gray-900': ''; ?>">About</a></li>
                        </ul>
                    </nav>
                    <div class="basis-1/5 md:basis-4/12 pr-3 md:pr-0 border-r md:border-r-0 dark:border-r-gray-400">
                        <ul class="flex justify-end items-center gap-8">
                            <li>
                                <button
                                    id="theme-toggle"
                                    type="button"
                                    class="text-gray-600 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2"
                                >
                                    <svg
                                        id="theme-toggle-dark-icon"
                                        class="w-5 h-5 hidden"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                                        />
                                    </svg>
                                    <svg
                                        id="theme-toggle-light-icon"
                                        class="w-5 h-5 hidden"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="basis-1/12 md:hidden lg:hidden">
                        <div class="flex justify-end">
                            <svg id="sm-menu-icon" onClick="onToggleMenuIcon(this)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 font-bold dark:text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg id="sm-cancel-icon" onClick="onToggleMenuIcon(this)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden dark:text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Menu for SM and below devices -->
        <section id="sm-menu" class="hidden w-full shadow-sm z-50 absolute bg-white md:hidden lg:hidden 2xl:hidden dark:bg-cyan-950">
            <ul class="flex flex-col items-end">
                <li class="py-2 border-b dark:border-b-gray-400 w-full"><a href="/" class="font-saira font-bold float-right pr-5 py-2 border-gray-300 dark:text-slate-100">Blog</a></li>
                <li class="py-2 w-full"><a href="/projects" class="font-saira font-bold float-right pr-5 py-2 border-gray-300 dark:text-slate-100">Projects</a></p></li>
                <li class="py-2 border-t dark:border-t-gray-400 w-full"><a href="/about.html" class="font-saira font-bold float-right pr-5 py-2 border-gray-300 dark:text-slate-100">About</a></p></li>
            </ul>
        </section>
        <!-- End of menu for SM and below devices -->

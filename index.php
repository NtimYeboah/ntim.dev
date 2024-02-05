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
                        <form class="flex flex-row w-full">
                            <input type="text" placeholder="Type search term" class="w-full form-input border-r-0 dark:bg-gray-900 dark:text-gray-300">
                            <button
                                type="button"
                                class="bg-slate-600 hover:bg-slate-700 p-2"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2.0"
                                    stroke="currentColor"
                                    class="w-5 h-5 text-white dark:text-gray-200"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                    />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of search for sm screens -->
        </div>
    </div>
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

            <div class="hidden flex-row md:grid md:grid-cols-2 dark:hover:bg-slate-900 hover:bg-slate-100 md:gap-4 mx-4 mb-4 bg-50% bg-no-repeat bg-right" style="background-image: url('./assets/img/clock-unsplash.jpg')">
                <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                    <a href="/page-details.html" class="">
                        <div class="flex flex-col px-4">
                            <div class="flex flex-col">
                                <h3 class="font-sarabun mt-5 font-extrabold text-2xl text-left dark:text-gray-300 tracking-wide">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </h3>
                                <p class="text-lg text-gray-900 dark:text-gray-300 line-clamp-5 mt-5">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                            <div class="flex flex-row py-4 gap-2 justify-left">
                                <div>
                                    <p class="inline-flex text-gray-600 text-sm font-semibold dark:text-gray-400">1.1.2024</p>
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                                </div>
                                <div>
                                    <p class="inline-flex text-gray-600 text-sm font-semibold dark:text-gray-400 uppercase">Volutpat</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            </div>

            <div class="md:hidden flex flex-col mx-4 mb-2">
                <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                    <a href="/page-details.html" class="">
                        <div class="flex-col">
                            <picture>
                                <img class="w-full h-48 object-cover object-center mb-2" src="/assets/img/clock-unsplash.jpg" alt="">
                            </picture>
                        </div>
                        <div class="flex flex-col px-4">
                            <div class="flex flex-col">
                                <h3 class="font-sarabun mt-5 font-extrabold text-lg text-left dark:text-gray-300 tracking-wide">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </h3>

                                <p class="text-base text-gray-900 dark:text-gray-300 line-clamp-4 mt-5">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                            <div class="flex flex-row py-4 gap-2 justify-left">
                                <div>
                                    <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400">1.1.2024</p>
                                </div>
                                <div>
                                    <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                                </div>
                                <div>
                                    <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400 uppercase">Volutpat</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        </div>
        <!-- End of featured article -->
    </div>
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
                    <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                        <a href="/page-details.html" class="">
                            <div class="flex-col">
                                <picture>
                                    <img class="w-full h-48 object-cover object-center mb-2" src="/assets/img/clock-unsplash.jpg" alt="">
                                </picture>
                            </div>
                            <div class="flex flex-col px-4">
                                <div class="flex flex-col">
                                    <h3 class="font-sarabun mt-5 font-extrabold text-lg text-left dark:text-gray-300 tracking-wide">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </h3>

                                    <p class="text-base text-gray-900 dark:text-gray-300 line-clamp-4 mt-5">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                </div>
                                <div class="flex flex-row py-4 gap-2 justify-left">
                                    <div>
                                        <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400">1.1.2024</p>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                                    </div>
                                    <div>
                                        <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400 uppercase">Volutpat</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>

                    <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-4">
                        <a href="/page-details.html" class="">
                            <div class="flex-col">
                                <picture>
                                    <img class="w-full h-48 object-cover object-center mb-2" src="/assets/img/clock-unsplash.jpg" alt="">
                                </picture>
                            </div>
                            <div class="flex flex-col px-4">
                                <div class="flex flex-col">
                                    <h3 class="font-sarabun mt-5 font-extrabold text-lg text-left dark:text-gray-300 tracking-wide">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </h3>

                                    <p class="text-base text-gray-900 dark:text-gray-300 line-clamp-4 mt-5">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                </div>
                                <div class="flex flex-row py-4 gap-2 justify-left">
                                    <div>
                                        <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400">1.1.2024</p>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-500 dark:text-gray-400">|</span>
                                    </div>
                                    <div>
                                        <p class="inline-flex text-gray-600 text-xs font-semibold dark:text-gray-400 uppercase">Volutpat</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
                <!-- End of Articles -->

                <!-- Pagination -->
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
                <!-- End of pagination -->

            </div>
            <!-- End of Articles -->

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
                    <article class="mb-5">
                        <a href="#">
                            <div class="flex flex-row">
                                <div class="w-12/12">
                                    <h3 class="hover:underline font-sarabun font-bold mb-2 dark:text-gray-300">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                                    <p class="line-clamp-2 dark:text-gray-300">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </a>
                    </article>

                    <article class="mb-5">
                        <a href="#">
                            <div class="flex flex-row">
                                <div class="w-12/12">
                                    <h3 class="hover:underline font-sarabun font-bold mb-2 dark:text-gray-300">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                                    <p class="line-clamp-2 dark:text-gray-300">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </a>
                    </article>

                    <article class="mb-5">
                        <a href="#">
                            <div class="flex flex-row">
                                <div class="w-12/12">
                                    <h3 class="hover:underline font-sarabun font-bold mb-2 dark:text-gray-300">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                                    <p class="line-clamp-2 dark:text-gray-300">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </a>
                    </article>

                    <article class="mb-5">
                        <a href="#">
                            <div class="flex flex-row">
                                <div class="w-12/12">
                                    <h3 class="hover:underline font-sarabun font-bold mb-2 dark:text-gray-300">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                                    <p class="line-clamp-2 dark:text-gray-300">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </a>
                    </article>

                </div>
                <!-- End of tips container -->
            </div>
            <!-- End of Tips & Snippets -->
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
                    <form>
                        <div class="flex flex-row">
                            <input type="text" placeholder="Type search term" class="w-full form-input border-r-0 dark:bg-gray-900 dark:text-gray-300">
                            <button
                                type="button"
                                class="bg-slate-600 hover:bg-slate-700 p-2"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2.0"
                                    stroke="currentColor"
                                    class="w-5 h-5 text-white dark:text-gray-200"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

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
                        <a href="#" class="hover:underline text-sm font-medium uppercase">
                            <span class="dark:text-gray-300 dark:hover:underline">Volutpat</span>
                            <span class="text-gray-500 dark:text-gray-400">[1]</span>
                        </a>
                        <a href="#" class="hover:underline text-sm font-medium uppercase">
                            <span class="dark:text-gray-300 dark:hover:underline">Lorem</span>
                            <span class="text-gray-500 dark:text-gray-400">[1]</span>
                        </a>
                        <a href="#" class="hover:underline text-sm font-medium uppercase dark:hover:underline">
                            <span class="dark:text-gray-300 dark:hover:underline">Excepteur sint</span>
                            <span class="text-gray-500 dark:text-gray-400">[1]</span>
                        </a>
                    </div>
                </div>
            </div>

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

                    <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-2">
                        <a href="/page-details.html" class="">
                            <div class="flex flex-col md:flex-row">
                                <div class="flex flex-col basis-1/3">
                                    <picture>
                                        <img 
                                            class="w-full object-cover object-center md:h-auto h-28"
                                            src="/assets/img/clock-unsplash.jpg"
                                            alt=""
                                        >
                                    </picture>
                                </div>
                                <div class="flex flex-col px-4 basis-2/3">
                                    <div class="flex flex-col">
                                        <h3 class="font-sarabun mt-5 md:mt-0 font-bold text-sm text-left dark:text-gray-300 tracking-wide line-clamp-1">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </h3>

                                        <div>
                                            <p class="inline-flex text-gray-600 text-xs font-normal dark:text-gray-400">1.1.2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>

                    <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-2">
                        <a href="/page-details.html" class="">
                            <div class="flex flex-col md:flex-row">
                                <div class="flex flex-col basis-1/3">
                                    <picture>
                                        <img
                                            class="w-full object-cover object-center md:h-auto h-28"
                                            src="/assets/img/clock-unsplash.jpg"
                                            alt=""
                                        >
                                    </picture>
                                </div>
                                <div class="flex flex-col px-4 basis-2/3">
                                    <div class="flex flex-col">
                                        <h3 class="font-sarabun mt-5 md:mt-0 font-bold text-sm text-left dark:text-gray-300 tracking-wide line-clamp-1">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </h3>
                                        <div>
                                            <p class="inline-flex text-gray-600 text-xs font-normal dark:text-gray-400">1.1.2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>

                    <article class="dark:hover:bg-slate-900 hover:bg-slate-100 mb-2">
                        <a href="/page-details.html" class="">
                            <div class="flex flex-col md:flex-row">
                                <div class="flex flex-col basis-1/3">
                                    <picture>
                                        <img
                                            class="w-full object-cover object-center md:h-auto h-28"
                                            src="/assets/img/clock-unsplash.jpg"
                                            alt=""
                                        >
                                    </picture>
                                </div>
                                <div class="flex flex-col px-4 basis-2/3">
                                    <div class="flex flex-col">
                                        <h3 class="font-sarabun mt-5 md:mt-0 font-bold text-sm text-left dark:text-gray-300 tracking-wide line-clamp-1">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </h3>
                                        <div>
                                            <p class="inline-flex text-gray-600 text-xs font-normal dark:text-gray-400">1.1.2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
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
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">viverra</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">ornare</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">scelerisque eu</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">consequat</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">Amet's tempor</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">volutpat sit scelerisque</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">ultricies</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">bibendum's elementum</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">quam etiam</a>
                    </div>
                    <div class="mb-5 mr-2">
                        <a href="#" class="border px-2 pt-1 pb-2">egestas</a>
                    </div>
                </div>
            </div>
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

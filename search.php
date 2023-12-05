<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package pobrefobia
 */

get_header();
?>
<main class="px-6 lg:px-24">
    <!-- Search results head -->
    <header class="mb-12">
        <!-- Search results count -->
        <?php $search_results_count = $wp_query->found_posts; ?>
        <h1 class="text-4xl lg:text-6xl font-black text-foreground pointer-events-none">
            <?php echo $search_results_count; ?> <?php echo ($search_results_count === 1) ? 'Resultado' : 'Resultados'; ?>
        </h1>
    </header>
    <!-- List of search results -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-12">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- Individual search result -->
                <a class="group flex flex-col gap-1.5" href="<?php the_permalink(); ?>">
                    <!-- Featured image -->
                    <img class="h-64 w-full object-cover rounded-lg" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    <!-- Post title -->
                    <h4 class="font-bold text-xl"><?php the_title(); ?></h4>
                    <!-- Post excerpt -->
                    <p class="text-foreground/80 line-clamp-3 text-sm">
                        <span class="inline-block after:inline-block after:w-12 after:h-[1px] after:bg-foreground/60 after:mr-2 after:ml-2 after:-top-[0.25rem] after:relative uppercase italic">
                            <?php echo get_the_author(); ?>
                        </span>
                        <?php echo get_the_excerpt(); ?>
                    </p>
                </a>
            <?php endwhile;
        else : ?>
            <p>No search results found.</p>
        <?php endif; ?>
    </section>
</main>
<?php
get_footer();

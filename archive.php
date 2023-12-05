<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pobrefobia
 */

get_header();
?>
<main class="px-6 lg:px-24">
    <!-- Category head -->
    <header class="mb-12">
<!-- Post meta -->
<div class="flex flex-row gap-2 justify-start content-center items-center mb-6">
    <!-- Total count of articles -->
    <?php
    $category = get_queried_object(); // Get the current category
    $article_count = $category->count; // Get the total count of articles in the category
    ?>
    <span class="text-foreground/80 text-xs"><?php echo $article_count; ?> artigos</span>
    <!-- Separator -->
    <span class="text-foreground/80 text-xs/10 leading-none">/</span>
    <!-- Latest article date -->
    <?php
    $args = array(
        'category' => $category->term_id, // Retrieve posts in the current category
        'posts_per_page' => 1, // Retrieve only the latest post
        'orderby' => 'date', // Order by date
        'order' => 'DESC' // Show the latest post first
    );
    $latest_post = new WP_Query($args);
    if ($latest_post->have_posts()) {
        $latest_post->the_post();
        $latest_post_date = get_the_date('d \d\e F \d\e Y'); // Format the latest post date
        wp_reset_postdata();
    } else {
        $latest_post_date = ''; // If no posts are found, set the date as empty
    }
    ?>
    <span class="text-foreground/80 text-xs">Última atualização em <?php echo $latest_post_date; ?></span>
</div>

        <!-- Category header -->
        <h1 class="text-4xl lg:text-6xl font-black text-foreground pointer-events-none"><?php echo the_category() ?></h1>
    </header>
    <!-- List of articles -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-12">
        <?php while (have_posts()) : the_post(); ?>
            <!-- Individual article -->
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
        <?php endwhile; ?>
    </section>
</main>
<?php
get_footer();

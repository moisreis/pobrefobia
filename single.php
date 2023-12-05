<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pobrefobia
 */

get_header();
?>
<main class="px-6 lg:px-24">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            $post_categories = get_the_category(); // Get post categories
            $post_category = !empty($post_categories) ? $post_categories[0]->name : ''; // Get the first category name
            ?>
            <!-- Single post content -->
            <article>
                <!-- Post meta -->
                <div class="flex flex-row gap-2 justify-start content-center items-center mb-6">
                    <!-- Post date -->
                    <span class="text-foreground/80 text-xs">
                        <?php echo get_the_date() ?>
                    </span>
                    <!-- Separator -->
                    <span class="text-foreground/80 text-xs/10 leading-none">/</span>
                    <!-- Post reading time -->
                    <span class="text-foreground/80 text-xs">
                        <?php echo get_the_reading_time() ?>
                    </span>
                </div>
                <!-- Post title -->
                <h1 class="text-4xl lg:text-6xl font-black mb-6">
                    <?php the_title(); ?>
                </h1>
                <!-- Post excerpt -->
                <div class="mb-6">
                    <span class="font-normal text-base text-foreground/80">
                        <?php echo get_the_excerpt(); ?>
                    </span>
                </div>
                <!-- Post meta -->
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-3 mt-3 mb-12">
                    <div class="flex flex-row justify-start content-center items-center gap-2">
                        <!-- Author -->
                        <div class="flex flex-row justify-start content-center items-center gap-3 h-10 py-2 px-4 border rounded-3xl w-fit bg-white">
                            <!-- Name -->
                            <span class="text-sm text-foreground font-medium">
                                <?php echo esc_html(get_the_author_meta('display_name'));  ?>                                    
                            </span>                           
                        </div>
                        <!-- Category -->
                        <a href="<?php echo esc_url(get_category_link($post_categories[0]->term_id)); ?>"
                            class="flex flex-row justify-start content-center items-center gap-3 h-10 py-2 px-4 border rounded-3xl w-fit bg-accent hover:opacity-90 transition-opacity">
                            <!-- Name -->
                            <span class="text-sm text-foreground font-medium">
                                <!-- Post categories -->
                                <?php if (!empty($post_category)): ?>
                                    <?php echo esc_html($post_category); ?>
                                <?php endif; ?>
                            </span>
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-4 h-4">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <!-- Action buttons -->
                    <div class="flex flex-row justify-start xl:justify-end content-center items-center gap-2">
                        <!-- Copy link -->
                        <?php
                        $postUrl = get_permalink();
                        echo generate_copy_button($postUrl);
                        ?>
                        <!-- WhatsApp -->
                        <?php
                        share_post_to_whatsapp();
                        ?>
                    </div>
                </div>
                <!-- Post featured image -->
                <?php if (has_post_thumbnail()): ?>
                    <div class="mb-12">
                        <?php the_post_thumbnail('large', ['class' => 'w-full rounded-lg h-96 object-cover']); ?>
                        <?php
                        $caption = get_the_post_thumbnail_caption();
                        if ($caption) {
                            echo '<span class="block mt-2 text-sm text-foreground/80">' . esc_html($caption) . '</span>';
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <!-- Post content -->
                <div class="mb-12 lg:px-48 prose text-lg prose-a:text-blue-600 text-foreground">
                    <!-- Post tag list -->
                    <div class="not-prose flex flex-wrap flex-row justify-start content-center gap-2">
                        <?php
                        $post_tags = get_the_tags(); // Get post tags
                
                        if ($post_tags) {
                            foreach ($post_tags as $tag) {
                                $tag_link = get_tag_link($tag->term_id); // Get the tag's link
                                $tag_name = $tag->name; // Get the tag's name
                                ?>
                                <span
                                    class="inline-flex items-center bg-black rounded-full px-2.5 py-0.5 text-xs font-semibold text-white">
                                    <?php echo esc_html($tag_name); ?>
                                </span>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php the_content(); ?>
                </div>
                <!-- Header for list of related articles -->
                <div class="lg:px-48 mb-6">
                    <h3 class="text-4xl font-black">Leia também</h3>
                </div>
                <!-- List of related articles -->
                <section class="lg:px-48 grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
                    <?php
                    // Get the current post ID
                    $current_post_id = get_the_ID();

                    // Get the current post categories
                    $post_categories = get_the_category();
                    $category_ids = array();

                    foreach ($post_categories as $category) {
                        $category_ids[] = $category->term_id;
                    }

                    // Build the query arguments
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'post__not_in' => array($current_post_id),
                        // Exclude the current post
                        'category__in' => $category_ids,
                        // Only posts from the same category
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                            $category = get_the_category();
                            $author = get_the_author();
                            ?>
                            <!-- Individual article -->
                            <a class="group flex flex-col gap-1.5" href="<?php the_permalink(); ?>">
                                <!-- Featured image -->
                                <img class="h-64 w-full object-cover rounded-lg" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                    alt="">
                                <!-- Post title -->
                                <h4 class="font-bold text-xl">
                                    <?php the_title(); ?>
                                </h4>
                                <!-- Post excerpt -->
                                <p class="text-foreground/80 line-clamp-3 text-sm">
                                    <span
                                        class="inline-block after:inline-block after:w-12 after:h-[1px] after:bg-foreground/60 after:mr-2 after:ml-2 after:-top-[0.25rem] after:relative uppercase italic">
                                        <?php echo esc_html($author); ?>
                                    </span>
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                                <!-- Categories and tags -->
                                <div class="flex flex-row justify-start content-center items-center flex-wrap gap-1.5 mt-1">
                                    <?php foreach ($category as $cat): ?>
                                        <span
                                            class="inline-flex items-center bg-accent border rounded-full px-2.5 py-0.5 text-xs font-semibold text-foreground">
                                            <?php echo esc_html($cat->name); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </a>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo 'No articles found.';
                    endif;
                    ?>
                </section>
            </article>
            <?php
        endwhile;
    endif;
    ?>
</main>
<?php
get_footer();
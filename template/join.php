<?php

/**
 * Template Name: Junte-se a nós
 *
 * This is the 'Join us' template
 * It is used to display the page with a title
 * and some content, plus a form to join the organization
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pobrefobia
 */

get_header();
?>
<main class="px-6 lg:px-24">
    <!-- Header -->
    <header class="flex flex-col gap-6 mb-12">
        <h1 class="text-4xl lg:text-6xl font-black text-foreground"><span class="text-foreground/60">Junte-se ao <span class="text-foreground">observatório</span> que acompanha a luta de centenas de pessoas em situaçaõ de rua na Grande São Paulo.</span> Faça parte.</h1>
        <p class="text-sm text-foreground/60">Preencha o formulário abaixo e aguarde o nosso contato.</p>
    </header>
    <!-- Form section -->
    <section class="mb-12 relative p-6 pt-0 border rounded-lg">
        <!-- Form to be sent -->
        <?php echo do_shortcode('[contact-form-7 id="13051" title="Junte-se a nós"]'); ?>
    </section>
</main>
<?php
get_footer();

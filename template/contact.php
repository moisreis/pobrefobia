<?php

/**
 * Template Name: Contato
 *
 * This is the 'Contact' template
 * It is used to display the page with a title
 * and content over the project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pobrefobia
 */

get_header();
?>
<main class="px-6 lg:px-24">
    <!-- Main content -->
    <header class="flex flex-col gap-6 mb-12">
        <h1 class="text-4xl lg:text-6xl font-black text-foreground/60 mb-6">Para entrar em contato conosco, use qualquer um dos meios abaixo.</span></h1>
        <p class="lg:text-3xl text-sm text-foreground/60">Ao entrar em contato, responderemos assim que for possível. Pedimos paciência, talvez leve alguns dias até que possamos ler seu e-mail. Caso um dos métodos abaixo não funcione, tente o seguinte.
        </p>
    </header>
    <section class="flex flex-col lg:flex-row gap-12 justify-start mb-12">
        <div class="flex flex-col gap-1">
            <h2 class="font-black uppercase text-xl">E-mails</h2>
            <p class="text-tertiary">seuemail@email.com</p>
            <p class="text-tertiary">seuemail@email.com</p>
            <p class="text-tertiary">seuemail@email.com</p>
            <p class="text-tertiary">seuemail@email.com</p>
            <p class="text-tertiary">seuemail@email.com</p>
        </div>
        <div class="flex flex-col gap-1">
            <h2 class="font-black uppercase text-xl">Telefones</h2>
            <p class="text-tertiary">+55 74 99989-9999</p>
            <p class="text-tertiary">+55 74 99989-9999</p>
            <p class="text-tertiary">+55 74 99989-9999</p>
            <p class="text-tertiary">+55 74 99989-9999</p>
        </div>
    </section>
</main>
<?php
get_footer();

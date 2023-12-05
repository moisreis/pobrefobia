<?php

/**
 * Template Name: Quem Somos
 *
 * This is the 'About' template
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
    <section class="flex flex-col gap-6 mb-24">
        <!-- List of members -->
        <div class="flex -space-x-4">
            <img class="w-10 h-10 border-2 border-white rounded-full object-cover" src="https://judasasbotasde.com.br/wp-content/uploads/2023/05/paulo.jpg" alt="">
            <img class="w-10 h-10 border-2 border-white rounded-full object-cover" src="https://expresso.estadao.com.br/wp-content/uploads/2022/08/Padre_Julio_Lancellotti.jpg" alt="">
            <span class="flex items-center justify-center w-10 h-10 text-xs font-medium text-foreground bg-accent border-2 border-white rounded-full">+99</span>
        </div>
        <h1 class="text-4xl lg:text-6xl font-black text-foreground/60 mb-6">Junte-se a <span class="text-foreground">nós contra</span> a <span class="text-foreground">pobrefobia</span>. Unidos, podemos fazer a <span class="text-foreground">diferença</span>.</h1>
        <p class="lg:text-3xl text-sm text-foreground/60">Acreditamos em um futuro onde a aporofobia não encontra espaço para se manifestar. Vislumbramos uma sociedade onde cada indivíduo é tratado com dignidade e compaixão, independentemente de sua origem social ou econômica. Nosso trabalho consiste em fomentar a mudança de mentalidade, sensibilizando as pessoas para a realidade dos mais desfavorecidos e combatendo os estereótipos e preconceitos que permeiam nossa cultura. Se você compartilha dessa visão, junte-se a nós nessa caminhada rumo a um mundo mais inclusivo e acolhedor.</p>
        <!-- Bento -->
        <div class="grid grid-cols-12 gap-6">
            <img class="col-span-8 w-full h-64 object-cover rounded-3xl" src="https://images.unsplash.com/photo-1494537604714-7975224eea63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
            <img class="col-span-4 w-full h-64 object-cover rounded-3xl" src="https://images.unsplash.com/photo-1494537604714-7975224eea63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
            <img class="col-span-4 w-full h-64 object-cover rounded-3xl" src="https://images.unsplash.com/photo-1494537604714-7975224eea63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
            <img class="col-span-8 w-full h-64 object-cover rounded-3xl" src="https://images.unsplash.com/photo-1494537604714-7975224eea63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
        </div>
        <!-- Content -->
        <p class="lg:text-3xl text-sm text-foreground/60">Nossos objetivos no Observatório da Aporofobia são sensibilizar a sociedade sobre a aporofobia e suas consequências devastadoras para os mais vulneráveis, realizar pesquisas e estudos para entender e erradicar esse preconceito, promover ações e projetos que ofereçam suporte e oportunidades para pessoas em situação de vulnerabilidade, engajar indivíduos, comunidades e instituições na luta contra a aporofobia, criando uma rede de apoio e solidariedade, e trabalhar em parceria com organizações afins, unindo esforços para maximizar o impacto de nossas iniciativas. Juntos, buscamos construir um mundo mais inclusivo e acolhedor para todos.</p>
    </section>
</main>
<?php
get_footer();

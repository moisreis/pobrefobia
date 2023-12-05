<?php

/**
 * Template Name: Apoie
 *
 * This is the 'Support Us' template
 * It is used to display the page with a list of contributors
 * and some content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pobrefobia
 */

get_header();
?>
<main class="px-6 lg:px-24">
    <!-- Main content -->
    <section class="flex flex-col gap-6">
        <!-- List of members -->
        <!-- <div class="flex -space-x-4">
            <img class="w-10 h-10 border-2 border-white rounded-full object-cover" src="https://judasasbotasde.com.br/wp-content/uploads/2023/05/paulo.jpg" alt="">
            <img class="w-10 h-10 border-2 border-white rounded-full object-cover" src="https://expresso.estadao.com.br/wp-content/uploads/2022/08/Padre_Julio_Lancellotti.jpg" alt="">
            <span class="flex items-center justify-center w-10 h-10 text-xs font-medium text-foreground bg-accent border-2 border-white rounded-full">+99</span>
        </div> -->
        <h1 class="mb-6 text-4xl lg:text-6xl font-black text-foreground/60">Junte-se a <span class="text-foreground">Pe.
                Júlio Lancelotti</span> e a <span class="text-foreground">Paulo Escobar</span> e muitos outros</h1>
        <!-- Image grid
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <img class="w-full h-64 object-cover rounded-3xl" src="https://images.unsplash.com/photo-1494537604714-7975224eea63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
            <img class="w-full h-64 object-cover rounded-3xl" src="https://images.unsplash.com/photo-1494537604714-7975224eea63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
            <img class="lg:col-span-2 w-full h-64 object-cover rounded-3xl" src="https://images.unsplash.com/photo-1494537604714-7975224eea63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" alt="">
        </div> -->
    </section>
    <!-- Actions -->
    <section class="flex flex-col gap-6 mb-12">
        <!-- Text -->
        <p class="lg:text-3xl text-sm text-foreground/60">Ao apoiar, você estará fazendo uma diferença significativa na vida de
            centenas de pessoas em situação de rua, ajudando a promover seu bem-estar e dignidade. Sua contribuição
            direta será um passo importante para fornecer abrigo, alimentação, assistência médica e outros serviços
            essenciais para aqueles que mais precisam. Com o seu apoio, poderemos trabalhar em conjunto para oferecer
            oportunidades de recuperação, inclusão social e reintegração desses irmãos de rua na sociedade. Juntos,
            podemos fazer a diferença e trazer esperança para aqueles que foram marginalizados e necessitam de apoio.
        </p>
        <div class="flex flex-row gap-6 content-center justify-start mt-6">
            <!-- Support us -->
            <button class="inline-flex items-center justify-center border rounded-3xl max-w-fit text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-accent text-foreground hover:bg-accent/90 h-10 py-2 px-4">
                <span>Apoie a nossa causa</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 h-4 w-4">
                    <path d="M7 7h10v10" />
                    <path d="M7 17 17 7" />
                </svg>
            </button>
            <!-- Donate -->
            <button id="pix-open" class="inline-flex items-center justify-center rounded-3xl max-w-fit text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-black text-white hover:bg-black/90 h-10 py-2 px-4">
                <span>Faça um PIX</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 h-4 w-4">
                    <path d="M7 7h10v10" />
                    <path d="M7 17 17 7" />
                </svg>
            </button>
        </div>
    </section>
    <!-- Modal window -->
    <section id="modal-pix" class="fixed hidden shadow-lg flex flex-col gap-6 p-6 border bg-white rounded-lg top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 z-[999] w-screen h-screen lg:w-fit">
        <div class="grid grid-cols-2">
            <div class="flex flex-row justify-start content-center items-center">
                <button id="pix-copy">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-foreground hover:opacity-70 transition-opacity w-6 h-6""><path d=" M12 17V3" />
                    <path d="m6 11 6 6 6-6" />
                    <path d="M19 21H5" /></svg>
                </button>
            </div>
            <div class="flex flex-row justify-end content-center items-center">
                <button id="pix-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-foreground hover:opacity-70 transition-opacity w-6 h-6">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div>
            <img id="pix-qr" class="w-full h-full" src="http://localhost/wordpress/wp-content/uploads/2023/07/pix.png" alt="">
        </div>
        <p class="text-foreground/60">A chave PIX é <span class="font-bold text-tertiary">sdsdhajsd1212</span></p>
    </section>
    <!-- Modal script -->
    <script>
        const PixModal = document.getElementById("modal-pix");
        const PixOpen = document.getElementById("pix-open");
        const PixClose = document.getElementById("pix-close");
        const PixCopy = document.getElementById("pix-copy");
        const PixImg = document.getElementById("pix-qr");

        PixOpen.addEventListener("click", function() {
            PixModal.style.display = "block";
        });

        PixClose.addEventListener("click", function() {
            PixModal.style.display = "none";
        });

        PixCopy.addEventListener("click", function() {
            // Create a canvas element
            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");

            // Set the canvas size to match the image size
            canvas.width = PixImg.width;
            canvas.height = PixImg.height;

            // Draw the image on the canvas
            context.drawImage(PixImg, 0, 0);

            // Convert the canvas content to a data URL
            const dataURL = canvas.toDataURL();

            // Create a temporary link element
            const tempLink = document.createElement("a");
            tempLink.href = dataURL;
            tempLink.download = "pix.png"; // Specify the desired file name

            // Simulate a click on the link to trigger the download
            tempLink.click();
        });
    </script>
</main>
<?php
get_footer();

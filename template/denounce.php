<?php

/**
 * Template Name: Denuncie
 *
 * This is the 'Denounce' template
 * It is used to display the page with a title
 * and some content, plus a form to make a report
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
        <h1 class="text-4xl lg:text-6xl font-black text-foreground"><span class="text-foreground/60">Arquitetura hostil. Xingamentos. Violência. Exclusão social. Demissão. Olhares descriminatórios.</span> Denuncie.</h1>
        <p class="text-sm text-foreground/60">Una-se ao Pe. Júlio Lancelotti na luta contra a pobrefobia em São Paulo. Denuncie a arquitetura hostil, abusos de poder e maus-tratos de todas as formas. Não solicitamos seus dados, tudo será feito anonimamente e as medidas apropriadas serão tomadas.</p>
    </header>
    <!-- Form section -->
    <section class="mb-12">
        <!-- Form to be sent -->
        <div class="relative space-y-8 p-6 pt-0 border rounded-lg">
            <!-- Form to be sent -->
            <?php echo do_shortcode('[contact-form-7 id="13046" title="Denuncie"]'); ?>
            <!-- Script to handle CEP location -->
            <script>
                function clear_address_fields() {
                    // Clear values from the address form.
                    document.getElementById('street').value = ("");
                    document.getElementById('neighborhood').value = ("");
                    document.getElementById('city').value = ("");
                }

                function my_callback(content) {
                    if (!("erro" in content)) {
                        // Update the fields with the values.
                        document.getElementById('street').value = (content.logradouro);
                        document.getElementById('neighborhood').value = (content.bairro);
                        document.getElementById('city').value = (content.localidade);
                        console.log(document.getElementById('street'))
                    } // end if.
                    else {
                        // CEP not found.
                        clear_address_fields();
                        console.log("CEP not found.");
                    }
                }

                function search_cep(value) {

                    // New variable "cep" with only digits.
                    var cep = value.replace(/\D/g, '');

                    // Check if the cep field has a value.
                    if (cep != "") {

                        // Regular expression to validate the CEP format.
                        var cep_regex = /^[0-9]{8}$/;

                        // Validate the CEP format.
                        if (cep_regex.test(cep)) {

                            // Fill the fields with "..." while querying the webservice.
                            document.getElementById('street').value = "...";
                            document.getElementById('neighborhood').value = "...";
                            document.getElementById('city').value = "...";

                            // Create a new JavaScript element.
                            var script = document.createElement('script');

                            // Synchronize with the callback.
                            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=my_callback';

                            // Insert script into the document and load the content.
                            document.body.appendChild(script);

                        } // end if.
                        else {
                            // CEP is invalid.
                            clear_address_fields();
                            console.log("Invalid CEP format.");
                        }
                    } // end if.
                    else {
                        // CEP is empty, clear the form.
                        clear_address_fields();
                    }
                };
            </script>
        </div>
            
    </section>
</main>
<?php
get_footer();

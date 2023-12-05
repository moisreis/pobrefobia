<?php

/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pobrefobia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<!-- 
	
 ______     ______     ______     ______     ______     __   __   ______     ______   ______     ______     __     ______    
/\  __ \   /\  == \   /\  ___\   /\  ___\   /\  == \   /\ \ / /  /\  __ \   /\__  _\ /\  __ \   /\  == \   /\ \   /\  __ \   
\ \ \/\ \  \ \  __<   \ \___  \  \ \  __\   \ \  __<   \ \ \'/   \ \  __ \  \/_/\ \/ \ \ \/\ \  \ \  __<   \ \ \  \ \ \/\ \  
 \ \_____\  \ \_____\  \/\_____\  \ \_____\  \ \_\ \_\  \ \__|    \ \_\ \_\    \ \_\  \ \_____\  \ \_\ \_\  \ \_\  \ \_____\ 
  \/_____/   \/_____/   \/_____/   \/_____/   \/_/ /_/   \/_/      \/_/\/_/     \/_/   \/_____/   \/_/ /_/   \/_/   \/_____/ 
																															 
 _____     ______                                                                                                            
/\  __-.  /\  __ \                                                                                                           
\ \ \/\ \ \ \  __ \                                                                                                          
 \ \____-  \ \_\ \_\                                                                                                         
  \/____/   \/_/\/_/                                                                                                         
																															 
 ______     ______   ______     ______     ______     ______   ______     ______     __     ______                           
/\  __ \   /\  == \ /\  __ \   /\  == \   /\  __ \   /\  ___\ /\  __ \   /\  == \   /\ \   /\  __ \                          
\ \  __ \  \ \  _-/ \ \ \/\ \  \ \  __<   \ \ \/\ \  \ \  __\ \ \ \/\ \  \ \  __<   \ \ \  \ \  __ \                         
 \ \_\ \_\  \ \_\    \ \_____\  \ \_\ \_\  \ \_____\  \ \_\    \ \_____\  \ \_____\  \ \_\  \ \_\ \_\                        
  \/_/\/_/   \/_/     \/_____/   \/_/ /_/   \/_____/   \/_/     \/_____/   \/_____/   \/_/   \/_/\/_/                        
																															 

 -->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Anton&family=Archivo+Black&family=Bebas+Neue&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Rubik+Mono+One&display=swap');
	</style>
</head>

<body>
	<header class="flex flex-col gap-0 px-6 lg:px-24 py-6 mb-6">
		<!-- Navigation -->
		<section class="grid grid-cols-12">
			<!-- Menu -->
			<div class="col-span-3 lg:col-span-6 py-3 flex flex-row content-center justify-start items-center gap-6">
				<!-- Menu button -->
				<button id="menu-open-button">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-foreground">
						<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
					</svg>
				</button>
				<!-- Menu sidebar -->
				<aside id="aside-menu" class="transition-transform fixed -translate-x-[100%] top-0 left-0 flex flex-col justify-between content-start p-6 h-[100dvh] w-72 bg-white border-r z-[999]">
					<!-- Top navigation -->
					<div class="flex justify-end">
						<button id="menu-close-button">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-foreground">
								<path d="m12 19-7-7 7-7" />
								<path d="M19 12H5" />
							</svg>
						</button>
					</div>
					<!-- Menu -->
					<?php
					class Pobrefobia_Walker extends Walker_Nav_Menu
					{
						// Modify menu item output
						function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
						{
							$output .= '<a href="' . $item->url . '" class="' . implode(' ', $item->classes) . ' uppercase text-right font-black text-2xl hover:opacity-90 transition-opacity cursor-pointer">' . $item->title . '</a>';
						}
					}
					wp_nav_menu(array(
						'menu' => 'Lateral',
						'container' => false,
						'fallback_cb' => '__return_false',
						'items_wrap' => '<nav class="flex flex-col gap-3">%3$s</nav>',
						'walker' => new Pobrefobia_Walker(),
					));
					?>
					<!-- Buttons -->
					<div class="flex flex-col gap-3">
						<!-- Support Us -->
						<a href="http://localhost/wordpress/apoie/">
							<button class="inline-flex items-center min-w-full border justify-center rounded-3xl text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-accent text-foreground hover:bg-accent/90 h-10 py-2 px-4">
								<span>Apoie-nos</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 h-4 w-4">
									<path d="M7 7h10v10" />
									<path d="M7 17 17 7" />
								</svg>
							</button>
						</a>
						<!-- Join us -->
						<a href="">
							<button class="inline-flex items-center min-w-full justify-center rounded-3xl text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-black text-white hover:bg-black/90 h-10 py-2 px-4">
								<span>Junte-se ao projeto</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 h-4 w-4">
									<path d="M7 7h10v10" />
									<path d="M7 17 17 7" />
								</svg>
							</button>
						</a>
					</div>
				</aside>
				<!-- Script to handle menu -->
				<script>
					const MenuOpenButton = document.getElementById("menu-open-button");
					const AsideMenu = document.getElementById("aside-menu");
					const MenuCloseButton = document.getElementById("menu-close-button");

					MenuOpenButton.onclick = () => {
						AsideMenu.style.transform = "translateX(0%)";
					};

					MenuCloseButton.onclick = () => {
						AsideMenu.style.transform = "translateX(-100%)";
					};
				</script>
			</div>
			<!-- Actions -->
			<div class="col-span-9 lg:col-span-6 py-3 flex gap-6 justify-end content-center items-center">
				<!-- Support us -->
				<a href="http://localhost/wordpress/apoie/">
					<button class="inline-flex items-center justify-center rounded-3xl text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-black text-white hover:bg-black/90 h-10 py-2 px-4">
						<span>Apoie</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 h-4 w-4">
							<path d="M7 7h10v10" />
							<path d="M7 17 17 7" />
						</svg>
					</button>
				</a>
				<!-- LogIn -->
				<a href="http://localhost/wordpress/wp-admin/">
					<button class="hidden lg:inline-flex items-center border justify-center rounded-3xl text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-accent text-foreground hover:bg-accent/90 h-10 py-2 px-4">
						<span>Entrar</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 w-4 h-4">
							<path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
							<polyline points="10 17 15 12 10 7" />
							<line x1="15" x2="3" y1="12" y2="12" />
						</svg>
					</button>
				</a>
				<!-- Search input -->
				<div class="relative">
					<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-foreground">
							<circle cx="11" cy="11" r="8" />
							<path d="m21 21-4.3-4.3" />
						</svg>
					</div>
					<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
						<input class="flex h-10 pl-10 w-full rounded-3xl border bg-white px-3 py-2 text-sm ring-offset-transparent focus-visible:outline-none focus-visible:ring-0 focus-visible:ring-transparent focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" placeholder="Termos, títulos e autores" type="search" name="s" value="<?php echo get_search_query(); ?>">
					</form>
				</div>
			</div>
		</section>
	</header>
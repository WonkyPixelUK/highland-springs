<?php 

    namespace App\Theme;
    
	class Dashboard {
        
        function __construct() {

			add_action( 'admin_init', [ $this, 'remove_dashboard_widgets'] );
			add_action( 'welcome_panel', [$this, 'astro_wp_welcome_panel' ] );

		}

		function remove_dashboard_widgets() {

			remove_action('welcome_panel', 'wp_welcome_panel'); // welcome

			remove_meta_box('dashboard_primary', 'dashboard', 'normal'); // wordpress blog
			remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); // other wordpress news
			remove_meta_box('dashboard_quick_press', 'dashboard', 'normal'); // quick press
			remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal'); // recent drafts

			remove_meta_box('dashboard_php_nag', 'dashboard', 'normal'); // right now
			remove_meta_box('dashboard_browser_nag', 'dashboard', 'normal'); // right now
			remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // site health
			remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // right now
			remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // activity
			remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
			remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
			remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // plugins
			
			remove_meta_box('rg_forms_dashboard', 'dashboard', 'normal'); // gravity forms

		}

		function astro_wp_welcome_panel() { ?>
			<style>
				.welcome-panel {
					background-color: #2f284e;
					background-image: url('https://astroagency.uk/wp-content/themes/astroagency/images/footer-planet.png');
    				background-position: top right;
    				background-repeat: no-repeat;
					background-size: contain;
				}
				.welcome-panel-header {
					padding-bottom: 54px;
				}
			</style>
			<div class="welcome-panel-content">
				<div class="welcome-panel-header">
					<h2>Welcome to Astro!</h2>
					<p>Wordpress specialists.</p>
				</div>
				<div class="welcome-panel-column-container">
					<div class="welcome-panel-column">
						<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
							<rect width="48" height="48" rx="4" fill="#1E1E1E"></rect>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M32.0668 17.0854L28.8221 13.9454L18.2008 24.671L16.8983 29.0827L21.4257 27.8309L32.0668 17.0854ZM16 32.75H24V31.25H16V32.75Z" fill="white"></path>
						</svg>
						<div class="welcome-panel-column-content">
							<h3>Custom content 1</h3>
							<p>Lorem ipsum dolor sit amet. Ut eius quia ab autem voluptatem ad internos sapiente!</p>
							<a href="#">Link</a>
						</div>
					</div>
					<div class="welcome-panel-column">
						<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
							<rect width="48" height="48" rx="4" fill="#1E1E1E"></rect>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M18 16h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H18a2 2 0 0 1-2-2V18a2 2 0 0 1 2-2zm12 1.5H18a.5.5 0 0 0-.5.5v3h13v-3a.5.5 0 0 0-.5-.5zm.5 5H22v8h8a.5.5 0 0 0 .5-.5v-7.5zm-10 0h-3V30a.5.5 0 0 0 .5.5h2.5v-8z" fill="#fff"></path>
						</svg>
						<div class="welcome-panel-column-content">
							<h3>Custom content 2</h3>
							<p>Sit debitis amet sit consequatur corrupti ea saepe quas qui fugit nobis in provident velit ut eligendi rerum aut magni quam.</p>
							<a href="#">Link</a>
						</div>
					</div>
					<div class="welcome-panel-column">
						<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
							<rect width="48" height="48" rx="4" fill="#1E1E1E"></rect>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M31 24a7 7 0 0 1-7 7V17a7 7 0 0 1 7 7zm-7-8a8 8 0 1 1 0 16 8 8 0 0 1 0-16z" fill="#fff"></path>
						</svg>
						<div class="welcome-panel-column-content">
							<h3>Custom content 3</h3>
							<p>Sed dicta rerum et officia enim nam quam laboriosam. Est suscipit ipsam cum omnis delectus aut dolor voluptatem ut vero porro.</p>
							<a href="#">Link</a>
						</div>
					</div>
				</div>
			</div>
		
		<?php }

	}
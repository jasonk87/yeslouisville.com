<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
		<!--[if lt IE 9]>
			<script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body <?php body_class(); ?>>
		<?php if( 'ocn' == get_field( 'menu_type', 'option' ) ): ?>
			<div id="ocn">
				<div id="ocn-inner">
					<div id="ocn-top">
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>" id="ocn-brand">
							<img src="<?php the_field( 'site_logo', 'option' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						</a>
						<button class="nav-toggle" type="button" id="ocn-close">
							<span></span>
						</button>
					</div>
					<?php wp_nav_menu( array(
						'container' => 'nav',
						'container_id' => 'ocn-nav-primary',
						'theme_location' => 'primary',
						'before' => '<span class="ocn-link-wrap">',
						'after' => '<span class="ocn-sub-menu-button"></span></span>'
					) ); ?>
				</div>
			</div>
		<?php endif; ?>
		<header class="site-header">
			<!-- Header -->
			<div>
				<div class="scroll_logo">
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>" id="ocn-brand">
						<img src="<?php the_field( 'site_logo', 'option' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</div>
				<div class="inner">
					<div class="left">
						<?php while ( have_rows( 'msw_nav_links', 'option' ) ): the_row(); ?>
							<div class="link">
								<a href="<?php the_sub_field( 'link' ); ?>">
									<?php the_sub_field( 'text' ); ?>
								</a>

								<?php the_sub_field( 'excerpt' ); ?>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="right">
						<!-- About Yes -->
						<section>
							<span class="header"><?php the_field( 'msw_about_header', 'option' ); ?></span>
							<?php the_field( 'msw_about_content', 'option' ); ?>

							<?php if ( get_field( 'msw_about_button_link', 'option' ) ): ?>
								<a href="<?php the_field( 'msw_about_button_link', 'option' ); ?>">
									<?php the_field( 'msw_about_button_text', 'option' ); ?>
								</a>
							<?php endif; ?>
						</section>

						<!-- Connect -->
						<?php if ( have_rows( 'msw_connect_links', 'option' ) ): ?>
							<section>
								<span class="header"><?php the_field( 'msw_connect_header', 'option' ); ?></span>

								<ul>
									<?php while ( have_rows( 'msw_connect_links', 'option' ) ): the_row(); ?>
										<li>	
											<a href="<?php the_sub_field( 'button_link' ); ?>">
												<?php the_sub_field( 'button_text' ); ?>
											</a>
										</li>
									<?php endwhile; ?>
								</ul>
							</section>
						<?php endif; ?>

						<!-- Social -->
						<?php $contact = get_field( 'contact_information', 'option' ); ?>
						<?php if ( $contact[ 0 ][ 'social_media_links' ] ): ?>
							<section>
								<span class="header"><?php the_field( 'msw_social_header', 'option' ); ?></span>

								<ul>
									<?php foreach ( $contact[ 0 ][ 'social_media_links' ] as $link ): ?>
										<li>
											<a href="<?php echo $link[ 'url' ]; ?>" target="_blank">
												<i class="fa fa-<?php echo sanitize_title( $link[ 'class' ] ); ?>"></i>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</section>
						<?php endif; ?>

						<!-- Search -->
						<section>
							<form action="<?php home_url(); ?>" method="GET">
								<div>
									<input type="text" name="search" value="" placeholder="<?php the_field( 'msw_search_input_placeholder', 'option' ); ?>">
									<button type="Submit" value="submit">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
								</div>
							</form>
						</section>
					</div>
				</div>
			</div>

			<div class="outer">
				<div class="logo">
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>" class="brand">
						<?php $logo = get_field( 'msw_nav_logo', 'option' ); ?>
						<img src="<?php echo $logo[ 'url' ]; ?>" alt="<?php echo $logo[ 'alt' ]; ?>" height="<?php echo $logo[ 'height' ]; ?>" width="<?php echo $logo[ 'width' ]; ?>">
					</a>
				</div>
				<div>
					<button class="large-nav-toggle" type="button">
						<div class="menu-open">
							<i class="fa fa-bars" aria-hidden="true"></i>
							<span>menu</span>
						</div>
						<div class="menu-close">
							<span>X</span>
						</div>
					</button>
				</div>
			</div>
		</header>
		<?php
			if( function_exists( 'yoast_breadcrumb' ) ){
				yoast_breadcrumb( '<div id="breadcrumbs">', '</div>' );
			}
		?>
		<?php $durl = md_get_durl(); $prefix = idf_get_querystring_prefix(); ?>
		<?php if ( function_exists( 'wpneo_shortcode_croudfunding_dashboard' ) ) : ?>
		
			<?php if (  ! is_user_logged_in() ) : ?>
				<div id="progression-studios-header-login-container" class="noselect">
					<a href="<?php echo $durl; ?>" class="progresion-studios-login-icon"><i class="fa fa-sign-in" aria-hidden="true"></i><span><?php echo esc_html__( 'Login', 'multifondo-progression' )?></span></a>
				</div>
			<?php else: ?>
			<div id="progression-studios-header-login-container" class="noselect">
				<a href="<?php echo $durl; ?>" class="progresion-studios-login-icon"><i class="fa fa-user-circle-o"></i><span><?php
					$current_user = wp_get_current_user();
					 if ( $current_user->user_firstname ) : ?><?php echo esc_attr($current_user->user_firstname); ?><?php else: ?><?php echo esc_attr($current_user->display_name); ?><?php endif; ?></span></a>
				<ul id="progression-studios-panel-login">
					<li class="helpmeout-admin-dashboard-menu"><a href="<?php echo $durl; ?>"><i class="fa fa-dashboard"></i><?php echo esc_html__( 'Dashboard', 'multifondo-progression' )?></a></li>
					<li  class="helpmeout-admin-profile-menu"><a href="<?php echo md_get_durl().$prefix.'edit-profile='.$current_user->ID?>"><i class="fa fa-cogs"></i><?php echo esc_html__( 'Edit Profile', 'multifondo-progression' )?></a></li>
					<li  class="helpmeout-admin-my-projets-menu"><a href="<?php echo $durl.$prefix.apply_filters('idc_creator_projects_slug', 'creator_projects').'=1'; ?>?page_type=campaign"><i class="fa fa-pencil"></i><?php echo esc_html__( 'My Projects', 'multifondo-progression' )?></a></li>
					<li class="helpmeout-admin-logout-menu"><a href="<?php echo esc_url(wp_logout_url( home_url()) )?>"><i class="fa fa-sign-out" ></i><?php echo esc_html__( 'Logout', 'multifondo-progression' )?></a></li>
				</ul>
			</div>
			<?php endif; ?>
		
		<?php endif; ?>
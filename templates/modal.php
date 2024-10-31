<script type="text/html" id="tpl-cs-item-modal">
    <div id="cs-modal-site--{{ data.slug }}" class="cs-modal-site munk-sites-modal-wrapper">
        <div class="cs-modal-outer">
            <a href="#" class="cs-back-to-list button button-secondary">
            <?php _e( '&#8592; Back to site library', 'munk-sites' ); ?>
            </a>
            <div class="cs-modal">

                <div class="cs-main">
                    <ul class="cs-breadcrumb">
                        <li data-step="overview" class="current"><?php _e( 'Import Overview', 'munk-sites' ); ?></li>
                        <li data-step="install_plugins"><?php _e( 'Install Plugins', 'munk-sites' ); ?></li>
                        <li data-step="import_content"><?php _e( 'Import Content', 'munk-sites' ); ?></li>
                        <li data-step="import_options"><?php _e( 'Import Options', 'munk-sites' ); ?></li>
                    </ul>

                    <div class="cs-steps owl-carousel">
                        <div class="cs-step cs-step-start">
                            <div class="cs-step-img">
                                <img src="http://munk.local/wp-content/uploads/2020/08/rocket.svg">
                                <svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                </svg>
                            </div>
                            <#  if ( data.pro && ! Munk_Sites.license_valid ) {  #>  
                            <div class="cs-text-center">
                                <h3><?php _e( 'Hi! Welcome', 'munk-sites' ) ?></h3>                                                              
                                <p><?php _e( '<b>Thank you for using Munk Instant Sites.</b>', 'munk-sites' ); ?></p>
                                <div class="munk_pro_notice">
                                    <p><?php _e('This is a Premium Instant site only available with Munk Pro Standard and Ultimate plan.', 'munk-sites');?></p>                                
                                    <p><?php _e('Please upgrade to Munk Pro - Standard or Ultimate plan to install this Instant site.', 'munk-sites');?></p>
                                </div>
                            </div>                            
                            <# } else { #>
                            <div class="cs-text-center">
                               <h3><?php _e( 'Hi! Welcome', 'munk-sites' ) ?></h3>                               
                                <p><?php _e( '<b>Thank you for using Munk Instant Sites.</b>', 'munk-sites' ); ?></p>
                                <p><?php _e('Importing Instant Site is the easiest way to build your theme. It will allow you to quickly edit everything instead of creating content from scratch. Also, read following points before importing the instant site:', 'munk-sites');?></p>
                                <ul>
                                <li><?php _e('It is highly recommended to import the instant site on fresh WordPress installation to exactly replicate the demo.', 'munk-sites');?></li>
                                <li><?php _e('No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.', 'munk-sites');?></li>
                                <li><?php _e('It will install the plugins required for the instant site and activate them. Also posts, pages, images, widgets, & other data will get imported.', 'munk-sites');?></li>
                                <li><?php _e('Please click on the "Start Import" button below to get started.', 'munk-sites');?></li>                               
                                </ul>
                                <p class="cs-list-plugins" style="margin-top: 10px; display: none;">
                                    <label><input type="checkbox" checked="checked" name="import_placeholder_only"> <?php _e( 'Import placeholder image.', 'munk-sites' ); ?></label>
                                </p>
                                <p class="cs-error cs-hide cs-error-download-files">
                                    <?php _e( 'Oops! Could not download demo content xml and config files.', 'munk-sites' ); ?>
                                </p>
                            </div>
                            <# } #>
                        </div>
                        <div class="cs-step cs-step-install_plugins">
                            <div class="cs-step-img">
                                <img src="<?php echo MUNK_SITES_URL; ?>/assets/images/plugins.svg">
                                <svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                </svg>
                            </div>
                            <div class="cs-text-center">
                            <h3><?php _e( 'Install Plugins', 'munk-sites' ); ?></h3>
                            <p><?php _e( 'Lets install some essential WordPress plugins required to get this instant site working.', 'munk-sites' ); ?></p>
                            <ul class="cs-installing-plugins cs-list-plugins no-style"></ul>
                            <# if ( ! _.isEmpty( data.plugins ) || ! _.isEmpty( data.manual_plugins ) ){  #>
                                <div class="cs-install-manual-plugins">
                                    <p class="cs-text-center"><?php _e( 'The following plugins need to be installed and activated manually.', 'munk-sites' ); ?></p>
                                    <ul class="cs-list-plugins"></ul>
                                </div>
                            <# } #>
                            </div>
                        </div>
                        <div class="cs-step cs-step-import_content">
                            <div class="cs-step-img">
                                <img src="<?php echo MUNK_SITES_URL; ?>/assets/images/content.svg">
                                <svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                </svg>
                            </div>
                            <div class="cs-text-center">
                                <h3><?php _e( 'Import Demo Content', 'munk-sites' ); ?></h3>
                                <p><?php _e( 'This step will import the demo content required for this instant site.', 'munk-sites' ); ?></p>
                                <ul class="cs-import-content-status cs-list-plugins no-style">
                                    <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name cs-post_count"></span></li>
                                    <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name cs-media_count"></span></li>
                                    <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name cs-comment_count"></span></li>
                                    <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name cs-user_count"></span></li>
                                    <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name cs-term_count"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cs-step cs-step-import_options">
                            <div class="cs-step-img">
                                <img src="<?php echo MUNK_SITES_URL; ?>/assets/images/options.svg">
                                <svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                </svg>
                            </div>
                            <div class="cs-text-center">
                            <h3><?php _e( 'Import Options', 'munk-sites' ); ?></h3>
                            <p><?php _e( 'This step will import the theme options, menus and widgets', 'munk-sites' ); ?></p>
                            <ul class="cs-import-options-status cs-list-plugins no-style">
                                <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name"><?php _e( 'Customize Options', 'munk-sites' ); ?></span></li>
                                <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name"><?php _e( 'Widgets', 'munk-sites' ); ?></span></li>
                                <li><div class="circle-loader"><div class="checkmark draw"></div></div><span class="cs-plugin-name"><?php _e( 'Options', 'munk-sites' ); ?></span></li>
                            </ul>
                            </div>
                        </div>
                        <div class="cs-step cs-step-view_site">
                            <div class="cs-step-img">
                                <img src="<?php echo MUNK_SITES_URL; ?>/assets/images/done.svg">
                                <svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                </svg>
                            </div>
                            <div class="cs-text-center">
                                <h3><?php _e( 'All done. Have fun!', 'munk-sites' ); ?></h3>
                                <p><?php _e( 'Your instant site has been all set up. Enjoy your new site by the WP Munk team.', 'munk-sites' ); ?></p>
                                <ul class="no-style">
                                    <li><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php _e( 'Start Customizing', 'munk-sites' ); ?></a></li>
                                    <li><a target="_blank" href="https://wpmunk.com/support/"><?php _e( 'Need Help? Let Us Know', 'munk-sites' ); ?></a></li>               
                                    <li><a target="_blank" href="https://wpmunk.com/instant-sites/"><?php _e( 'View More Instant Sites', 'munk-sites' ); ?></a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <#  if ( data.pro && ! Munk_Sites.license_valid ) {  #>                    
                    <div class="cs-actions">
                        <a class="button-primary upgrade_button" target="_blank" href="https://wpmunk.com/pricing/?utm_source=wordpress&utm_medium=munk-sites&utm_campaign=munk_pro">
                            <?php _e( 'Upgrade to Pro', 'munk-sites' ); ?>
                            <i class="dashicons dashicons-external"></i>
                        </a>
                    </div>
                    <# } else { #>    
                    <div class="cs-actions">
                        <a href="#" class="cs-skip cs-hide button-secondary"><?php _e( 'Skip', 'munk-sites' ); ?></a>
                        <span class="cs-action-buttons">                            
                            <a href="#" data-step="0" class="cs-right cs-do-start current cs-btn-circle-btn"><span class="cs-btn-circle"></span><span class="cs-btn-circle-text"><?php _e( 'Start Import', 'munk-sites' ); ?></span></a>                            
                            <a href="#" data-step="1" class="cs-right cs-do-install-plugins cs-btn-circle-btn"><span class="cs-btn-circle"></span><span class="cs-btn-circle-text"><?php _e( 'Install Plugins', 'munk-sites' ); ?></span></a>
                            <a href="#" data-step="2" class="cs-right cs-do-import-content cs-btn-circle-btn"><span class="cs-btn-circle"></span><span class="cs-btn-circle-text"><?php _e( 'Import Content', 'munk-sites' ); ?></span></a>
                            <a href="#" data-step="3" class="cs-right cs-do-import-options cs-btn-circle-btn"><span class="cs-btn-circle"></span><span class="cs-btn-circle-text"><?php _e( 'Import Options', 'munk-sites' ); ?></span></a>
                            <a href="<?php echo home_url('/'); ?>" data-step="4" target="_blank" class="cs-right cs-do-view-site button-primary"><?php _e( 'View Your Website', 'munk-sites' ); ?></a>
                        </span>
                    </div>
                    <# } #>    
                </div>
				
                <div class="cs-info">
                    <div class="cs-name">{{ data.title }}</div>
                    <a href="#" data-slug="{{ data.slug }}" class="cs-open-preview button-secondary"><?php _e( 'Preview', 'munk-sites' ); ?></a>                
                    <div class="cs-thumbnail">
                        <img src="{{ data.thumbnail_url }}" alt="">
                    </div>
                   <div class="cs-desc">{{{ data.desc }}}</div>
                   
				<div class="library-links-footer">
                    <h4><?php _e( 'Need Help?', 'munk-sites' ); ?></h4>
					<?php _e( 'Learn more about using the Munk Instant Sites.', 'munk-sites' ); ?><a href="https://wpmunk.com/doc_category/instant-sites/?utm_source=wordpress&utm_medium=munk-sites" target="_blank"><?php echo __('View Documentation', 'munk-sites'); ?></a>					
				</div>                   
                   
                </div>
				

            </div>
        </div>
    </div>
</script>
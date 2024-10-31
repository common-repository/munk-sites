<div id="munk-sites-filter" class="wp-filter hide-if-no-js">    
    <ul id="munk-sites-filter-cat" class="filter-links">
        <li><a href="#" data-slug="all" class="current"><?php _e( 'All', 'munk-sites' ); ?></a></li>
    </ul>
</div>


<script id="munk-site-item-html" type="text/html">
    <div class="theme" title="{{ data.title }}" tabindex="0" aria-describedby="" data-slug="{{ data.slug }}">
        <div class="theme-screenshot">
            <img src="{{ data.thumbnail_url }}" alt="">
            <div class="theme-actions">                
                <p>{{data.desc}}</p>
                <a class="cs-open-preview button button-secondary  hide-if-no-customize" data-slug="{{ data.slug }}" href="#"><?php _e( 'Preview', 'munk-sites' ); ?></a>
                <a class="cs-open-modal button button-primary  hide-if-no-customize" href="#"><?php _e( 'Import', 'munk-sites' ); ?></a>
            </div>            
        </div>
        <#  if ( data.pro ) {  #>
           <div class="theme-pro-ribbon"><span><?php _e( 'Premium', 'munk-sites' ); ?></span></div>
        <# } #>
        <div class="theme-id-container">
            <h2 class="theme-name" id="{{ data.slug }}-name">{{ data.title }}</h2>
        </div>
    </div>
</script>


<div id="munk-sites-listing-wrapper" class="theme-browser rendered">
    <div id="munk-sites-listing" class="themes wp-clearfix">
    </div>
</div>
<p  id="munk-sites-no-demos"  class="no-themes"><?php _e( 'No sites found. Try a different search.', 'munk-sites' ); ?></p>
<span class="spinner"></span>



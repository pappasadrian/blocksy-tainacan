<?php 

$page_container_classes = 'page type-page hentry singular';
$page_container_classes = $page_container_classes . ( get_theme_mod('tainacan-repository-items_archive_filters_panel_background_style', 'boxed') == 'boxed' ? ' has-filters-panel-style-boxed' : '' );

$filters_panel_size = get_theme_mod('tainacan-repository-items_archive_filters_panel_size', '20%');
$page_container_style = '--tainacan-filter-menu-width-theme:' . $filters_panel_size . ';';

$background_color_palette = get_theme_mod('tainacan-repository-items_archive_items_list_background_palette',
[
    'color1' => [ 'color' => 'var(--background-color, #f8f9fb)' ],
    'color2' => [ 'color' => 'var(--cardBackground, #ffffff)' ],
    'color3' => [ 'color' => 'var(--cardBackground, #ffffff)' ],
    'color4' => [ 'color' => 'var(--formBackgroundInitialColor, #ffffff)' ],
    'color5' => [ 'color' => 'var(--background-color, #f8f9fb)' ],
]);
$page_container_style .= '--tainacan-background-color:' . $background_color_palette['color1']['color'] . ';';
$page_container_style .= '--tainacan-item-background-color:' . $background_color_palette['color2']['color'] . ';';
$page_container_style .= '--tainacan-item-background-hover-color:' . $background_color_palette['color3']['color'] . ';';
$page_container_style .= '--tainacan-input-background-color:' . $background_color_palette['color4']['color'] . ';';
$page_container_style .= '--tainacan-primary-color:' . $background_color_palette['color5']['color'] . ';';

$text_color_palette = get_theme_mod('tainacan-repository-items_archive_items_list_text_palette',
[
    'color1' => [ 'color' => 'var(--paletteColor1,#3eaf7c)' ],
    'color2' => [ 'color' => 'var(--headingColor, rgba(44, 62, 80, 1))' ],
    'color3' => [ 'color' => 'var(--color, #454647)' ],
    'color4' => [ 'color' => '#555758' ],
    'color5' => [ 'color' => 'var(--formTextInitialColor, #454647)' ],
]);
$page_container_style .= '--tainacan-secondary:' . $text_color_palette['color1']['color'] . ';';
$page_container_style .= '--tainacan-heading-color:' . $text_color_palette['color2']['color'] . ';';
$page_container_style .= '--tainacan-label-color:' . $text_color_palette['color3']['color'] . ';';
$page_container_style .= '--tainacan-info-color:' . $text_color_palette['color4']['color'] . ';';
$page_container_style .= '--tainacan-input-color:' . $text_color_palette['color5']['color'] . ';';

$page_container_style .= 'background-color: var(--tainacan-background-color, #f8f9fb);';

?>

<?php get_header(); ?>

    <article class="<?php echo $page_container_classes ?>" style="<?php echo $page_container_style ?>">
        <header class="tainacan-collection-header">
            <div class="tainacan-collection-header__box">  
                <?php 
                    echo blocksy_output_hero_section( 'type-1' );
                ?>
            </div>
        </header>

        <div class="entry-content">										
            <?php 
                tainacan_the_faceted_search([
                    'hide_filters' => get_theme_mod('tainacan-repository-items_archive_display_filters_panel', 'yes') == 'no',
                    'start_with_filters_hidden' => get_theme_mod('tainacan-repository-items_archive_start_with_filters_hidden', 'no') == 'yes',
                    'hide_hide_filters_button' => get_theme_mod('tainacan-repository-items_archive_show_hide_filters_button', 'yes') == 'no',
                    'show_filters_button_inside_search_control' => get_theme_mod('tainacan-repository-items_archive_show_filters_button_inside_search_control', 'yes') == 'yes',
                    'filters_as_modal' => get_theme_mod('tainacan-repository-items_archive_filters_as_modal', 'no') == 'yes',
                    'hide_search' => get_theme_mod('tainacan-repository-items_archive_show_search', 'yes') == 'no',
                    'hide_advanced_search' => get_theme_mod('tainacan-repository-items_archive_show_advanced_search', 'yes') == 'no',
                    'hide_sorting_area' => get_theme_mod('tainacan-repository-items_archive_show_sorting_area', 'yes') == 'no',
                    'hide_sort_by_button' => get_theme_mod('tainacan-repository-items_archive_show_sort_by_button', 'yes') == 'no',
                    'hide_displayed_metadata_dropdown' => get_theme_mod('tainacan-repository-items_archive_show_displayed_metadata_dropdown', 'yes') == 'no',
                    'show_inline_view_mode_options' => get_theme_mod('tainacan-repository-items_archive_show_inline_view_mode_options', 'no') == 'yes',
                    'show_fullscreen_with_view_modes' => get_theme_mod('tainacan-repository-items_archive_show_fullscreen_with_view_modes', 'no') == 'yes',
                    'hide_exposers_button' => get_theme_mod('tainacan-repository-items_archive_show_exposers_button', 'yes') == 'no',
                    'hide_pagination_area' => get_theme_mod('tainacan-repository-items_archive_has_pagination', 'yes') == 'no',
                ]); 
            ?>
        </div>

    </article>
    
<?php get_footer(); ?>
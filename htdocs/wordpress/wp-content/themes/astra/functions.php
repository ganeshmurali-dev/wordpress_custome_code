<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.11.15' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.11.6' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';
require_once ASTRA_THEME_DIR . 'custom-api.php';
define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-memory-limit-notice.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-elementor-editor-settings.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';




/************************************************
 * CUSTOM COLUMNS FOR DEFAULT WORDPRESS POSTS
 ************************************************/

/**
 * 1. Add new columns
 */
add_filter('manage_post_posts_columns', function ($columns) {

    $new = [];

    $new['cb']    = $columns['cb'];
    $new['title'] = __('Title');

    // custom columns
    $new['author']      = __('Author');
    $new['tags']        = __('Tags');
    $new['todays_read'] = __('Todays Read');

    $new['date'] = $columns['date'];

    return $new;
});


/**
 * 2. Populate column values
 */
add_action('manage_post_posts_custom_column', function ($column, $post_id) {

    switch ($column) {

        case 'author':
            $name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
            echo $name ?: '—';
            break;

        case 'tags':
            $terms = get_the_terms($post_id, 'post_tag');
            echo ($terms && !is_wp_error($terms))
                ? implode(', ', wp_list_pluck($terms, 'name'))
                : '—';
            break;


        // Put this inside your manage_post_posts_custom_column switch/case instead of the old todays_read block
case 'todays_read':
    $post_id = intval($post_id);

    // 1) Prefer ACF if available
    $val = null;
    if (function_exists('get_field')) {
        // try field name variations ACF might use
        $acf_keys = ['todays_read', 'Todays_Read', 'todaysRead', 'TodaysRead'];
        foreach ($acf_keys as $k) {
            $tmp = get_field($k, $post_id);
            if ($tmp !== null && $tmp !== false) {
                $val = $tmp;
                break;
            }
        }
    }

    // 2) Fallback to raw postmeta if ACF not present or value not found
    if ($val === null) {
        $meta_keys = ['todays_read', 'Todays_Read', 'todaysRead', 'blogs_todays_read', 'blogs_Todays_Read'];
        foreach ($meta_keys as $k) {
            $tmp = get_post_meta($post_id, $k, true);
            if ($tmp !== '' && $tmp !== false && $tmp !== null) {
                $val = $tmp;
                break;
            }
        }
    }

    // 3) Normalize value to boolean
    $is_true = false;
    if (is_array($val)) {
        // checkbox fields often saved as array of selected options
        foreach ($val as $item) {
            $lower = strtolower(trim((string)$item));
            if (in_array($lower, ['1','true','on','yes','true_value','true'])) {
                $is_true = true;
                break;
            }
        }
    } else {
        $str = strtolower(trim((string)$val));
        if (in_array($str, ['1','true','on','yes','y','checked'])) {
            $is_true = true;
        }
    }

    echo $is_true ? 'true' : 'false';

    // (optional) hidden span for quick-edit JS to read exact raw value if you already use that approach
    echo '<span class="hidden" id="todays_read_meta_' . $post_id . '" data-raw="' . esc_attr(is_array($val) ? json_encode($val) : (string)$val) . '"></span>';
    break;

    }

}, 10, 2);


/**
 * 3. Sortable columns
 */
add_filter('manage_edit-post_sortable_columns', function ($columns) {
    $columns['todays_read'] = 'todays_read';
    return $columns;
});


/**
 * 4. Optional CSS for clean layout
 */
add_action('admin_head', function () {
    echo '<style>
        .column-tags        { width: 180px; }
        .column-todays_read { width: 120px; text-align:center; }
        .column-author      { width: 120px; }
    </style>';
});



/************************************************
 * QUICK EDIT – UI + LOAD VALUES + SAVE FIELDS
 ************************************************/


/**
 * 1. Add fields to Quick Edit UI
 */
add_action('quick_edit_custom_box', function ($column, $post_type) {

    if ($column !== 'todays_read' && $column !== 'tags' && $column !== 'author') {
        return;
    }

    wp_nonce_field('quick_edit_custom_fields', 'quick_edit_nonce');

    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">

            <?php if ($column === 'author') : ?>
                <label class="alignleft">
                    <span class="title">Author</span>
                    <span class="input-text-wrap">
                        <input type="text" name="qe_author" value="">
                    </span>
                </label>
            <?php endif; ?>

            <?php if ($column === 'tags') : ?>
                <label class="alignleft">
                    <span class="title">Tags</span>
                    <span class="input-text-wrap">
                        <input type="text" name="qe_tags" value="">
                    </span>
                </label>
            <?php endif; ?>

            <?php if ($column === 'todays_read') : ?>
                <label>
                    <span class="title">Todays Read</span>
                    <span class="input-text-wrap">
                        <input type="checkbox" name="qe_todays_read" value="1">
                    </span>
                </label>
            <?php endif; ?>

        </div>
    </fieldset>
    <?php
}, 10, 2);



/**
 * 2. Load values into Quick Edit using JS
 */
add_action('admin_footer-edit.php', function () {
    ?>
    <script>
        jQuery(function ($) {
            const $wp_inline_edit = inlineEditPost.edit;

            inlineEditPost.edit = function (post_id) {

                $wp_inline_edit.apply(this, arguments);

                if (typeof post_id === 'object') {
                    post_id = this.getId(post_id);
                }

                const row = $('#post-' + post_id);
                const editRow = $('#edit-' + post_id);

                // Author
                const author = row.find('.column-author').text().trim();
                editRow.find('input[name="qe_author"]').val(author);

                // Tags
                const tags = row.find('.column-tags').text().trim();
                editRow.find('input[name="qe_tags"]').val(tags);

                // Todays Read (checkbox)
                const todaysReadText = row.find('.column-todays_read').text().trim().toLowerCase();
                const todaysChecked = (todaysReadText === 'true' || todaysReadText === 'yes' || todaysReadText === '1');
                editRow.find('input[name="qe_todays_read"]').prop('checked', todaysChecked);
            };
        });
    </script>
    <?php
});



/**
 * 3. Save Quick Edit values
 */
// Save Quick Edit / custom save helper
function save_todays_read_both_formats($post_id, $value) {
    // normalize to 'true' / 'false' strings (or 1/0 if you prefer)
    $store_val = ($value === true || $value === 'true' || $value === '1' || $value === 1) ? '1' : '0';

    // update plain meta keys
    update_post_meta($post_id, 'todays_read', $store_val);
    update_post_meta($post_id, 'Todays_Read', $store_val);
    update_post_meta($post_id, 'todaysRead', $store_val);

    // If ACF is active, update that too (use boolean or array depending on your ACF field type)
    if (function_exists('update_field')) {
        // If ACF checkbox expecting array of strings, adjust below to match your ACF option value
        // Example for true/false field:
        update_field('todays_read', ($store_val === '1' ? 1 : 0), $post_id);
        // Also update alternative key if your field uses different name
        update_field('Todays_Read', ($store_val === '1' ? 1 : 0), $post_id);
    }
}
add_action('save_post', function ($post_id) {

    // Verify nonce
    if (!isset($_POST['quick_edit_nonce']) || !wp_verify_nonce($_POST['quick_edit_nonce'], 'quick_edit_custom_fields')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Author
    if (isset($_POST['qe_author'])) {
        $author_name = sanitize_text_field($_POST['qe_author']);
        $user = get_user_by('login', $author_name);
        if ($user) {
            wp_update_post([
                'ID' => $post_id,
                'post_author' => $user->ID,
            ]);
        }
    }

    // Tags
    if (isset($_POST['qe_tags'])) {
        $tags_input = sanitize_text_field($_POST['qe_tags']);
        $tags_array = array_map('trim', explode(',', $tags_input));
        wp_set_post_tags($post_id, $tags_array, false);
    }

    // Todays Read (checkbox) — checkbox will be present in POST only when checked
    $todays_read_value = isset($_POST['qe_todays_read']) ? 'true' : 'false';
    save_todays_read_both_formats($post_id, $todays_read_value);

});




<?php
if ( ! class_exists( 'Tech_Review_Blog_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Tech_Review_Blog_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Tech_Review_Blog_Plugin_Activation_WPElemento_Importer {

        private static $tech_review_blog_instance;
        public $tech_review_blog_action_count;
        public $tech_review_blog_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$tech_review_blog_instance) ) {
            self::$tech_review_blog_instance = new self();
          }
          return self::$tech_review_blog_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'tech_review_blog_recommended_plugins', array($this, 'tech_review_blog_recommended_elemento_importer_plugins_array') );

            $tech_review_blog_actions                   = $this->tech_review_blog_get_recommended_actions();
            $this->tech_review_blog_action_count        = $tech_review_blog_actions['count'];
            $this->tech_review_blog_recommended_actions = $tech_review_blog_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function tech_review_blog_recommended_elemento_importer_plugins_array($tech_review_blog_plugins){
            $tech_review_blog_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'tech-review-blog'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'tech-review-blog'),               
            );
            return $tech_review_blog_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'tech-review-blog-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('tech-review-blog-plugin-activation-script', 'tech_review_blog_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'tech-review-blog'),
                    'activating' => esc_html__('Activating', 'tech-review-blog'),
                    'error' => esc_html__('Error', 'tech-review-blog'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'tech-review-blog-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function tech_review_blog_get_recommended_actions() {

            $tech_review_blog_act_count  = 0;
            $tech_review_blog_actions_todo = get_option( 'recommending_actions', array());

            $tech_review_blog_plugins = $this->tech_review_blog_get_recommended_plugins();

            if ($tech_review_blog_plugins) {
                foreach ($tech_review_blog_plugins as $tech_review_blog_key => $tech_review_blog_plugin) {
                    $tech_review_blog_action = array();
                    if (!isset($tech_review_blog_plugin['slug'])) {
                        continue;
                    }

                    $tech_review_blog_action['id']   = 'install_' . $tech_review_blog_plugin['slug'];
                    $tech_review_blog_action['desc'] = '';
                    if (isset($tech_review_blog_plugin['desc'])) {
                        $tech_review_blog_action['desc'] = $tech_review_blog_plugin['desc'];
                    }

                    $tech_review_blog_action['name'] = '';
                    if (isset($tech_review_blog_plugin['name'])) {
                        $tech_review_blog_action['title'] = $tech_review_blog_plugin['name'];
                    }

                    $tech_review_blog_link_and_is_done  = $this->tech_review_blog_get_plugin_buttion($tech_review_blog_plugin['slug'], $tech_review_blog_plugin['name'], $tech_review_blog_plugin['function']);
                    $tech_review_blog_action['link']    = $tech_review_blog_link_and_is_done['button'];
                    $tech_review_blog_action['is_done'] = $tech_review_blog_link_and_is_done['done'];
                    if (!$tech_review_blog_action['is_done'] && (!isset($tech_review_blog_actions_todo[$tech_review_blog_action['id']]) || !$tech_review_blog_actions_todo[$tech_review_blog_action['id']])) {
                        $tech_review_blog_act_count++;
                    }
                    $tech_review_blog_recommended_actions[] = $tech_review_blog_action;
                    $tech_review_blog_actions_todo[]        = array('id' => $tech_review_blog_action['id'], 'watch' => true);
                }
                return array('count' => $tech_review_blog_act_count, 'actions' => $tech_review_blog_recommended_actions);
            }

        }

        public function tech_review_blog_get_recommended_plugins() {

            $tech_review_blog_plugins = apply_filters('tech_review_blog_recommended_plugins', array());
            return $tech_review_blog_plugins;
        }

        public function tech_review_blog_get_plugin_buttion($slug, $name, $function) {
                $tech_review_blog_is_done      = false;
                $tech_review_blog_button_html  = '';
                $tech_review_blog_is_installed = $this->is_plugin_installed($slug);
                $tech_review_blog_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $tech_review_blog_is_activeted = (class_exists($function)) ? true : false;
                if (!$tech_review_blog_is_installed) {
                    $tech_review_blog_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $tech_review_blog_plugin_install_url = wp_nonce_url($tech_review_blog_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $tech_review_blog_button_html        = sprintf('<a class="tech-review-blog-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($tech_review_blog_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'tech-review-blog'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'tech-review-blog')
                    );
                } elseif ($tech_review_blog_is_installed && !$tech_review_blog_is_activeted) {

                    $tech_review_blog_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($tech_review_blog_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $tech_review_blog_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $tech_review_blog_button_html = sprintf('<a class="tech-review-blog-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($tech_review_blog_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'tech-review-blog'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'tech-review-blog')
                    );
                } elseif ($tech_review_blog_is_activeted) {
                    $tech_review_blog_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'tech-review-blog'));
                    $tech_review_blog_is_done     = true;
                }

                return array('done' => $tech_review_blog_is_done, 'button' => $tech_review_blog_button_html);
            }
        public function is_plugin_installed($slug) {
            $tech_review_blog_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $tech_review_blog_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($tech_review_blog_installed_plugins[$tech_review_blog_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $tech_review_blog_keys = array_keys($this->get_installed_plugins());
            foreach ($tech_review_blog_keys as $tech_review_blog_key) {
                if (preg_match('|^' . $slug . '/|', $tech_review_blog_key)) {
                    return $tech_review_blog_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Tech_Review_Blog_Plugin_Activation_WPElemento_Importer::get_instance();
<?php

/**
 * Class Vc_Vendor_Woocommerce
 *
 * @since 4.4
 * @todo move to separate file and dir.
 */
Class Vc_Devox_Woocommerce implements Vc_Vendor_Interface {
    protected static $product_fields_list = false;
    protected static $order_fields_list = false;

    /**
     * @since 4.4
     */
    public function load() {
        if ( class_exists( 'WooCommerce' ) ) {

            add_action( 'vc_build_admin_page', array(
                &$this,
                'mapShortcodes',
            ) );

            add_action( 'vc_load_shortcode', array(
                &$this,
                'mapShortcodes'
            ) );

            // $this->mapShortcodes();
            add_action( 'vc_backend_editor_render', array(
                &$this,
                'enqueueJsBackend'
            ) );

            add_action( 'vc_frontend_editor_render', array(
                &$this,
                'enqueueJsFrontend'
            ) );
            add_filter( 'vc_grid_item_shortcodes', array(
                &$this,
                'mapGridItemShortcodes'
            ) );
            add_action( 'vc_vendor_yoastseo_filter_results', array(
                &$this,
                'yoastSeoCompatibility'
            ) );
        }
    }

    /**
     * @since 4.4
     */
    public function enqueueJsBackend() {
        wp_enqueue_script( 'vc_vendor_woocommerce_backend',
            vc_asset_url( 'js/vendors/woocommerce.js' ),
            array( 'wpb_js_composer_js_storage' ), '1.0', true );
    }

    /**
     * @since 4.4
     */
    public function enqueueJsFrontend() {
        wp_enqueue_script( 'vc_vendor_woocommerce_frontend',
            vc_asset_url( 'js/vendors/woocommerce.js' ),
            array( 'vc_inline_shortcodes_builder_js' ), '1.0', true );
    }

    /**
     * Add woocommerce shortcodes and hooks/filters for it.
     * @since 4.4
     */
    public function mapShortcodes() {
        add_action( 'wp_ajax_vc_woocommerce_get_attribute_terms', array(
            &$this,
            'getAttributeTermsAjax'
        ) );

        $order_by_values = array(
            '',
            esc_html__( 'Date', 'js_composer' ) => 'date',
            esc_html__( 'ID', 'js_composer' ) => 'ID',
            esc_html__( 'Author', 'js_composer' ) => 'author',
            esc_html__( 'Title', 'js_composer' ) => 'title',
            esc_html__( 'Modified', 'js_composer' ) => 'modified',
            esc_html__( 'Random', 'js_composer' ) => 'rand',
            esc_html__( 'Comment count', 'js_composer' ) => 'comment_count',
            esc_html__( 'Menu order', 'js_composer' ) => 'menu_order',
        );

        $order_way_values = array(
            '',
            esc_html__( 'Descending', 'js_composer' ) => 'DESC',
            esc_html__( 'Ascending', 'js_composer' ) => 'ASC',
        );

        $args = array(
            'type' => 'post',
            'child_of' => 0,
            'parent' => '',
            'orderby' => 'id',
            'order' => 'ASC',
            'hide_empty' => false,
            'hierarchical' => 1,
            'exclude' => '',
            'include' => '',
            'number' => '',
            'taxonomy' => 'product_cat',
            'pad_counts' => false,

        );
        $categories = get_categories( $args );

        $product_categories_dropdown = array();
        $this->getCategoryChildsFull( 0, 0, $categories, 0, $product_categories_dropdown );

        /**
         * @shortcode recent_products
         * @description Lists recent products – useful on the homepage. The ‘per_page’ shortcode determines how many products
         * to show on the page and the columns attribute controls how many columns wide the products should be before wrapping.
         * To learn more about the default ‘orderby’ parameters please reference the WordPress Codex: http://codex.wordpress.org/Class_Reference/WP_Query
         *
         * @param per_page integer
         * @param columns integer
         * @param orderby array
         * @param order array
         */
        vc_map( array(
            'name' => esc_html__( 'Products Carousels', 'js_composer' ),
            'base' => 'devox_product_carousel',
            'icon' => 'icon-wpb-woocommerce',
            'category' => esc_html__( 'WooCommerce', 'js_composer' ),
            'description' => esc_html__( 'Lists recent products', 'js_composer' ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Per page', 'js_composer' ),
                    'value' => 12,
                    'param_name' => 'per_page',
                    'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'js_composer' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Columns', 'js_composer' ),
                    'value' => 4,
                    'param_name' => 'columns',
                    'description' => esc_html__( 'The columns attribute controls how many columns wide the products should be before wrapping.', 'js_composer' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order by', 'js_composer' ),
                    'param_name' => 'orderby',
                    'value' => $order_by_values,
                    'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order way', 'js_composer' ),
                    'param_name' => 'order',
                    'value' => $order_way_values,
                    'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
                ),
            )
        ) );

        /**
         * @shortcode product_category
         * @description Show multiple products in a category by slug.
         *
         * @param per_page integer
         * @param columns integer
         * @param orderby array
         * @param order array
         * @param category string
         * Go to: WooCommerce > Products > Categories to find the slug column.
         */
        vc_map( array(
            'name' => esc_html__( 'WooCommerce Category', 'js_composer' ),
            'base' => 'devox_product_cat_carousel',
            'icon' => 'icon-wpb-woocommerce',
            'category' => esc_html__( 'WooCommerce', 'js_composer' ),
            'description' => esc_html__( 'Show multiple products in a category', 'js_composer' ),
            'params' => array(
                array(
                    "type" => "dropdown",
                    "heading" => __("Style", 'monica_theme'),
                    "param_name" => "style",
                    "value" => array(
                        __("Carousel", 'monica_theme')      => "carousel",
                        __("List", 'monica_theme')          => "list",
                        __("Normal", 'monica_theme')        => "normal",
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Per page', 'js_composer' ),
                    'value' => 12,
                    'param_name' => 'per_page',
                    'description' => esc_html__( 'How much items per page to show', 'js_composer' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Columns', 'js_composer' ),
                    'value' => 4,
                    'param_name' => 'columns',
                    'description' => esc_html__( 'How much columns grid', 'js_composer' ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => 'carousel',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order by', 'js_composer' ),
                    'param_name' => 'orderby',
                    'value' => $order_by_values,
                    'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order way', 'js_composer' ),
                    'param_name' => 'order',
                    'value' => $order_way_values,
                    'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Category', 'js_composer' ),
                    'value' => $product_categories_dropdown,
                    'param_name' => 'category',
                    'description' => esc_html__( 'Product category list', 'js_composer' ),
                ),
            )
        ) );
        //Filters For autocomplete param:
        //For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
        add_filter( 'vc_autocomplete_product_category_category_callback', array(
            &$this,
            'productCategoryCategoryAutocompleteSuggesterBySlug'
        ), 10, 1 ); // Get suggestion(find). Must return an array
        add_filter( 'vc_autocomplete_product_category_category_render', array(
            &$this,
            'productCategoryCategoryRenderBySlugExact'
        ), 10, 1 ); // Render exact category by Slug. Must return an array (label,value)

        /* we need to detect post type to show this shortcode */
        global $post, $typenow, $current_screen;
        $post_type = "";

        if ( $post && $post->post_type ) {
            //we have a post so we can just get the post type from that
            $post_type = $post->post_type;
        } elseif ( $typenow ) {
            //check the global $typenow - set in admin.php
            $post_type = $typenow;
        } elseif ( $current_screen && $current_screen->post_type ) {
            //check the global $current_screen object - set in sceen.php
            $post_type = $current_screen->post_type;

        } elseif ( isset( $_REQUEST['post_type'] ) ) {
            //lastly check the post_type querystring
            $post_type = sanitize_key( $_REQUEST['post_type'] );
            //we do not know the post type!
        }

    }

    public function mapGridItemShortcodes( array $shortcodes ) {
        require_once vc_path_dir( 'VENDORS_DIR', 'plugins/woocommerce/class-vc-gitem-woocommerce-shortcode.php' );
        require_once vc_path_dir( 'VENDORS_DIR', 'plugins/woocommerce/grid-item-attributes.php' );
        $wc_shortcodes = include vc_path_dir( 'VENDORS_DIR', 'plugins/woocommerce/grid-item-shortcodes.php' );

        return $shortcodes + $wc_shortcodes;
    }

    /**
     * Defines default value for param if not provided. Takes from other param value.
     * @since 4.4
     *
     * @param array $param_settings
     * @param $current_value
     * @param $map_settings
     * @param $atts
     *
     * @return array
     */
    public function productAttributeFilterParamValue( $param_settings, $current_value, $map_settings, $atts ) {
        if ( isset( $atts['attribute'] ) ) {
            $value = $this->getAttributeTerms( $atts['attribute'] );
            if ( is_array( $value ) && ! empty( $value ) ) {
                $param_settings['value'] = $value;
            }
        }

        return $param_settings;
    }

    /**
     * Get attribute terms hooks from ajax request
     * @since 4.4
     */
    public function getAttributeTermsAjax() {
        $attribute = vc_post_param( 'attribute' );
        $values = $this->getAttributeTerms( $attribute );
        $param = array(
            'param_name' => 'filter',
            'type' => 'checkbox'
        );
        $param_line = '';
        foreach ( $values as $label => $v ) {
            $param_line .= ' <label class="vc_checkbox-label"><input id="' . $param['param_name'] . '-' . $v . '" value="' . $v . '" class="wpb_vc_param_value ' . $param['param_name'] . ' ' . $param['type'] . '" type="checkbox" name="' . $param['param_name'] . '"' . '> ' . $label . '</label>';
        }
        die( json_encode( $param_line ) );
    }

    /**
     * Get attribute terms suggester
     * @since 4.4
     *
     * @param $attribute
     *
     * @return array
     */
    public function getAttributeTerms( $attribute ) {
        $terms = get_terms( 'pa_' . $attribute ); // return array. take slug
        $data = array();
        if ( ! empty( $terms ) ) {
            foreach ( $terms as $term ) {
                $data[ $term->name ] = $term->slug;
            }
        }

        return $data;
    }

    /**
     * Get lists of categories.
     * @since 4.4
     * @deprecated 4.5.3 - due to dublicated category names causes an issue
     *
     * @param $parent_id
     * @param $pos
     * @param array $array
     * @param $level
     * @param array $dropdown - passed by  reference
     */
    public function getCategoryChilds( $parent_id, $pos, $array, $level, &$dropdown ) {

        for ( $i = $pos; $i < count( $array ); $i ++ ) {
            if ( $array[ $i ]->category_parent == $parent_id ) {
                $data = array(
                    str_repeat( "- ", $level ) . $array[ $i ]->name => $array[ $i ]->slug,
                );
                $dropdown = array_merge( $dropdown, $data );
                $this->getCategoryChilds( $array[ $i ]->term_id, $i, $array, $level + 1, $dropdown );
            }
        }
    }

    /**
     * Get lists of categories.
     * @since 4.5.3
     *
     * @param $parent_id
     * @param $pos
     * @param array $array
     * @param $level
     * @param array $dropdown - passed by  reference
     */
    protected function getCategoryChildsFull( $parent_id, $pos, $array, $level, &$dropdown ) {

        for ( $i = $pos; $i < count( $array ); $i ++ ) {
            if ( $array[ $i ]->category_parent == $parent_id ) {
                $name = str_repeat( "- ", $level ) . $array[ $i ]->name;
                $value = $array[ $i ]->slug;
                $dropdown[] = array( 'label' => $name, 'value' => $value );
                $this->getCategoryChildsFull( $array[ $i ]->term_id, $i, $array, $level + 1, $dropdown );
            }
        }
    }

    /**
     * Replace single product sku to id.
     * @since 4.4
     *
     * @param $current_value
     * @param $param_settings
     * @param $map_settings
     * @param $atts
     *
     * @return bool|string
     */
    public function productIdDefaultValue( $current_value, $param_settings, $map_settings, $atts ) {
        $value = trim( $current_value );
        if ( strlen( trim( $current_value ) ) == 0 && isset( $atts['sku'] ) && strlen( $atts['sku'] ) > 0 ) {
            $value = $this->productIdDefaultValueFromSkuToId( $atts['sku'] );
        }

        return $value;
    }

    /**
     * Replaces product skus to id's.
     * @since 4.4
     *
     * @param $current_value
     * @param $param_settings
     * @param $map_settings
     * @param $atts
     *
     * @return string
     */
    public function productsIdsDefaultValue( $current_value, $param_settings, $map_settings, $atts ) {
        $value = trim( $current_value );
        if ( strlen( trim( $value ) ) == 0 && isset( $atts['skus'] ) && strlen( $atts['skus'] ) > 0 ) {
            $data = array();
            $skus = $atts['skus'];
            $skus_array = explode( ',', $skus );
            foreach ( $skus_array as $sku ) {
                $id = $this->productIdDefaultValueFromSkuToId( trim( $sku ) );
                if ( is_numeric( $id ) ) {
                    $data[] = $id;
                }
            }
            if ( ! empty( $data ) ) {
                $values = explode( ',', $value );
                $values = array_merge( $values, $data );
                $value = implode( ',', $values );
            }
        }

        return $value;
    }

    /**
     * Suggester for autocomplete by id/name/title/sku
     * @since 4.4
     *
     * @param $query
     *
     * @return array - id's from products with title/sku.
     */
    public function productIdAutocompleteSuggester( $query ) {
        global $wpdb;
        $product_id = (int) $query;
        $post_meta_infos = $wpdb->get_results(
            $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
                    FROM {$wpdb->posts} AS a
                    LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
                    WHERE a.post_type = 'product' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )",
                $product_id > 0 ? $product_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

        $results = array();
        if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
            foreach ( $post_meta_infos as $value ) {
                $data = array();
                $data['value'] = $value['id'];
                $data['label'] = esc_html__( 'Id', 'js_composer' ) . ': ' .
                                 $value['id'] .
                                 ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'js_composer' ) . ': ' .
                                                                       $value['title'] : '' ) .
                                 ( ( strlen( $value['sku'] ) > 0 ) ? ' - ' . esc_html__( 'Sku', 'js_composer' ) . ': ' .
                                                                     $value['sku'] : '' );
                $results[] = $data;
            }
        }

        return $results;
    }

    /**
     * Find product by id
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function productIdAutocompleteRender( $query ) {
        $query = trim( $query['value'] ); // get value from requested
        if ( ! empty( $query ) ) {
            // get product
            $product_object = wc_get_product( (int) $query );
            if ( is_object( $product_object ) ) {
                $product_sku = $product_object->get_sku();
                $product_title = $product_object->get_title();
                $product_id = $product_object->id;

                $product_sku_display = '';
                if ( ! empty( $product_sku ) ) {
                    $product_sku_display = ' - ' . esc_html__( 'Sku', 'js_composer' ) . ': ' . $product_sku;
                }

                $product_title_display = '';
                if ( ! empty( $product_title ) ) {
                    $product_title_display = ' - ' . esc_html__( 'Title', 'js_composer' ) . ': ' . $product_title;
                }

                $product_id_display = esc_html__( 'Id', 'js_composer' ) . ': ' . $product_id;

                $data = array();
                $data['value'] = $product_id;
                $data['label'] = $product_id_display . $product_title_display . $product_sku_display;

                return ! empty( $data ) ? $data : false;
            }

            return false;
        }

        return false;
    }

    /**
     * Return ID of product by provided SKU of product.
     * @since 4.4
     *
     * @param $query
     *
     * @return bool
     */
    public function productIdDefaultValueFromSkuToId( $query ) {
        $result = $this->productIdAutocompleteSuggesterExactSku( $query );

        return isset( $result['value'] ) ? $result['value'] : false;
    }

    /**
     * Find product by SKU
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function productIdAutocompleteSuggesterExactSku( $query ) {
        global $wpdb;
        $query = trim( $query );
        $product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", stripslashes( $query ) ) );
        $product_data = get_post( $product_id );
        if ( 'product' !== $product_data->post_type ) {
            return '';
        }

        $product_object = wc_get_product( $product_data );
        if ( is_object( $product_object ) ) {

            $product_sku = $product_object->get_sku();
            $product_title = $product_object->get_title();
            $product_id = $product_object->id;

            $product_sku_display = '';
            if ( ! empty( $product_sku ) ) {
                $product_sku_display = ' - ' . esc_html__( 'Sku', 'js_composer' ) . ': ' . $product_sku;
            }

            $product_title_display = '';
            if ( ! empty( $product_title ) ) {
                $product_title_display = ' - ' . esc_html__( 'Title', 'js_composer' ) . ': ' . $product_title;
            }

            $product_id_display = esc_html__( 'Id', 'js_composer' ) . ': ' . $product_id;

            $data = array();
            $data['value'] = $product_id;
            $data['label'] = $product_id_display . $product_title_display . $product_sku_display;

            return ! empty( $data ) ? $data : false;
        }

        return false;
    }

    /**
     * Autocomplete suggester to search product category by name/slug or id.
     * @since 4.4
     *
     * @param $query
     * @param bool $slug - determines what output is needed
     *      default false - return id of product category
     *      true - return slug of product category
     *
     * @return array
     */
    public function productCategoryCategoryAutocompleteSuggester( $query, $slug = false ) {
        global $wpdb;
        $cat_id = (int) $query;
        $query = trim( $query );
        $post_meta_infos = $wpdb->get_results(
            $wpdb->prepare( "SELECT a.term_id AS id, b.name as name, b.slug AS slug
                        FROM {$wpdb->term_taxonomy} AS a
                        INNER JOIN {$wpdb->terms} AS b ON b.term_id = a.term_id
                        WHERE a.taxonomy = 'product_cat' AND (a.term_id = '%d' OR b.slug LIKE '%%%s%%' OR b.name LIKE '%%%s%%' )",
                $cat_id > 0 ? $cat_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

        $result = array();
        if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
            foreach ( $post_meta_infos as $value ) {
                $data = array();
                $data['value'] = $slug ? $value['slug'] : $value['id'];
                $data['label'] = esc_html__( 'Id', 'js_composer' ) . ': ' .
                                 $value['id'] .
                                 ( ( strlen( $value['name'] ) > 0 ) ? ' - ' . esc_html__( 'Name', 'js_composer' ) . ': ' .
                                                                      $value['name'] : '' ) .
                                 ( ( strlen( $value['slug'] ) > 0 ) ? ' - ' . esc_html__( 'Slug', 'js_composer' ) . ': ' .
                                                                      $value['slug'] : '' );
                $result[] = $data;
            }
        }

        return $result;
    }

    /**
     * Search product category by id
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function productCategoryCategoryRenderByIdExact( $query ) {
        global $wpdb;
        $query = $query['value'];
        $cat_id = (int) $query;
        $term = get_term( $cat_id, 'product_cat' );

        return $this->productCategoryTermOutput( $term );
    }

    /**
     * Suggester for autocomplete to find product category by id/name/slug but return found product category SLUG
     * @since 4.4
     *
     * @param $query
     *
     * @return array - slug of products categories.
     */
    public function productCategoryCategoryAutocompleteSuggesterBySlug( $query ) {
        $result = $this->productCategoryCategoryAutocompleteSuggester( $query, true );

        return $result;
    }

    /**
     * Search product category by slug.
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function productCategoryCategoryRenderBySlugExact( $query ) {
        global $wpdb;
        $query = $query['value'];
        $query = trim( $query );
        $term = get_term_by( 'slug', $query, 'product_cat' );

        return $this->productCategoryTermOutput( $term );
    }

    /**
     * Return product category value|label array
     *
     * @param $term
     *
     * @since 4.4
     * @return array|bool
     */
    protected function productCategoryTermOutput( $term ) {
        $term_slug = $term->slug;
        $term_title = $term->name;
        $term_id = $term->term_id;

        $term_slug_display = '';
        if ( ! empty( $term_sku ) ) {
            $term_slug_display = ' - ' . esc_html__( 'Sku', 'js_composer' ) . ': ' . $term_slug;
        }

        $term_title_display = '';
        if ( ! empty( $product_title ) ) {
            $term_title_display = ' - ' . esc_html__( 'Title', 'js_composer' ) . ': ' . $term_title;
        }

        $term_id_display = esc_html__( 'Id', 'js_composer' ) . ': ' . $term_id;

        $data = array();
        $data['value'] = $term_id;
        $data['label'] = $term_id_display . $term_title_display . $term_slug_display;

        return ! empty( $data ) ? $data : false;
    }

    public static function getProductsFieldsList() {
        return array(
            esc_html__( 'SKU', 'js_composer' ) => 'sku',
            esc_html__( 'ID', 'js_composer' ) => 'id',
            esc_html__( 'Price', 'js_composer' ) => 'price',
            esc_html__( 'Regular Price', 'js_composer' ) => 'regular_price',
            esc_html__( 'Sale Price', 'js_composer' ) => 'sale_price',
            esc_html__( 'Price html', 'js_composer' ) => 'price_html',
            esc_html__( 'Reviews count', 'js_composer' ) => 'reviews_count',
            esc_html__( 'Short description', 'js_composer' ) => 'short_description',
            esc_html__( 'Dimensions', 'js_composer' ) => 'dimensions',
            esc_html__( 'Rating count', 'js_composer' ) => 'rating_count',
            esc_html__( 'Weight', 'js_composer' ) => 'weight',
            esc_html__( 'Is on sale', 'js_composer' ) => 'on_sale',
            esc_html__( 'Custom field', 'js_composer' ) => '_custom_',
        );
    }

    public static function getProductFieldLabel( $key ) {
        if ( false === self::$product_fields_list ) {
            self::$product_fields_list = array_flip( self::getProductsFieldsList() );
        }

        return isset( self::$product_fields_list[ $key ] ) ? self::$product_fields_list[ $key ] : '';
    }

    public static function getOrderFieldsList() {
        return array(
            esc_html__( 'ID', 'js_composer' ) => 'id',
            esc_html__( 'Order number', 'js_composer' ) => 'order_number',
            esc_html__( 'Currency', 'js_composer' ) => 'order_currency',
            esc_html__( 'Total', 'js_composer' ) => 'total',
            esc_html__( 'Status', 'js_composer' ) => 'status',
            esc_html__( 'Payment method', 'js_composer' ) => 'payment_method',
            esc_html__( 'Billing address city', 'js_composer' ) => 'billing_address_city',
            esc_html__( 'Billing address country', 'js_composer' ) => 'billing_address_country',
            esc_html__( 'Shipping address city', 'js_composer' ) => 'shipping_address_city',
            esc_html__( 'Shipping address country', 'js_composer' ) => 'shipping_address_country',
            esc_html__( 'Customer Note', 'js_composer' ) => 'customer_note',
            esc_html__( 'Customer API', 'js_composer' ) => 'customer_api',
            esc_html__( 'Custom field', 'js_composer' ) => '_custom_',
        );
    }

    public static function getOrderFieldLabel( $key ) {
        if ( false === self::$order_fields_list ) {
            self::$order_fields_list = array_flip( self::getOrderFieldsList() );
        }

        return isset( self::$order_fields_list[ $key ] ) ? self::$order_fields_list[ $key ] : '';
    }

    public function yoastSeoCompatibility() {
        if ( function_exists( 'WC' ) ) {
            // WC()->frontend_includes();
            include_once( WC()->plugin_path() . '/includes/wc-template-functions.php' );
            // include_once WC()->plugin_path() . '';
        }
    }
}

add_action( 'after_setup_theme', 'vc_init_devox_woocommerce' );
function vc_init_devox_woocommerce() {
    $vendor = new Vc_Devox_Woocommerce();
    add_action( 'vc_after_set_mode', array(
        $vendor,
        'load'
    ) );
}
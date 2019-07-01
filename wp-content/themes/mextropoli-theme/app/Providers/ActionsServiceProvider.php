<?php

namespace App\Providers;

class ActionsServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Activa la traduccion del sitio por archivos .mo
        add_action('after_setup_theme', [$this, 'afterSetupTheme']);
        add_action('admin_init', [$this, 'adminInit']);
        add_action('admin_menu', [$this, 'adminMenu'] );
        add_action('init', [$this, 'init']);
        add_action('acf/init', [$this, 'my_acf_init']);
    }

    function my_acf_init()
    {
        acf_update_setting('google_api_key', GOOGLE_MAP_KEY);
    }

    public function init()
    {
        update_option('page_on_front', specialPage('home'));
        update_option('show_on_front', 'page');

        // Eliminamos las páginas de los reultados de búsqueda.
        global $wp_post_types;
        $wp_post_types['page']->exclude_from_search = true;
    }

    public function afterSetupTheme()
    {
        load_theme_textdomain( TRANSDOMAIN, get_template_directory() . '/languages' );
    }

    public function adminInit()
    {
        if (isSpecialPage('contacto'))  {
            remove_post_type_support( 'page', 'editor' );
        }

        if (isSpecialPage('equipo'))  {
            remove_post_type_support( 'page', 'editor' );
            remove_post_type_support( 'page', 'thumbnail' );
            remove_post_type_support( 'page', 'page-attributes' );
        }
    }

    public function adminMenu()
    {
        // global $menu;
        // global $submenu;

        // $menu[5][0] = 'Proyectos';
        // $submenu['edit.php'][5][0] = 'Proyectos';
        // $submenu['edit.php'][10][0] = 'Nuevo proyecto';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Providers;

class TaxonomyServiceProvider
{
    protected $taxonomies = [
        \App\Taxonomies\AlliesTypology::class,
        \App\Taxonomies\VenuesTypology::class,
        \App\Taxonomies\EventsTypology::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach($this->taxonomies as $taxonomy){
            $taxonomy::registerTaxonomy();
        }
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

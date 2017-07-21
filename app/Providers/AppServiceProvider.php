<?php

namespace WeCash\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('css_active', function($expression){
            return "<?php echo ({$expression}?'active':''); ?>";
        });

        Blade::directive('html_checked', function($expression){
            return "<?php echo ({$expression}?'checked':''); ?>";
        });

        Blade::directive('html_selected', function($expression){
            return "<?php echo ({$expression}?'selected':''); ?>";
        });

        Blade::directive('wecash_confirmed', function($expression){
            return "<?php echo ({$expression}?'tr-confirmed':''); ?>";
        });
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

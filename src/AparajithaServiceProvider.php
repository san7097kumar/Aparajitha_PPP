<?php
namespace Sandeep\Aparajitha_PPP;
use Illuminate\Support\ServiceProvider;

class AparajithaServiceProvider extends ServiceProvider{

   public function boot()
   {
      $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
      $this->loadViewsFrom(__DIR__ .'/views', 'aparajitha_ppp');
      $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    //   $this->mergeConfigFrom(
    //      __DIR__.'/config/contact.php', 'contact'
    //  );
     $this->publishes([
      // __DIR__.'/config/contact.php' => config_path('contact.php'),
      __DIR__.'/views' => resource_path('views/aparajitha'),
      __DIR__.'/public' => public_path('aparajitha'),
  ]);
   }

   public function register()
   {
    
   }

}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Events\QueryExecuted;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        date_default_timezone_set('Europe/Moscow');
        
        DB::listen(function (QueryExecuted $query) {
                Log::info(
                    $query->sql,
                    $query->bindings,
                    $query->time
                );
            });
    
    
            Relation::enforceMorphMap([
                'noname' => 'App\Models\Noname',
                'address' => 'App\Models\Address',
                'age' => 'App\Models\Age',
                'alt' => 'App\Models\Alt',
                'catalog' => 'App\Models\Catalog',
                'category' => 'App\Models\Category',
                'date' => 'App\Models\Date',
                'description' => 'App\Models\Description',
                'feedback' => 'App\Models\FeedBack',
                'file' => 'App\Models\File',
                'flag' => 'App\Models\Flag',
                'head' => 'App\Models\Head',
                'image' => 'App\Models\Image',
                'link' => 'App\Models\Link',
                'mail' => 'App\Models\Mail',
                'menu' => 'App\Models\Menu',
                'phone' => 'App\Models\Phone',
                'post' => 'App\Models\Post',
                'price' => 'App\Models\Price',
                'product' => 'App\Models\Product',
                'project' => 'App\Models\Project',
                'property' => 'App\Models\Property',
                'rubric' => 'App\Models\Rubric',
                'seodescription' => 'App\Models\Seodescription',
                'seotitle' => 'App\Models\Seotitle',
                'service' => 'App\Models\Service',
                'tag' => 'App\Models\Tag',
                'team' => 'App\Models\Team',
                'text' => 'App\Models\Text',
                'title' => 'App\Models\Title',
                'unit' => 'App\Models\Unit',
                'users' => 'App\Models\Users',
                'video' => 'App\Models\Video',
                'resource' => 'App\Models\Resource',
                'seoquery' => 'App\Models\SeoQuery',
                'position' => 'App\Models\Position',
            ]);
    }
}

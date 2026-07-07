<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Subcategory;

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

 $categories = Category::with('subcategories')
        ->orderBy('category')
        ->get();

    View::share('categories', $categories);
        
 /*
   $bookCategory = Category::where('category', 'Books')->first();
   $otherCategories  = Category::where('category','!=', 'Books')->first();

    $subcategories = collect();
    $other_subcategories = collect();

    if ($bookCategory) {
        $subcategories = Subcategory::where('category_id', $bookCategory->id)
            ->orderBy('name')
            ->get();
    }
     if ($otherCategories->count()) {
     $other_subcategories = Subcategory::where('category_id', $otherCategories->id)
            ->orderBy('name')
            ->get();
    }
  View::share([
        'subcategories' => $subcategories,
        'other_subcategories' => $other_subcategories
    ]);
*/
      }



}

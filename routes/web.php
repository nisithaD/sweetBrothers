<?php

use App\Http\Controllers\pdfGenerateController;
use App\Http\Controllers\QuotesController;
use App\Http\Livewire\Admin\Dashboard\Index;
use App\Http\Livewire\Admin\LandingPages\Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/login', function () {
//    return view('auth.login');
//});

Auth::routes(['register' => false]);

Route::get('/dashboard', Index::class)->middleware('auth');

Route::post('/imageUploader', Images::class);

Route::middleware('auth')->prefix('wbpa')->group(function () {

    //page content
    Route::get('/content', App\Http\Livewire\Admin\Contents\Index::class);
    Route::get('/content/{id}/edit', App\Http\Livewire\Admin\Contents\Edit::class);

    //featured pages
    Route::get('/featured_pages', App\Http\Livewire\Admin\FeaturedPages\Index::class);

    //featured blocks
    Route::get('/featured_pages/{id}/blocks', App\Http\Livewire\Admin\FeaturedBlocks\Index::class);
    Route::get('/featured_pages/{id}/blocks/create', App\Http\Livewire\Admin\FeaturedBlocks\Create::class);
    Route::get('/featured_pages/create', App\Http\Livewire\Admin\FeaturedPages\Create::class);
    Route::get('/featured_pages/{id}/edit', App\Http\Livewire\Admin\FeaturedPages\Edit::class);
    Route::get('/featured_pages/{page_id}/blocks/{block_id}/edit', App\Http\Livewire\Admin\FeaturedBlocks\Edit::class);
    Route::get('/featured_pages/{id}/images', App\Http\Livewire\Admin\FeaturedPages\Images::class);
    Route::get('/featured_pages/{id}/banners', App\Http\Livewire\Admin\FeaturedPages\Banners::class);

    //banners
    Route::get('/banners', App\Http\Livewire\Admin\Banners\Index::class);
    Route::get('/banner_edit/{id}', App\Http\Livewire\Admin\Banners\Edit::class);

    //blogs
    Route::get('/blogs', App\Http\Livewire\Admin\Blogs\Index::class);
    Route::get('/blogs/create', App\Http\Livewire\Admin\Blogs\Create::class);
    Route::get('/blogs/{id}/edit', App\Http\Livewire\Admin\Blogs\Edit::class);

    //partners
    Route::get('/partners', App\Http\Livewire\Admin\Partners\Index::class);
    Route::get('/partners/create', App\Http\Livewire\Admin\Partners\Create::class);
    Route::get('/partners/{id}/edit', App\Http\Livewire\Admin\Partners\Edit::class);

    //reviews
    Route::get('/reviews', App\Http\Livewire\Admin\Reviews\Index::class);
    Route::get('/reviews/create', App\Http\Livewire\Admin\Reviews\Create::class);
    Route::get('/reviews/{id}/edit', App\Http\Livewire\Admin\Reviews\Edit::class);

    //faqs
    Route::get('/faqs', App\Http\Livewire\Admin\Faqs\Index::class);
    Route::get('/faqs/create', App\Http\Livewire\Admin\Faqs\Create::class);
    Route::get('/faqs/{id}/edit', App\Http\Livewire\Admin\Faqs\Edit::class);

    //product_faqs
    Route::get('/product_faqs', App\Http\Livewire\Admin\ProductFaqs\Index::class);
    Route::get('/product_faqs/create', App\Http\Livewire\Admin\ProductFaqs\Crete::class);
    Route::get('/product_faqs/{id}/edit', App\Http\Livewire\Admin\ProductFaqs\Edit::class);

    //orders
    Route::get('/ordersManage', App\Http\Livewire\Admin\Orders\Index::class);
    Route::get('/ordersManage/create', App\Http\Livewire\Admin\Orders\Create::class);
    Route::get('/ordersManage/{orderId}/edit', App\Http\Livewire\Admin\Orders\Edit::class);

    //offer banners
    Route::get('/offers', App\Http\Livewire\Admin\Offers\Index::class);
    Route::get('/offers/create', App\Http\Livewire\Admin\Offers\Create::class);
    Route::get('/offers/{id}/edit', App\Http\Livewire\Admin\Offers\Edit::class);
    Route::get('/offers/re-order', App\Http\Livewire\Admin\Offers\ReOrder::class);

    //landing pages
    Route::get('/landing_pages', App\Http\Livewire\Admin\landingPages\Index::class);
    Route::get('/landing_pages/create', App\Http\Livewire\Admin\landingPages\Create::class);
    Route::get('/landing_pages/{id}/edit', App\Http\Livewire\Admin\landingPages\Edit::class);
    Route::get('/landing_pages/{id}/images', App\Http\Livewire\Admin\landingPages\Images::class);
    Route::get('/landing_pages/{id}/banners', App\Http\Livewire\Admin\landingPages\Banners::class);

    //landing blocks
    Route::get('/landing_pages/{id}/blocks', App\Http\Livewire\Admin\landingBlocks\Index::class);
    Route::get('/landing_pages/{id}/blocks/create', App\Http\Livewire\Admin\landingBlocks\Create::class);
    Route::get('/landing_blocks/{page_id}/blocks/{block_id}/edit', App\Http\Livewire\Admin\landingBlocks\Edit::class);

    //manage_packages
    Route::get('/package_types', App\Http\Livewire\Admin\ManagePackages\PackageTypes\Index::class);
    Route::get('/package_types/{id}/images', App\Http\Livewire\Admin\ManagePackages\PackageTypes\Banners::class);
    Route::get('/package_types/create', App\Http\Livewire\Admin\ManagePackages\PackageTypes\Create::class);
    Route::get('/package_types/{id}/edit', App\Http\Livewire\Admin\ManagePackages\PackageTypes\Edit::class);

    //packages
    Route::get('/packages', App\Http\Livewire\Admin\ManagePackages\Packages\Index::class);
    Route::get('/package/create', App\Http\Livewire\Admin\ManagePackages\Packages\Create::class);
    Route::get('/package/{id}/edit', App\Http\Livewire\Admin\ManagePackages\Packages\Edit::class);

    //hire_products-types
    Route::get('/product_types', App\Http\Livewire\Admin\ManageHireProducts\ProductTypes\Index::class);
    Route::get('/product_types/create', App\Http\Livewire\Admin\ManageHireProducts\ProductTypes\Create::class);
    Route::get('/product_types/{id}/edit', App\Http\Livewire\Admin\ManageHireProducts\ProductTypes\Edit::class);

    //hire_products-categories
    Route::get('/categories', App\Http\Livewire\Admin\ManageHireProducts\Categories\Index::class);
    Route::get('/categories/create', App\Http\Livewire\Admin\ManageHireProducts\Categories\Create::class);
    Route::get('/categories/{id}/edit', App\Http\Livewire\Admin\ManageHireProducts\Categories\Edit::class);

    //hire_products-sub_categories
    Route::get('/subcats', App\Http\Livewire\Admin\ManageHireProducts\SubCategories\Index::class);
    Route::get('/subcats/create', App\Http\Livewire\Admin\ManageHireProducts\SubCategories\Create::class);
    Route::get('/subcats/{id}/edit', App\Http\Livewire\Admin\ManageHireProducts\SubCategories\Edit::class);

    //hire_products
    Route::get('/products', App\Http\Livewire\Admin\ManageHireProducts\products\Index::class);
    Route::get('/products/create', App\Http\Livewire\Admin\ManageHireProducts\products\Create::class);
    Route::get('/products/{id}/edit', App\Http\Livewire\Admin\ManageHireProducts\products\Edit::class);
    Route::get('/products/{id}/images', App\Http\Livewire\Admin\ManageHireProducts\products\ExtraImages::class);

    //sales_products-types
    Route::get('/sales-product_types', App\Http\Livewire\Admin\ManageSalesProducts\ProductTypes\Index::class);
    Route::get('/sales-product_types/create', App\Http\Livewire\Admin\ManageSalesProducts\ProductTypes\Create::class);
    Route::get('/sales-product_types/{id}/edit', App\Http\Livewire\Admin\ManageSalesProducts\ProductTypes\Edit::class);

    //sales_products-categories
    Route::get('/sales-categories', App\Http\Livewire\Admin\ManageSalesProducts\Categories\Index::class);
    Route::get('/sales-categories/create', App\Http\Livewire\Admin\ManageSalesProducts\Categories\Create::class);
    Route::get('/sales-categories/{id}/edit', App\Http\Livewire\Admin\ManageSalesProducts\Categories\Edit::class);

    //hire_products-sub_categories
    Route::get('/sales-subcats', App\Http\Livewire\Admin\ManageSalesProducts\SubCategories\Index::class);
    Route::get('/sales-subcats/create', App\Http\Livewire\Admin\ManageSalesProducts\SubCategories\Create::class);
    Route::get('/sales-subcats/{id}/edit', App\Http\Livewire\Admin\ManageSalesProducts\SubCategories\Edit::class);

    //sales_products
    Route::get('/sales-products', App\Http\Livewire\Admin\ManageSalesProducts\Products\Index::class);
    Route::get('/sales-products/create', App\Http\Livewire\Admin\ManageSalesProducts\Products\Create::class);
    Route::get('/sales-products/{id}/edit', App\Http\Livewire\Admin\ManageSalesProducts\Products\Edit::class);
    Route::get('/sales-products/{id}/images', App\Http\Livewire\Admin\ManageSalesProducts\Products\ExtraImages::class);

    //coupons
    Route::get('/coupons', App\Http\Livewire\Admin\Coupons\Index::class);
    Route::get('/coupons/create', App\Http\Livewire\Admin\Coupons\Create::class);
    Route::get('/coupons/{id}/edit', App\Http\Livewire\Admin\Coupons\Edit::class);

    //postage
    Route::get('/postage', App\Http\Livewire\Admin\Postage\Index::class);
    Route::get('/postage/create', App\Http\Livewire\Admin\Postage\Create::class);
    Route::get('/postage/{id}/edit', App\Http\Livewire\Admin\Postage\Edit::class);

    //quotes
    Route::get('/quotes', App\Http\Livewire\Admin\Quotes\Index::class);
    Route::get('/quotes/{id}/view', App\Http\Livewire\Admin\Quotes\View::class);
    Route::get('/quotes/{id}/pdf', [QuotesController::class, 'pdf']);

    //manage_orders
    Route::get('/orders', App\Http\Livewire\Admin\ManageOrders\Index::class);
    Route::get('/orders/{id}/view', App\Http\Livewire\Admin\ManageOrders\View::class);
    Route::get('/orders/{id}/pdf', [pdfGenerateController::class, 'pdf']);

    //site_settings
    Route::get('/contact/{id}/edit', App\Http\Livewire\Admin\SiteSettings\Index::class);

    //realtime_search
    Route::get('/autocompleteajax','Admin\QuotesController@autoCompleteAjax');

});

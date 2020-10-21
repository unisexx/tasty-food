<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\KnowledgeCategory;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // โหลดไฟล์ Helpers
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            // เมนูสินค้า
            if (!Session::exists('product_category_menu')) {
                $rs = ProductCategory::where('status', 1)->orderBy('_lft')->get()->toTree();
                Session::put('product_category_menu', $rs);
            }

            // ข้อมูลสุขภาพ
            if (!Session::exists('knowledge_category_menu')) {
                $rs = KnowledgeCategory::where('status', 1)->orderBy('id', 'asc')->get();
                Session::put('knowledge_category_menu', $rs);
            }

            //contact, footer
            if (!Session::exists('contact')) {
                $rs = Contact::find(1);
                Session::put('contact', $rs);
            }

            $view->with([
                'product_category_menu'   => Session::get('product_category_menu'),
                'knowledge_category_menu' => Session::get('knowledge_category_menu'),
                'contact'                 => Session::get('contact'),
            ]);
        });
    }
}

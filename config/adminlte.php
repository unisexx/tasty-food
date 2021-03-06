<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
     */

    'title'         => 'Chulalak',
    'title_prefix'  => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-logo
    |
     */

    'logo'              => '<b>C</b>hulalak',
    'logo_img'          => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class'    => 'brand-image-xl',
    'logo_img_xl'       => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt'      => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-layout
    |
     */

    'layout_topnav'        => null,
    'layout_boxed'         => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar'  => null,
    'layout_fixed_footer'  => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-classes
    |
     */

    'classes_body'             => '',
    'classes_brand'            => '',
    'classes_brand_text'       => '',
    'classes_content_header'   => 'container-fluid',
    'classes_content'          => 'container-fluid',
    'classes_sidebar'          => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav'      => '',
    'classes_topnav'           => 'navbar-white navbar-light',
    'classes_topnav_nav'       => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-sidebar
    |
     */

    'sidebar_mini'                            => true,
    'sidebar_collapse'                        => false,
    'sidebar_collapse_auto_size'              => false,
    'sidebar_collapse_remember'               => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme'                 => 'os-theme-light',
    'sidebar_scrollbar_auto_hide'             => 'l',
    'sidebar_nav_accordion'                   => true,
    'sidebar_nav_animation_speed'             => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-control-sidebar-right-sidebar
    |
     */

    'right_sidebar'                     => false,
    'right_sidebar_icon'                => 'fas fa-cogs',
    'right_sidebar_theme'               => 'dark',
    'right_sidebar_slide'               => true,
    'right_sidebar_push'                => true,
    'right_sidebar_scrollbar_theme'     => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-urls
    |
     */

    'dashboard_url' => '/admin/order',

    'logout_url' => '../logout',

    'login_url' => 'login',

    // 'register_url' => 'register',
    'register_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-laravel-mix
    |
     */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-menu
    |
     */

    'menu' => [
        // [
        //     'text' => 'search',
        //     'search' => true,
        //     'topnav' => true,
        // ],
        // [
        //     'text' => 'blog',
        //     'url'  => 'admin/blog',
        //     'can'  => 'manage-blog',
        // ],
        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],
        ['header' => 'ข้อมูลการสั่งซื้อ'],
        [
            'text'   => 'ข้อมูลการสั่งซื้อ',
            'url'    => 'admin/order',
            'icon'   => 'fas fa-shopping-cart',
            'active' => ['admin/order*'],
        ],
        ['header' => 'ร้านค้า'],
        [
            'text'   => 'หมวดหมู่สินค้า',
            'url'    => 'admin/product-category',
            'icon'   => 'fas fa-store',
            'active' => ['admin/product-category*'],
        ],
        [
            'text'   => 'สินค้า',
            'url'    => 'admin/product-item',
            'icon'   => 'fas fa-store',
            'active' => ['admin/product-item*'],
        ],
        [
            'text'   => 'โปรโมชั่น',
            'url'    => 'admin/promotion',
            'icon'   => 'fas fa-store',
            'active' => ['admin/promotion*'],
        ],
        [
            'text'   => 'ค่าจัดส่ง',
            'url'    => 'admin/shipping-rate',
            'icon'   => 'fas fa-store',
            'active' => ['admin/shipping-rate*'],
        ],
        ['header' => 'สมาชิก'],
        [
            'text'   => 'สมาชิกทั่วไป',
            'url'    => 'admin/user',
            'icon'   => 'fas fa-user',
            'active' => ['admin/user*'],
        ],
        [
            'text'   => 'สมาชิกร้านค้า',
            'url'    => 'admin/store',
            'icon'   => 'fas fa-user',
            'active' => ['admin/store*'],
        ],
        ['header' => 'ข้อมูลทั่วไป'],
        [
            'text'   => 'ไฮไลท์',
            'url'    => 'admin/hilight',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/hilight*'],
        ],
        [
            'text'   => 'แบนเนอร์',
            'url'    => 'admin/banner',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/banner*'],
        ],
        [
            'text'   => 'เกี่ยวกับเรา',
            'url'    => 'admin/page/1/edit',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/page/1*'],
        ],
        // [
        //     'text'   => 'บริการของเรา',
        //     'url'    => 'admin/service',
        //     'icon'   => 'fab fa-wpforms',
        //     'active' => ['admin/service*'],
        // ],
        [
            'text'   => 'วิธีสั่งซื้อ',
            'url'    => 'admin/page/3/edit',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/page/3*'],
        ],
        [
            'text'   => 'วิธีชำระเงิน',
            'url'    => 'admin/page/4/edit',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/page/4*'],
        ],
        // [
        //     'text'   => 'ข่าวสาร',
        //     'url'    => 'admin/info',
        //     'icon'   => 'fab fa-wpforms',
        //     'active' => ['admin/info*'],
        // ],
        [
            'text'   => 'หมวดหมู่ข้อมูลสุขภาพ',
            'url'    => 'admin/knowledge-category',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/knowledge-category/*'],
        ],
        [
            'text'   => 'ข้อมูลสุขภาพ',
            'url'    => 'admin/knowledge',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/knowledge/*'],
        ],
        [
            'text'   => 'ติดต่อเรา',
            'url'    => 'admin/contact/1/edit',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/contact/1*'],
        ],
        [
            'text'   => 'วีดีโอ',
            'url'    => 'admin/vdo',
            'icon'   => 'fab fa-wpforms',
            'active' => ['admin/vdo*'],
        ],
        ['header' => 'อื่นๆ'],
        [
            'text'   => 'ข้อความ',
            'url'    => 'admin/message',
            'icon'   => 'far fa-envelope',
            'active' => ['admin/message*'],
        ],
        ['header' => 'รายงาน'],
        [
            'text'   => 'รายงานสรุปยอดขาย',
            'url'    => 'admin/report1',
            'icon'   => 'far fa-file-alt',
            'active' => ['admin/report1*'],
        ],
        [
            'text'   => 'รายงานสินค้าขายดี',
            'url'    => 'admin/report2',
            'icon'   => 'far fa-file-alt',
            'active' => ['admin/report2*'],
        ],
        [
            'text'   => 'รายงานลูกค้าชั้นยอด',
            'url'    => 'admin/report3',
            'icon'   => 'far fa-file-alt',
            'active' => ['admin/report3*'],
        ],
        [
            'text'   => 'รายงานการเข้าชมสินค้า',
            'url'    => 'admin/report4',
            'icon'   => 'far fa-file-alt',
            'active' => ['admin/report4*'],
        ],

        // [
        //     'text' => 'บริการของเรา',
        //     'url'  => 'admin/aboutus',
        //     'icon' => 'fab fa-wpforms',
        // ],

        // ['header' => 'account_settings'],
        // [
        //     'text' => 'profile',
        //     'url'  => 'admin/settings',
        //     'icon' => 'fas fa-fw fa-user',
        // ],
        // [
        //     'text' => 'change_password',
        //     'url'  => 'admin/settings',
        //     'icon' => 'fas fa-fw fa-lock',
        // ],
        // [
        //     'text'    => 'multilevel',
        //     'icon'    => 'fas fa-fw fa-share',
        //     'submenu' => [
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //         [
        //             'text'    => 'level_one',
        //             'url'     => '#',
        //             'submenu' => [
        //                 [
        //                     'text' => 'level_two',
        //                     'url'  => '#',
        //                 ],
        //                 [
        //                     'text'    => 'level_two',
        //                     'url'     => '#',
        //                     'submenu' => [
        //                         [
        //                             'text' => 'level_three',
        //                             'url'  => '#',
        //                         ],
        //                         [
        //                             'text' => 'level_three',
        //                             'url'  => '#',
        //                         ],
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //     ],
        // ],
        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'aqua',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-menu-filters
    |
     */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        // JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-plugins
    |
     */

    'plugins' => [
        [
            'name'   => 'Datatables',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'css',
                    'asset'    => true,
                    'location' => 'https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'AdminLTE-3.0.0/plugins/datatables/jquery.dataTables.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/pdfmake-thai/pdfmake.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/pdfmake-thai/vfs_fonts.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'AdminLTE-3.0.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type'     => 'css',
                    'asset'    => true,
                    'location' => 'AdminLTE-3.0.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name'   => 'CustomFileInput',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'AdminLTE-3.0.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js',
                ],
            ],
        ],
        [
            'name'   => 'Select2',
            'active' => false,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name'   => 'Chartjs',
            'active' => false,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name'   => 'Sweetalert2',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'https://cdn.jsdelivr.net/npm/sweetalert2@10',
                ],
            ],
        ],
        [
            'name'   => 'BootstrapSwitch',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'AdminLTE-3.0.0/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                ],
            ],
        ],
        [
            'name'   => 'Pace',
            'active' => false,
            'files'  => [
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        [
            'name'   => 'CKEditor4',
            'active' => false,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.ckeditor.com/4.13.0/standard/ckeditor.js',
                ],
            ],
        ],
        [
            'name'   => 'TinyMCE',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'tinymce_file_manager/tinymce/tinymce.min.js',
                ],
            ],
        ],
        [
            'name'   => 'NumberJs',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/jquery.number.js',
                ],
            ],
        ],
        [
            'name'   => 'InputMask',
            'active' => false,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => 'AdminLTE-3.0.0/plugins/inputmask/min/jquery.inputmask.bundle.min.js',
                ],
            ],
        ],
        [
            'name'   => 'DatePicker',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'css',
                    'asset'    => true,
                    'location' => 'js/bootstrap-datepicker-thai/css/datepicker.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/bootstrap-datepicker-thai/js/bootstrap-datepicker.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js',
                ],
            ],
        ],
        [
            'name'   => 'TagInput',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'css',
                    'asset'    => true,
                    'location' => 'js/bootstrap4-tagsinput/tagsinput.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/bootstrap4-tagsinput/tagsinput.js',
                ],
            ],
        ],
        [
            'name'   => 'MyScript',
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'js/myscript.js',
                ],
            ],
        ],
    ],
];

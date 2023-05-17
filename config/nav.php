<?php 

return [
    [
        'icon' => 'home',
        'name' => 'Tổng quan',
        'route' => 'get_admin.home',
        'prefix' => ['']
    ],
    [
        'icon' => 'layers',
        'name' => 'Danh mục',
        'route' => 'get_admin.category.index',
        'prefix' => ['category']
    ],
    [
        'icon' => 'database',
        'name' => 'Sản phẩm',
        'route' => 'get_admin.product.index',
        'prefix' => ['product']
    ],
    [
        'icon' => 'user',
        'name' => 'User',
        'route' => 'get_admin.user.index',
        'prefix' => ['user']
    ],
    [
        'icon' => 'layers',
        'name' => 'Slide',
        'route' => 'get_admin.slide.index',
        'prefix' => ['slide']
    ],
    [
        'icon' => 'layers',
        'name' => 'Permission',
        'route' => 'get_admin.permission.index',
        'prefix' => ['permission']
    ],
    [
        'icon' => 'layers',
        'name' => 'Role',
        'route' => 'get_admin.role.index',
        'prefix' => ['role']
    ]
];

?>
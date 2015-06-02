<?php

return [
    'plugin' => [
        'name' => 'Portfolio',
        'description' => 'A plugin that allows you to show off your past projects.',
    ],
    'navigation' => [
        'label' => 'Portfolio',
        'sideMenu' => [
            'items' => 'Items',
            'categories' => 'Categories'
        ]
    ],
    'components' => [
        'portfolio' => [
            'name' => 'Portfolio',
            'description' => 'Create a list of portfolio.',
        ],
    ],
    'controller' => [
        'view' => [
            'items' => [
                'new' => 'New Item',
                'breadcrumb_label' => 'Items',
                'return' => 'Return to items list',
                'creating' => 'Creating Item...',
                'delete_confirmation' => 'Do you really want to delete this item?' 
            ],
            'categories' => [
                'new' => 'New Item',
                'breadcrumb_label' => 'Categories',
                'return' => 'Return to categories list',
                'creating' => 'Creating Category...',
                'delete_confirmation' => 'Do you really want to delete this category?' 
            ]
        ],
        'list' => [
            'items' => 'Manage Items',
            'categories' => 'Manage Categories'
        ],
        'form' => [
            'items' => [
                'title' => 'Item',
                'create' => 'Create Item',
                'update' => 'Update Item',
                'flashCreate' => 'The Item has been created successfully',
                'flashUpdate' => 'The Item has been updated successfully',
                'flashDelete' => 'The Item has been deleted successfully'
            ],
            'categories' => [
                'title' => 'Category',
                'create' => 'Create Category',
                'update' => 'Update Category',
                'flashCreate' => 'The Category has been created successfully',
                'flashUpdate' => 'The Category has been updated successfully',
                'flashDelete' => 'The Category has been deleted successfully'
            ]
        ],
    ],
    'columns' => [
        'item' => [
            'id' => 'ID',
            'title' => 'Title',
            'category' => 'Category'
        ],
        'category' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description'
        ]
    ],
    'fields' => [
        'item' => [
            'title' => 'Title',
            'category' => 'Category',
            'description' => 'Description',
            'images' => 'Images',
            'url' => 'URL'
        ],
        'category' => [
            'name' => 'Name',
            'description' => 'Description'
        ]
    ],
];

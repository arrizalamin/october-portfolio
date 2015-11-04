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
            'categories' => 'Categories',
            'tags' => 'Tags'
        ]
    ],
    'permissions' => [
        'tab' => 'Portfolio',
        'manage' => 'Manage Portfolio'
    ],
    'components' => [
        'portfolio' => [
            'name' => 'Portfolio',
            'description' => 'Create a list of portfolio.',
            'properties' => [
                'category' => [
                    'title' => 'Category',
                    'placeholder' => 'Select Category',
                    'all' => 'All'
                ],
                'selectedTag' => [
                    'title' => 'Selected Tag',
                    'description' => 'This value can be changed depending on the identifier used in the URL of this page. See the manual for this plugin for more information.'
                ],
                'pageNumber' => [
                    'title' => 'Page Number',
                    'description' => 'This value is used to determine what page the user is on.'
                ],
                'itemsPerPage' => [
                    'title' => 'Items per page',
                    'validationMessage' => 'Invalid format of the items per page value'
                ],
                'order' => [
                    'title' => 'Order',
                    'placeholder' => 'Select Order',
                    'ascending' => 'Ascending',
                    'descending' => 'Descending'
                ],
                'group' => [
                    'advanced' => 'Advanced'
                ]

            ]
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
            ],
            'tags' => [
                'new' => 'New Tag',
                'breadcrumb_label' => 'Tags',
                'return' => 'Return to tags list',
                'creating' => 'Creating Tag...',
                'delete_confirmation' => 'Do you really want to delete this tag?'
            ]
        ],
        'list' => [
            'items' => 'Manage Items',
            'categories' => 'Manage Categories',
            'tags' => 'Manage Tags'
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
            ],
            'tags' => [
                'title' => 'Tags',
                'create' => 'Create Tag',
                'update' => 'Update Tag',
                'flashCreate' => 'The Tag has been created successfully',
                'flashUpdate' => 'The Tag has been updated successfully',
                'flashDelete' => 'The Tag has been deleted successfully'
            ]
        ],
    ],
    'columns' => [
        'item' => [
            'id' => 'ID',
            'title' => 'Title',
            'category' => 'Category',
            'tags' => 'Tags'
        ],
        'category' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description'
        ],
        'tag' => [
            'id' => 'ID',
            'name' => 'Name',
            'items' => 'Items with Tag'
        ]
    ],
    'fields' => [
        'item' => [
            'title' => 'Title',
            'category' => 'Category',
            'tags' => 'Tags',
            'description' => 'Description',
            'images' => 'Images',
            'url' => 'URL'
        ],
        'category' => [
            'name' => 'Name',
            'description' => 'Description'
        ],
        'tag' => [
            'name' => 'Name',
            'items' => 'Items',
            'notavailable' => 'No items available'
        ]
    ],
];

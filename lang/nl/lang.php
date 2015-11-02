<?php

return [
    'plugin' => [
        'name' => 'Portfolio',
        'description' => 'Een plugin voor OctoberCMS om je laatste werk te tonen op je website.',
    ],
    'navigation' => [
        'label' => 'Portfolio',
        'sideMenu' => [
            'items' => 'Items',
            'categories' => 'Categorieën'
        ]
    ],
    'permissions' => [
        'tab' => 'Portfolio',
        'manage' => 'Beheer portfolio'
    ],
    'components' => [
        'portfolio' => [
            'name' => 'Portfolio',
            'description' => 'Maak een lijst van portfolio\'s.',
            'properties' => [
                'category' => [
                    'title' => 'Categorie',
                    'placeholder' => 'Selecteer categorie',
                    'all' => 'Allemaal'
                ],
                'pageNumber' => [
                    'title' => 'Pagina nummer',
                    'description' => 'Dit wordt gebruikt om te bepalen op welke pagina de gebruiker zich bevind.'
                ],
                'itemsPerPage' => [
                    'title' => 'Items per pagina',
                    'validationMessage' => 'Het aantal items per pagina heeft een ongeldig formaat.'
                ],
                'order' => [
                    'title' => 'Volgorde',
                    'placeholder' => 'Selecteer volgorde',
                ]
            ]
        ],
    ],
    'controller' => [
        'view' => [
            'items' => [
                'new' => 'Nieuw item',
                'breadcrumb_label' => 'Items',
                'return' => 'Terug naar de item lijst',
                'creating' => 'Maak item aan...',
                'delete_confirmation' => 'Wil je dit item verwijderen?'
            ],
            'categories' => [
                'new' => 'Nieuwe categorie',
                'breadcrumb_label' => 'Categorieën',
                'return' => 'Terug naar de categorieën lijst',
                'creating' => 'Maak categorie aan...',
                'delete_confirmation' => 'Wil je deze categorie verwijderen?'
            ]
        ],
        'list' => [
            'items' => 'Beheer items',
            'categories' => 'Beheer categorieën'
        ],
        'form' => [
            'items' => [
                'title' => 'Item',
                'create' => 'Maak item',
                'update' => 'Wijzig item',
                'flashCreate' => 'Het item is aangemaakt',
                'flashUpdate' => 'Het item is gewijzigd',
                'flashDelete' => 'Het item is verwijderd'
            ],
            'categories' => [
                'title' => 'Categorie',
                'create' => 'Maak categorie',
                'update' => 'Wijzig categorie',
                'flashCreate' => 'De categorie is aangemaakt',
                'flashUpdate' => 'De categorie is geupdate',
                'flashDelete' => 'De categorie is verwijderd'
            ]
        ],
    ],
    'columns' => [
        'item' => [
            'id' => 'ID',
            'title' => 'Titel',
            'category' => 'Categorie'
        ],
        'category' => [
            'id' => 'ID',
            'name' => 'Naam',
            'description' => 'Beschrijving'
        ]
    ],
    'fields' => [
        'item' => [
            'title' => 'Titel',
            'category' => 'Categorie',
            'description' => 'Beschrijving',
            'images' => 'Afbeeldingen',
            'url' => 'URL'
        ],
        'category' => [
            'name' => 'Naam',
            'description' => 'Beschrijving'
        ]
    ],
];

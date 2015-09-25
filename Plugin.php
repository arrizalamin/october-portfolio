<?php namespace ArrizalAmin\Portfolio;

use System\Classes\PluginBase;
use Backend;

/**
 * Portfolio Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'arrizalamin.portfolio::lang.plugin.name',
            'description' => 'arrizalamin.portfolio::lang.plugin.description',
            'author'      => 'Arrizal Amin',
            'icon'        => 'icon-trophy',
            'homepage'    => 'https://github.com/arrizalamin/october-portfolio'
        ];
    }

    /**
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'arrizalamin.portfolio.access_portfolio' => [
                'tab'   => 'arrizalamin.portfolio::lang.permissions.tab',
                'label' => 'arrizalamin.portfolio::lang.permissions.manage',
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'portfolio' => [
                'label' => 'arrizalamin.portfolio::lang.navigation.label',
                'url' => Backend::url('arrizalamin/portfolio/items'),
                'icon' => 'icon-trophy',
                'permissions' => ['arrizalamin.portfolio.access_portfolio'],
                'order' => 500,
                'sideMenu' => [
                    'items' => [
                        'permissions' => ['arrizalamin.portfolio.access_portfolio'],
                        'label' => 'arrizalamin.portfolio::lang.navigation.sideMenu.items',
                        'icon' => 'icon-certificate',
                        'url' => Backend::url('arrizalamin/portfolio/items'),
                    ],
                    'categories' => [
                        'permissions' => ['arrizalamin.portfolio.access_portfolio'],
                        'label' => 'arrizalamin.portfolio::lang.navigation.sideMenu.categories',
                        'icon' => 'icon-folder',
                        'url' => Backend::url('arrizalamin/portfolio/categories'),
                    ]
                ]
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'ArrizalAmin\Portfolio\Components\Portfolio' => 'portfolio'
        ];
    }

}

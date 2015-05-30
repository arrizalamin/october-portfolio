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
            'name'        => 'Portfolio',
            'description' => 'A plugin that allows you to show off your past projects.',
            'author'      => 'ArrizalAmin',
            'icon'        => 'icon-trophy'
        ];
    }

    public function registerNavigation()
    {
        return [
            'portfolio' => [
                'label' => 'Portfolio',
                'url' => Backend::url('arrizalamin/portfolio/items'),
                'icon' => 'icon-trophy',
                'permissions' => ['arrizalamin.portfolio.*'],
                'order' => 500,
                'sideMenu' => [
                    'items' => [
                        'label' => 'Items',
                        'icon' => 'icon-certificate',
                        'url' => Backend::url('arrizalamin/portfolio/items'),
                        'permissions' => ['arrizalamin.portfolio.*']
                    ],
                    'categories' => [
                        'label' => 'Categories',
                        'icon' => 'icon-folder',
                        'url' => Backend::url('arrizalamin/portfolio/categories'),
                        'permissions' => ['arrizalamin.portfolio.*']
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

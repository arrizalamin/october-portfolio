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
            'author'      => 'Arrizal Amin',
            'icon'        => 'icon-trophy',
            'homepage'    => 'https://github.com/arrizalamin/october-portfolio'
        ];
    }

    public function registerNavigation()
    {
        return [
            'portfolio' => [
                'label' => 'Portfolio',
                'url' => Backend::url('arrizalamin/portfolio/items'),
                'icon' => 'icon-trophy',
                'order' => 500,
                'sideMenu' => [
                    'items' => [
                        'label' => 'Items',
                        'icon' => 'icon-certificate',
                        'url' => Backend::url('arrizalamin/portfolio/items'),
                    ],
                    'categories' => [
                        'label' => 'Categories',
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

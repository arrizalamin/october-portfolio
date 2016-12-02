<?php namespace ArrizalAmin\Portfolio\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use ArrizalAmin\Portfolio\Models\Category;
use Lang;

/**
 * Categories Back-end Controller
 */
class Categories extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('ArrizalAmin.Portfolio', 'portfolio', 'categories');
    }
}

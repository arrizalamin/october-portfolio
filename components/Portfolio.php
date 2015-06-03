<?php namespace ArrizalAmin\Portfolio\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use ArrizalAmin\Portfolio\Models\Item;
use ArrizalAmin\Portfolio\Models\Category;

class Portfolio extends ComponentBase
{
    public $portfolio;

    public function componentDetails()
    {
        return [
            'name'        => 'arrizalamin.portfolio::lang.components.portfolio.name',
            'description' => 'arrizalamin.portfolio::lang.components.portfolio.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title' => 'Category',
                'type' => 'dropdown',
                'default' => '1',
                'placeholder' => 'Select Category'
            ],
            'pageNumber' => [
                'title' => 'Page Number',
                'description' => 'This value is used to determine what page the user is on.',
                'type' => 'string',
                'default' => '{{ :page }}',
            ],
            'itemsPerPage' => [
                'title'             => 'Items per page',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Invalid format of the items per page value',
                'default'           => '6',
            ]
        ];
    }

    public function getCategoryOptions()
    {
        return Category::lists('name', 'id');
    }

    public function onRun()
    {
        $this->portfolio = $this->loadItems();
    }

    protected function loadItems()
    {
        if (! $category = Category::find($this->property('category')) )
            return null;

        return $category->items()->paginate($this->property('itemsPerPage'), $this->property('pageNumber'));
    }

}
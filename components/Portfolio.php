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
                'title' => 'arrizalamin.portfolio::lang.components.portfolio.properties.category.title',
                'type' => 'dropdown',
                'default' => '1',
                'placeholder' => 'arrizalamin.portfolio::lang.components.portfolio.properties.category.placeholder'
            ],
            'pageNumber' => [
                'title' => 'arrizalamin.portfolio::lang.components.portfolio.properties.pageNumber.title',
                'description' => 'arrizalamin.portfolio::lang.components.portfolio.properties.pageNumber.description',
                'type' => 'string',
                'default' => '{{ :page }}',
            ],
            'itemsPerPage' => [
                'title'             => 'arrizalamin.portfolio::lang.components.portfolio.properties.itemsPerPage.title',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'arrizalamin.portfolio::lang.components.portfolio.properties.itemsPerPage.validationMessage',
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
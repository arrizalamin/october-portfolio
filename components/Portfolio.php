<?php namespace ArrizalAmin\Portfolio\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use ArrizalAmin\Portfolio\Models\Item;
use ArrizalAmin\Portfolio\Models\Category;
use Lang;

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
        $categories = Category::lists('name', 'id');
        $categories[0] = Lang::get('arrizalamin.portfolio::lang.components.portfolio.properties.category.all');
        return $categories;
    }

    public function onRun()
    {
        $this->portfolio = $this->loadItems();
    }

    protected function loadItems()
    {
        if (! $category = Category::find($this->property('category')) )
            return Item::paginate($this->property('itemsPerPage'), $this->property('pageNumber'));

        return $category->items()->paginate($this->property('itemsPerPage'), $this->property('pageNumber'));
    }

}
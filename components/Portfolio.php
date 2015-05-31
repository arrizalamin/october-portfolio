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

        return $category->items;
    }

}
<?php namespace ArrizalAmin\Portfolio\Components;

use Cms\Classes\ComponentBase;
use ArrizalAmin\Portfolio\Models\Item;
use ArrizalAmin\Portfolio\Models\Category;
use ArrizalAmin\Portfolio\Models\Tag;
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
            'itemsPerPage' => [
                'title'             => 'arrizalamin.portfolio::lang.components.portfolio.properties.itemsPerPage.title',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'arrizalamin.portfolio::lang.components.portfolio.properties.itemsPerPage.validationMessage',
                'default'           => '6',
            ],
            'order' => [
                'title' => 'arrizalamin.portfolio::lang.components.portfolio.properties.order.title',
                'placeholder' => 'arrizalamin.portfolio::lang.components.portfolio.properties.order.placeholder',
                'type' => 'dropdown',
                'default' => 'asc'
            ],
            'pageNumber' => [
                'title' => 'arrizalamin.portfolio::lang.components.portfolio.properties.pageNumber.title',
                'description' => 'arrizalamin.portfolio::lang.components.portfolio.properties.pageNumber.description',
                'type' => 'string',
                'default' => '{{ :page }}',
                'group' => 'arrizalamin.portfolio::lang.components.portfolio.properties.group.advanced'
            ],
            'selectedTag' => [
                'title' => 'arrizalamin.portfolio::lang.components.portfolio.properties.selectedTag.title',
                'description' => 'arrizalamin.portfolio::lang.components.portfolio.properties.selectedTag.description',
                'type' => 'string',
                'group' => 'arrizalamin.portfolio::lang.components.portfolio.properties.group.advanced',
                'default' => '{{ :selected_tag }}'
            ]
        ];
    }

    public function getCategoryOptions()
    {
        $categories = Category::lists('name', 'id');
        $categories[0] = Lang::get('arrizalamin.portfolio::lang.components.portfolio.properties.category.all');
        return $categories;
    }

    public function getOrderOptions()
    {
        return [
            'asc' => Lang::get('arrizalamin.portfolio::lang.components.portfolio.properties.order.ascending'),
            'desc' => Lang::get('arrizalamin.portfolio::lang.components.portfolio.properties.order.descending')
        ];
    }

    public function onRun()
    {
        // find the correct property to select the items with
        $object = null;
        if($this->property('selectedTag') != null){
            $object = $this->loadItemsByTag($this->property('selectedTag'));
        }elseif($this->property('category') != null){
            $object = $this->loadItemsByCategory($this->property('category'));
        }

        // check if a valid object has been created
        if( !$object ){
            // display all items
            $this->portfolio = Item::paginate($this->property('itemsPerPage'), $this->property('pageNumber'));
        }else{
            // show the items in the portfolio
            $this->portfolio = $object->items()
                ->orderBy('created_at', $this->property('order'))->paginate($this->property('itemsPerPage'), $this->property('pageNumber'));
        }
    }

    protected function loadItemsByCategory($selectedCategory, $byName = false)
    {
        if($byName){
            $category = Category::where('name', '=', $selectedCategory)->first();
        }else{
            $category = Category::find($selectedCategory);
        }

        return $category;
    }

    protected function loadItemsByTag($selectedTag)
    {
        $tag = Tag::where('name', '=', $selectedTag)->first();
        return $tag;
    }

}

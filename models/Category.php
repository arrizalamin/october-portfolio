<?php namespace ArrizalAmin\Portfolio\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'arrizalamin_portfolio_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /** {@inheritdoc} */
    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Translatable fields
     */
    public $translatable = ['name', 'description'];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'items' => ['ArrizalAmin\Portfolio\Models\Item']
    ];

    /**
     * Set the PageUrl parameter to link the correct page
     *
     * @param $pageName
     * @param $controller
     * @return mixed
     */
    public function setPageUrl($pageName, $controller)
    {
        $params = [
            'selected_cat' => $this->slug,
        ];

        return $this->pageUrl = $controller->pageUrl($pageName, $params);
    }

}
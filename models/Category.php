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

    /**
     * @var array Relations
     */
    public $hasMany = [
        'items' => ['ArrizalAmin\Portfolio\Models\Item']
    ];

}
<?php namespace ArrizalAmin\Portfolio\Models;

use Model;

/**
 * Item Model
 */
class Item extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'arrizalamin_portfolio_items';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'category' => ['ArrizalAmin\Portfolio\Models\Category']
    ];
    public $attachMany = [
        'images' => ['System\Models\File']
    ];

}
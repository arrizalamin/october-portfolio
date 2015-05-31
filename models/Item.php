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
     * @var array Translatable fields
     */
    public $translatable = ['title', 'description'];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'category' => ['ArrizalAmin\Portfolio\Models\Category']
    ];
    public $attachMany = [
        'images' => ['System\Models\File']
    ];

     /**
     * Add translation support to this model, if available.
     * @return void
     */
    public static function boot()
    {
        // Call default functionality (required)
        parent::boot();

        // Check the translate plugin is installed
        if (!class_exists('RainLab\Translate\Behaviors\TranslatableModel'))
            return;

        // Extend the constructor of the model
        self::extend(function($model){

            // Implement the translatable behavior
            $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel';

        });
    }

}
<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Супер предложение
 * Class Special
 * @package App\Models
 * @Bind("special")
 */
class Special extends Model {

    protected $fillable = [
        'text',
        'price',
        'link',
        'attachment_id',
    ];

    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment', 'attachment_id', 'id');
    }

}

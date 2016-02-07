<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proposal
 * @package App\Models
 */
class Proposal extends Model {

    /**
     * Model for users proposals
     * @var string
     */
	protected $table = 'proposals';

    protected $fillable = ['user_id', 'title', 'about', 'created_at', 'updated_at'];

    /**
     * Get user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

	protected $table = 'teams';

	public $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'deleted_at','updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $guarded = [
       
    ];  


    public function category()
    {
        return $this->hasOne('App\TeamCategory', 'id', 'category_id' );
    }

    public function sport()
    {
        return $this->hasOne('App\Sport', 'id', 'sport_id' );
    }

}

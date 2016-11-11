<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'description'];


    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Looping all stages to check completed state
     * @param  $value
     * @return boolean
     */
    public function getIsCompletedAttribute($value)
    {
        foreach($this->stages as $stage) {
            if(! $stage->isCompleted)
                return false;
        }

        return true;
    }
}

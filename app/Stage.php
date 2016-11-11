<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use App\Traits\HasImages;
use App\Traits\HasDocuments;
use App\Traits\VnDateTrait;

class Stage extends Model
{
    use HasDocuments, HasImages, Mediable, VnDateTrait;

    public $incrementing = false;
    protected $fillable = ['id', 'name', 'description', 'started_at', 'finished_at', 'expected_cost', 'actual_cost', 'paid'];
    protected $dates = ['started_at', 'finished_at', 'created_at', 'updated_at'];
    protected $attributes = [
        'started_at' => null,
        'finished_at' => null,
        'expected_cost' => 0,
        'actual_cost' => 0,
        'paid' => false,
    ];
    protected $casts = [
        'paid' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Check if Stage is completed
     * @param  $value
     * @return boolean
     */
    public function getIsCompletedAttribute($value)
    {
        return $this->finished_at !== null && $this->paid == true;
    }



    public function getStartedAtAttribute($value)
    {
        return $this->getDate($value);
    }

    public function setStartedAtAttribute($value)
    {
        $this->attributes['started_at'] = $this->setDate($value);
    }

    public function getFinishedAtAttribute($value)
    {
        return $this->getDate($value);
    }

    public function setFinishedAtAttribute($value)
    {
        $this->attributes['finished_at'] = $this->setDate($value);
    }
}

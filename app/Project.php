<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Traits\VnDateTrait;

class Project extends Model
{
    use VnDateTrait;

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

    public function getTotalActualCostAttribute()
    {
        $totalActualCost = 0;
        foreach($this->stages as $stage) {
            if($stage->actual_cost)
                $totalActualCost += $stage->actual_cost;
        }
        return $totalActualCost;
    }

    public function getTotalExpectedCostAttribute()
    {
        $totalExpectedCost = 0;
        foreach($this->stages as $stage) {
            if($stage->expected_cost)
                $totalExpectedCost += $stage->expected_cost;
        }
        return $totalExpectedCost;
    }

    public function getStartedAtAttribute()
    {
        $startedAt = $this->getDate(date("Y-m-d H:i:s"));
        foreach($this->stages as $stage) {
            if($stage->started_at && $stage->started_at <= $startedAt)
                $startedAt = $stage->started_at;
        }
        return $startedAt;
    }

    public function getFinishedAtAttribute()
    {
        $finishedAt = $this->getDate(date("Y-m-d H:i:s"));
        foreach($this->stages as $stage) {
            if($stage->finished_at && $stage->finished_at >= $finishedAt)
                $finishedAt = $stage->finished_at;
        }
        return $finishedAt;
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

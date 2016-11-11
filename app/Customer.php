<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'email', 'phone', 'address'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

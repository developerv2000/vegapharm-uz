<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementTranslation extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];

  use HasFactory;

  public function achievement()
  {
    return $this->belongsTo(Achievement::class);
  }
}

<?php

namespace App\Models;

use App\Support\Traits\LocaleDependent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarTranslation extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];

  use HasFactory;

  public function star()
  {
    return $this->belongsTo(Star::class);
  }
}

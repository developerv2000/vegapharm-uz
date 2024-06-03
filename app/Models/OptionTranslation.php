<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionTranslation extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];

  use HasFactory;

  public function option()
  {
    return $this->belongsTo(Option::class);
  }
}

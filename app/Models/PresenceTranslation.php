<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresenceTranslation extends Model
{
  public $timestamps = false;
  protected $guarded = ['id'];

  use HasFactory;

  public function presence()
  {
    return $this->belongsTo(Presence::class);
  }
}

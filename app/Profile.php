<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{

  protected $fillable = ['user_id','avatar','about','facebook','youtube'];

  public function user()
  {
      return $this->belongsTo('App\User');
  }
}

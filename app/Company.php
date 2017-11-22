<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='companies';

    protected $fillable=['name', 'address', 'logo'];

   public function saveFile(){
       $logo=request()->file('logo');
       $storagePath=storage_path('app/public');
       $originalName=$logo->getClientOriginalName();
       $logo->move($storagePath, $originalName);
       return $originalName;
   }
}

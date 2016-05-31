<?php 
namespace Modules\Blog\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Type extends Model {

   	protected $table  ='types';
    protected $fillable = [
    		'name',    		
    		'description',
    		'created_at',
    		'updated_at'
    ];

}
<?php 
namespace Modules\Blog\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Document extends Model {

	protected $table = 'documents';
    protected $fillable = [
    		'type_id',
    		'filename',
    		'mime',
    		'original_filename',
    		'description',
    		'created_at',
    		'updated_at'
    ];

}
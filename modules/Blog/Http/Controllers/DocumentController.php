<?php 
namespace Modules\Blog\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Blog\Entities\Type;
use Modules\Blog\Entities\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
class DocumentController extends Controller {
	
	public function index()
	{
		$documents = Document::all();
		return view('blog::documents.index', compact('documents'));
	}

	public function upload(Request $request) {
		$file = $request->file('file_field');
    	$fileName = $file->getClientOriginalName();

    	$file->move(public_path().'/uploads', $fileName);

		$doc = new Document();
		$doc->type_id = 1;
		$doc->mime = $file->getClientMimeType();
		$doc->original_filename = $fileName;
		$doc->filename =$fileName ; 
		$doc->save(); 
		return redirect()->route('documents.index')->withSuccess("Upload thành công!");
		
	}


	public function download($filename)
	{
	
		$doc = Document::where('filename', '=', $filename)->firstOrFail();
		$file = public_path().'/uploads/'.$doc->filename;
		$response = new Response($file, 200);
		return response()->download($file);
	} 

	public function read($filename)
	{		
		$file = Document::where('filename', '=', $filename)->firstOrFail();
		$url = public_path().'/uploads/'.$filename;
		// dd($url);
		return view('blog::documents.view', compact('file','url'));
	}
}
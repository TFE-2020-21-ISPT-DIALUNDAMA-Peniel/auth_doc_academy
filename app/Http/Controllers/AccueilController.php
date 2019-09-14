<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowDocumentRequest;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Validator;

class AccueilController extends Controller
{
	public function index(){
		return view('accueil');
	}

	public function scanCodeBarre(){
		$validator = Validator::make(request()->all(), [
	            'img-code-barre' => 'required|image|max:1000',
        ]);
		if ($validator->fails()) {
	            
	            return $validator->errors();            
	        }
	    $status = "";
	    if (request()->hasFile('img-code-barre')) {
	            $image = request()->file('img-code-barre');
	            // Rename image
	            $filename = time().'.'.$image->guessExtension();
	            
	            $path = request()->file('img-code-barre')->storeAs(
	                 'img-code-barre', $filename
	            );
	            
	            $status = "uploaded,".$path;
	            // $status[1] = $path;

	        }
	        
	        return response($status,200);


	}

	public function store(ShowDocumentRequest $request){
		return redirect()->route('show_document', ['document' => $request->code]);
    }

    public function show_document(Document $document){
    	return view('show_document',compact('document'));
    }


}

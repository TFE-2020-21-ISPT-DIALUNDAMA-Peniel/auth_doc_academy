<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowDocumentRequest;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
	public function index(){
		return view('accueil');
	}

	public function store(ShowDocumentRequest $request){
		return redirect()->route('show_document', ['document' => $request->code]);
    }

    public function show_document(Document $document){
    	$annee = DB::table('annees')->find($document->id_annee);
    	$promotion = DB::table('promotions')->find($document->id_promotion);
    	return view('show_document',['document'=>$document,'annee'=>$annee,'promotion'=>$promotion]);
    }
}

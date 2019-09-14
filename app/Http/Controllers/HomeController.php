<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\DataTables\ListDocumentsDataTable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');   
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListDocumentsDataTable $dataTables)
    {
        return $dataTables->render('home');
    }

    public function uploadDocument(Request $request)
    {
        $file = $request->bulletins->getClientOriginalName();
        $file_name = explode('.',$file)[0]; //on recupere le nom sans l'extention

        // On verifie si le bulletin est en format pdf
        if($request->bulletins->guessClientExtension() != 'pdf' ){
            return response()->json(['error'=>'Extension invalide pour le fichier "'.$file.'". Seules les extensions "pdf" sont autorisées.']);

        }
 
        $path = storage_path('app/public/documents');
        $path_file  = $request->bulletins->move($path,$file);
        // dump(fileperms($path_file)); 
        // chmod($path_file, 0777); // le droit d'accès au fichier
        // dump(fileperms($path_file));
        // dd('h'); 
        
        // on stoque dans la BD
        Document::UpdateOrCreate([
                                    'ref'=>$file_name,
                                    
                                ],
                                [
                                    'file' => 'documents'.DIRECTORY_SEPARATOR.$file_name.'.pdf',
                                ]
                            );

        return response()->json(['uploaded'=>'Document uploader avec succès']);
    }

    public function destroyDocument(Document $document){
        $document->delete();
        return redirect()->back();
    }
}

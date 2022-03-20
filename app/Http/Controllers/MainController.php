<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\StorageHelper;
use Mail;
use Log;
use App\Models\Document;
use App\Mail\DigiPortalMail;
class MainController extends Controller
{

    public function index(){
        return view('contact_us')->with(['page_title'=>'Contactez Nous']);
    }

    public function send_email(Request $request){
        $document_id = 0;
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);
 
        if($request->hasFile('document')){
            
            $document = $request->file('document');
            $file_name = time().".".$document->getClientOriginalExtension();
            $mime_type = $request->document->getMimeType();
            Log::info("Mime type ".$mime_type);
            $document_id = StorageHelper::store_document($file_name,$document,$mime_type);
            
          }
         $body = [
            'name'=> $request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'document_path' => Document::find($document_id)->file_path,
            'mime_type' => $mime_type
         ];
        Mail::to($request->email)->send(new DigiPortalMail($body));
        return back()->with('status','Mail sent successfully');;
    }
}

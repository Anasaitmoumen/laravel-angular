<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the resources list.

        $contacts  = Contact::orderBy('id', 'asc')->paginate(10);
        
        // Check if there is no resource.
        if(is_null($contacts)) {
            return response()->json(["message"=>"No Contact found.", "data"=>[], "errors"=>[], "success"=>true], 204);
        }
        // Return the list of resources.
        return response()->json(["message"=>"Contacts list.", "data"=>$contacts, "errors"=>[], "success"=>true], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // Validate request.
                $contactValidationRules = [
                    'prenom' => ['required', 'string', 'max:250'],
                    'nom' => ['required', 'string', 'max:250'],
                    'email' => ['required', 'email', 'max:250'],
                    'nom_entreprise' =>  ['required', 'string', 'max:250'],
                    'code_postal' => ['required', 'integer'],
                ];
                $contactalidator = validator($request->all(), $contactValidationRules);
                if($contactalidator->fails()) {
                    return response()->json(["message"=>"Errors on adding this Contact.", "data"=>$request->all(), "errors"=>$contactalidator->errors(), "success"=>false], 400);
                }

                   $contactsDouble = Contact::where('nom',  $request->get('nom'))
                                     ->orWhere('prenom',  $request->get('prenom'))
                                     ->orWhereHas('entreprise', function (Builder $whereHasQuery) use($request) {
                                            $whereHasQuery->orWhere('nom_entreprise', $request->get('nom_entreprise'));
                                        })->first();
                  
                   if(!is_null($contactsDouble))
                   {
                       return response()->json(["message"=>"exist", "data"=>$request->all(), "errors"=>[], "success"=>false], 400);
                   }
                  
                  
                
                // save data
                  $entreprise = new Entreprise([
                    'nom_entreprise' => strtoupper($request->get('nom_entreprise')),
                    'code_postal' => $request->get('code_postal'),
                    'adresse' => $request->get('adresse'),
                    'ville' => $request->get('ville'),
                    'statut' => $request->get('statut'),  
                ]);
                $entreprise->save();

                $contact = new Contact([
                    'prenom' =>  strtoupper($request->get('prenom')),
                    'nom' => strtoupper($request->get('nom')),
                    'e_mail' => strtolower( $request->get('e_mail')),
                    'entreprise_id' =>$entreprise->id,  
                ]);
                $contact->save();

                
                // Check if all data was saved.
                if(is_null($contact->id) || is_null($entreprise->id)) {
                    $contact->forceDelete();
                    $entreprise->forceDelete();
                    return response()->json(["message"=>"Errors on adding this Contact.", "data"=>$request->all(), "errors"=>["Unknown errors."], "success"=>false], 400);
                }
               
                // Return result.
                return response()->json(["message"=>"Contact added successfully.", "data"=>Contact::find($contact->id), "errors"=>[], "success"=>true], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($contact_id)
    {
        // Find the contact by id.
        $contact = Contact::where('id', $contact_id)->first();

        // Check if exist.
        if(is_null($contact)) {
            return response()->json(["message"=>"Contact not found.", "data"=>[], "errors"=>["Contact not found."], "success"=>false], 204);
        }

        // Return the contact.
        return response()->json(["message"=>"Contact exist.", "data"=>$contact, "errors"=>[], "success"=>true], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $contact_id)
    {
         // // Validate request.
                $contactValidationRules = [
                    'prenom' => ['required', 'string', 'max:250'],
                    'nom' => ['required', 'string', 'max:250'],
                    'email' => ['required', 'email', 'max:250'],
                    'nom_entreprise' =>  ['required', 'string', 'max:250'],
                    'code_postal' => ['required', 'integer'],
                ];
                $contactalidator = validator($request->all(), $contactValidationRules);
                if($contactalidator->fails()) {
                    return response()->json(["message"=>"Errors on adding this Contact.", "data"=>$request->all(), "errors"=>$contactalidator->errors(), "success"=>false], 400);
                }
         // Find the resource by id.
         $Contact = Contact::where('id', $contact_id)->first();
         // Check if city found.
         if(is_null($Contact)) {
             return response()->json(["message"=>"Contact not found.", "data"=>[], "errors"=>["Contact not found."], "success"=>false], 204);
         }
 
         // Update data.
         $Contact->prenom = $request->get('prenom');
         $Contact->nom = $request->get('nom');
         $Contact->e_mail = $request->get('e_mail');
         $Contact->entreprise_id = $request->get('entreprise_id');
         //
         $Contact->save();
         
        $entreprise = Entreprise::where('id', $request->get('entreprise_id'))->first();
     
        $entreprise->nom_entreprise = $request->get('nom_entreprise');
        $entreprise->code_postal = $request->get('code_postal');
        $entreprise->adresse = $request->get('adresse');
        $entreprise->ville = $request->get('ville');
        $entreprise->statut = $request->get('statut');
        //
        $entreprise->save();

 
         // Return result.
         return response()->json(["message"=>"Contact updated successfully.", "data"=>Contact::find($Contact->id), "errors"=>[], "success"=>true], 202);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact_id)
    {
         // Find the resource by id.
         $contact = Contact::where('id', $contact_id)->first();

         // Check if exist.
         if(is_null($contact)) {
             return response()->json(["message"=>"Contact not found.", "data"=>[], "errors"=>["Contact not found."], "success"=>false], 204);
         }
 
         $contact->save();
         $contact->delete();
 
         // Return results.
         return response()->json(["message"=>"Contact deleted successfully.", "data"=>[], "errors"=>[], "success"=>true], 204);
    }
    public function search(Request $request) {

       $query = Contact::where('id', 'like', '%' . $request->get('keyword') . '%');
        // Query
        if(!is_null($request->get('keyword'))){
            $query->orWhere('nom', 'like', '%' . $request->get('keyword') . '%');
            $query->orWhere('prenom', 'like', '%' . $request->get('keyword') . '%');
            $query->orWhereHas('entreprise', function (Builder $whereHasQuery) use($request) {
                $whereHasQuery->orWhere('nom_entreprise', 'like', '%' . $request->get('keyword') . '%');
            });
        }

        // Get
        $result = $query->paginate(10);

        // Check if exist.
        if(is_null($result)) {
            return response()->json(["message"=>"Nothing's found for this search.", "data"=>[], "errors"=>["Nothing's found for this search."], "success"=>false], 200);
        }

        // Return the resource.
        return response()->json(["message"=>"Search result.", "data"=>['searchResult' => $result, 'initRequest' => $request->all()], "errors"=>[], "success"=>true], 200);
    }

    
    
    public function tri(Request $request){
     $contacts  = Contact::orderby($request->key,$request->method)
                 ->paginate(10);
            // Check if there is no resource.

      if(is_null($contacts)) {
                return response()->json(["message"=>"No contacts found.", "data"=>$contacts, "errors"=>[], "success"=>true], 204);
            }

            // Return the list of resource.
      return response()->json(["message"=>"List of contacts.", "data"=>['orderResult' => $contacts, 'initRequest' => $request->all()], "errors"=>[], "success"=>true], 200);

    }
}

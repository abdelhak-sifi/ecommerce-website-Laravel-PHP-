<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class CategorieController extends Controller
{
    //
    public function SauvgarderCategorie(Request $request){
            $data=array();
            $data['nom']=$request->category;
            DB::table('categories')
                ->insert($data);
            //creation une session avec un message pour afficher lorsque une cat&gorie a crée 
            Session::put('message','Catégorie ajoutée avec succès');
            //redireger vers la page ajouter catégorie aprés la ajout
            return redirect::to('ajouter-categorie');    
    }

    public function SauvgarderEditedCategorie(Request $request){
        
        $data=array();
        $data['nom']=$request->category;
        
        $data_produit=array();
        $data_produit['categorie']=$request->category;
        
        //modifier l'encien categorie dans les produits
        $old_category=DB::table('categories')
        ->where('id',$request->id_category)
        ->first();
        DB::table('produits')
           ->where('categorie',$old_category->nom)
           ->update($data_produit);
        //modifier l'encien categorie dans les categories
        DB::table('categories')
           ->where('id',$request->id_category)
           ->update($data);
        
           Session::put('message','La catégorie est modifier avec succès');
        return redirect::to('modifier-categorie/'.$request->id_category);    
    }

    public function SupprimerCategorie($id){
        //supprimer le produit record dans la base de données              
        DB::table('categories')
        ->where('id',$id)
        ->delete();
        Session::put('message','La categorie est supprimer avec succès');
        return redirect::to('categories');
    } 
    

}

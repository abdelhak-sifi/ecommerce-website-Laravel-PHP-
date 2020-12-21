<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class ProduitController extends Controller
{
    public function SauvgarderProduit(Request $request){
        if($request->category==="Séctionner une catégorie"){
            //creation une session avec un message erreur pour sect categorie
            Session::put('message1','Vous devez sélectionner une catégorie');
            //redireger vers la page ajouter catégorie pour informer l'erreur
            return redirect::to('ajouter-produit');
        }
        else{
            
            //la taille maximum de photo 
            $this->validate($request,[
                'produit_image'=>'image|nullable|max:1999'
            ]);

            if($request->hasFile('produit_image')){
                // 1 : get file name with exention
                $filenameWithExt= $request->file('produit_image')
                ->getClientOriginalName();
                //2 : get just file name
                $filename= pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // 3 : get just the extention 
                $extention= $request->file('produit_image')
                ->getClientOriginalExtension();
                // 4 : file name to store
                $fileNameToStore=$filename.'_'.time().'.'.$extention;
                //5 : path
                $path=$request->file('produit_image')->storeAs('public/produit_images',$fileNameToStore);  
            }else{
                $fileNameToStore='noimage.jpg';
            }

            $data=array();
            $data['nom_produit']=$request->name;
            $data['prix']=$request->price;
            $data['categorie']=$request->category;
            $data['produit_image']=$fileNameToStore;
            $data['status']=$request->status;
        
            DB::table('produits')
               ->insert($data);
            //creation une session avec un message pour afficher lorsque une cat&gorie a crée 
            Session::put('message','Produit ajoutée avec succès');
            //redireger vers la page ajouter catégorie aprés la ajout
            return redirect::to('ajouter-produit'); 
        }
      
    }

    public function ChoixCategorie($nom_categorie){
        $produits=DB::table('produits')
                     ->where('categorie',$nom_categorie)
                     ->get();  
              
        $manage_produits=view('client.shop')->with('produits', $produits);            
        return view('layout.app')->with('client.shop',$manage_produits);
    }

    public function ActiverProduit($id){
        $data=array();
        $data['status']='on';
        DB::table('produits')
        ->where('id',$id)
        ->update($data);
        Session::put('message','Le produit activer avec succès');
        return redirect::to('produits');
    }

    public function DesactiverProduit($id){
        $data=array();
        $data['status']='off';
        DB::table('produits')
        ->where('id',$id)
        ->update($data);
        Session::put('message','Le produit désactiver avec succès');
        return redirect::to('produits');
    }

    public function SauvgarderEditedProduit(Request $request){
        
            //la taille maximum de photo 
            $this->validate($request,[
                'produit_image'=>'image|nullable|max:1999'
            ]);

            if($request->hasFile('produit_image')){
                // 1 : get file name with exention
                $filenameWithExt= $request->file('produit_image')
                ->getClientOriginalName();
                //2 : get just file name
                $filename= pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // 3 : get just the extention 
                $extention= $request->file('produit_image')
                ->getClientOriginalExtension();
                // 4 : file name to store
                $fileNameToStore=$filename.'_'.time().'.'.$extention;
                //5 : path
                $path=$request->file('produit_image')->storeAs('public/produit_images',$fileNameToStore);  
            }else{
                $fileNameToStore='noimage.jpg';
            }

            $data=array();
            $data['nom_produit']=$request->name;
            $data['prix']=$request->price;
            $data['categorie']=$request->category;
            $data['status']=$request->status;
            
            //for delete old photo from storage folder
            if($request->hasFile('produit_image')){
                $produits=DB::table('produits')
                             ->where('id',$request->id_produit)
                             ->first();

                if ($produits->produit_image!='noimage.jpg') {
                    Storage::delete('public/produit_images/'.$produits->produit_image);
                     $data['produit_image']=$fileNameToStore;
                }             
            }
            DB::table('produits')
               ->where('id',$request->id_produit)
               ->update($data);
            //creation une session avec un message pour afficher lorsque une cat&gorie a crée 
            Session::put('message','Produit Modifier avec succès');
            //redireger vers la page modifier catégorie aprés la ajout
            return redirect::to('/modifier-produit/'.$request->id_produit); 
    }

    public function SupprimerProduit($id){
        //supprimer la photo de produit dans le dossier storage/produit_images
        $produit=DB::table('produits')
                      ->where('id',$id)
                      ->first();
        if ($produit->produit_image!='noimage.jpg') {
            Storage::delete('public/produit_images/'.$produit->produit_image);
        } 
        //supprimer le produit record dans la base de données              
        DB::table('produits')
           ->where('id',$id)
           ->delete();
           Session::put('message','Le produit est supprimer avec succès');
           return redirect::to('produits');
    }
}

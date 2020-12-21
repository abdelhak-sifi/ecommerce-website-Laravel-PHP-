<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class SliderController extends Controller
{
    //
    public function SauvgarderSlider(Request $request){
       
       //la taille maximum de photo 
       $this->validate($request,[
        'slider_image'=>'image|nullable|max:1999'
       ]);

       if($request->hasFile('slider_image')){
            // 1 : get file name with exention
            $filenameWithExt= $request->file('slider_image')
            ->getClientOriginalName();
            //2 : get just file name
            $filename= pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // 3 : get just the extention 
            $extention= $request->file('slider_image')
            ->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extention;
            //5 : path
            $path=$request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);       
       } 
       else{
           $fileNameToStore='noimage.jpg';
       }

       $data=array();
       $data['description_one']=$request->des_one;
       $data['description_two']=$request->des_two;
       $data['slider_image']=$fileNameToStore;
       $data['status']=$request->status;
       DB::table('sliders')
               ->insert($data);
        //creation une session avec un message pour afficher lorsque une cat&gorie a crée 
        Session::put('message','Slider ajoutée avec succès');
        //redireger vers la page ajouter catégorie aprés la ajout
        return redirect::to('ajouter-slider');
              

    }

    public function ActiverSlider($id){
        $data=array();
        $data['status']='on';
        DB::table('sliders')
        ->where('id',$id)
        ->update($data);
        Session::put('message','Le slider est activer avec succès');
        return redirect::to('sliders');

    }

    public function DesactiverSlider($id){
        $data=array();
        $data['status']='off';
        DB::table('sliders')
        ->where('id',$id)
        ->update($data);
        Session::put('message','Le slider est désactiver avec succès');
        return redirect::to('sliders');
    }

    public function SauvgarderEditedSlider(Request $request){
       
        //la taille maximum de photo 
        $this->validate($request,[
         'slider_image'=>'image|nullable|max:1999'
        ]);
 
        if($request->hasFile('slider_image')){
             // 1 : get file name with exention
             $filenameWithExt= $request->file('slider_image')
             ->getClientOriginalName();
             //2 : get just file name
             $filename= pathinfo($filenameWithExt,PATHINFO_FILENAME);
             // 3 : get just the extention 
             $extention= $request->file('slider_image')
             ->getClientOriginalExtension();
             // 4 : file name to store
             $fileNameToStore=$filename.'_'.time().'.'.$extention;
             //5 : path
             $path=$request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);       
        } 
        else{
            $fileNameToStore='noimage.jpg';
        }
 
        $data=array();
        $data['description_one']=$request->des_one;
        $data['description_two']=$request->des_two;
        //$data['slider_image']=$fileNameToStore;
        $data['status']=$request->status;
        
        //for delete old photo from storage folder
       if($request->hasFile('slider_image')){
        $sliders=DB::table('sliders')
                     ->where('id',$request->id_slider)
                     ->first();

        if ($sliders->slider_image!='noimage.jpg') {
            Storage::delete('public/slider_images/'.$sliders->slider_image);
             $data['slider_image']=$fileNameToStore;
        }             
       }

        DB::table('sliders')
                ->where('id',$request->id_slider)
                ->update($data);
         //creation une session avec un message pour afficher lorsque une cat&gorie a crée 
         Session::put('message','Slider Modifier avec succès');
         //redireger vers la page ajouter catégorie aprés la ajout
         return redirect::to('modifier-slider/'.$request->id_slider);        
 
     }

     public function SupprimerSlider($id){
        //supprimer la photo de slider dans le dossier storage/slider_images
        $sliders=DB::table('sliders')
        ->where('id',$id)
        ->first();   
        if ($sliders->slider_image!='noimage.jpg') {
            Storage::delete('public/slider_images/'.$sliders->slider_image);
        } 
        //supprimer le slider record dans la base de données
        DB::table('sliders')
                ->where('id',$id)
                ->delete();
        
        Session::put('message','Le slider est supprimer avec succès');
        return redirect::to('sliders');    
    }
}

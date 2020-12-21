<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use Redirect;
class AdminController extends Controller
{
    //
    public function admin(){
        return view('admin.dashboard');
    }

    public function AjouterCategorie(){
        return view('admin.ajouter-categorie');
    }

    public function AjouterProduit(){
        return view('admin.ajouter-produit');
    }

    public function AjouterSlider(){
        return view('admin.ajouter-slider');
    }

    public function AfficherCategroeis(){
        return view('admin.categories');
    }

    public function AfficherProduits(){
        return view('admin.produits');
    }

    public function AfficherSliders(){
        return view('admin.sliders');
    }

    public function ModifierCategorie($id){
        $categorie=DB::table('categories')
        ->where('id',$id)
        ->first();  //pou une seul ligne dans la table  
        $manage_categorie=view('admin.modifier-categorie')->with('categorie',$categorie);            
        return view('layout.appadmin')->with('admin.modifier-categorie',$manage_categorie);
                   
    }

    public function ModifierProduit($id){
        $produits=DB::table('produits')
        ->where('id',$id)
        ->first();
        $manage_produits=view('admin.modifier-produit')->with('produits',$produits);
        return view('layout.appadmin')->with('admin.modifier-produit',$manage_produits);
                   
    }

    public function ModifierSlider($id){
        $sliders=DB::table('sliders')
        ->where('id',$id)
        ->first();
        $manage_sliders=view('admin.modifier-slider')->with('sliders',$sliders);
        return view('layout.appadmin')->with('admin.modifier-slider',$manage_sliders);
                   
    }

    public function AfficherCommandes(){
        $commandes=DB::table('commandes')
        ->get();
        $manage_commandes=view('admin.commandes')->with('commandes',$commandes);
        return view('layout.appadmin')->with('admin.commandes',$manage_commandes);      
    }


    public function GeneratePDF($id){
        Session::put('id' , $id);
        //try {
            $pdf=\App::make('dompdf.wrapper')->setPaper('a4','landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());
            return $pdf->stream();
        /*} catch (\Exception $e) {
            return redirect::to('/commandes')->with('error',$e->getMessage());
        }*/
    }

    public function convert_orders_data_to_html(){
        $commande=DB::table('commandes')
        ->where('id',Session::get('id'))
        ->first();
         
        $name=$commande->nom;
        $adress=$commande->adress;
        $date=$commande->date;
        $panier=unserialize($commande->panier);

        $output='<link rel="stylesheet" href="frontend/css/style.css">
        <table class="table">
                    <thead class="thead">
                         <tr class="text-left">
                               <th>Client : '.$name.'<br> Client Adresse : '.$adress.'<br>Date Commande : '.$date.'<br></th>
                         </tr>
                    </thead>
        </table>';
        
        $output.='<table class="table">
                  <thead class="thead-primary">
                    <tr class="text-center">
                       <th>Image</th>
                       <th>Product name</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>';
        
        foreach ($panier->items as $item) {
            $output.='<tr class="text-center">
                        <td class="image-prod"><img src="storage/produit_images/'.$item['product_image'].'" alt="" style="height:80px; width:80px;" /></td>
                        <td class="product-name">
                           <h3>'.$item['product_name'].'</h3>
                        </td>
                        <td class="price">'.$item['product_price'].'</td>
                        <td class="qty">'.$item['qty'].'</td>
                        <td class="total">'.$item['qty']*$item['product_price'].'</td>
                      </tr>
                     ';
        }

        $output.='</tbody>
                  </table>
                  <table class="table">
                   <thead class="thead">
                      <tr class="text-center">
                         <th>Total</th>
                         <th>'.$panier->total_price.'</th>
                      </tr>
                   </thead>
                  </table>';        
        return $output;      

    }


   
}

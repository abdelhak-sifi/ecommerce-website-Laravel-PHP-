<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use DB,URL;
use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;
class ClientController extends Controller

{
    //

    public function home(){
        return view('client.home');
    }

    public function shop(){
        
        $produits=DB::table('produits')->get();        
        $manage_produits=view('client.shop')->with('produits', $produits);            
        return view('layout.app')->with('client.shop',$manage_produits);
    }

    public function panier(){
        if (!Session::has('cart')) {
            return view('client.panier');
        }

        $oldCard = Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCard);
        return view('client.panier',['produits'=>$cart->items]);
    }

    public function payement(){
        return view('client.payement');
    }

    public function test(){
        return view('client.Test');
    }

    public function AjouterAuPanier($id){
        $produit=DB::table('produits')
                    ->where('id',$id)
                    ->first();
        $oldCard = Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCard); 
        $cart->add($produit,$id); 
        Session::put('cart',$cart);

        return Redirect::back();
    }

    public function ModifierQuantite(Request $request){
        
        $oldCard = Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCard); 
        
        $cart->modifierquantiy($request->quantity,$request->id_produit); 
        Session::put('cart',$cart);
        return redirect::to('/panier');

    }   

    public function supprimerArticle($id){
          $oldCard = Session::has('cart') ? Session::get('cart'):null;
          $cart=new Cart($oldCard); 
          $cart->SupprimerItem($id);
          if (count($cart->items)>0) {
            Session::put('cart',$cart);
          }else{
            Session::put('cart',null);
          } 
         
          return redirect::to('/panier');
    } 
    
    public function PayementPanier(Request $request){
        if(!Session::has('cart')){
            return redirect::to('/panier'); 
            // , ['Products' => null]           
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_51HIcmyB7oga629UE4ygVqJtQScWSzkMI3zZMYet40EKAuNza74I6pzjTxYrEGxIob6Y9UYnd9vbxhh9B3OpbNmb800LIKIXGV1');
        try{
            $charge=Charge::create(array(
                "amount" => $cart->total_price * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));
            /* les info inserted in commande table*/ 
            $data['nom']=$request->nom;
            $data['adress']=$request->adress;
            $data['panier']=serialize($cart);
            $data['payement_id']=$charge->id;
            //inserer les info
            DB::table('commandes')
               ->insert($data);

        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect::to('/payement');
        }

        Session::forget('cart');
        Session::put('success', 'Achat réussi!');
        return redirect::to('/panier');
      
    }
    
}
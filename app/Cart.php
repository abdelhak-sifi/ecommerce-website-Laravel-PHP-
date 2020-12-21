<?php

namespace App;



class Cart {
    
    public $items=null;
    public $total_quantity=0;
    public $total_price=0;

    public function __construct($oldCard){
        if ($oldCard) {
           $this->items=$oldCard->items;
           $this->total_quantity=$oldCard->total_quantity;
           $this->total_price=$oldCard->total_price;
        }
    }

    public function add($item,$id_produit){
        $storeditem=['qty'=>0,'product_id'=>0,'product_name'=>$item->nom_produit,'product_price'=>$item->prix,'product_image'=>$item->produit_image,'item'=>$item];

        if ($this->items) {
          if (array_key_exists($id_produit,$this->items)) {
            $storeditem=$this->items[$id_produit];
          }
        }
 
        $storeditem['qty']++;
        $storeditem['product_id']=$id_produit;
        $storeditem['product_name']=$item->nom_produit;
        $storeditem['product_price']=$item->prix;
        $storeditem['product_image']=$item->produit_image;
        
        $this->total_quantity++;
        $this->total_price+=$item->prix;
        $this->items[$id_produit]=$storeditem;
    }

    public function modifierquantiy($qty,$id_produit){
         $this->total_quantity -= $this->items[$id_produit]['qty'];
         $this->total_price -= $this->items[$id_produit]['product_price']*$this->items[$id_produit]['qty'];
         $this->total_quantity+=$qty;
         $this->total_price +=$this->items[$id_produit]['product_price']*$qty;
         $this->items[$id_produit]['qty']=$qty;

         
    }

    public function SupprimerItem($id){
      $this->total_quantity -= $this->items[$id]['qty'];
      $this->total_price -= $this->items[$id]['product_price']*$this->items[$id]['qty'];
      unset($this->items[$id]);
    }
}

@extends('layout.appadmin')
@section('title')
Produits
@endsection
<?php
   $inc=1;
   $produits=DB::table('produits')
                ->get();
?>
@section('admincontent')
<div class="main-panel">
        <div class="content-wrapper">
          <!--message apres activer et désactiver produit-->
          <?php $message=Session::get('message'); ?>
          @if($message)
            <div class="alert alert-success" role="alert">
              <?php echo $message; Session::put('message',null); ?>
            </div>
          @endif
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Produits</h4>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Catégoris</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($produits as $produit)
                            <tr>
                              <td>{{$inc}}</td>
                            <td><img src="storage/produit_images/{{$produit->produit_image}}" alt="" ></td> 
                              <td>{{$produit->nom_produit}}</td>
                              <td>{{$produit->prix}} DZ</td> 
                              <td>{{$produit->categorie}}</td>    
                              @if($produit->status==='on')
                                <td>
                                <label class="badge badge-success">Activer</label>
                                </td>
                              @else 
                                <td>
                                  <label class="badge badge-danger">Désactiver</label>
                                </td>
                              @endif
                              
                              <td>
                                <button class="btn btn-outline-primary"><a href="{{URL::to('/modifier-produit/'.$produit->id)}}">Modifier</a></button>
                                <button class="btn btn-outline-danger"><a href="{{URL::to('/supprimer-produit/'.$produit->id)}}" id="delete">Supprimer</a></button>
                                @if ($produit->status==='on')
                                  <button class="btn btn-outline-warning"><a href="{{URL::to('/desactiver/'.$produit->id)}}">Désactiver</a></button>
                                @else
                                <button class="btn btn-outline-success"><a href="{{URL::to('/activer/'.$produit->id)}}">Activer</a></button>
                                @endif
                              </td>
                            </tr> 
                            <?php ++$inc; ?>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection
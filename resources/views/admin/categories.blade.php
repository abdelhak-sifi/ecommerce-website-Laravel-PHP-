@extends('layout.appadmin')
@section('title')
Catégories
@endsection
@section('admincontent')
<?php
   $inc=0;
   $categories=DB::table('categories')
                ->get();
?>
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
                  <h4 class="card-title">Catégories</h4>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $categorie)
                             <tr>
                               <td>{{$inc}}</td>
                               <td>{{$categorie->nom}}</td>    
                               <td>
                                <button class="btn btn-outline-primary">
                                <a href="{{URL::to('/modifier-categorie/'.$categorie->id)}}">Modifier</a>
                                </button>
                                <button class="btn btn-outline-danger">
                                  <a href="{{URL::to('/supprimer-categorie/'.$categorie->id)}}" id="delete">Supprimer</a>
                                  </button>
                               </td>
                             </tr>
                             <?php ++$inc ?>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection
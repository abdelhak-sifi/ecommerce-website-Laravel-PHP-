@extends('layout.appadmin')
@section('title')
Commandes
@endsection
@section('admincontent')
<div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Commandes</h4>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Noms</th>
                                <th>Adresse</th>
                                <th>Panier</th>
                                <th>Payement ID</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                              
                               @foreach ($commandes as $commande)
                               <tr>
                                   <td>{{$commande->id}}</td>
                                   <td>{{$commande->date}}</td>
                                   <td>{{$commande->nom}}</td>
                                   <td>{{$commande->adress}}</td>
                                   <td>
                                    @foreach (unserialize($commande->panier)->items as $item)
                                         {{$item['product_name'].' '}}
                                       @endforeach  
                                   
                                   </td>
                                   <td>{{$commande->payement_id}}</td>
                                   <td>
                                   <button class="btn btn-outline-success"><a href="{{URL::to('/voir-pdf/'.$commande->id)}}">Voir PDF</a></button> 
                                   </td>
                                </tr>    
                               @endforeach
                               
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection
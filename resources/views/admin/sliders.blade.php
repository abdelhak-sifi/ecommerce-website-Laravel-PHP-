@extends('layout.appadmin')
@section('title')
Sliders
@endsection
<?php
  $inc=1;
  $sliders=DB::table('sliders')
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
                  <h4 class="card-title">Sliders</h4>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Image</th>
                                <th>Description one</th>
                                <th>Description two</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($sliders as $slider)
                              <tr>
                              <td>{{$inc}}</td>
                              <td><img src="storage/slider_images/{{$slider->slider_image}}" alt=""></td> 
                              <td>{{$slider->description_one}}</td> 
                              <td>{{$slider->description_two}}</td>    
                              <td>
                                @if ($slider->status==='on')
                                  <label class="badge badge-success">Active</label>
                                @else
                                  <label class="badge badge-warning">Désactive</label> 
                                @endif
                              </td>
                              <td>
                                <button class="btn btn-outline-primary"><a href="{{URL::to('/modifier-slider/'.$slider->id)}}">Modifier</a></button>
                                <button class="btn btn-outline-danger"><a href="{{URL::to('/supprimer-slider/'.$slider->id)}}" id="delete">Supprimer</a></button>
                                @if ($slider->status==='on')
                              <button class="btn btn-outline-warning"><a href="{{URL::to('/desactiver-slider/'.$slider->id)}}">Désactiver</a></button>
                                @else
                                 <button class="btn btn-outline-success"><a href="{{URL::to('/activer-slider/'.$slider->id)}}">Activer</a></button>  
                                @endif
                              </td>
                             </tr>
                            <?php ++$inc ;?> 
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection
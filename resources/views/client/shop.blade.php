@extends('layout.app')

@section('title')
Shop
@endsection
<?php 
/*$produits=DB::table('produits')->get();*/
$categories=DB::table('categories')->get();  
?>
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
					<li><a class="{{(URL::to('/shop')===URL::current()) ? 'active' : '' }}" href="{{URL::to('/shop')}}">All</a></li>
					@foreach ($categories as $categorie)
					<li>
					<a  class="{{(URL::to('/shop/categorie/'.$categorie->nom)===URL::current()) ? 'active' : '' }}" href="{{URL::to('/shop/categorie/'.$categorie->nom)}}">{{$categorie->nom}}</a></li>
					@endforeach
    				</ul>
    			</div>
    		</div>
    		<div class="row">
				@foreach ($produits as $produit)
				@if($produit->status==='on')
				<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="/storage/produit_images/{{$produit->produit_image}}" alt="Colorlib Template">
    						<!--<span class="status">30%</span>-->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$produit->nom_produit}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><!--<span class="mr-2 price-dc">DZ</span>--><span class="price-sale">{{$produit->prix}} DZ</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="{{URL::to('/ajouter-panier/'.$produit->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
				</div>
				@endif
				@endforeach
    		</div>
    	   <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
   
@endsection


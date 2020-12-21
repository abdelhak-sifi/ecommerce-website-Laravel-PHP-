@extends('layout.app')

@section('title')
Payement
@endsection

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
@if(Session::has('cart'))
<section class="ftco-section">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-xl-7 ftco-animate">
		  {!! Form::open(['action' => 'ClientController@PayementPanier','method'=>'POST','class'=>'form-horizontal','id'=>'checkout-form','enctype'=>'multipart/form-data']) !!}  
				<!--<form action="#" class="billing-form">-->
				<fieldset>
				<h3 class="mb-4 billing-heading">Details de Payement</h3>
				<h3 class="mb-4 billing-heading">Montant total : <strong>{{Session::get('cart')->total_price}} DZ</strong></h3>
				@if(Session::get('error')) <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div> <?php Session::put('error',null); ?>@endif
				<div class="row align-items-end">
					<div class="col-md-12">
				  <div class="form-group">
					  <label for="firstname">Noms</label>
					<input type="text" class="form-control" placeholder="" name="nom">
				  </div>
				</div>
				<div class="col-md-12">
				  <div class="form-group">
				  <label for="streetaddress"> Address</label>
				<input type="text" class="form-control" placeholder="House number and street name" name="adress">
			  </div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  <label for="firstname">Noms sur la carte</label>
				  <input type="text" class="form-control" placeholder="" id="card_name" name="card_name">
				</div>
			  </div>
			  <div class="col-md-12">
				  <div class="form-group">
					<label for="firstname">Numero de la carte</label>
					<input type="text" class="form-control" placeholder="" id='card-number' name="num_card">
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label for="firstname">Mois d'expiration</label>
					<input type="text" class="form-control" placeholder="" id='expiry-month-card' name="month_exp">
				  </div>
				</div>  
				<div class="col-md-6">
				  <div class="form-group">
					<label for="firstname">Année d'expiration</label>
					<input type="text" class="form-control" placeholder="" id='expiry-year-card' name="year_exp">
				  </div>
				</div>  
				<div class="col-md-12">
				  <div class="form-group">
					<label for="firstname">CVC</label>
					<input type="text" class="form-control" placeholder="" id='cvv_id' name="cvc">
				  </div>
				</div>     
				<div>
					<div class="form-group">
					 <input type="submit" class="btn btn-primary" value="Acheter">
					</div> 
				</div>
			  <div class="w-100">
			  </div>
			  
			  </div>
			  
			</fieldset>
			{!! Form::close() !!}
			<!-- </form>END -->
			
				  </div>
				  <div class="col-xl-5">
			
				 </div> <!-- .col-md-8 -->
	  </div>
	</div>
  </section> <!-- .section -->

@endif
    

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

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="src/js/payement.js"></script>
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
@endsection  



  </body>
</html>
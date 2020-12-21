@extends('layout.appadmin')
@section('title')
Modifier Produit
@endsection
@section('admincontent')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
               <div class="col-lg-12">
               <!--message apres creation catégorie-->
               <?php $message=Session::get('message'); ?>
               @if($message)
                 <div class="alert alert-success" role="alert">
                    <?php echo $message; Session::put('message',null); ?>
                  </div>
               @endif
               <!--end message-->
               <!--message erreur creation catégorie-->
               <?php $message=Session::get('message1'); ?>
               @if($message)
                 <div class="alert alert-danger" role="alert">
                    <?php echo $message; Session::put('message1',null); ?>
                  </div>
               @endif
               <!--end message--> 
                 <div class="card">
                   <div class="card-body">
                     <h4 class="card-title">Modifer produit</h4>
                     {{--<form class="cmxform" id="commentForm" method="get" action="#">--}}
                      {!! Form::open(['action' => 'ProduitController@SauvgarderEditedProduit','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!} 
                      <fieldset>
                         <div class="form-group">
                           <label for="cname">Nom </label>
                         <input id="cname" class="form-control" name="name" minlength="2" type="text" value="{{$produits->nom_produit}}" required >
                         </div>
                         <div class="form-group">
                            <label for="cname">Prix</label>
                            <input id="cname" class="form-control" name="price" minlength="2" type="number" value="{{$produits->prix}}" required>
                         </div>
                        <div class="form-group">
                            <?php 
                              $categories=DB::table('categories')
                                            ->where('nom',"!=",$produits->categorie)
                                            ->get();
                                             
                            ?>
                            <label for="cname">Catégorie</label>
                            <select class="form-control" name="category"> 
                            <option>{{$produits->categorie}}</option>
                                @foreach ( $categories as $categorie)
                                  <option>{{$categorie->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cname">Image</label>
                            {{Form::file('produit_image',['id' => 'cname',
                            'class' =>'form-control'])}}
                            {{--<input id="cname" class="form-control" name="image" minlength="2" type="file" required>--}}
                        </div>
                        <div class="form-group">
                            <input  type="hidden" name="status" required value="{{$produits->status}}">
                            <input id="cname" class="form-control" name="id_produit" minlength="2" type="hidden" value="{{$produits->id}}" required >
                        </div>
                         <input class="btn btn-primary" type="submit" value="Modifier Produit">
                       </fieldset>
                       {!! Form::close() !!}
                     {{--</form>--}}
                   </div>
                 </div>
               </div>
             </div>    
@endsection


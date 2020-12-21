@extends('layout.appadmin')
@section('title')
Modifier Catégorie
@endsection
@section('admincontent')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">
               <div class="col-lg-12">
                 <!--message modification catégorie-->
                 <?php $message=Session::get('message'); ?>
                 @if($message)
                   <div class="alert alert-success" role="alert">
                     <?php echo $message; Session::put('message',null); ?>
                   </div>
                 @endif
                 <!--end message-->
                 <div class="card">
                   <div class="card-body">
                     <h4 class="card-title">Modifier Catégorie</h4>
                     <!--<form class="cmxform" id="commentForm" method="get" action="#">-->
                        {!! Form::open(['action' => 'CategorieController@SauvgarderEditedCategorie','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                       <fieldset>
                         <div class="form-group">
                           <label for="cname">Catégorie</label>
                         <input id="cname" class="form-control" name="category" minlength="2" type="text" required value="{{$categorie->nom}}">
                         <input id="cname" class="form-control" name="id_category" minlength="2" type="hidden" required value="{{$categorie->id}}">
                         </div>
                         <input class="btn btn-primary" type="submit" value="Modifier Catégorie">
                       </fieldset>
                       {!! Form::close() !!}
                    <!-- </form>-->
                   </div>
                 </div>
               </div>
             </div>    
@endsection

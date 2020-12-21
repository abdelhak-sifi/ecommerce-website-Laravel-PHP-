@extends('layout.appadmin')
@section('title')
Ajouter Catégorie
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
                 <div class="card">
                   <div class="card-body">
                     <h4 class="card-title">Ajouter Catégorie</h4>
                     <!--<form class="cmxform" id="commentForm" method="get" action="#">-->
                        {!! Form::open(['action' => 'CategorieController@SauvgarderCategorie','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                       <fieldset>
                         <div class="form-group">
                           <label for="cname">Catégorie</label>
                           <input id="cname" class="form-control" name="category" minlength="2" type="text" required>
                         </div>
                         <input class="btn btn-primary" type="submit" value="Ajouter Catégorie">
                       </fieldset>
                    <!-- </form>-->
                   </div>
                 </div>
               </div>
             </div>    
@endsection

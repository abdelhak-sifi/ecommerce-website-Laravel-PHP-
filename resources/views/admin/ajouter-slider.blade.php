@extends('layout.appadmin')
@section('title')
Ajouter Slider
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
                     <h4 class="card-title">Ajouter Slider</h4>
                    <!-- <form class="cmxform" id="commentForm" method="get" action="#">-->
                      {!! Form::open(['action' => 'SliderController@SauvgarderSlider','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                       <fieldset>
                         <div class="form-group">
                           <label for="cname">Description one</label>
                           <input id="cname" class="form-control" name="des_one" minlength="2" type="text" required>
                         </div>
                         <div class="form-group">
                            <label for="cname">Description two</label>
                            <input id="cname" class="form-control" name="des_two" minlength="2" type="text" required>
                         </div>
                        <div class="form-group">
                            <label for="cname">Image</label>
                            <!--<input id="cname" class="form-control" name="name" minlength="2" type="file" required>-->
                            {{Form::file('slider_image',['id' => 'cname',
                            'class' =>'form-control'])}}
                        </div>
                        <div class="form-group">
                            <label for="cname">Status</label>
                            <input  type="checkbox" name='status' required>
                        </div>
                         <input class="btn btn-primary" type="submit" value="Ajouter Produit">
                       </fieldset>
                       {!! Form::close() !!}
                     <!--</form>-->
                   </div>
                 </div>
               </div>
             </div>    
@endsection
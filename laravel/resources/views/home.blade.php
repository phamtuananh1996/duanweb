@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <i class="icon icon-material-favorite">tesst the bootstrap metarinal design</i>
                        <div class="main-container__column">    
                        <div class="form-group materail-input-block">
                         <input class="form-control materail-input" placeholder="Your placeholder" disabled>
                        <span class="materail-input-block__line"></span>
                    </div>  
                 </div>  
                </div>
                <div class="main-container__column">        
                <div class="form-group materail-input-block materail-input-block_danger">
                    <input class="form-control materail-input" placeholder="Your placeholder">
                    <span class="materail-input-block__line"></span>
                </div>
                </div>
                <div class="main-container__column">    
                <div class="form-group materail-input-block materail-input_slide-line">
                    <input class="form-control materail-input" placeholder="Your placeholder">
                    <span class="materail-input-block__line"></span>
                </div>  
            </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

    @extends('layouts.main')

@section('content')

@foreach($drinks as $drink)  
<div id="special" class="tm-page-content">
            <div class="tm-special-items">
              <div class="tm-black-bg tm-special-item">
                <img src="{{ asset('assets/img/'. $drink->image) }}" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">{{$drink->title}}</h2>
                  <p class="tm-special-item-text">{{$drink->content}}</p>  
                </div>
              </div>
             
         @endforeach     
          <!-- end Special Items Page -->


@endsection
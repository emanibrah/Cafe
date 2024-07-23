@extends('layouts.main')

@section('content')


<!-- Drink Menu Page -->
<div id="drink" class="tm-page-content">
  <!-- Drink Menu Page -->
  <nav class="tm-black-bg tm-drinks-nav">
    <ul>
      @foreach($categories as $category)
      <li>
        <a href="#{{ $category->id }}" class="tm-tab-link" data-id="{{ $category->cate_name }}">{{ $category->cate_name }}</a>
      </li>
      @endforeach
    </ul>
  </nav>

  @foreach($categories as $category) 
  <div id="{{ strtolower($category->cate_name) }}" class="tm-tab-content">
    <div class="tm-list">
      @foreach($drinks->where('category_id', $category->id) as $drink)
      <div class="tm-list-item">
        <img src="{{ asset('assets/img/' . $drink->image) }}" alt="Image" class="tm-list-item-img">
        <div class="tm-black-bg tm-list-item-text">
          <h3 class="tm-list-item-name">{{ $drink->title }}<span class="tm-list-item-price">${{ $drink->price }}</span></h3>
          <p class="tm-list-item-description">{{ $drink->content }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endforeach
  <!-- end Drink Menu Page -->
</div>
          

@endsection



@php
    $categories = \App\Models\Category::all();
@endphp



<div class="sidebar mt-5" id="mySidebar">
  <button class="close-btn" onclick="closeNav()"><i class="fa fa-times"></i></button>
  <div style="border: 2px solid #0d6efd">
    <h3 class="text-primary text-center" style="">Categories</h3>
  </div>
  @foreach ($categories as $category)
   <p class="d-inline"><a href="/posts?category={{ $category->slug }}"><i class="bi bi-caret-right"></i> {{ $category->name }}</a></p>
  @endforeach
</div>



@section('title','Posts')
{{-- HEAR IF SESSION HAVE A USER SESSION SHOW THIS PAGE IF NOT RETUTN ERORR HAVE A LOGIN PAGELINK  --}}
@if (session()->has('user'))

<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand">Hi I Am <b>{{session('user')['name']}}</b></div>
        {{-- Home Linke --}}
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
          </ul>
          {{-- Count of Posts Has Like Of This User --}}
        <div class="posts_has_likes mx-2 ml-auto">
          <a href="{{route('posts.likes')}}" class="btn btn-primary">
            Posts Has Likes 
            <span class="badge badge-light">
              {{DB::table('likes')->where('user_id',session('user')['id'])->count()}}
            </span>
          </a>
        </div>
         {{-- Logout --}}
        <div class="mx-3"><a href="logout">Logout</a></div>
    </nav>
    {{-- Post Section --}}
      <section class="posts">
      @foreach ($posts as $post)
      <div class="card w-50 mx-auto my-5">
        <div class="card-header">
          <span>POST ID <b>{{$post->id}}</b></span>
          {{-- If this Post Likes Count > 0 make this action [Delete Like]--}}
          @if ($post->likes->where('user_id',session('user')['id'])->where('post_id',$post->id)->count()>0)
          <span class="float-right"  wire:click='dislike({{$post->id}},{{session('user')['id']}})'>
            <i class="fas fa-heart"></i>
          </span>
          @else 
          {{-- If this Post Likes Count < 0 make this action [Add Like]--}}
          <span class="float-right"  wire:click='store({{$post->id}},{{session('user')['id']}})'>
            <i class="far fa-heart"></i>
          </span>
          @endif
          {{-- This Count Of Likes For This Post --}}
            <span class="likes float-right mr-3">{{$post->likes->count()}}</span>
        </div>
        <div class="card-body">
        {{-- This Is a Post Content --}}
          <p class="card-text">{{$post->post}}</p>
        </div>
      </div>
          
      @endforeach
    </section>
</div>

@else
{{-- HEAR IF NOT --}}
<div>
  <div class="alert alert-danger">
    Cant Browes This Page directley <a href="/" class="text-danger font-weight-bold">Back</a>
  </div>
 
</div>

@endif

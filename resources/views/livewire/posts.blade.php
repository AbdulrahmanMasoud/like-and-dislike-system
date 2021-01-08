@section('title','Posts')
{{-- HEAR IF SESSION HAVE A USER SESSION SHOW THIS PAGE IF NOT RETUTN ERORR HAVE A LOGIN PAGELINK  --}}
@if (session()->has('user'))

<div>
  <style>
    .liked .far{
      color: red;
    }
  </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand">Hi I Am <b>{{session('user')['name']}}</b></div>
        <div class="ml-auto"><a href="logout">Logout</a></div>
      </nav>
      <section class="posts">
      @foreach ($posts as $post)

      <div class="card w-50 mx-auto my-5">
        <div class="card-header">
          <span>POST ID <b>{{$post->id}}</b></span>
          @if ($post->likes->where('user_id',session('user')['id'])->where('post_id',$post->id)->count()>0)
          <span class="float-right"  wire:click='dislike({{$post->id}},{{session('user')['id']}})'>
            <i class="fas fa-heart"></i>
          </span>
          @else 
          <span class="float-right"  wire:click='store({{$post->id}},{{session('user')['id']}})'>
            <i class="far fa-heart"></i>
          </span>
          @endif
          
            <span class="likes float-right mr-3">{{$post->likes->count()}}</span>
          
          
          
        </div>
        <div class="card-body">
        
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

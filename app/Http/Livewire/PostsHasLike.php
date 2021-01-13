<?php

namespace App\Http\Livewire;
use App\Models\Like;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PostsHasLike extends Component
{

    
     // THIS FUNCTION TO DELETE LIKES FROM Posts has LIKE TABLE
     public function dislike($post_id,$user_id){
         Like::where('post_id',$post_id)->where('user_id',$user_id)->delete();
      }
    public function render()
    {
        // Here To Get a Posts Has Like For This User
        $posts_has_likes = DB::table('posts')->
        select('posts.id','posts.post')->
        join('likes','likes.post_id','=','posts.id')->
        where('user_id',session('user')['id'])->get();
        
        return view('livewire.posts-has-like',['posts_has_likes'=>$posts_has_likes]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Posts extends Component
{
    // THIS FUNCTION TO SAVE LIKES IN LIKE TABLE
    public function store($post_id,$user_id){
       Like::create([
            'post_id'=>$post_id,
            'user_id'=>$user_id,
            
        ]);
        
    }
    // THIS FUNCTION TO DELETE LIKES FROM LIKE TABLE
    public function dislike($post_id,$user_id){
        Like::where('post_id',$post_id)->where('user_id',$user_id)->delete();
     }
    
     
  

    public function render()
    {
        //THIS TO DISPLAY ALL POSTS IN POST PAGE
        $posts = Post::orderBy('id','DESC')->get();
        return view('livewire.posts',['posts'=>$posts]);

        
    }

    
 
}

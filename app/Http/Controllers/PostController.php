<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\softDeletes;
class PostController extends Controller
{
    public function index(){
        $posts= Post::all();
          
        return view('posts', compact('posts'));
        
    }


public function create(){
$postsArr=[
        [
              'title'=> 'title of post from phpstorm',
              'content'=> 'some interesting content',
              'image'=> 'imageblabla.jpg',
              'likes'=> 20,
              'is_published'=> 1,
        ],
        [
            'title'=> 'another title of post from phpstorm',
            'content'=> 'another some interesting content',
            'image'=> 'another imageblabla.jpg',
            'likes'=> 50,
            'is_published'=> 1,
      ],
        ];
 Post::create(['title'=> 'title of post from phpstorm',
              'content'=> 'some interesting content',
              'image'=> 'imageblabla.jpg',
              'likes'=> 20,
              'is_published'=> 1,
            ]);

            foreach($postsArr as $item){
               Post::create($item);

            }
      dd('ir');     
}
public function update(){
    $post=Post::find(6);

    $post->update([
        'title'=> 'updated',
        'content'=> 'updated',
        'image'=> 'updated',
        'likes'=> 10000,
        'is_published'=> 0,
    ]);
    dd('updated');
}
public function delete(){
    $post=Post::withTrashed()->find(3);
    $post->restore();
    dd('ir');
}

public function firstOrCreatePost (){
    $post=Post::find(3);
  /*  $anotherPost=[
           'title'=> 'title of post from phpstorm',
              'content'=> 'some interesting content',
              'image'=> 'imageblabla.jpg',
              'likes'=> 200,
              'is_published'=> 1,
    ];*/

    $post = Post::firstOrCreate([

        'title'=> 'some title phpstorm',
    ],
    [
              'title'=> 'some title of post from phpstorm',
              'content'=> 'some some interesting content',
              'image'=> 'some imageblabla.jpg',
              'likes'=> 2000,
              'is_published'=> 1,
    ]);
    dump($post->content);
    dd('finish');
}
public function updateOrCreatePost(){
    $anotherPost=[
            'title'=> 'update from phpstorm',
           'content'=> 'update interesting content',
           'image'=> 'updateimageblabla.jpg',
           'likes'=> 700,
           'is_published'=> 0,
 ];

 $post = Post::updateOrCreate([
    'title'=> 'nav title of post from phpstorm',
 ],
 [
            'title'=> 'nav title of post from phpstorm',
           'content'=> 'jauns update interesting content',
           'image'=> 'ajunskasupdateimageblabla.jpg',
           'likes'=> 750,
           'is_published'=> 0,
 ]);
 dump($post->content);
    dd('finish');
}

}
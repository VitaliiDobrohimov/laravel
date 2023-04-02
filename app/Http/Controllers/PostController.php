<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  function index(){
        $post = Post::where('ispublished',0)->get();
        //$str = 'string';
        foreach ($post as $item) {
            dump($item->id);
        }
        $posts = Post::all();
        foreach ($posts as $post1) {
            dump($post1->content);
        }
        foreach ($posts as $value) {
            dump($value->ispublished);
        }
        //var_dump($str);
        dump($post);
        dd('end');
    }
    public function create(){
        $postsArr =
            [[
               'title'=>'title of post from intellij',
               'content'=>'some interesting content ',
               'image'=>'image.jpg',
               'likes'=>23,
               'ispublished'=>1,

                ],
           [
               'title'=>' another title of post from intellij',
               'content'=>'another some interesting content ',
               'image'=>'another image.jpg',
               'likes'=>265,
               'ispublished'=>1,

           ]];
        foreach ($postsArr as $post){
            Post::create($post);
        }

        dd('created');
    }
    public function update(){

        $post = Post::find(6);
        //dd($post);
        $post->update([
            'title'=>'updated',
            'content'=>'updated',
            'image'=>'updated',
            'likes'=>111,
            'ispublished'=>1,
        ]);
        dd('updated');
    }
    public function delete(){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');

    }

    public function firstOrCreate(){
        $post = Post::find(1);
        $anotherPost =[
            'title'=>'some post',
            'content'=>'some content',
            'image'=>'some image.jpg',
            'likes'=>2,
            'ispublished'=>1,
        ];
        $post = Post::firstOrCreate([
            'title'=> ' same title of post from intellij'
        ],[
            'title'=>' same title of post from intellij',
            'content'=>'some content',
            'image'=>'some image.jpg',
            'likes'=>2,
            'ispublished'=>1,
        ]);
        dump($post->content);
        dd('end');
    }

    public function updateOrCreate(){
        $anotherPost =[
            'title'=>'updateorcreate some post',
            'content'=>'updateorcreate some content',
            'image'=>'updateorcreate some image.jpg',
            'likes'=>2322,
            'ispublished'=>0,
        ];
        $post = Post::updateOrCreate([
            'title'=> 'same title of post from intellij'
        ],[
            'title'=>'same title of post from intellij',
            'content'=>'updateorcreate some content',
            'image'=>'updateorc   reate some image.jpg',
            'likes'=>2322,
            'ispublished'=>0,
        ]);
        dd('получилосб');
    }
}

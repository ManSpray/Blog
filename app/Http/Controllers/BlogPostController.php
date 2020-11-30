<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    // array imitates our model
    // private $blogPosts = [
    //     ['id' => 1, 'title' => 'Title 1', 'text' => 'Some text 1'],
    //     ['id' => 2, 'title' => 'Title 2', 'text' => 'Some text 2']
    // ];
    public function index()
    {
        // return $this->blogPosts;
        // return view('blogposts', ['posts' => $this->blogPosts]);
        // apacioje kaip su DB
        // $posts = DB::table('blogposts')->orderBy('created_at', 'desc')->get();
        // return view('blogposts', ['posts' => $posts]);

        return view('blogposts', ['posts' => \App\Models\Blogpost::all()]); // MODEL::all() → SELECT ALL ROWS
    }

    public function show($id)
    {
        // foreach($this->blogPosts as $blogPost){
        //     if($blogPost['id'] == $id){
        //         return $blogPost;
        //     }
        // }
        // In the controller
        // Retrieve a model by its primary key...
        // return \App\Models\Blogpost::find($id);
        return view('blogpost', ['post' => \App\Models\Blogpost::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas! Galime pažiūrėti, kas bus jei bus neteisingas
            'title' => 'required|unique:blogposts,title|max:9',
            'text' => 'required',
        ]);

        // -uzkomentuotas debuginimas   
        // var_dump($request['title']);
        // dd($request);    //labai gerai debugint, testint
        $pb = new \App\Models\Blogpost();
        $pb->title = $request['title'];
        $pb->text = $request['text'];
        $pb->user_id = auth()->user()->id; //autoriaus susiejimas su blogpostu p.s. galima ir Auth:user()->id naudot

        return ($pb->save() !== 1) ?
            redirect('/posts')->with('status_success', 'Post created!') :
            redirect('/posts')->with('status_error', 'Post was not created!');

        // +-primityvi validacija irgi gali būti taip padaryta
        // if($pb->title == NULL or $pb->text == NULL)
        //     return redirect('/posts')->with('status_error', 'Post was not created!');

        // -uzkomentuotas debuginimas
        // return ($pb->save() == 1) ? "OK" : "NOT OK";

        // -uzkomentuota nes be validatyvumo
        // $pb->save();
        // return redirect('/posts');

    }

    public function destroy($id)
    {
        if (Gate::denies('delete-post', \App\Models\Blogpost::find($id)))
            return redirect()->back()->with('status_error', 'You can\'t delete this post!');

        \App\Models\Blogpost::destroy($id);
        return redirect('/posts')->with('status_success', 'Post deleted!');
    }

    public function update($id, Request $request)
    {
        // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        // galime pažiūrėti, kas bus jei bus neteisingas
        $this->validate($request, [
            'title' => 'required|unique:blogposts,title, ' . $id . ',id|max:9',
            'text' => 'required',
        ]);
        $bp = \App\Models\Blogpost::find($id);
        $bp->title = $request['title'];
        $bp->text = $request['text'];
        return ($bp->save() !== 1) ?
            redirect('/posts/' . $id)->with('status_success', 'Post updated!') :
            redirect('/posts/' . $id)->with('status_error', 'Post was not updated!');
    }
    public function storePostComment($id, Request $request)
    {
        $this->validate($request, ['text' => 'required']);
        $bp = \App\Models\Blogpost::find($id);
        $cm = new \App\Models\Comment();
        $cm->text = $request['text'];
        $bp->comments()->save($cm);
        return redirect()->back()->with('status_success', 'Comment added!');
    }
}

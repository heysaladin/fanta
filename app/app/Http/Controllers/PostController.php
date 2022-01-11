<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Posts;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        //fetch 5 posts from database which are active and latest
        $posts = Posts::where('active',1)->orderBy('real_date','desc')->paginate(12);
        //page heading
        $title = 'Latest Posts';
        //return home.blade.php template from resources/views folder
        return view('home')->withPosts($posts)->withTitle($title);
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $tags       = Tag::all();
        // 
        if ($request->user()->can_post()) {
        return view('posts.create', compact('categories','tags'));
        } else {
        return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }


  public function store(PostFormRequest $request)
  {
    $post = new Posts();
    $post->title = $request->get('title');
    $post->image = $request->get('image');
    $post->body = $request->get('body');

    $post->open = 1;
    $post->is_real_project = 1;
    $post->category_id = $request->get('category_id');

    $post->support_author_id = $request->get('support_author_id');

    $post->slug = Str::slug($post->title);

    $duplicate = Posts::where('slug', $post->slug)->first();
    if ($duplicate) {
      return redirect('new-post')->withErrors('Title already exists.')->withInput();
    }

    $post->author_id = $request->user()->id;
    if ($request->has('save')) {
      $post->active = 0;
      $message = 'Post saved successfully';
    } else {
      $post->active = 1;
      $message = 'Post published successfully';
    }

    $post->real_date = $request->get('real_date');
    $post->keywords = $request->get('keywords');
    $post->meta_desc = $request->get('meta_desc');
    $post->copyright = $request->get('copyright');
    $post->support_author_id = $request->get('support_author_id');

    $post->save();

    $post->tags()->attach($request->tags);

    return redirect('edit/' . $post->slug)->withMessage($message);
  }


  public function show($slug)
  {
    $post = Posts::where('slug',$slug)->first();
    if(!$post)
    {
       return redirect('/')->withErrors('requested page not found');
    }
    $comments = $post->comments;
    return view('posts.show')->withPost($post)->withComments($comments);
  }

  public function edit(Request $request,$slug)
  {
    $post = Posts::where('slug',$slug)->first();
    if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
      return view('posts.edit')->with('post',$post);
    return redirect('/')->withErrors('you have not sufficient permissions');
  }

  public function update(Request $request)
  {
    //
    $post_id = $request->input('post_id');
    $post = Posts::find($post_id);
    if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
      $title = $request->input('title');
      $image = $request->input('image');

      $open = $request->input('open');
      $is_real_project = $request->input('is_real_project');
      $category_id = $request->get('category_id');
      
      $real_date = $request->get('real_date');
      $keywords = $request->get('keywords');
      $meta_desc = $request->get('meta_desc');
      $copyright = $request->get('copyright');
      $support_author_id = $request->get('support_author_id');

      $slug = Str::slug($title);
      $duplicate = Posts::where('slug', $slug)->first();
      if ($duplicate) {
        if ($duplicate->id != $post_id) {
          return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
        } else {
          $post->slug = $slug;
        }
      }

      $post->open = $open;
      $post->is_real_project = $is_real_project;
      $post->category_id = $category_id;

      $post->title = $title;
      $post->image = $image;
      $post->body = $request->input('body');

      if ($request->has('save')) {
        $post->active = 0;
        $message = 'Post saved successfully';
        $landing = 'edit/' . $post->slug;
      } else {
        $post->active = 1;
        $message = 'Post updated successfully';
        $landing = $post->slug;
      }

      $post->real_date = $real_date;
      $post->keywords = $keywords;
      $post->meta_desc = $meta_desc;
      $post->copyright = $copyright;
      $post->support_author_id = $support_author_id;

      $post->save();
      return redirect($landing)->withMessage($message);
    } else {
      return redirect('/')->withErrors('you have not sufficient permissions');
    }
  }


  public function destroy(Request $request, $id)
  {
    //
    $post = Posts::find($id);
    if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
    {
      $post->delete();
      $data['message'] = 'Post deleted Successfully';
    }
    else 
    {
      $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
    }
    return redirect('/')->with($data);
  }



  public function category(Request $request, $id)
  {
    $posts = Posts::where('category_id',$id)->where('active',1)->orderBy('real_date','desc')->paginate(12);
    //page heading
    $title = 'Posts by category';
    //return home.blade.php template from resources/views folder
    return view('home')->withPosts($posts)->withTitle($title);
  }

  public function curated()
  {
      $posts = Posts::where('open',8)->orderBy('real_date','desc')->paginate(12);
      //page heading
      $title = 'Curated';
      //return home.blade.php template from resources/views folder
      return view('home')->withPosts($posts)->withTitle($title);
  }
  public function exploration()
  {
      $posts = Posts::where('is_real_project',0)->orderBy('real_date','desc')->paginate(12);
      //page heading
      $title = 'Exploration';
      //return home.blade.php template from resources/views folder
      return view('home')->withPosts($posts)->withTitle($title);
  }
  public function real_project()
  {
      $posts = Posts::where('is_real_project',1)->orderBy('real_date','desc')->paginate(12);
      //page heading
      $title = 'Real Project';
      //return home.blade.php template from resources/views folder
      return view('home')->withPosts($posts)->withTitle($title);
  }

  public function category_curated(Request $request, $id)
  {
    $posts = Posts::where('category_id',$id)->where('open',8)->where('active',1)->orderBy('real_date','desc')->paginate(12);
    //page heading
    $title = 'Posts by category';
    //return home.blade.php template from resources/views folder
    return view('home')->withPosts($posts)->withTitle($title);
  }
  public function category_exploration(Request $request, $id)
  {
    $posts = Posts::where('category_id',$id)->where('is_real_project',0)->where('active',1)->orderBy('real_date','desc')->paginate(12);
    //page heading
    $title = 'Posts by category';
    //return home.blade.php template from resources/views folder
    return view('home')->withPosts($posts)->withTitle($title);
  }
  public function category_real_project(Request $request, $id)
  {
    $posts = Posts::where('category_id',$id)->where('is_real_project',1)->where('active',1)->orderBy('real_date','desc')->paginate(12);
    //page heading
    $title = 'Posts by category';
    //return home.blade.php template from resources/views folder
    return view('home')->withPosts($posts)->withTitle($title);
  }


}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\MetaTag;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $page = "blog";
        $blogs = Blog::orderBy('id', 'desc')->paginate(15);
        $meta_tag = MetaTag::where('page', 'blog')->first();

        return view("blog", compact("page", "blogs", "meta_tag"));
    }

    public function show($link)
    {
        $blog = Blog::where('link', $link)->first();

        if ($blog) {
            $blogs = Blog::where('link', '!=', $link)->orderBy('id', 'desc')->paginate(3);
            return view('blog-detail', compact('blog', 'blogs'));
        } else {
            abort(404);
        }
    }


    /*
   * Dashboard methods
   */
    public function dashboardIndex()
    {
        $page = 'blog';
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('dashboard.blog', compact('page', 'blogs'));
    }

    public function create()
    {
        $page = 'blog';
        return view('dashboard.create.blog', compact('page'));
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->link = Str::slug($request->title);
        $blog->title = $request->title;
        $blog->text = $request->text;
        $blog->meta_description = $request->meta_description;
        $blog->keywords = $request->keywords;
        $blog->save();

        if ($request->hasFile('image')) {
            $blog->image = ImageService::upload(
                $request->file('image'),
                'blog',
                $blog->image
            );
            $blog->save();
        }

        return redirect(route('dashboard.blog'))->with('success', 'Adăugat cu succes!');
    }


    public function edit($id)
    {
        $page = 'blog';
        $blog = Blog::find($id);
        return view('dashboard.edit.blog', compact('page', 'blog'));
    }

    public function update(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->link = Str::slug($request->title);
        $blog->title = $request->title;
        $blog->text = $request->text;
        $blog->meta_description = $request->meta_description;
        $blog->keywords = $request->keywords;
        $blog->save();

        if ($request->hasFile('image')) {
            $blog->image = ImageService::upload(
                $request->file('image'),
                'blog',
                $blog->image
            );
            $blog->save();
        }

        return redirect()->back()->with('success', 'Redactat cu succes!');
    }


    public function destroy($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            Storage::disk('public_files')->delete("/assets/images/blog/{$blog->image}");
            $blog->delete();
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Șters cu succes!');
    }


    public function destroyImage($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            Storage::disk('public_files')->delete("/assets/images/blog/{$blog->image}");
        }
        $blog->image = null;
        $blog->save();
        return redirect()->back()->with('success', 'Imaginea a fost ștearsă!');
    }
}

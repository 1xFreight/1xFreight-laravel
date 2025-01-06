<?php

namespace App\Http\Controllers;

use App\Models\MetaTag;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetaTagController extends Controller
{
    /*
    * Dashboard methods
    */
    public function dashboardIndex()
    {
        $page = 'meta';
        $metas = MetaTag::orderBy('id', 'desc')->get();
        return view('dashboard.meta', compact('page', 'metas'));
    }



    public function create()
    {
        $page = 'meta';
        return view('dashboard.create.meta', compact('page'));
    }
    public function store(Request $request)
    {
        $meta = new MetaTag();
        $meta->title = $request->title;
        $meta->meta_description = $request->meta_description;
        $meta->keywords = $request->keywords;
        $meta->page = $request->page;
        $meta->save();

        if ($request->hasFile('image')) {
            $meta->image = ImageService::upload(
                $request->file('image'),
                'metas',
                $meta->image
            );
            $meta->save();
        }

        return redirect(route('dashboard.meta'))->with('success', 'Adăugat cu succes!');
    }



    public function edit($id)
    {
        $page = 'meta';
        $meta = MetaTag::find($id);
        return view('dashboard.edit.meta', compact('page', 'meta'));
    }
    public function update(Request $request)
    {
        $meta = MetaTag::find($request->id);
        $meta->title = $request->title;
        $meta->meta_description = $request->meta_description;
        $meta->keywords = $request->keywords;
        $meta->page = $request->page;
        $meta->save();

        if ($request->hasFile('image')) {
            $meta->image = ImageService::upload(
                $request->file('image'),
                'metas',
                $meta->image
            );
            $meta->save();
        }
        return redirect()->back()->with('success', 'Redactat cu succes!');
    }



    public function destroy($id)
    {
        $meta = MetaTag::find($id);
        if ($meta) {
            Storage::disk('public_files')->delete("/assets/images/metas/{$meta->image}");
            $meta->delete();
        }
        $meta->delete();
        return redirect()->back()->with('success', 'Șters cu succes!');
    }


    public function destroyImage($id)
    {
        $meta = MetaTag::find($id);
        if ($meta) {
            Storage::disk('public_files')->delete("/assets/images/metas/{$meta->image}");

        }
        $meta->image = null;
        $meta->save();
        return redirect()->back()->with('success', 'Imaginea a fost ștearsă!');
    }
}

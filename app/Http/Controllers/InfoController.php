<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaTag;
use App\Models\Policy;
use App\Models\Terms;

class InfoController extends Controller
{
    public function indexPolicy()
    {
        $items = Policy::orderBy('id', 'desc')->get();
        $meta_tag = MetaTag::where('page', 'policy')->first();
        $lastUpdated = $items->first()?->updated_at;

        return view('policy', compact('items', 'meta_tag', 'lastUpdated'));
    }
    public function indexTerms()
    {
        $items = Terms::orderBy('id', 'desc')->get();
        $meta_tag = MetaTag::where('page', 'terms')->first();
        $lastUpdated = $items->first()?->updated_at;

        return view('terms', compact('items', 'meta_tag','lastUpdated'));

    }


    /*
    * Dashboard methods
    */
    public function editPolicy()
    {
        $page = 'policy';
        $item = Policy::first();
        return view('dashboard.edit.policy', compact('page', 'item'));
    }
    public function updatePolicy(Request $request)
    {
        $item = Policy::first();
        $item->text = $request->text;
        $item->save();
        return redirect()->back()->with('success', 'Editat cu succes!');
    }

    public function editTerms()
    {
        $page = 'terms';
        $item = Terms::first();
        return view('dashboard.edit.terms', compact('page', 'item'));
    }
    public function updateTerms(Request $request)
    {
        $item = Terms::first();
        $item->text = $request->text;
        $item->save();
        return redirect()->back()->with('success', 'Editat cu succes!');
    }
}

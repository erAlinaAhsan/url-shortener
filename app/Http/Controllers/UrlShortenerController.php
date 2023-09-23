<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlShortener;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    public function index()
    {
        $shortLinks = UrlShortener::orderBy('id', 'asc')->get();
        return view('urlShortener', compact('shortLinks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);
        UrlShortener::create($input);
        return redirect('generate-shorten-link')->withSuccess('Shortened URL generated successfully!');
    }
    public function urlShortener($code)
    {
        $find = UrlShortener::where('code', $code)->first();
        return redirect($find->link);
    }
    public function destroy($id)
    {
        $shortLink = UrlShortener::findOrFail($id);
        $shortLink->delete();

        return redirect()->back()->with('success', 'Short URL deleted successfully');
    }
}

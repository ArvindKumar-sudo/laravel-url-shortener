<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $urls =  Url::orderBy('id','desc');
        if ($user->hasRole('Admin')) {
            $urls->where('company_id', $user->company_id);
        } else if ($user->hasRole('Member')) {
            $urls->where('user_id', $user->id);
        }
        $urls = $urls->get();
        return view('urls.index', compact('urls'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'url' => 'required|url'
        ]);

        Url::create([
            'user_id' => auth()->id(),
            'company_id' => $user->company_id,
            'original_url' => $request->url,
            'short_code' => Str::random(6),
        ]);

        return back()->with('success', 'URL created');
    }

    public function redirect($code)
    {
        if (!auth()->check()) {
            abort(403);
        }

        $url = Url::where('short_code', $code)->firstOrFail();
        $url->increment('hits');
        return redirect($url->original_url);
    }
}

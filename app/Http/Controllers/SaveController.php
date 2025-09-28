<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{
    public function save(Post $post)
    {
        $hasSaved = Auth::user()->hasSaved($post);

        if ($hasSaved) {
            $post->saves()
                ->where('user_id', Auth::id())
                ->delete();
        } else {
            $post->saves()
                ->create([
                    'user_id' => Auth::id()
                ]);
        }
    }
}

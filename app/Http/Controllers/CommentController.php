<?php

namespace App\Http\Controllers;

use App\Models\UserComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment = auth()->user()->comments()->create([
            'comment' => $request->comment,
            'user_id' => auth()->id() // Eksplicīti piešķiram user_id
        ]);

        return back()->with([
            'success' => 'Komentārs pievienots!',
            'comment_id' => $comment->id // Atgriežam izveidotā komentāra ID
        ]);
    }

     public function destroy(UserComment $comment)
    {
        try {
            // Pārbauda, vai lietotājs ir komentāra autors
            if (auth()->id() !== $comment->user_id) {
                return back()->with('error', 'Nav tiesību dzēst šo komentāru!');
            }

            $comment->delete();
            
            return back()->with('success', 'Komentārs veiksmīgi dzēsts!');
        } catch (\Exception $e) {
            return back()->with('error', 'Kļūda dzēšot komentāru: '.$e->getMessage());
        }
    }
}


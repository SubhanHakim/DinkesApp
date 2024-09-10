<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Bidang;


class CommentController extends Controller
{
    public function show($bidang_id, $bulan)
    {
        $bidang = Bidang::find($bidang_id);
        $comments = Comment::where('bidang_id', $bidang_id)
            ->where('bulan', $bulan)
            ->get();
        return view('comments.show', compact('bidang', 'comments', 'bulan'));
    }

    public function store(Request $request, $bidang_id, $bulan)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'bidang_id' => $bidang_id,
            'bulan' => $bulan,
            'comment' => $request->comment,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index() {
        $posts = BlogPost::latest()->get();
        return view('blogs.index', compact('posts'));
    }

    public function create() {
        return view('blogs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        // Call OpenAI API using HTTP client
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful blog writer.'],
                ['role' => 'user', 'content' => 'Write a 3-paragraph blog post titled: ' . $request->title],
            ],
        ]);

        $content = $response->json()['choices'][0]['message']['content'] ?? 'No content generated.';

        $post = BlogPost::create([
            'title' => $request->title,
            'content' => $content
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog generated successfully!');
    }
}

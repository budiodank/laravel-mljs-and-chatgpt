<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGPTController extends Controller
{
    public function index()
    {
        return view('chatgpt.index');
    }

    public function ask(Request $request)
    {
        $message = $request->get('message');
        $response = $this->askToChatGPT($message);

        return response()->json($response);
    }

    private function askToChatGPT($message)
    {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                "model" => "gpt-3.5-turbo-16k-0613",
                'messages' => [
                    [
                        "role" => "user",
                        "content" => $message
                    ]
                ],
                'temperature' => 0.5,
                "max_tokens" => 1000
            ]);

        return $response->json()['choices'][0]['message']['content'];
    }
}

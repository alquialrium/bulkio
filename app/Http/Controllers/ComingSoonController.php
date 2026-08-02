<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ComingSoonController extends Controller
{
    public function index()
    {
        return view('coming-soon');
    }

    public function notify(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'lang' => ['nullable', 'in:es,en'],
        ]);

        $email = mb_strtolower(trim($data['email']));

        $subscriber = Subscriber::query()->firstOrCreate([
            'email' => $email,
        ]);

        $status = $subscriber->wasRecentlyCreated ? 201 : 200;
        $lang = $data['lang'] ?? 'es';
        $messages = [
            'es' => [
                'subscribed' => 'Gracias. Ya estas suscrito al newsletter.',
                'already' => 'Este correo ya está suscrito.',
            ],
            'en' => [
                'subscribed' => 'Thanks. You are now subscribed to the newsletter.',
                'already' => 'This email is already subscribed.',
            ],
        ];

        return response()->json([
            'ok' => true,
            'subscribed' => $subscriber->wasRecentlyCreated,
            'message' => $subscriber->wasRecentlyCreated
                ? $messages[$lang]['subscribed']
                : $messages[$lang]['already'],
        ], $status);
    }
}
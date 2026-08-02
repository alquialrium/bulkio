<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewsletterCampaignJob;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsletterAdminController extends Controller
{
    public function index(): View
    {
        $subscribers = Subscriber::query()
            ->latest()
            ->paginate(15);

        return view('newsletter.index', [
            'subscribers' => $subscribers,
            'totalSubscribers' => Subscriber::query()->count(),
            'subscribersToday' => Subscriber::query()->whereDate('created_at', now()->toDateString())->count(),
        ]);
    }

    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:180'],
            'body' => ['required', 'string', 'max:10000'],
        ]);

        $count = 0;

        Subscriber::query()
            ->select(['id', 'email'])
            ->orderBy('id')
            ->chunkById(200, function ($chunk) use (&$count, $data): void {
                foreach ($chunk as $subscriber) {
                    SendNewsletterCampaignJob::dispatch(
                        $subscriber->email,
                        $data['subject'],
                        $data['body']
                    );
                    $count++;
                }
            });

        if ($count === 0) {
            return back()->with('newsletter_error', 'No hay suscriptores para enviar la campaña.');
        }

        return back()->with('newsletter_success', "Campana encolada para {$count} suscriptores.");
    }
}
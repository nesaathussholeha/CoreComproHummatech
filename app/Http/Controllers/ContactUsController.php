<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\BackgroundInterface;
use App\Contracts\Interfaces\ProfileInterface;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMailer;
use DerekCodes\TurnstileLaravel\TurnstileLaravel;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    private BackgroundInterface $background;
    private ProfileInterface $profile;

    public function __construct(BackgroundInterface $background, ProfileInterface $profileData)
    {
        $this->profile = $profileData;
        $this->background = $background;
    }
    /**
     * Handle the view of contact-us
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(): View
    {
        $background = $this->background->getByType('Hubungi Kami');

        return view('landing.contact', compact('background'));
    }

    /**
     * Handle the form submission
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactUsRequest $request)
    {
        # Verify the Turnstile
        $turnstile = new TurnstileLaravel;
        $turnstile->validate($request->input('cf-turnstile-response'));

        # Get company profile data
        $profile = $this->profile->first();

        # Check if profile data is exists on database
        if ($profile === null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Ada sedikit kesalahan! Kami akan segera memperbaikinya.',
                'code' => 500,
            ], 500);
        }

        try {
            # If passed, sent into company email
            Mail::to($profile->email)->send(new ContactUsMailer($request->all()));

            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih! Kami akan segera menghubungi anda.',
                'code' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Ada sedikit kesalahan! Kami akan segera memperbaikinya.',
                'code' => 500,
                'debug' => $e->getMessage(),
            ], 500);
        }
    }
}

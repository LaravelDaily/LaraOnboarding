<?php
// LaravelDaily Onboarding package routes

Route::get('onboarding-unsubscribe/{email}', function ($email) {

    $user = DB::table('users')->where('email', $email)->update(['unsubscribed_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')]);

    if (!$user) {
        abort(404);
    }

    try {
        return view('laraveldaily.onboarding.unsubscribed', compact('email'));
    } catch (Exception $e) {
        return $email . ' unsubscribed successfully!';
    }
});

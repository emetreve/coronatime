<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify Email</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;700&display=swap');
    </style>
</head>

<div style="height: 100%; max-width:500px; margin: 50px auto; text-align:center; font-family: 'Inter';">
    <img src="{{ asset('images/confirm-email.png') }}" alt="dashboard snapshot" style="max-width: 90%; margin: auto;">

    <div>
        <h1
            style="font-weight: 900; color: #010414; font-size: 1.5rem; font-weight: bold; text-align: center; margin-top: 1.5rem;">
            {{ __('email-verification.email_subject') }}</h1>
        <p style="font-weight: 400; color: #010414; font-size: 1.2rem  margin-top: 1.9rem;">
            {{ __('email-verification.email_line') }}</p>
        <a href="{{ $url }}">
            <button
                style="font-weight: 900; border-radius: 0.5rem; border: none; max-width: 23.7rem; width: 100%; height: 3.4rem; color: #FFFFFF; background-color: #0FBA68; font-weight: 800;  
                        margin: 3.4rem auto; cursor: pointer;">
                {{ __('email-verification.email_action') }}
            </button>
        </a>
    </div>
</div>

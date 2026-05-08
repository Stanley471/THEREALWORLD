<x-guest-layout>
    <div class="sp">
        <div class="text-center">
            <a class="mb-1 flex items-center active" href="/" data-status="active" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg> Back</a>
            <h1 class="my-6 text-center font-bold text-xl">Log In To The Real World</h1>
        </div>

        <x-auth-session-status class="my-6 text-center font-bold text-xl" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-text-input id="email" class="auth-input" placeholder="Email Address" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div>
                <x-text-input id="password" class="auth-input" placeholder="Password" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-300" />
            </div>


            <button type="submit" class="auth-button">
                {{ __('Log in') }}
            </button>
        </form>

        <div class="mt-2 flex items-center justify-between text-sm text-slate-400">
            <a href="#" class="auth-link auth-highlight-link">Use one-time SMS code instead</a>
            @if (Route::has('password.request'))
                <a class="auth-link auth-highlight-link auth-reset-link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </div>
</x-guest-layout>

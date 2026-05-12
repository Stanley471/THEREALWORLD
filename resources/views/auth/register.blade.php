<x-guest-layout>
    <div class="sp">
        <div class="text-center">
            <a class="mb-1 flex items-center active" href="/" data-status="active" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg> Back</a>
            <h1 class="my-6 text-center font-bold text-xl">Join The Real World</h1>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <x-text-input id="name" class="auth-input" placeholder="Full Name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-rose-300" />
            </div>

            <!-- Email Address -->
            <div>
                <x-text-input id="email" class="auth-input" placeholder="Email Address" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-rose-300" />
            </div>

            <!-- Password -->
            <div>
                <x-text-input id="password" class="auth-input" placeholder="Password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-300" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-text-input id="password_confirmation" class="auth-input" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-rose-300" />
            </div>

            <button type="submit" class="auth-button">
                {{ __('Create Account') }}
            </button>
        </form>

        <div class="mt-4 text-center text-sm text-slate-400">
            <span>Already have an account?</span>
            <a class="auth-link auth-highlight-link" href="{{ route('login') }}">
                {{ __('Log in here') }}
            </a>
        </div>
    </div>
</x-guest-layout>

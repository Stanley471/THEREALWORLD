<x-dashboard-layout title="Dashboard">

@section('header')
    <div class="flex flex-col gap-2">
        <h2 class="text-2xl font-semibold text-slate-100">Profile settings</h2>
        <p class="text-sm text-slate-400 max-w-2xl">Update your account details, manage security settings, and review your profile information in one polished dashboard.</p>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-8 xl:grid-cols-[1.7fr_1fr]">
                <div class="space-y-8">
                    <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-950/95 shadow-sm shadow-slate-950/40">
                        <div class="px-6 py-6 sm:px-8 sm:py-8">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </section>

                    <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-950/95 shadow-sm shadow-slate-950/40">
                        <div class="px-6 py-6 sm:px-8 sm:py-8">
                            @include('profile.partials.update-password-form')
                        </div>
                    </section>
                </div>

                <aside class="space-y-8">
                    <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-950/95 shadow-sm shadow-slate-950/40">
                        <div class="px-6 py-6 sm:px-8 sm:py-8">
                            <h3 class="text-lg font-semibold text-slate-100">Account summary</h3>
                            <p class="mt-2 text-sm text-slate-400">Quick overview of your profile, security, and account status.</p>

                            <dl class="mt-6 space-y-4 text-sm text-slate-300">
                                <div class="rounded-2xl bg-slate-900/80 p-4 border border-slate-800">
                                    <dt class="font-medium text-slate-100">Name</dt>
                                    <dd class="mt-1">{{ Auth::user()->name }}</dd>
                                </div>
                                <div class="rounded-2xl bg-slate-900/80 p-4 border border-slate-800">
                                    <dt class="font-medium text-slate-100">Email</dt>
                                    <dd class="mt-1 break-all">{{ Auth::user()->email }}</dd>
                                </div>
                                <div class="rounded-2xl bg-slate-900/80 p-4 border border-slate-800">
                                    <dt class="font-medium text-slate-100">Member since</dt>
                                    <dd class="mt-1">{{ Auth::user()->created_at->format('F j, Y') }}</dd>
                                </div>
                                <div class="rounded-2xl bg-slate-900/80 p-4 border border-slate-800">
                                    <dt class="font-medium text-slate-100">Last updated</dt>
                                    <dd class="mt-1">{{ Auth::user()->updated_at->diffForHumans() }}</dd>
                                </div>
                            </dl>
                        </div>
                    </section>

                    <section class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-950/95 shadow-sm shadow-slate-950/40">
                        <div class="px-6 py-6 sm:px-8 sm:py-8">
                            <h3 class="text-lg font-semibold text-slate-100">Security & account actions</h3>
                            <p class="mt-2 text-sm text-slate-400">Keep your account safer and remove it when you're ready.</p>

                            <div class="mt-6 space-y-5">
                                <div class="rounded-2xl bg-slate-900/80 p-4 border border-slate-800">
                                    <p class="font-medium text-slate-100">Password protection</p>
                                    <p class="mt-1 text-sm text-slate-400">Change your password regularly to keep your account secure.</p>
                                </div>

                                <div class="rounded-2xl bg-slate-900/80 p-4 border border-slate-800">
                                    <p class="font-medium text-slate-100">Email verification</p>
                                    <p class="mt-1 text-sm text-slate-400">
                                        @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                                            Your email is not verified yet.
                                        @else
                                            Your email is verified.
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</x-dashboard-layout>
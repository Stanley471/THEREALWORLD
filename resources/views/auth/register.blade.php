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

            <!-- Country -->
            <div>
                @php
                    $countries = [
                        'Afghanistan',
                        'Albania',
                        'Algeria',
                        'Andorra',
                        'Angola',
                        'Antigua and Barbuda',
                        'Argentina',
                        'Armenia',
                        'Australia',
                        'Austria',
                        'Azerbaijan',
                        'Bahamas',
                        'Bahrain',
                        'Bangladesh',
                        'Barbados',
                        'Belarus',
                        'Belgium',
                        'Belize',
                        'Benin',
                        'Bhutan',
                        'Bolivia',
                        'Bosnia and Herzegovina',
                        'Botswana',
                        'Brazil',
                        'Brunei',
                        'Bulgaria',
                        'Burkina Faso',
                        'Burundi',
                        'Cabo Verde',
                        'Cambodia',
                        'Cameroon',
                        'Canada',
                        'Central African Republic',
                        'Chad',
                        'Chile',
                        'China',
                        'Colombia',
                        'Comoros',
                        'Congo',
                        'Costa Rica',
                        'Croatia',
                        'Cuba',
                        'Cyprus',
                        'Czechia',
                        'Democratic Republic of the Congo',
                        'Denmark',
                        'Djibouti',
                        'Dominica',
                        'Dominican Republic',
                        'Ecuador',
                        'Egypt',
                        'El Salvador',
                        'Equatorial Guinea',
                        'Eritrea',
                        'Estonia',
                        'Eswatini',
                        'Ethiopia',
                        'Fiji',
                        'Finland',
                        'France',
                        'Gabon',
                        'Gambia',
                        'Georgia',
                        'Germany',
                        'Ghana',
                        'Greece',
                        'Grenada',
                        'Guatemala',
                        'Guinea',
                        'Guinea-Bissau',
                        'Guyana',
                        'Haiti',
                        'Honduras',
                        'Hungary',
                        'Iceland',
                        'India',
                        'Indonesia',
                        'Iran',
                        'Iraq',
                        'Ireland',
                        'Israel',
                        'Italy',
                        'Jamaica',
                        'Japan',
                        'Jordan',
                        'Kazakhstan',
                        'Kenya',
                        'Kiribati',
                        'Kuwait',
                        'Kyrgyzstan',
                        'Laos',
                        'Latvia',
                        'Lebanon',
                        'Lesotho',
                        'Liberia',
                        'Libya',
                        'Liechtenstein',
                        'Lithuania',
                        'Luxembourg',
                        'Madagascar',
                        'Malawi',
                        'Malaysia',
                        'Maldives',
                        'Mali',
                        'Malta',
                        'Marshall Islands',
                        'Mauritania',
                        'Mauritius',
                        'Mexico',
                        'Micronesia',
                        'Moldova',
                        'Monaco',
                        'Mongolia',
                        'Montenegro',
                        'Morocco',
                        'Mozambique',
                        'Myanmar',
                        'Namibia',
                        'Nauru',
                        'Nepal',
                        'Netherlands',
                        'New Zealand',
                        'Nicaragua',
                        'Niger',
                        'Nigeria',
                        'North Korea',
                        'North Macedonia',
                        'Norway',
                        'Oman',
                        'Pakistan',
                        'Palau',
                        'Palestine',
                        'Panama',
                        'Papua New Guinea',
                        'Paraguay',
                        'Peru',
                        'Philippines',
                        'Poland',
                        'Portugal',
                        'Qatar',
                        'Romania',
                        'Russia',
                        'Rwanda',
                        'Saint Kitts and Nevis',
                        'Saint Lucia',
                        'Saint Vincent and the Grenadines',
                        'Samoa',
                        'San Marino',
                        'Sao Tome and Principe',
                        'Saudi Arabia',
                        'Senegal',
                        'Serbia',
                        'Seychelles',
                        'Sierra Leone',
                        'Singapore',
                        'Slovakia',
                        'Slovenia',
                        'Solomon Islands',
                        'Somalia',
                        'South Africa',
                        'South Korea',
                        'South Sudan',
                        'Spain',
                        'Sri Lanka',
                        'Sudan',
                        'Suriname',
                        'Sweden',
                        'Switzerland',
                        'Syria',
                        'Taiwan',
                        'Tajikistan',
                        'Tanzania',
                        'Thailand',
                        'Timor-Leste',
                        'Togo',
                        'Tonga',
                        'Trinidad and Tobago',
                        'Tunisia',
                        'Turkey',
                        'Turkmenistan',
                        'Tuvalu',
                        'Uganda',
                        'Ukraine',
                        'United Arab Emirates',
                        'United Kingdom',
                        'United States',
                        'Uruguay',
                        'Uzbekistan',
                        'Vanuatu',
                        'Vatican City',
                        'Venezuela',
                        'Vietnam',
                        'Yemen',
                        'Zambia',
                        'Zimbabwe',
                    ];
                @endphp
                <select id="country" name="country" class="auth-input" required>
                    <option value="" disabled {{ old('country') ? '' : 'selected' }}>Select your country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country }}" {{ old('country') === $country ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('country')" class="mt-2 text-sm text-rose-300" />
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

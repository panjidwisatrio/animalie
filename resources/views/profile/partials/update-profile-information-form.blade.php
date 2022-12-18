<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- DONE : Tidak Sejajar Inputnya, Tolong Perbaiki --}}
        <div class="flex justify-start items-center w-full">
            <div>
                <img class="aspect-square content_pict object-cover rounded-full"
                    src="{{ asset('/storage/' . Auth::user()->avatar) }}" alt="Current profile photo" />
            </div>
            <div class="w-full">
                <input
                    class=" w-full text-sm text-green-900 border border-green-300 rounded-lg cursor-pointer bg-emerald-100 dark:text-green-400 focus:outline-none dark:bg-green-700 dark:border-green-600 dark:placeholder-green-400"
                    aria-describedby="file_input_help" id="avatar" name="avatar" type="file"
                    @error('avatar') is-invalid @enderror aria-describedby="standard_error_help">
                @error('avatar')
                    <p id="standard_error_help" class="ml-3 mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">Oh, snapp!</span> {{ $message }} </p>
                @enderror
            </div>
        </div>

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Username --}}
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        {{-- Workplace --}}
        <div>
            <x-input-label for="work_place" :value="__('Workplace')" />
            <x-text-input id="work_place" name="work_place" type="text" class="mt-1 block w-full" :value="old('work_place', $user->work_place)"
                autocomplete="work_place" />
            <x-input-error class="mt-2" :messages="$errors->get('workplace')" />
        </div>

        {{-- Job Posisition --}}
        <div>
            <x-input-label for="job_position" :value="__('Job Posisition')" />
            <x-text-input id="job_position" name="job_position" type="text" class="mt-1 block w-full"
                :value="old('job_position', $user->job_position)" autocomplete="job_position" />
            <x-input-error class="mt-2" :messages="$errors->get('job_position')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

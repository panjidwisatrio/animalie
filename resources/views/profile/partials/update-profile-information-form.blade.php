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

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex w-full">
            <div class="w-full flex justify-start items-center shrink-0">
                <img class="myProfile_pict object-cover rounded-full" src="img/profile.png"
                    alt="Current profile photo" />
                <button type="file"
                    class="absolute bottom-0 right-0 rounded-full bg-white p-2 text-cyan-900 shadow-md">
                    <i data-feather="edit"></i>
                </button>
            </div>
        </div>
        {{-- <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                800x400px).</p>
        </div> --}}

        {{-- <x-file-button>
            {{ __('choose file') }}
        </x-file-button> --}}

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Username --}}
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
                autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        {{-- Workplace --}}
        <div>
            <x-input-label for="work_place" :value="__('Workplace')" />
            <x-text-input id="work_place" name="work_place" type="text" class="mt-1 block w-full" :value="old('work_place', $user->workplace)"
                autocomplete="work_place" />
            <x-input-error class="mt-2" :messages="$errors->get('workplace')" />
        </div>

        {{-- Job Posisition --}}
        <div>
            <x-input-label for="job_position" :value="__('Job Posisition')" />
            <x-text-input id="job_position" name="job_position" type="text" class="mt-1 block w-full"
                :value="old('job_position', $user->jobPosisition)" autocomplete="job_position" />
            <x-input-error class="mt-2" :messages="$errors->get('job_position')" />
        </div>

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

<section>
    <header class="flex items-center gap-3 mb-6">
        <div class="p-2 bg-theme-bg rounded-lg text-theme-dark">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-theme-dark">
                {{ __('Profile Information') }}
            </h2>
            <p class="text-sm text-gray-500">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 gap-6">
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="text-theme-dark font-semibold mb-1" />
                <x-text-input id="name" name="name" type="text" 
                    class="mt-1 block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-gray-50 focus:bg-white transition-colors" 
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="text-theme-dark font-semibold mb-1" />
                <x-text-input id="email" name="email" type="email" 
                    class="mt-1 block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-gray-50 focus:bg-white transition-colors" 
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2 p-3 bg-yellow-50 text-yellow-800 rounded-lg text-sm border border-yellow-200">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline font-bold hover:text-yellow-900 ml-1">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <x-primary-button class="!bg-theme-dark hover:!bg-theme-main !py-3 !px-6 !rounded-xl !text-base transition-transform transform active:scale-95">
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-theme-main font-bold flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
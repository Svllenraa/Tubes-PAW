<section class="space-y-6">
    <header class="flex items-start gap-4">
        <div class="p-3 bg-red-100 rounded-full text-red-600 shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <div>
            <h2 class="text-lg font-bold text-red-600">
                {{ __('Delete Account') }}
            </h2>
            <p class="mt-1 text-sm text-red-500">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. This action cannot be undone.') }}
            </p>
        </div>
    </header>

    <div class="flex justify-end pt-4">
        <x-danger-button
            class="!bg-red-500 hover:!bg-red-600 !rounded-xl !py-3 !px-6"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('I understand, delete my account') }}</x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 text-center">
            @csrf
            @method('delete')

            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-6">
                <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>

            <h2 class="text-xl font-bold text-gray-900 mb-2">
                {{ __('Are you sure?') }}
            </h2>

            <p class="text-sm text-gray-500 mb-8 max-w-sm mx-auto">
                {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-6 text-left">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-xl py-3 px-4"
                    placeholder="{{ __('Enter your password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-left" />
            </div>

            <div class="flex justify-center gap-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="!rounded-xl !py-3 !px-6">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 !rounded-xl !py-3 !px-6 !bg-red-600 hover:!bg-red-700">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
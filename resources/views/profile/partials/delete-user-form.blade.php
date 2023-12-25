<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('刪除帳號') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('一旦您的帳戶被刪除，所有相關的資源和數據將被永久刪除。在刪除您的帳戶之前，請下載您想保留的任何數據或信息') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('刪除帳號') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('您確定要刪除您的帳戶嗎？') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('一旦您刪除帳戶，其所有資源和資料將永久刪除。請輸入您的密碼以確認您要永久刪除帳戶') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('取消') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('刪除帳戶') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

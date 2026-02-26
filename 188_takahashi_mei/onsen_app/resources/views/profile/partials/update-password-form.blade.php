<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('パスワード変更') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('安全のため、長くて推測されにくいパスワードを設定しましょう') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('現在のパスワード')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full
                       border-stone-300
                       focus:border-orange-400
                       focus:ring-orange-400" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('新しいパスワード')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full
                       border-stone-300
                       focus:border-orange-400
                       focus:ring-orange-400"  autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('パスワード確認')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full
                       border-stone-300
                       focus:border-orange-400
                       focus:ring-orange-400"  autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button
            class="bg-orange-400 hover:bg-orange-500
                       text-white font-semibold
                       px-6 py-2 rounded-xl
                       shadow-md hover:shadow-lg transition">
                       {{ __('保存') }}
                    </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('保存しました.') }}</p>
            @endif
        </div>
    </form>
</section>

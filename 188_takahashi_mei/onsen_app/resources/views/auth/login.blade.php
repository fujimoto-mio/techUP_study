<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="redirect" value="{{ request('redirect') }}">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-orange-400">
                ゆさんぽ
            </h2>
            <p class="text-sm text-stone-500 mt-1">
                ログインして温泉を探そう
            </p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full border-stone-300
       focus:border-orange-400
       focus:ring-orange-400
       rounded-xl shadow-sm" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full border-stone-300
       focus:border-orange-400
       focus:ring-orange-400
       rounded-xl shadow-sm" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4
                   rounded
                   border border-stone-300
                   text-orange-400
                   focus:ring-orange-400
                   focus:ring-2">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('次回から自動ログイン') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた場合') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-orange-400 hover:bg-orange-500
           text-white rounded-xl px-6 py-2
           shadow-md hover:shadow-lg
            transition duration-200">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="text-center">
            <h2 class="text-2xl font-bold text-orange-400">
                新規登録
            </h2>
            <p class="text-sm text-stone-500 mt-1">
                お気に入りの温泉を探しにいこう
            </p>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('ニックネーム')" />
            <x-text-input id="name" class="block mt-1 w-full
           bg-white
           border border-stone-300
           focus:border-orange-400
           focus:ring-orange-400
            shadow-sm" type=" text" name="name" :value="old('name')" required autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full  bg-white
           border border-stone-300
           focus:border-orange-400
           focus:ring-orange-400
            shadow-sm" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full  bg-white
           border border-stone-300
           focus:border-orange-400
           focus:ring-orange-400
            shadow-sm" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード確認')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full  bg-white
           border border-stone-300
           focus:border-orange-400
           focus:ring-orange-400
            shadow-sm" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('すでに登録ずみの方はこちら') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
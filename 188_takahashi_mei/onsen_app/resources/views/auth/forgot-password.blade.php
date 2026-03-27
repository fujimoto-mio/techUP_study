<x-guest-layout>

    <div class="text-center
                w-full max-w-md p-8 space-y-6">

        <h2 class="text-2xl font-bold text-orange-400">
            パスワード再設定
        </h2>

        <p class="text-sm text-stone-500 mt-2">
            ご登録のメールアドレスを入力してください。<br>
            再設定用のリンクをお送りします。
        </p>

        <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div class="text-left">
                <x-input-label for="email" value="メールアドレス" />
                <x-text-input id="email" class="block mt-1 w-full
                           bg-white
                           border border-stone-300
                           focus:border-orange-400
                           focus:ring-orange-400
                           rounded-xl shadow-sm" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <x-primary-button class="w-full justify-center
                       bg-orange-400 hover:bg-orange-500
                       text-white rounded-xl
                       shadow-md hover:shadow-lg
                       transition">
                送信
            </x-primary-button>
        </form>

    </div>

</x-guest-layout>
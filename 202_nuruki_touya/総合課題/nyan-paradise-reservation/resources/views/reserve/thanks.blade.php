<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#FCEFD6]">
        <div class="bg-white p-8 rounded shadow text-center max-w-md">
            <h1 class="text-2xl font-bold text-[#8B5E3C] mb-4">ご予約ありがとうございました</h1>
            <p class="text-gray-700 mb-6">
                ご登録いただいたメールアドレスに予約確認メールをお送りしました。<br>
                万が一メールが届かない場合は、迷惑メールフォルダをご確認いただくか、お問い合わせください。
            </p>
            <a href="{{ url('/') }}" class="inline-block bg-[#8B5E3C] text-white px-6 py-2 rounded hover:bg-[#70492e]">
                トップページへ戻る
            </a>
        </div>
    </div>
</x-guest-layout>

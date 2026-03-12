<x-app-layout bg="#FFF7ED">
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            マイページ
        </h2>
    </x-slot>
    <div class="max-w-5xl mx-auto py-10 space-y-10">

        <!-- プロフィールヘッダー -->
        <div class="bg-[#5C3A21]/30 rounded-2xl shadow-sm p-8 flex items-center gap-6">

            @if($user->icon_url)
                <img src="{{ $user->icon_url }}" class="w-24 h-24 rounded-full object-cover border">
            @else
                <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-2xl text-gray-500">
                    {{ mb_substr($user->name, 0, 1) }}
                </div>
            @endif



            <div class="flex-1">
                <div class="flex items-center gap-4">
                    <h2 class="text-4xl font-semibold text-gray-800">
                        {{ $user->name }}
                    </h2>

                    <a href="{{ route('profile.edit') }}"
                        class="px-3 py-1 bg-amber-500 hover:bg-amber-600 text-white rounded-md text-sm">
                        プロフィール / アカウント編集
                    </a>
                </div>

                @if (session('success'))
                    <div class="mt-3 inline-block px-4 py-2 bg-green-100 text-green-800 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- アイコン更新 -->
                <form method="POST" action="{{ route('mypage.icon') }}" enctype="multipart/form-data" x-data
                    class="mt-6">

                    @csrf

                    <input type="file" id="icon" name="icon" accept="image/*" class="hidden"
                        @change="$el.form.submit()">

                    <label for="icon"
                        class="cursor-pointer flex items-center gap-2 text-gray-600 hover:text-orange-500">

                        <x-icon.photo class="w-8 h-8" />
                        <span class="text-sm text-gray-500">
                            アイコン変更
                        </span>

                    </label>

                </form>
            </div>
        </div>


        <!-- 投稿レビュー -->
        <section class="space-y-3">
        <div class="flex items-center gap-3 inline-block bg-[#E6FBD0] border-l-4 border-[#2F4F2F] px-4 py-2 text-lg font-semibold mb-6">
            <h2 class="text-xl font-semibold">投稿レビュー</h2>
        </div>
            @forelse($reviews as $review)
                <div class="bg-white  shadow-lg p-3">

                    <!-- 温泉名 -->
                    <div class="flex justify-between items-start">
                        <h3 class="font-semibold text-lg">
                            {{ $review->onsen->name }}
                        </h3>

                        <!-- 削除 -->
                        <div x-data="{ showModal: false }" class="inline-block">

                            <!-- 削除ボタン -->
                            <button @click="showModal = true"
                                class="text-red-500 text-sm hover:underline flex items-center gap-1">
                                <x-icon.trash class="w-4 h-4" />
                            </button>

                            <!-- モーダル -->
                            <div x-show="showModal" x-transition
                                class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

                                <div class="bg-white rounded-2xl shadow-xl p-6 w-96 text-center">
                                    <h2 class="text-lg font-semibold mb-4 text-red-600">レビューを削除しますか？</h2>
                                    <p class="mb-6 text-gray-700">削除すると元に戻せません。</p>

                                    <div class="flex justify-center gap-4">
                                        <!-- キャンセル -->
                                        <button @click="showModal = false"
                                            class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                                            キャンセル
                                        </button>

                                        <!-- 削除フォーム -->
                                        <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                                削除する
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- 星評価 -->
                    <div class="flex items-center gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $review->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                        @endfor
                        <span class="ml-2 text-sm text-gray-600">{{ $review->rating }} / 5</span>
                    </div>

                    <!-- コメント -->
                    <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>
                    <p class="text-gray-400 text-sm">{{ $review->posted_date }}</p>
                    <!-- 画像 -->
                    @if($review->images->count())
                        <div class="flex gap-3 flex-wrap">
                            @foreach($review->images as $image)
                                <img src="{{ $image->image_path }}" class="w-24 h-24 object-cover rounded-lg border">
                            @endforeach
                        </div>
                    @endif

                    <!-- 編集ボタン -->
                    <button onclick="openEditModal({{ $review->id }})" class="flex text-blue-400 text-sm hover:underline">
                        編集 <x-icon.edit class="w-4 h-4" />
                    </button>


                    <!-- 編集モーダル -->
                    <div id="modal-{{ $review->id }}"
                        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
                        <div class="bg-amber-50 rounded-2xl shadow-lg w-full max-w-md p-6 space-y-4">

                            <h3 class="font-bold text-lg">レビュー編集</h3>

                            <form method="POST" action="{{ route('reviews.update', $review) }}" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <!-- 星評価 -->
                                <input type="hidden" name="rating" id="rating-input-{{ $review->id }}"
                                    value="{{ $review->rating }}">

                                <div class="flex gap-1 text-2xl cursor-pointer">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span onclick="setRating({{ $review->id }}, {{ $i }})"
                                            id="star-{{ $review->id }}-{{ $i }}"
                                            class="{{ $review->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                    @endfor
                                </div>

                                <!-- コメント -->
                                <textarea name="comment"
                                    class="w-full border rounded-lg p-3">{{ $review->comment }}</textarea>
                                <!-- 画像 -->
                                @if($review->images->count())
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        @foreach($review->images as $img)
                                            <div class="relative w-20 h-20 border rounded-lg overflow-hidden group">
                                                <img src="{{ asset($img->image_path) }}"
                                                    class="w-full h-full object-cover transition duration-300 ease-in-out"
                                                    id="img-{{ $img->id }}">

                                                <label
                                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center cursor-pointer"
                                                    title="削除">
                                                    <input type="checkbox" name="delete_images[]" value="{{ $img->id }}"
                                                        class="hidden" onchange="toggleDelete({{ $img->id }}, this)">
                                                    ✕
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- 新規画像追加 -->
                                <div class="flex items-center gap-3">

                                    <input type="file" id="images" name="images[]" multiple accept="image/*" class="hidden">

                                    <label for="images" class="cursor-pointer text-gray-600 hover:text-orange-500">
                                        <x-icon.photo class="w-8 h-8" />
                                    </label>

                                    <span class="text-sm text-gray-500">
                                        写真を追加
                                    </span>

                                </div>

                                <div class="flex justify-end gap-3 pt-2">
                                    <button type="button" onclick="closeEditModal({{ $review->id }})" class="text-gray-500">
                                        キャンセル
                                    </button>

                                    <button class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg">
                                        保存
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            @empty
                <p class="text-gray-500">まだレビューがありません。</p>
            @endforelse

            <div>
                {{ $reviews->links() }}
            </div>
        </section>


        <!-- いいねした温泉 -->
        <section class="space-y-6">
        <div class="flex items-center gap-3 inline-block bg-[#E6FBD0] border-l-4 border-[#2F4F2F] px-4 py-2 text-lg font-semibold mb-6">
            <h2 class="text-xl font-semibold">いいねした温泉</h2>
            </div>

            <div class="grid sm:grid-cols-4 gap-2">
                @forelse($likes as $onsen)
                    <a href="{{ route('onsens.show', $onsen) }}"
                        class="bg-[#F89880] rounded-xl shadow-sm p-4 hover:bg-[#F78874] hover:text-white transition border-b-2 border-gray-300">
                        <p class="font-semibold">{{ $onsen->name }}</p>
                    </a>
                @empty
                    <p class="text-gray-500">まだいいねした温泉がありません。</p>
                @endforelse
            </div>

            <div>
                {{ $likes->links() }}
            </div>
        </section>

    </div>


    <script>
        //編集モーダル
        function openEditModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        //星評価
        function setRating(reviewId, value) {
            document.getElementById('rating-input-' + reviewId).value = value;

            for (let i = 1; i <= 5; i++) {
                const star = document.getElementById('star-' + reviewId + '-' + i);
                if (i <= value) {
                    star.classList.add('text-yellow-400');
                    star.classList.remove('text-gray-300');
                } else {
                    star.classList.add('text-gray-300');
                    star.classList.remove('text-yellow-400');
                }
            }
        }
        //編集画像選択
        function toggleDelete(id, checkbox) {
            const img = document.getElementById(`img-${id}`);
            if (checkbox.checked) {
                img.classList.add('brightness-50');
                img.classList.add('opacity-70');
            } else {
                img.classList.remove('brightness-50');
                img.classList.remove('opacity-70');
            }
        }
    </script>
</x-app-layout>
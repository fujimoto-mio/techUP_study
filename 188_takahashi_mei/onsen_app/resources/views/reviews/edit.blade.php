<x-app-layout>
    <form method="POST" action="{{ route('reviews.update', $review) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- 星評価 -->
        <label class="block mb-2 font-semibold">評価</label>

        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', $review->rating) }}">
        <div id="starRating" class="flex gap-1 text-3xl cursor-pointer">
            @for ($i = 1; $i <= 5; $i++)
                <span data-value="{{ $i }}" class="star text-gray-300">★</span>
            @endfor
        </div>


        <textarea name="comment">{{ old('comment', $review->comment) }}</textarea>

        <div class="flex gap-2">
            @foreach($review->images as $image)
                <div>
                    <img src="{{ $image->image_path }}" class="w-24 h-24 object-cover rounded">
                    <label>
                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                        削除
                    </label>
                </div>
            @endforeach
        </div>

        <input type="file" name="images[]" multiple>

        <button type="submit">更新</button>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

    <!-- ⭐️評価JS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ratingInput = document.getElementById('ratingInput');
            const stars = document.querySelectorAll('#starRating .star');

            // 初期値を取得して塗りつぶす
            let initialValue = parseInt(ratingInput.value);
            if (initialValue) {
                stars.forEach(s => {
                    if (parseInt(s.dataset.value) <= initialValue) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-yellow-400');
                    }
                });
            }

            // クリック時の挙動
            stars.forEach(star => {
                star.addEventListener('click', function () {
                    let value = parseInt(this.dataset.value);
                    ratingInput.value = value;

                    stars.forEach(s => {
                        if (parseInt(s.dataset.value) <= value) {
                            s.classList.remove('text-gray-300');
                            s.classList.add('text-yellow-400');
                        } else {
                            s.classList.remove('text-yellow-400');
                            s.classList.add('text-gray-300');
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
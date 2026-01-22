<form method="POST" action="{{ route('reviews.update', $review) }}">
    @csrf
    @method('PUT')

    <input type="number" name="rating" value="{{ $review->rating }}" min="1" max="5">

    <textarea name="comment">{{ $review->comment }}</textarea>

    <button>更新</button>
</form>
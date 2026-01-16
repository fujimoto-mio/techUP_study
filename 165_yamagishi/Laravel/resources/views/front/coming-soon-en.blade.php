{{-- resources/views/front/coming-soon-en.blade.php --}}
@extends('layouts.app')

@section('title', 'Coming Soon')

@push('head')
    @vite('resources/css/front/coming-soon-en.css')
@endpush

@section('content')
<section class="coming-soon">
    <div class="coming-soon_inner">
        <h1>Coming soon…</h1>
        <p>
            Until it’s ready, please use the browser’s translation function.<br>
            Sorry for the inconvenience!
        </p>

        <a href="{{ route('front.home', ['lang' => 'ja']) }}" class="top_link">← Back to JP site</a>
    </div>
</section>
@endsection

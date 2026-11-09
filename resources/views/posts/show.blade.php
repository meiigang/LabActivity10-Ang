@extends('app')

@section('title', $post->title.' – Barangay Bulletin – Purok Ang')

@section('content')
    <article class="mx-auto max-w-3xl rounded-xl bg-white p-6 shadow sm:p-8">
        <a href="{{ route('posts.index') }}" class="text-sm font-semibold text-blue-700 hover:underline">
            &larr; Back to posts
        </a>

        <div class="mt-6 flex flex-wrap items-center gap-2 text-sm">
            <span class="rounded-full bg-blue-100 px-3 py-1 font-medium text-blue-800">{{ $post->category }}</span>
            @if ($post->is_pinned)
                <span class="rounded-full bg-amber-100 px-3 py-1 font-medium text-amber-800">Pinned</span>
            @endif
        </div>

        <h1 class="mt-4 text-3xl font-bold text-gray-900">{{ $post->title }}</h1>
        <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
            <span>{{ $post->published_at?->format('F d, Y') }}</span>
            <span>{{ $post->views }} views</span>
            <span>Author ID: {{ $post->author_id }}</span>
        </div>
        <p class="mt-8 whitespace-pre-line leading-7 text-gray-700">{{ $post->body }}</p>
    </article>
@endsection

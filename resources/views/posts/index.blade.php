@extends('app')

@section('title', 'Barangay Bulletin – Purok Ang')

@section('content')
    <div class="flex flex-col gap-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Community Posts</h1>
            <p class="mt-2 text-gray-600">News and announcements from Purok Ang.</p>
        </div>

        <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col gap-2 sm:flex-row">
            <label for="q" class="sr-only">Search title</label>
            <input id="q" name="q" value="{{ request('q') }}" placeholder="Search title"
                class="rounded-lg border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">

            <label for="category" class="sr-only">Category</label>
            <select id="category" name="category"
                class="rounded-lg border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
                @endforeach
            </select>

            <button type="submit" class="rounded-lg bg-blue-700 px-5 py-2 font-semibold text-white hover:bg-blue-800">
                Filter
            </button>
        </form>

        @forelse ($posts as $post)
            <article class="rounded-xl bg-white p-6 shadow">
                <div class="flex flex-wrap items-center gap-2 text-sm">
                    <span class="rounded-full bg-blue-100 px-3 py-1 font-medium text-blue-800">{{ $post->category }}</span>
                    @if ($post->is_pinned)
                        <span class="rounded-full bg-amber-100 px-3 py-1 font-medium text-amber-800">Pinned</span>
                    @endif
                </div>
                <h2 class="mt-3 text-xl font-bold">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-gray-900 hover:text-blue-700">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="mt-2 line-clamp-3 text-gray-600">{{ $post->body }}</p>
                <div class="mt-4 flex flex-wrap gap-4 text-sm text-gray-500">
                    <span>{{ $post->published_at?->format('M d, Y') }}</span>
                    <span>{{ $post->views }} views</span>
                    <span>Author ID: {{ $post->author_id }}</span>
                </div>
            </article>
        @empty
            <p class="rounded-lg bg-white p-6 text-gray-600 shadow">No posts match your search.</p>
        @endforelse

        <div>{{ $posts->links() }}</div>
        @if ($posts->total() > 0)
            <p class="text-sm text-gray-600">Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} posts</p>
        @endif
    </div>
@endsection

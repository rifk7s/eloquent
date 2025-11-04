@extends('layouts.app')

@section('title', 'Blog - Rifky')
@section('description', 'Read blog posts about web development, programming, and technology')

@section('content')
<div>
    <div class="blur-fade mb-8">
        @include('partials.custom_back_button', ['href' => '/', 'title' => 'Blogs'])
        <p class="text-secondary">Thoughts on web development, programming, and technology</p>
    </div>


    <div class="space-y-4">
        @forelse($posts as $index => $post)
            <article class="blur-fade blur-fade-delay-{{ $index + 1 }} card card-hover rounded-lg p-4">
                <a href="{{ route('blog.show', $post->slug) }}" class="block group">
                    <h3 class="font-medium mb-1 group-hover:text-blue-400 transition-colors">{{ $post->title }}</h3>
                    <div class="flex items-center gap-3 text-sm text-muted-foreground mb-2">
                        <span>{{ $post->published_at->format('F j, Y') }}</span>
                        <span>•</span>
                        <span>By {{ $post->user->name }}</span>
                    </div>
                    @if($post->excerpt)
                        <p class="text-sm text-muted">{{ $post->excerpt }}</p>
                    @endif
                </a>
            </article>
        @empty
            <p class="text-muted">No blog posts available yet.</p>
        @endforelse
    </div>
</div>
@endsection

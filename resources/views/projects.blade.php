@extends('layouts.app')

@section('title', 'Projects - Rifky')
@section('description', 'Explore my portfolio of web development projects, applications, and creative work')

@section('content')
<div>
    <div class="blur-fade mb-8">
        @include('partials.custom_back_button', ['href' => '/', 'title' => 'Projects'])
        <p class="text-secondary">A collection of my work and side projects</p>
    </div>

    <div class="blur-fade blur-fade-delay-2">
        <h2 class="text-xl font-semibold mb-4">All Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($projects as $index => $project)
                <article class="blur-fade blur-fade-delay-{{ ($index % 4) + 3 }} card card-hover rounded-lg overflow-hidden">
                    <a href="{{ route('projects.show', $project->slug) }}" class="block group">
                        @if($project->image)
                            <div class="h-48 bg-gray-800 overflow-hidden">
                                <img src="{{ $project->image }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-2 group-hover:text-blue-400 transition-colors">
                                {{ $project->title }}
                            </h3>
                            <div class="flex items-center gap-2 text-xs text-muted-foreground mb-3">
                                <span>{{ $project->type }}</span>
                                <span>•</span>
                                <span>By {{ $project->user->name }}</span>
                            </div>
                            <p class="text-sm text-muted-foreground mb-4 line-clamp-2">{{ $project->description }}</p>
                            
                            <div class="flex flex-wrap gap-2">
                                @foreach(array_slice($project->languages, 0, 3) as $tech)
                                    <span class="inline-block px-2 py-1 text-xs rounded bg-gray-800 text-gray-300">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                                @if(count($project->languages) > 3)
                                    <span class="inline-block px-2 py-1 text-xs rounded bg-gray-800 text-gray-300">
                                        +{{ count($project->languages) - 3 }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                </article>
            @empty
                <p class="text-muted col-span-2">No projects available yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection

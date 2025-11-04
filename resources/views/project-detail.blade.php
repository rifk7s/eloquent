@extends('layouts.app')

@section('title', $project->title . ' - Rifky')
@section('description', $project->description)

@section('content')
<div>
    <div class="blur-fade mb-8">
        @include('partials.custom_back_button', ['href' => route('projects.index'), 'title' => $project->title])
        <div class="flex items-center gap-3 text-secondary">
            <span>{{ $project->type }}</span>
            <span>•</span>
            <span>By {{ $project->user->name }}</span>
        </div>
    </div>

    <article class="blur-fade blur-fade-delay-1">
        @if($project->image)
            <div class="rounded-lg overflow-hidden mb-8 bg-gray-800">
                <img src="{{ $project->image }}"
                     alt="{{ $project->title }}"
                     class="w-full h-auto object-cover"
                     onerror="this.src='https://via.placeholder.com/800x400?text={{ urlencode($project->title) }}'">
            </div>
        @endif

        <div class="space-y-6">
            <div>
                <h2 class="text-2xl font-bold mb-4">About This Project</h2>
                <p class="text-muted-foreground leading-relaxed">{{ $project->description }}</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-3">Technologies Used</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->languages as $tech)
                        <span class="inline-block px-3 py-2 text-sm font-medium rounded-lg bg-gray-800 text-gray-200 border border-gray-700">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            </div>

            @if($project->github_url || $project->live_url)
                <div>
                    <h3 class="text-xl font-semibold mb-3">Links</h3>
                    <div class="flex flex-wrap gap-3">
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-blue-400 hover:text-blue-300 transition-colors border border-gray-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                View on GitHub
                            </a>
                        @endif
                        @if($project->live_url)
                            <a href="{{ $project->live_url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                View Live Demo
                            </a>
                        @endif
                    </div>
                </div>
            @endif

            <div class="pt-6 border-t border-gray-800">
                <p class="text-sm text-muted">
                    Project Type: <span class="text-muted-foreground">{{ $project->type }}</span>
                </p>
                <p class="text-sm text-muted mt-1">
                    Created: <span class="text-muted-foreground">{{ $project->created_at->format('F Y') }}</span>
                </p>
            </div>
        </div>
    </article>
</div>
@endsection

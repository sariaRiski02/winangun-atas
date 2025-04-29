@extends('app.main')

@section('main')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Featured Image -->
    <div class="aspect-w-16 aspect-h-9 mb-8 rounded-lg overflow-hidden">
        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
    </div>
    
    <!-- Title -->
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
        {{ $news->title }}
    </h1>
    
    <!-- Author info and date (you can add this if needed) -->
    <div class="flex items-center mb-8">
        <div class="h-10 w-10 rounded-full bg-gray-200 mr-3"></div>
        <div>
            <p class="text-sm font-medium text-gray-900">{{ $news->author }}</p>
            <p class="text-sm text-gray-500">Dipublikasi {{ $news->created_at->diffForHumans() }}</p>
        </div>
    </div>
    
    <!-- Content with Medium-style typography -->
    <div class="prose prose-lg max-w-none text-gray-800">
        {!! $news->content !!}
    </div>
    
    <!-- Related articles -->
    <div class="mt-16 border-t border-gray-200 pt-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">More from this author</h2>
        <div class="grid gap-8 md:grid-cols-2">
            <div class="group">
                <div class="aspect-w-16 aspect-h-9 mb-3 rounded-lg overflow-hidden bg-gray-100"></div>
                <h3 class="font-semibold text-gray-900 group-hover:text-gray-700">Another interesting article title that might be related</h3>
                <p class="text-sm text-gray-500 mt-1">5 min read · Mar 15</p>
            </div>
            <div class="group">
                <div class="aspect-w-16 aspect-h-9 mb-3 rounded-lg overflow-hidden bg-gray-100"></div>
                <h3 class="font-semibold text-gray-900 group-hover:text-gray-700">A second article that might be of interest to readers</h3>
                <p class="text-sm text-gray-500 mt-1">8 min read · Feb 28</p>
            </div>
        </div>
    </div>
</div>
@endsection
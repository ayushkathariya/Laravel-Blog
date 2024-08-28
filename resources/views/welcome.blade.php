@extends('layouts.main')

@section('content')
    {{-- Blogs --}}
    <section class="py-5">
        <div class="container">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($blogs as $blog)
                    <div class="px-6 py-4 border rounded">
                        <div>
                            <h2>{{ $blog->title }}</h2>
                        </div>
                        <div>
                            <a href="{{ route('blogs.blog-show', $blog->id) }}"
                                class="px-4 py-2 mt-3 duration-200 bg-green-500 rounded hover:bg-green-600">
                                Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

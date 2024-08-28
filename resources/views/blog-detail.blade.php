@extends('layouts.main')

@section('content')
    {{-- Blogs --}}
    <section class="py-5">
        <div class="container">
            {!! $blog->description !!}
        </div>
    </section>
@endsection

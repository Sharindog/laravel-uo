<?php
/* @var \App\Models\BlogCategory $blogCategory */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-dark bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Добавить категорию</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--                            TODO поменять везде на гетеры сетеры--}}
                            @foreach($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{ $blogCategory->id}}</td>
                                    <td>
                                        <a href="{{ route('blog.admin.categories.edit', $blogCategory->id) }}">
                                            {{ $blogCategory->getTitle() }}
                                        </a>
                                    </td>
                                    @if(null !==$blogCategory->getParent() )
                                        <td @if(in_array($blogCategory->getParent()->getTitle(), [\App\Models\BlogCategory::SOME_BLOG_KEY, 1])) style="color: #ccc" @endif>
                                            {{ $blogCategory->getParent()->getTitle() }}{{-- $item->parentCategory->title --}}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {!! $invoices->appends($frd ?? [])->render() !!}

{{--    @if($blogCategories->hasPages())--}}

{{--            <br>--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            {{ $blogCategories->links() }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
@endsection

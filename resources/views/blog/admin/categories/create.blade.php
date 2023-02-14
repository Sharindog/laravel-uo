<?php
/**@phpdoc
 * @var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('layouts.app')

@section('content')

    {{ Form::open(['url' => route('blog.admin.categories.store'), ]) }}

    @include('blog.admin.categories.forms._form')

    {{ Form::close() }}

@endsection

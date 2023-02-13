@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Админка категорий</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('blog.admin.categories.index') }}" class="btn btn-primary">Перейти в админку</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('medic.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $currentCategory->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $currentCategory->meta_keywords ?? '' }}"/>
    <title>{{ $currentCategory->meta_title ?? 'Категория' }}</title>
@endsection

@section('content')
    @include('medic.vendor.navigation', [
        'page' => 'Новости',
    ])

    <section class="blog-section style-four section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        @foreach ($blogs as $blog)
                            <div class="item-holder">
                                <div class="image-box">
                                    <figure>
                                        <a href="{{ $blog->getRoute() }}">
                                            <img src="{{ $blog->link }}" alt="{{ $blog->name }}">
                                        </a>
                                    </figure>
                                </div>
                                <div class="content-text">
                                    <a href="{{ $blog->getRoute() }}">
                                        <h6>{{ $blog->name }}</h6>
                                    </a>
                                    <span>{{ $blog->updater->full_name }} / {{ $blog->updated_at->format('d-m-Y H:i') }}</span>
                                    {!! mb_strimwidth($blog->content, 0, 300, "...") !!}
                                    <div class="link-btn">
                                        <a href="{{ $blog->getRoute(isset($currentCategory) ? ['category_id' => $currentCategory->id] : ['']) }}" class="btn-style-one">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @include('medic.blog.right_side')
            </div>

            <div class="styled-pagination">
                {{ $blogs->links('medic.vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection

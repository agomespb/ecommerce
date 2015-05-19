@extends('store.store')

@section('css_customizado')
    <link href="{{ url('css/stylle.css') }}" rel="stylesheet">
@stop

@section('sidebar_left')
    @include('store.categories_partial')
@stop

@section('content')
    <div class="col-sm-9 padding-right">

        <h2 class="title text-center">{{ $produto->name }}</h2>
        <h4 class="text-center">{{ trim($produto->description) }}</h4>

        <div class="product_images">

            <div class="cover">
                @if( count($produto->images) )
                    <img src="{{ url('uploads/'.$produto->images->first()->id .'.'. $produto->images->first()->extension) }}"
                         alt="" height=""/>
                @else
                    <img src="{{ url('images/no-img.jpg') }}" alt="" height="250"/>
                @endif
            </div>

            <div class="thumbs">
                @if( count($produto->images) )
                    @foreach($produto->images as $image)
                        <img src="{{ url('uploads/'.$image->id .'.'. $image->extension) }}" alt="" height="15%"/>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@stop

@section('js_customizado')
    <script>
        $(function () {
            $('.thumbs img').click(function () {

                var cover = $('.cover img');
                var thumb = $(this).attr('src');

                if (cover.attr('src') !== thumb) {
                    cover.fadeTo('200', '0', function () {
                        cover.attr('src', thumb);
                        cover.fadeTo('150', '1');
                    });
                }

                $('.thumbs img').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
@stop
@extends('layouts.app_view_articles_guest')
@section('content')

<div class="content-wrap">
    <article  style="padding-top:60px;" class="single-article">
        <h1 class="entry-header">{{$post->title}}</h1>

        @if($post->post_file)
            <!-- <embed data="{{ URL::to('/') }}/uploaded/files/{{$post->post_file}}" type="application/pdf" width="100%" height="700px" style="margin-top: 100px;"/> -->
            <iframe src="{{ URL::to('/') }}/uploaded/files/{{$post->post_file}}" type="application/pdf" width="100%" height="600px" ></iframe>
            <p class="pdf">Please download the article to view it: <a href="{{ URL::to('/') }}/uploaded/files/{{$post->post_file}}" target="blank">Download {{$post->title}} </a>.</p>
        @else
            @if($post->post_image)
            <img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" class="img-thumbnail" alt="{{$post->post_image}}" style="width:50%;height:50%" >
            @else
            <img src="{{asset('images/ieee-post-default.png')}}">
            @endif
        @endif

        

        @if (!\auth::guest())
            @if((auth()->user()->id == $post->user_id) || (auth()->user()->type == 'admin') )
                <div>
                    <a href="edit"><i class="fa fa-edit"></i></a>
                    {!! Form::open(['method'=>'DELETE' , 'route'=>['articles.destroy' , $post->id]]) !!}
                    {!! Form::submit('X' , ['class'=>'btn btn-danger d-inline-block'] ) !!}
                    {!! Form::close() !!}
                </div>
            @endif
        @endif

    </article>
</div>


@endsection

@extends('layouts.master');
<style>


</style>
@section('title')
    Dashboard
@endsection

@section('content')

    @include('includes.message');
    <section class="row new-post">
            <div class="col s12 m8 offset-m2 l6 offset-l3">

                    <h1>What's your need?</h1>
                    <form action="{{route('post.create')}}" method="post">
                        {{csrf_field()}}
                        <textarea name="body" id="new-post" cols="30" rows="10"></textarea>
                        <button type="submit" class="waves-effect waves-teal btn-flat">POST</button>
                        <input type="hidden" value="{{Session::token() }}" name="_token">
                    </form>
            </div>
    </section>

    <section class="row post ">
        <h1 class="center">What's other says?</h1>
        @foreach($posts as $post)
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s2">
                        <img src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s10">
                        <span class="black-text">
                           {{$post->body}}
                        </span>
                        <div class="info">
                            Posted by {{$post->users->first_name}} on {{$post->created_at}}
                        </div>
                        <div class="interaction">
                            <a href="#">Upvote</a>
                            <a href="#">Downvote</a>

                            @if(Auth::user() == $post->users)
                            <a href="#">Edit</a>
                            <a href="{{route('post.delete',['post_id' => $post->id])}}">Delete</a>
                            @endif
                        </div>
                    </div>


                </div>

            </div>
        </div>
        @endforeach



    </section>



@endsection
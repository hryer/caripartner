@extends('layouts.master');
<style>


</style>
@section('title')
    Dashboard
@endsection

@section('content')


    <section class="row new-post">
            <div class="col s12 m8 offset-m2 l6 offset-l3">

                    <h1>What's your need?</h1>
                    <form action="" method="post">
                        {{csrf_field()}}
                        <textarea name="new-post" id="new-post" cols="30" rows="10"></textarea>
                        <button type="submit" class="waves-effect waves-teal btn-flat">POST</button>
                    </form>
            </div>
    </section>

    <section class="row post ">

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s2">
                        <img src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s10">
                        <span class="black-text">
                            This is a square image. Add the "circle" class to it to make it appear circular.
                        </span>
                        <div class="info">
                            Posted by Harry on 24 Dec 2017
                        </div>
                        <div class="interaction">
                            <a href="#">Upvote</a>
                            <a href="#">Downvote</a>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s2">
                        <img src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s10">
                        <span class="black-text">
                            This is a square image. Add the "circle" class to it to make it appear circular.
                        </span>
                        <div class="info">
                            Posted by Harry on 24 Dec 2017
                        </div>
                        <div class="interaction">
                            <a href="#">Upvote</a>
                            <a href="#">Downvote</a>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s2">
                        <img src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s10">
                        <span class="black-text">
                            This is a square image. Add the "circle" class to it to make it appear circular.
                        </span>
                        <div class="info">
                            Posted by Harry on 24 Dec 2017
                        </div>
                        <div class="interaction">
                            <a href="#">Upvote</a>
                            <a href="#">Downvote</a>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>



    </section>



@endsection
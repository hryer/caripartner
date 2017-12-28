@extends('layouts.master');

@section('title')
    Account
@endsection

@section('content')
    <section class="row new-post">
        <div class="col md6 col offset md3">
            <header>
                <h3>Your Account</h3>
            </header>
            <form action="{{route('account.save')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col m12 s12">
                        <label for="first_name">Your First Name</label>
                        <input type="text" name="first_name" id="first_name" class="input_text validate" data-length="12" value="{{$user->first_name}}">
                    </div>

                    <div class="input-field col m12 s12">
                        <label for="last_name">Your Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="input_text validate" data-length="12" value="{{$user->last_name}}">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m12 s12">
                        <label for="image">Image (only .jpg)</label>
                        <input type="file" name="image" id="image" class="validate">
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col m6 s6">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                    <div class="input-field col m6 s6">
                        <button class="btn waves-effect waves-light red darken-3" type="button" name="action">Reset
                            <i class="material-icons right">cancel</i>
                        </button>

                    </div>

                </div>


            </form>
        </div>
    </section>
@endsection
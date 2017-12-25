@if(count($errors)>0)
    <div class="row">
        <div class="col md4 offset-m4 errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li><h3>{{$error}}</h3></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('message'))
    <script>console.log("masuk");</script>
    <div class="row">
        <div class="col md4 offset-m4 success">
            <h3>{{Session::get('message')}}</h3>
        </div>
    </div>
@endif
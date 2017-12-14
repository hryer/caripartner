@extends('layouts.master')

@section('title')
	Cari Partner
@endsection


@section('content')
	<div class="row">
		<div class="col m6">
			<h1>Sign In</h1>
			<form action="#" method="post">
				
				<div class="row">
					<div class="input-field col m12 s12">
						<label for="email">Your Email</label>
						<input type="text" name="email" id="email" class="validate" >
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col m12 s12">
						<label for="password">Your Password</label>
						<input type="password" name="password" id="password" class="validate">
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

		<div class="col m6">
			<h1>Sign Up</h1>
			<form action="{{ route('signup') }}" method="post">
				
				<div class="row">
					<div class="input-field col m12 s12">
						<label for="email">Your Email</label>
						<input  type="text" name="email" id="email" class="validate" >
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col m6 s6">
						<label for="first_name">Your First Name</label>
						<input type="text" name="first_name" id="first_name" class="input_text validate" data-length="12">
					</div>

					<div class="input-field col m6 s6">
						<label for="last_name">Your Last Name</label>
						<input type="text" name="last_name" id="last_name" class="input_text validate" data-length="12">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col m12 s12">
						<label for="password">Your Password</label>
						<input type="password" name="password" id="password" class="validate">
					</div>
				</div>
				
				<div class="row">
					<div class="col m12 s12">
						<p class="teal-text ">Role</p>
    
						 {{-- <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
      						<label for="filled-in-box">Hipster</label> --}}
						<input type="checkbox" id="hipster" name="hipster" class="role" value="1" checked />
      					<label for="hipster">Hipster</label>

      						<input type="checkbox" id="hustler" name="hustler" class="role" value="1" checked />
      					<label for="hustler">Hustler</label>

      						<input type="checkbox" id="hacker" name="hacker" class="role" value="1" checked />
      					<label for="hacker">Hacker</label>

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
  						<input type="hidden" name="_token" value="{{Session::token()}}">
					</div>
					 
				</div>

			</form>
		</div>
	</div>

  
        
@endsection
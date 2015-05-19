@extends('master')

@section('content')
	<div class="row">
    @if(count($user))

        <div class="headline col-lg-12"><h1>{{ $user[0]['name'] }} UserName</h1></div>
        <div class="col-lg-10"><div style="float:right"><button class="btn btn-info dropdown" style="margin: 5px;">Sort By<span class="caret"></span></button><button class="btn btn-info" style="margin: 5px;">Search</button></div></div>

        <div class="user_posts col-lg-5">
        	<h3>My posts</h3><br>
    		<p><h4>Lorem</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    		<p><h4>Ipsum</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <div class="user_stories col-lg-5">
        	<h3>My stories</h3><br>
        	<p><h4>Lorem</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        	<p><h4>Ipsum</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        	<p><h4>Dolor</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="user_profile col-lg-2"><div style="width:200px; height: 200px; background:teal; border-radius: 100px;"></div><div style="width:200px; height: 200px; background:#999; margin-top:40px; padding:10px; border-radius:3px;"><h4>About me</h4><p><b>Name: </b>Josè</p><p><b>Age: </b>32</p><p><b>Location: </b>FelipeTown</p></div><div style="width:200px; height: 200px; background:#345a5a; margin-top:40px; color:#2fc7c7; word-wrap: break-word; padding: 15px;"><h4>Most Used Hastags</h4><p>#Hastag,#Hastag,#Hastag,#Hastag,#Hastag,#Hastag,#Hastag,#Hastag,#Hastag</p></div></div>
    @endif
	</div>
@stop
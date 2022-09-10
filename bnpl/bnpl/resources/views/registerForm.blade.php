@extends('Layouts.master')
@section('title')
    register-form
@endsection
@section('content')
    @parent
    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">

        @csrf
        <label for="firstName">firstName: </label>
        <input type="text" id="firstName" name="firstName"><br>

        <label for="lastName">lastName: </label>
        <input type="text" id="lastName" name="lastName"><br>

        <label for="username">username: </label>
        <input type="text" id="username" name="username"><br>

        <label for="password">password: </label>
        <input type="password" name="password" id="password"><br>




        <label for="email">email: </label>
        <input type="email" name="email" id="email"><br>



        <input type="submit" name="submit" id="submit" value="register">

    </form>
@endsection

@extends('Layouts.master')
@section('title')
    define-installment
@endsection
@section('content')
    <form action="{{route('storeInstallment')}}" method="post">
        @csrf
        <label for="name">title: </label>
        <input type="text" name="installmentName" id="name"><br>

        <label for="installment_count">installment count: </label>
        <input type="text" name="installment_count" id="installment_count"><br>

        <label for="start_price">start price: </label>
        <input type="text" name="start_price" id="start_price"><br>

        <label for="end_price">end price: </label>
        <input type="text" name="end_price" id="end_price"><br>

        <input type="submit" value="submit" name="submit" id="submit">
    </form>
@endsection

@extends('Layouts.master')
@section('title')
define-services
@endsection
@section('content')
@parent
<table>
    <tr>
        <th>categoryID</th>
        <th>name</th>
        <th>parentID</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{$category['category_id']}}</td>
        <td>{{$category['name']}}</td>
        <td>{{$category['parent_ref_id']}}</td>
    </tr>
    @endforeach
</table>

<table>
    <tr>
        <th>installmentID</th>
        <th>name</th>
        <th>installment count</th>
        <th>start price</th>
        <th>end price</th>
    </tr>
    @foreach($installments as $installment)
    <tr>
        <th>{{$installment['installment_id']}}</th>
        <th>{{$installment['name']}}</th>
        <th>{{$installment['installment_count']}}</th>
        <th>{{$installment['start_price']}}</th>
        <th>{{$installment['end_price']}}</th>

    </tr>
    @endforeach
</table>

<form action="{{route('storeService')}}" method="post">
    @csrf
    <!-- <label for="categoryID">categoryID: </label>
    <input type="number" id="categoryID" name="categoryID"><br> -->
    <label for="category_id">category: </label>
    <select name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>

    <!-- <label for="installmentID">installment: </label>
    <input type="number" id="installmentID" name="installmentID"><br> -->

    <label for="installment_id">installment title: </label>
    <select name="installment_id">
        @foreach($installments as $installment)
        <option value="{{ $installment->installment_id }}">{{ $installment->name }}</option>
        @endforeach
    </select><br>

    <label for="title">service title: </label>
    <input type="text" name="title" id="title"><br>

    <label for="description">description: </label>
    <input type="text" name="description" id="description"><br>

    <input type="submit" name="submit" id="submit" value="submit">
</form>
@endsection
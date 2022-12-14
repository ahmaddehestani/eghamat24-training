@extends('Layouts.master')
@section('title')
    define-categories
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
                <td>{{$category->category_id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->parent_ref_id}}</td>
            </tr>
        @endforeach
    </table>


    <form action="{{route('storeCategories')}}" method="post">
        @csrf
        <label for="name">name: </label>
        <input type="text" name="name" id="name"><br>

        <label for="parentID">parent-id: </label>
        <input type="number" name="parentID" id="parentID"><br>

        <input type="submit" name="submit" id="submit" value="submit">
    </form>
@endsection

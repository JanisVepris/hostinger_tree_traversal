<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add category</title>
</head>
<body>
    {!! Form::open(['route' => 'categories.store']) !!}
    <div>
        {!! Form::label('parent_category_id', 'Parent category') !!}
        {!! Form::select('parent_category_id', [null => 'No parent'] + $categoryList) !!}
    </div>
    <div>
        {!! Form::label('name', 'Category name') !!}
        {!! Form::text('name') !!}
    </div>
    <div>
        {!! Form::submit('Save') !!}
    </div>
    {!! Form::close() !!}
</body>
</html>

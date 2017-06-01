<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category list</title>
</head>
<body>
    <div>
        {!! link_to_route('categories.create', 'Add category') !!}
    </div>
    <div>
        {!! $categoriesHtml !!}
    </div>
</body>
</html>

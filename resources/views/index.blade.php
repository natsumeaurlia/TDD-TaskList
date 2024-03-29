<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="container">
        <div class="btn btn-lg">
            {{ link_to_action('TaskController@add',
            '新規追加',
            [],
            ['class' => 'btn btn-primary btn-block']) }}
        </div>
        <h2>Tasks List</h2>
        <ul>
            @foreach ($tasks as $task)
            <li><a href="{{ route('task.show',['id'=>$task->id] ) }}">{{ $task->title }}</a></li>
            <li>
                <input type="checkbox" name="checkbox_{{ $task->id }}" {!! $task->executed ?
                'checked="checked"' : '' !!}>
            </li>
            @endforeach
        </ul>
        <script src="{{ asset('css/app.js') }}"></script>
</body>

</html>
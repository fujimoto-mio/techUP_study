<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>テスト</title>
</head>

<body>
  @if($todo_lists->isNotEmpty())
  <ul>
    @foreach($todo_lists as $item)
    <li>
      {{$item->name}}
    </li>
    @endforeach
  </ul>
  @endif
</body>

</html>
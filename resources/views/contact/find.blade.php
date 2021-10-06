<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム</title>
<!-- reset.css -->
  <link rel="stylesheet" href="css/reset.css" type="text/css">
<!-- style.css -->
  <link rel="stylesheet" href="css/find.style.css" type="text/css">
<!-- pagination -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <h2 class="find__title"> 管理システム</h2>
<!-- 検索ボックス -->
  <div class="find__search_box">
    <form action="/result" method="GET">
      <label for="fullname">お名前</label>
      <input type="text" name="fullname" id="fullname" class="fullname_input">
      <label for="gender">性別</label>
      <input type="radio" name="gender" checked="checked" value=""id="gender">全て
      <input type="radio" name="gender" value="1" id="gender">男性
      <input type="radio" name="gender" value="2" id="gender">女性
      <br>
      <label for="created_at">登録日</label>
      <input type="datetime-local" name="begin_date" id="created_at">
      <span class="wavedash">~</span>
      <input type="datetime-local" name="end_date" id="created_at"><br>
      <label for="s_email">メールアドレス</label>
      <input type="text" name="email" class="email_input"><br>
      <input type="submit" value="検索" class="find__search_box--btn">
      <div class="find__search_box--reset">
        <a href="/find">リセット</a>
      </div>
    </form>
  </div>
<!-- 検索結果がある場合 -->
  @if (@isset($data))
  <table class="result_table">
    <tr>
      <th class="result_table__id--th th">ID</th>
      <th class="result_table__fullname--th th">お名前</th>
      <th class="result_table__gender--th th">性別</th>
      <th class="result_table__email--th th">メールアドレス</th>
      <th class="result_table__short_opinion--th th">ご意見</th>
      <th class="result_table__full_opinion--th th"></th>
      <th class="result_table__delete--th th">削除</th>
    </tr>
    @foreach($data as $item)
    <tr>
      <td class="result_table__id--td">{{$item->id}}</td>
      <td class="result_table__fullname--td">{{$item->fullname}}</td>
      <td class="result_table__gender--td">
        @if($item->gender ===1)
        男性
        @else
        女性
        @endif
      </td>
      <td class="result_table__email--td">{{$item->email}}</td>
      <td class="result_table__short_opinion--td"><div class="short_opinion" id="short_opinion">{{Str::limit($item->opinion, 50, '...')}}</div></td>
      <td class="result_table__full_opinion--td"><div class="full_opinion" id="full_opinion">{{$item->opinion}}</div></td>
      <td>
        <form action="/delete" method="post">
        @csrf
          <input type="hidden" name="id" value="{{$item->id}}" class="delete_id">
          <div class="result_table__delete_btn--div">
            <input type="submit" value="削除" class="result_table__delete_btn">
          </div>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  {{$data->appends(Request::query())->links('vendor.pagination.bootstrap-4')}}
  @endif
<script src="{{ asset('/find.js') }}"></script>
</body>

</html>
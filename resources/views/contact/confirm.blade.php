<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
<!-- reset.css -->
  <link rel="stylesheet" href="css/reset.css" type="text/css">
<!-- style.css -->
  <link rel="stylesheet" href="css/confirm.style.css" type="text/css">
</head>

<body>
  <h2 class="confirm__title">内容確認</h2>
<!-- 確認内容テーブル　ここから -->
  <form action="/complete" method="POST">
  @csrf
    <table>
      <tr>
        <th>お名前</th>
        <td>
          {{$contact->getFullname()}}
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          @if($contact->gender == 1)
          男性
          @else
          女性
          @endif
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          {{$contact->email}}
        </td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>
          {{$contact->postcode}}
        </td>
      </tr>
      <tr>
        <th>住所</th>
        <td>
          {{$contact->address}}
        </td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          {{$contact->building_name}}
        </td>
      </tr>
      <tr>
        <th>ご意見</th>
        <td>
          {{$contact->opinion}}
        </td>
      </tr>
    </table>
    <div class="confrim__send_btn--div"><input type="submit" value="送信" class="confrim__send_btn"></div>
    <input type="hidden" name="fullname" value="{{$contact->getFullname()}}">
    <input type="hidden" name="gender" value="{{$contact->gender}}">
    <input type="hidden" name="email" value="{{$contact->email}}">
    <input type="hidden" name="postcode" value="{{$contact->postcode}}">
    <input type="hidden" name="address" value="{{$contact->address}}">
    <input type="hidden" name="building_name" value="{{$contact->building_name}}">
    <input type="hidden" name="opinion" value="{{$contact->opinion}}">
  </form>
<!-- 確認内容テーブル　ここまで -->
  <a class="confrim__modify_link" href="" onclick="history.back(-1);return false;">修正する</a>
</body>

</html>
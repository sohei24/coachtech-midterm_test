<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
<!-- reset.css -->
  <link rel="stylesheet" href="css/reset.css" type="text/css">
<!-- style.css -->
  <link rel="stylesheet" href="css/index.style.css" type="text/css">
<!-- 郵便番号から住所自動入力　-->
  <script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>
</head>

<body>
  <h2 class="contact__title">お問い合わせ</h2>
<!--「確認」押下後エラーがある場合に表示　ここから -->
  @if (count($errors) > 0)
  <p class="error_top">以下ご入力内容に問題があります。</p>
  @endif
<!--「確認」押下後エラーがある場合に表示　ここまで -->
<!-- お問い合わせフォーム　ここから -->
  <form action="/confirm" method="POST">
    <table>
    @csrf
      <tr>
        <th>お名前 <span class="asterisk">※</span></th>
        <td>
          <input type="text" name="family_name" value="{{old('family_name')}}" id="family_name" class="family_name_input">
          <input type="text" name="first_name" value="{{old('first_name')}}" id="first_name" class="first_name_input">
          <p class="sample"><span class="sample_family_name">例)山田</span><span class="sample_first_name">例)太郎</span></p>
        </td>
      </tr>
      @error('family_name')
      <tr>
        <th class="error_th">Error:</th>
        <td class="error_td">{{$message}}</td>
      </tr>
      @enderror
      @error('first_name')
      <tr>
        <th class="error_th">Error:</th>
        <td class="error_td">{{$message}}</td>
      </tr>
      @enderror
      <tr>
        <th>性別<span class="asterisk">※</span></th>
        <td>
          <label class="gender-radio">
          <input type="radio" name="gender" value="1" checked="checked" class="radio">
          <span class="radio-mark"></span>
          男性
          </label>
          <label class="gender-radio">
          <input type="radio" name="gender" value="2" class="radio">
          <span class="radio-mark"></span>
          女性
          </label>
        </td>
      </tr>
      <tr>
        <th>メールアドレス<span class="asterisk">※</span></th>
        <td>
          <input type="text" name="email" value="{{old('email')}}" id="email" class="email_input">
          <p class="sample">例) test@example.com</p>
        </td>
      </tr>
      @error('email')
      <tr>
        <th class="error_th">Error:</th>
        <td class="error_td">{{$message}}</td>
      </tr>
      @enderror
      <tr>
        <th>郵便番号<span class="asterisk">※</span></th>
        <td>
          <span class="postcode_mark">〒</span><input type="text" name="postcode" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{old('postcode')}}" id="postcode">
          <p class="sample">例) 123-4567</p>
        </td>
      </tr>
      <tr>
      @error('postcode')
      <tr>
        <th class="error_th">Error:</th>
        <td class="error_td">{{$message}}</td>
      </tr>
      @enderror
        <th>住所<span class="asterisk">※</span></th>
        <td>
          <input type="text" name="address" size="60" value="{{old('address')}}" id="address">
          <p class="sample">例)東京都渋谷区千駄ヶ谷1-2-3</p>
        </td>
      </tr>
      @error('address')
      <tr>
        <th class="error_th">Error:</th>
        <td class="error_td">{{$message}}</td>
      </tr>
      @enderror
      <tr>
        <th>建物名</th>
        <td>
          <input type="text" name="building_name" value="{{old('building_name')}}" class="building_name_input">
          <p class="sample">例)千駄ヶ谷マンション101</p>
        </td>
      </tr>
      <tr>
        <th class="contact_table__opinion--td">ご意見<span class="asterisk">※</span></th>
        <td>
          <textarea id="opinion" name="opinion" rows="4" cols="60">{{old('opinion')}}</textarea>
        </td>
      </tr>
      @error('opinion')
      <tr>
        <th class="error_th">Error:</th>
        <td class="error_td">{{$message}}</td>
      </tr>
      @enderror
    </table>
    <input type="submit" class="contact__btn" value="確認">
  </form>
<!-- お問い合わせフォーム　ここまで -->
<script src="{{ asset('/index.js') }}"></script>
</body>

</html>
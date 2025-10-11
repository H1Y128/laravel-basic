<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お気に入り選択</title>
</head>

<body>
  <h1>お気に入り選択ページ</h1>

  <form action="{{ route('favorites.store') }}" method="post">
    @csrf
    <label for="product_id">商品を選択:</label>
    <select name="product_id" id="product_id" required>
      @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->product_name }} (\{{ $product->price }})</option>
      @endforeach
    </select>
    <button type="submit">お気に入りに追加する</button>
  </form>
  <a href="{{ route('favorites.index') }}">お気に入りに一覧ページへ戻る</a>
</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お気に入り一覧</title>
</head>

<body>
  <h1>お気に入り一覧ページ</h1>
  @if ($products->isEmpty())
    <p>お気に入りに追加された商品はありません。</p>
  @else
    <ul>
      @foreach ($products as $product)
        <li>
          {{ $product->product_name }} (\{{ $product->price }})
          <form action="{{ route('favorites.destroy') }}" method="post" style="display: inline;">
            @csrf
            @method('DELETE')
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit">お気に入りを解除する</button>
          </form>
        </li>
      @endforeach
    </ul>
  @endif
  <a href="{{ route('favorites.create') }}">お気に入り選択ページへ戻る</a>
</body>

</html>
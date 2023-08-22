<!DOCTYPE html>
<html>
<head>
    <title>Product Cards</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Article</th>
        <th>Retail Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($productCards as $productCard)
        <tr>
            <td>{{ $productCard->title }}</td>
            <td>{{ $productCard->article }}</td>
            <td>{{ $productCard->retail_price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

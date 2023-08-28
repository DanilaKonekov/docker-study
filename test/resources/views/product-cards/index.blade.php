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
            @php
            $result = $productCard->calculatePrice();
            @endphp
            <td>{{ $productCard->title }}</td>
            <td>{{ $productCard->article }}</td>
            <td>{{ $result['retail_price'] }}</td>
            <td>{{ $result['opt_price'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

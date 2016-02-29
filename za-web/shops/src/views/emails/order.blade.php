<h3>Новый заказ!</h3>

Вам поступил заказ на следующие позиции:
<ul>
@foreach($items as $item)
    <li><strong>Название: </strong>{{ $item['name'] }} <strong>x {{ $item['quantity'] }} ( {{ $item['price'] * $item['quantity'] }} рублей )</strong></li>
    <li><strong>Артикул №: </strong>{{ $item['art'] }}</li>
    <li><strong>Описание: </strong>{{ $item['description'] }}</li>
    <br>
    <img src="{{ $item['pic'] }}" width="100" height="100">
@endforeach
</ul>

<h4>Данные клиента:</h4>

<ul>
    <li>
        Имя: {{ isset($client['name']) ? $client['name'] : '<i>Не указано</i>' }}
    </li>
    <li>
        Телефон: {{ isset($client['phone'])  ? $client['phone'] : '<i>Не указано</i>' }}

    </li>
    <li>
        Адрес: {{ isset($client['address']) ? $client['address'] : '<i>Не указано</i>' }}
    </li>
    <li>
        Дополнительная информация: {{ isset($client['extra']) ? $client['extra'] : '<i>Не указано</i>' }}
    </li>
</ul>

<h4>Общая сумма: {{ $totalSum }} рублей</h4>

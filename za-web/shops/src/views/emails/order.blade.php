<h3>Новый заказ!</h3>

Вам поступил заказ на следующие позиции:
<ul>
@foreach($items as $item)
    <li><a>{{ $item['name'] }}</a> <strong>x {{ $item['quantity'] }} ( {{ $item['price'] * $item['quantity'] }} рублей )</strong></li>
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
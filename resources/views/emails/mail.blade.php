<h3>Доброго времени суток {{$name}}</h3>
<br>
<p>Прислали вам все ваши траты</p>
<br>
@foreach($entries as $entry)
    <p>{{$entry}}</p><br>
@endforeach

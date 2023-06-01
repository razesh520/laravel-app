<h1>Data Magzine</h1>
@foreach ($news as $item)
<li><a href="{{ route('view',$item) }}">{{$item->title}}</a></li>

@endforeach
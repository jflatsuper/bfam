@foreach ($comments as $item)
<p>{{$item->username}}{{$item->comment}}</p>
    
@endforeach

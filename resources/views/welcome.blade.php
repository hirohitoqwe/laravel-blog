<a href="{{route('posts.create')}}">Сделать пост</a>
<table>
@foreach ($posts as $post)
        <tr>
            <td>{{$post->author}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->text}}</td>
        </tr>
    
@endforeach
</table>
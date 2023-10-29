<x-app-layout>
    <h1>マイページ</h1>
    
    <h2>自分の投稿</h2>
    <ul>
        @foreach($myposts as $post)
            <li>
                <a href="/posts/{{$post->id }}">{{$post->title}}</a>
            </li>
        @endforeach
    </ul>
    <h2>いいねした投稿</h2>
    <ul>
        @foreach($likedposts as $post)
            <li>
                <a href="/posts/{{$post->id }}">{{$post->title}}</a>
            </li>
        @endforeach
    </ul>
</x-app-layout>


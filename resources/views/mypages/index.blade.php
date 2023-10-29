<x-app-layout>
    <h1>マイページ</h1>
    
    <h2>自分の投稿</h2>
    <ul>
        @foreach($myposts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
    
    <h2>いいねした投稿</h2>
    @foreach($likedposts as $post)
        <p>{{ $post->title }}</p>
    @endforeach
</x-app-layout>
<x-app-layout>
    <h1>詳細画面</h1>
    <div>
        <p>タイトル：{{ $post->title }}</p>
        <p>本文：{{ $post->body }}</p>
        <img src="{{ $post->image }}" />
    </div>
    <br>
    <div>
        <i class="fa-regular fa-sun fa-2xl {{ $post->isLikedBy(Auth::user()) ? "liked" : "" }}" id="like" data-postId="{{ $post->id }}" data-flg="{{ $post->isLikedBy(Auth::user()) }}"></i>
        <p id="likeCount">{{ $post->likeCount() }}</p>
    </div>
    <h2>コメント</h2>
    <form action="/post/{{ $post->id }}/comments" method="POST">
        @csrf
        <textarea name="comments[comment]"></textarea>
        <button type="submit">送信</button>
    </form>
    <ul>
    @foreach($comments as $comment)
        <li>{{ $comment->comment }}</li>
    @endforeach
    </ul>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
   
</x-app-layout>

<x-app-layout>
     <div class='post'>
        <p>{{ $post->body }}</p>
        <p>作成者：{{ $post->user->name }}</p>
    </div>
    <h2>コメント</h2>
        @csrf
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

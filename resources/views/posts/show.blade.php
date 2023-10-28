<x-app-layout>
    <h1>詳細画面</h1>
    <div>
        <p>タイトル：{{ $post->title }}</p>
        <p>本文：{{ $post->body }}</p>
    </div>
    <div>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
        <a href="/">戻る</a>
    </div>
</x-app-layout>

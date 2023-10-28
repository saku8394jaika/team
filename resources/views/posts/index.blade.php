<x-app-layout>
    <h1>チーム開発会へようこそ！</h1>
    <h2>投稿一覧画面</h2>
    <a href='/posts/create'>新規投稿</a>
    <div>
        @foreach ($posts as $post)
            <div style='border:solid 1px; margin-bottom: 10px;'>
                <p>
                    タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </p>
            </div>
        @endforeach
    </div>
    <div>
        {{ $posts->links() }}
    </div>
</x-app-layout>

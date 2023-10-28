<x-app-layout>
    <h1>チーム開発会へようこそ！</h1>
    <h2>投稿作成</h2>
    <form action="/posts" method="POST">
        @csrf
        <div>
            <h2>タイトル</h2>
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        <div>
            <h2>本文</h2>
            <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </div>
        <input type="submit" value="保存"/>
    </form>
    <div><a href="/">戻る</a></div>
</x-app-layout>
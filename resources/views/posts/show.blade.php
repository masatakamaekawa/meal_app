<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">

        <x-flash-message :message="session('notice')" />
        <x-validation-errors :errors="$errors" />

        <article class="mb-2">
            <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl">
                {{ $post->title }}</h2>
            <h3>{{ $post->user->name }}</h3>
            <span class="text-red-400 font-bold">{{ $post->created_at->diffForHumans() }}</span>
            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                {{ $post->created_at }}
            </p>
            <img src="{{ $post->image_url }}" alt="" class="mb-4">
            <p class="text-gray-700 text-base">{!! nl2br(e($post->body)) !!}</p>
        </article>

        @if (Auth::check())
            @if ($like)
                <a href="{{ route('unlike', $post) }}"
                    class="bg-pink-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-42">お気に入りの削除</a><br><br>
                <b>お気に入り数</b>
                <span class="badge">
                    {{ $post->likes->count() }}
                </span>
                </a>
            @else
                <a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
                    <b>お気に入り数</b>
                    <span class="badge">
                        {{ $post->likes->count() }}
                    </span>
            @endif
            </a>
        @endif
        <div class="flex flex-row text-center my-4">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                </form>
            @endcan
        </div>
</x-app-layout>

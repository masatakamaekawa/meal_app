<x-app-layout>

    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">

        <x-flash-message :message="session('notice')" />

        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts as $post)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('posts.show', $post) }}">
                        <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl">
                            {{ $post->title }}</h2>
                        <h3>{{ $post->user->name }}</h3>
                        <span class="text-red-400 font-bold">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                            {{ $post->created_at }}
                        </p>
                        <img class="w-full mb-2" src="{{ $post->image_url }}" alt="">
                        <p class="text-gray-700 text-base">{{ Str::limit($post->body, 50) }}</p>
                        <a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
                            <b>お気に入り数</b>
                            <span class="badge">
                                {{ $post->likes->count() }}
                            </span>
                        </a>
                    </a>
                </article>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
</x-app-layout>

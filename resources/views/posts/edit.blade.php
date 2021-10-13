<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">食事記事編集</h2>

        <x-validation-errors :errors="$errors" />

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data"
            class="rounded pt-3 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="title">
                    タイトル
                </label>
                <input type="text" name="title"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required placeholder="タイトル" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group row">
                <label for="radio01" class="col-md-4 col-form-label text-sm mb-2">カテゴリー</label>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="radio01" name="radioGrp02" value="opt1"
                            checked="checked">
                        <label class="form-check-label" for="radio01">野菜</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="radio02" name="radioGrp02" value="opt2">
                        <label class="form-check-label" for="radio02">タンパク質</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="radio03" name="radioGrp02" value="opt3">
                        <label class="form-check-label" for="radio03">炭水化物</label>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="body">
                    詳細
                </label>
                <textarea name="body" rows="10"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required placeholder="本文">{{ old('body', $post->body) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="image">
                    食事の画像
                </label>
                <img src="{{ $post->image_url }}" alt="" class="mb-4 md:w-2/5 sm:auto">
                <input type="file" name="image" class="border-gray-300">
            </div>
            <input type="submit" value="更新"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>
</x-app-layout>

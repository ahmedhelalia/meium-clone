<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4"> {{ $post->title }} </h1>
                <!-- user avatar -->
                <div class="flex gap-4 mb-1">
                    <x-user-avatar :user="$post->user" />
                    <div>
                        <x-follow-ctr :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="hover:underline">
                                {{ $post->user->username }} </a>

                            @if (auth()->user() && auth()->user()->id !== $post->user->id)
                                &middot;
                                <button @click="(follow())" x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'text-red-600' : 'text-emerald-600'"> Follow </button>
                            @endif
                        </x-follow-ctr>

                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min read
                            &middot;
                           at {{ $post->published_at->format('M d, Y') }}
                        </div>
                    </div>

                </div>

                @if ($post->user_id === Auth::id())
                    <div class="py-4 mt-4 border-t border-gray-200">
                        <x-primary-button href="{{ route('post.edit', $post) }}">
                            Edit Post
                        </x-primary-button>
                        <form class="inline-block" action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('delete')
                            <x-danger-button>
                                Delete Post
                            </x-danger-button>
                        </form>
                    </div>
                @endif
                <x-like-button :post="$post" />

                <div class="mt-8">
                    <img src="{{ $post->imageUrl('') }}" alt="{{ $post->title }}" class="w-full">
                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>

                <div class="mt-8 ">
                    <span class="px-4  py-2 bg-gray-300 rounded-2xl"> {{ $post->category->name }}</span>
                </div>
                <x-like-button :post="$post" />
            </div>
        </div>

    </div>
</x-app-layout>

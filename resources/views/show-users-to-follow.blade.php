<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-4">Suggested Users to Follow</h2>
                    @if ($users->isEmpty())
                        <p>No users to suggest at the moment.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($users as $user)
                                <div class="flex flex-col items-left bg-gray-50 p-4 rounded-lg shadow-sm h-full">
                                    <x-follow-ctr :user="$user" class="flex flex-col h-full">
                                        <x-user-avatar :user="$user" size="w-24 h-24" />
                                        <h3>{{ $user->username }}</h3>
                                        <p class="text-gray-500 mt-2"> <span x-text="followersCount"></span> followers </p>
                                        <p class="text-gray-500 mt-2"> <span> {{$user->posts_count}} </span> posts </p>
                                        <p class="flex-grow text-gray-800 mt-2"> {{ $user->bio }}</p>
                                        <div class="mt-4">
                                            <button @click="follow()" class="rounded-full px-4 py-2 text-white"
                                                x-text="following ? 'Unfollow' : 'Follow'"
                                                :class="following ? 'bg-red-600' : 'bg-emerald-600'"> </button>
                                        </div>
                                    </x-follow-ctr>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

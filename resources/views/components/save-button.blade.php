@props(['post'])
@auth
    <div x-data="{
        hasSaved : {{ auth()->user()->hasSaved($post) ? 'true' : 'false' }},
            save() {
                axios.post('/save/{{ $post->id }}')
                    .then(response => {
                        this.hasSaved = !this.hasSaved
                    })
                    .catch(error => {
                        console.error(error)
                    })
            }
    }" class="p-4 mt-4">
        <button @click="save()" class="flex gap-2 text-gray-500">
            <template x-if="!hasSaved">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                </svg>
            </template>

            <template x-if="hasSaved">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path
                        d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM20.25 5.507v11.561L5.853 2.671c.15-.043.306-.075.467-.094a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93ZM3.75 21V6.932l14.063 14.063L12 18.088l-7.165 3.583A.75.75 0 0 1 3.75 21Z" />
                </svg>
            </template>
        </button>
    </div>
@endauth

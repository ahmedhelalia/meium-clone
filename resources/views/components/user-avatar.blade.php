@props(['user', 'size' => 'w-12 h-12'])
@if ($user->image)
    <img src="{{ $user->imageUrl() }}" alt="{{ $user->username }}" class="{{ $size }} rounded-full">
@else
    <img src="/users.png" alt="default-not-found" class="{{ $size }} rounded-full">
@endif

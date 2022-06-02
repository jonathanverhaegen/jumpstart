<div class="post__likes">
    @if(!empty($like))
    <img src="/img/icon_heart-filled.svg" alt="like" wire:click="delete('{{$post_id}}')">
    @else
    <img src="/img/icon_heart.svg" alt="like" wire:click="add('{{$post_id}}')">
    @endif
</div>

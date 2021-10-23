<div class="form-group">
    <select name="tag_ids[]" id="tag_ids" multiple class="form-control">
        @foreach(App\Models\Tag::orderBy('name')->get() as $tag)
        <option value="{{ $tag->id }}" {{ $order->tags->contains($tag->id) ? 'selected': '' }}>{{ $tag->name }}</option>
        @endforeach
    </select>
</div>
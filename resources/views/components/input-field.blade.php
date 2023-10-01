<input type="text"
    class="w-full bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin "
    id={{ $id }} name={{ $name }} value="{{ old('name') }}" placeholder="{{ $placeholder }}">
@error('name')
    <small style="color: {{ $color }}">{{ $message }}</small>
@enderror

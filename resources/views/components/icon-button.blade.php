<a href="{{ route('user#roleSelect', ['provider' => 'facebook']) }}">
    <div
        class="my-4 py-2 flex flex-row items-center justify-center gap-6 w-full bg-{{ $bgColor }} border-2 border-white p-4 text-b1  tracking-widest rounded-xl text-{{ $textColor }} cursor-pointer">
        <img src="{{ $icon }}" alt="">
        <p>
            {{ $text }}
        </p>
    </div>
</a>

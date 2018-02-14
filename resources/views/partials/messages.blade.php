@if ($messages = session()->flashed('messages'))
    <section class="section">
        @foreach ($messages as $type => $message)
            <div class="notification is-{{ $type }}">
                {{ $message }}
            </div>
        @endforeach
    </section>
@endif

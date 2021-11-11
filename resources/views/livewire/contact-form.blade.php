<div>
    @if(session('emailSent'))
        <p>{{ session('emailSent') }}</p>
    @endif

    @if(session('emailNotSent'))
        <p>{{ session('emailNotSent') }}</p>
    @endif

    <form wire:submit.prevent="submit">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" wire:model="name">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" id="email" wire:model="email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" wire:model="body"></textarea>
            @error('body')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button>Send</button>
        </div>
    </form>
</div>
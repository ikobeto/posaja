<div>
    @if ($message)
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
            class="p-4 mb-4 text-sm rounded 
               {{ $type === 'success' ? 'alert alert-success' : 'alert alert-danger' }}">
            {{ $message }}
        </div>
    @endif
   
</div>

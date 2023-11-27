<!-- Delete Button Component -->
{{-- @props([
    'route' => '',
    'confirmMessage' => 'Are you sure you want to delete this item?',
    'method' => 'DELETE',
    'btnClasses' => '',
    
]) --}}
<form action="{{ $route }}" method="POST" style="display:block;">
    @csrf
    @method('Delete')
 
    <button type="submit" class="{{$class}}" onclick="return confirm('Are you sure you want to delete this item?');">
        {{-- <i class="fa-solid fa-trash"></i> --}}
        Delete
    </button>
</form>

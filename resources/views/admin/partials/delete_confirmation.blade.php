<div class="overlay d-none">
    <form class="delete-confirmation {{ $delete_name }}" action="link al delete" method="POST">
        @method('DELETE')
        @csrf
        <h2>Vuoi eliminare?</h2>
        <button type="button" class="btn btn-warning btn-close-me">No</button>
        <button class="btn btn-danger btn-delete">Si</button>
    </form>
</div>

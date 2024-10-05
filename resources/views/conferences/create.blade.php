<form action="{{ route('conferences.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Pavadinimas</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Aprašymas</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="date_time">Data ir laikas</label>
        <input type="datetime-local" name="date_time" id="date_time" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="location">Vieta</label>
        <input type="text" name="location" id="location" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Sukurti konferenciją</button>
</form>

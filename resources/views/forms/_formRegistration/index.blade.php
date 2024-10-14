<div class="col-md-6">
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{ isset($registration->title) ? $registration->title : '' }}"
            class="form-control border-secondary" placeholder="Título" required>
    </div>
</div> <!-- /.col -->


<div class="col-md-6">
    <div class="form-group">
        <label for="file">Arquivo</label>
        <input type="file" name="file" id="file" value="{{ old('file') }}" class="form-control border-secondary">
    </div>
</div>

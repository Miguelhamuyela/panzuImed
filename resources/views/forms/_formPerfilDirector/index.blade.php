<div class="col-md-12">
    <div class="form-group">
        <label for="Nome">Nome</label>
        <input type="text" name="name" id="name" value="{{ isset($director->name) ? $director->name : '' }}"
            class="form-control border-secondary" placeholder="Título" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-12">
    <div class="form-group">
        <label for="photo">Selecione a foto de capa</label>
        <input value="{{ isset($director->image) ? $director->image : '' }}" class="form-control border-secondary"
            type="file" name="image" id="image">
    </div>
</div> 

<div class="col-md-12 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Corpo da Composição</h5>
            <p>Digite o corpo da Composição</p>
            <!-- Create the editor container -->
            <textarea name="description" id="editor1" style="min-height:300px; min-width:100%">
       {{ isset($director->description) ? $director->description : '' }}
        </textarea>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="Nome do Aluno">Nome do Aluno</label>
        <input type="text" name="name" id="name"
            value="{{ isset($route->name) ? $route->name : '' }}"
            class="form-control border-secondary" placeholder="Nome do Aluno" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-4">
    <div class="form-group">
        <label for="Curso">Curso</label>
        <input value="{{ isset($route->course) ? $route->course : '' }}"
            class="form-control border-secondary" type="text" placeholder="Curso" name="course" id="course" required>
    </div>
</div>

<div class="col-md-2">
    <div class="form-group">
        <label for="Ano">Ano</label>
        <input value="{{ isset($route->class) ? $route->class : '' }}"
            class="form-control border-secondary" type="text" placeholder="Ano" name="class" id="class">
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        <label for="Selecione a foto de capa">Selecione a foto de capa</label>
        <input value="{{ isset($route->image) ? $route->image : '' }}"
            class="form-control border-secondary" type="file" name="image" id="image">
    </div>
</div> <!-- /.col -->





<div class="col-md-12 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Descrição</h5>
            <p>Digite o corpo da matéria sobre o percurso do aluno.</p>
            <!-- Create the editor container -->
            <textarea name="description" id="editor1" style="min-height:300px; min-width:100%" >
                {{ isset($route->description) ? $route->description : old('description')}}
            </textarea>
        </div>
    </div>
</div>








@isset($formerDirector)
    <div class="col-12 mb-4">
        <div class="row">
            <div class="col-md-12 text-left mt-2">
                <h4>Imagem</h4>
            </div>
            <div class="col-md-12 rounded"
                style='background-image:url("/storage/{{ $formerDirector->image }}");background-position:center;background-size:cover;height:400px;'>
            </div>
        </div>
    </div>
@endisset

<div class="col-md-6">
    <div class="form-group">
        <label for="name">Nome Completo</label>
        <input type="text" name="name" id="name"
            value="{{ isset($formerDirector->name) ? $formerDirector->name : '' }}"
            class="form-control border-secondary" placeholder="Nome Completo" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-6">
    <div class="form-group">
        <label for="image">Selecione a foto de capa</label>
        <input value="{{ isset($formerDirector->image) ? $formerDirector->image : '' }}"
            class="form-control border-secondary" type="file" name="image" id="image">
    </div>
</div> <!-- /.col -->

<div class="col-md-6">
    <div class="form-group">
        <label for="Data de Entrada">Data de Entrada</label>
        <input type="date" name="startDate" id="startDate"
            value="{{ isset($formerDirector->startDate) ? date('Y-m-d', strtotime($formerDirector->startDate)) : old('startDate') }}"
            class="form-control border-secondary rounded" placeholder="Inicio do contracto" required>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="Data de Saída">Data de Saída</label>
        <input type="date" name="endDate" id="endDate"
            value="{{ isset($formerDirector->endDate) ? date('Y-m-d', strtotime($formerDirector->endDate)) : old('endDate') }}"
            class="form-control border-secondary rounded">
    </div>
</div> <!-- /.col -->



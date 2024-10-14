@isset($honorBoard)
    <div class="col-12 col-lg-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="page-studentName">Capa Actual</h2>
            </div>

        </div>
        <div class="card-deck mb-4">

            <div class="card border-0 bg-transparent">
                <div class="card-img-top img-fluid rounded"
                    style='background-image:url("/storage/{{ $honorBoard->image }}");background-position:center;background-size:cover;height:200px;'>
                </div>

            </div> <!-- .card -->


        </div> <!-- .card-deck -->
    </div>
@endisset

<div class="col-md-6">
    <div class="form-group">
        <label for="studentName">Nome do Estudante</label>
        <input type="text" name="studentName" id="studentName"
            value="{{ isset($honorBoard->studentName) ? $honorBoard->studentName : old('studentName') }}"
            class="form-control border-secondary" placeholder="Digite o nome do Estudante" required>
    </div>
</div> <!-- /.col -->



<div class="col-md-6">
    <div class="form-group">
        <div class="custom-file">
            <label class="form-label border-secondary" for="image">Selecione a Capa</label>
            <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="image">

        </div>
    </div>
</div> <!-- /.col -->

<div class="col-md-12 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-studentName">Corpo da Descrição</h5>
            <p>Digite o corpo da Descrição</p>
            <!-- Create the editor container -->
            <textarea name="body" id="editor1" style="min-height:300px; min-width:100%">
                {{ isset($honorBoard->body) ? $honorBoard->body : old('body') }}
            </textarea>
        </div>
    </div>
</div>

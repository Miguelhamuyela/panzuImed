@isset($subCourse)
    <div class="col-12 col-lg-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="page-title">Capa Actual</h2>
            </div>

        </div>
        <div class="card-deck mb-4">

            <div class="card border-0 bg-transparent">
                <div class="card-img-top img-fluid rounded"
                    style='background-image:url("/storage/{{ $subCourse->image }}");background-position:center;background-size:cover;height:400px;width:500px;'>
                </div>

            </div> <!-- .card -->


        </div> <!-- .card-deck -->
    </div>
@endisset

<div class="col-md-6">
    <div class="form-group">
        <label for="courseName">Nome do Curso</label>
        <input type="text" name="courseName" id="courseName"
            value="{{ isset($subCourse->courseName) ? $subCourse->courseName : '' }}" class="form-control border-secondary"
            placeholder="Nome do Curso" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-6">
    <div class="form-group">
        <label for="image">Capa a carregar</label>
        <div class="custom-file">
            <input value="{{ isset($subCourse->image) ? $subCourse->image : '' }}" class="form-control border-secondary"
                type="file" name="image" id="image">

        </div>
    </div>
</div> <!-- /.col -->

<div class="col-md-12 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Corpo da Matéria</h5>
            <p>Digite o corpo da matéria</p>
            <!-- Create the editor container -->
            <textarea name="body" id="editor1" style="min-height:300px; min-width:100%" >
                {{ isset($subCourse->body) ? $subCourse->body : old('body')}}
            </textarea>
        </div>
    </div>
</div>

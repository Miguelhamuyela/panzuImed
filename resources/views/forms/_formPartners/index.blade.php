@isset($partners)


    <div class="col-12 col-lg-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="page-title">Capa Actual</h2>
            </div>

        </div>
        <div class="card-deck mb-4">

            <div class="card border-0 bg-transparent">
                <div class="card-img-top img-fluid rounded"
                    style='background-image:url("/storage/{{ $partners->image }}");background-position:center;background-size:cover;height:200px;'>
                </div>

            </div> <!-- .card -->


        </div> <!-- .card-deck -->
    </div>
@endisset

<div class="col-md-6">
    <div class="form-group">
        <label for="title">Nome do Parceiro</label>
        <input type="text" name="name" id="name" value="{{ isset($partners->name) ? $partners->name : old('name') }}"
            class="form-control border-secondary" placeholder="Titulo" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-6">
    <div class="form-group">
        <label for="title">Link</label>
        <input type="text" name="link" id="link" value="{{ isset($partners->link) ? $partners->link : old('link') }}"
            class="form-control border-secondary" placeholder="Link" >
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        <div class="custom-file">
            <label class="form-label " for="image">Selecione a Capa</label>
            <input type="file" class="form-control border-secondary" name="image" value="{{ old('image') }}" id="image">

        </div>
    </div>
</div> <!-- /.col -->




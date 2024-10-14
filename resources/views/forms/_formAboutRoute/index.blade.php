<!-- /.col -->

<div class="col-md-12 mb-4">

        <div class="card-about">
            <h5 class="card-title">Sobre o Percurso</h5>
            <p>Digite o corpo da matéria</p>
            <!-- Create the editor container -->
            <textarea name="description" id="editor1" style="min-height:300px; min-width:100%">
                {{ isset($aboutRoute->description) ? $aboutRoute->description : old('description') }}
            </textarea>
        </div>

</div>




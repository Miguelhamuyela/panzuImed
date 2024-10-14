@isset($governingBodie)
   <div class="col-12 mb-4">
        <div class="row">
            <div class="col-md-12 text-left mt-2">
                <h4>Imagem</h4>
            </div>
            <div class="col-md-12 rounded"
                style='background-image:url("/storage/{{ $governingBodie->image }}");background-position:center;background-size:cover;height:400px;'>
            </div>
        </div>
    </div>
@endisset

<div class="col-md-6">
    <div class="form-group">
        <label for="name">Nome Completo</label>
        <input type="text" name="name" id="name" value="{{ isset($governingBodie->name) ? $governingBodie->name : '' }}"
            class="form-control border-secondary" placeholder="Nome Completo" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-6">
        <div class="form-group">
            <label for="Função">Função/Cargo </label>

            <select type="text" name="function" id="function" class="form-control border-secondary rounded" required>

                @if (isset($governingBodie->function))
                    <option value="{{ $governingBodie->function }}" class="text-primary h6 bg-primary text-white"
                        selected>
                        {{ $governingBodie->function }}
                    </option>
                @else
                    <option disabled selected value="">Selecione uma Função/Cargo</option>
                @endif
                <option>Director</option>
                <option>Subdirector(a) Administrativo(a)</option>
                <option>Subdirector Pedagógico</option>
                <option>Coordenador(a) do Curso de Desenhador Projectista</option>
                <option>Coordenador(a) de Gestão de Sistemas Informáticos e Técnico de Informática</option>
                <option>Coordenador(a) do Curso de Mecânica e Frio</option>
                <option>Coordenador(a) do Curso de Construção Civil</option>
                <option>Coordenador(a) do Curso de Tecnologias de Móveis</option>
                <option>Coordenador(a) do Curso de Energia e Instalações Eléctricas</option>
                <option>Coodenador(a) de Educação Física e Actividades Extra-Escolares</option>
                <option>Coodenador(a) da Disciplina de Língua Portuguesa</option>
                <option>Coodenador(a) da Disciplina de Língua Inglesa</option>
                <option>Coodenador(a) da Disciplina de Matemática</option>
                <option>Coodenador(a) da Disciplina de Desenho Técnico</option>
                <option>Coodenador(a) da Disciplina de Física</option>
                <option>Coodenador(a) da Disciplina de Empreendedoriismo</option>
                <option>Coodenador(a) da Disciplina de FAI</option>
                <option>Coodenador(a) da Disciplina de Química</option>
                <option>Chefe da Área do Património</option>
                <option>Chefe de Secretária Pedagógica</option>
                <option>Chefe de Equipa de Segurança</option>
                <option>Chefe de Secretária Administrativa</option>
                <option>Coordenador(a) da Comissão Disciplinar</option>
                <option>Coordenador(a) do Turno da Manhã</option>
                <option>Coordenador(a) do Turno da Tarde</option>
                <option>Coordenador(a) do Acção Social</option>
                <option>Coordenador(a) do GIVA</option>
            </select>
        </div>
</div> <!-- /.col -->

<div class="col-md-12">
    <div class="form-group">
        <label for="image">Selecione a foto de capa</label>
        <input value="{{ isset($governingBodie->image) ? $governingBodie->image : '' }}" class="form-control border-secondary"
            type="file" name="image" id="image">
    </div>
</div> <!-- /.col -->

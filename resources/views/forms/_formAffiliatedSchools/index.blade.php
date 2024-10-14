<div class="col-md-8">
    <div class="form-group">
        <label for="Nome do Aluno">Nome da Escola</label>
        <input type="text" name="name" id="name"
            value="{{ isset($affiliated->name) ? $affiliated->name : '' }}"
            class="form-control border-secondary" placeholder="Nome da Escola" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-4">
    <div class="form-group">
        <label for="Telefone">Telefone</label>
        <input value="{{ isset($affiliated->tel) ? $affiliated->tel : '' }}"
            class="form-control border-secondary" type="text" placeholder="Telefone" name="tel" id="tel">
    </div>
</div>


<div class="col-md-4">
    <div class="form-group">
        <label for="Classe">Email</label>
        <input value="{{ isset($affiliated->email) ? $affiliated->email : '' }}"
            class="form-control border-secondary" type="email" placeholder="Email" name="email" id="email">
    </div>
</div> <!-- /.col -->

<div class="col-md-4">
    <div class="form-group">
        <label for="Classe">Endereço</label>
        <input value="{{ isset($affiliated->address) ? $affiliated->address : '' }}"
            class="form-control border-secondary" type="text" placeholder="Endereço" name="address" id="address">
    </div>
</div> <!-- /.col -->


<div class="col-md-4">
    <div class="form-group">
        <label for="Classe">Site</label>
        <input value="{{ isset($affiliated->site) ? $affiliated->site : '' }}"
            class="form-control border-secondary" type="text" placeholder="Site" name="site" id="site">
    </div>
</div> <!-- /.col -->



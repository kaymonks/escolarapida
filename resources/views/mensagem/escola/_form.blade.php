@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <p>para: Escola</p>
            {{--<p>{{ $escolas->nome }}</p>--}}
            <input type="hidden" name="escola_id" value="{{ $escolas->id }}">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control" placeholder="Titulo" name="titulo">
        </div>
    </div>
</div>
<div class="form-group">
    <p>Mensagem</p>

    <textarea id="compose-textarea" name="corpo" class="form-control" style="height: 200px; /*display: none;*/"></textarea>
</div>
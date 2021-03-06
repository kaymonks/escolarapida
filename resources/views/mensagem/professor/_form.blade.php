@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-12">
    <div class="form-group">
        <label class="col-sm-4 control-label">Assunto</label>
        <div class="col-sm-8 col-md-5">
            <input class="form-control" placeholder="Assunto" name="titulo" value="{{ old('titulo') }}">
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">Professor</label>
        <div class="col-sm-8 col-md-5">
            <select class="form-control select2 select2-hidden-accessible" name="destinatario" style="width: 100%;" tabindex="-1" aria-hidden="true">
                @foreach($professores as $professor)
                    <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        {{--Editor de mensagem -> wysihtml5-toolbar--}}
        <label class="col-sm-4 control-label">Mensagem</label>
        <div class="col-sm-8 col-md-5">
            <textarea id="compose-textarea" name="corpo" class="form-control" style="height: 300px; /*display: none;*/">{{ old('corpo') }}</textarea>
            {{--<iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(210, 214, 222); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: 0px none rgb(85, 85, 85); outline-offset: 0px; padding: 6px 12px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: text-bottom; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 300px;" width="0" height="0" frameborder="0"></iframe>--}}
        </div>
    </div>
</div>
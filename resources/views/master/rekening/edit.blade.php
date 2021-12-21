{!! Form::model($edit, ['method' => 'PATCH','route' => [ $route.'.update', $edit->id], 'id' => 'MyForm']) !!}

{{ Form::inputText('Kode', 'code', null, null, ['placeholder' => '', 'required']) }}
{{ Form::inputText('Nomor Rekening', 'number', null, null, ['placeholder' => '', 'required']) }}
{{ Form::inputSelect('Currency', 'currency', ['IDR' => 'IDR', 'USD' => 'USD'], null, [ 'required']) }}
{{ Form::inputTextarea('Deskripsi', 'desc', null, null, ['placeholder' => 'masukan deskripsi', 'required', 'rows' => '4']) }}

<div class="row">
        <div class="col-md-6">
                <button onclick="CheckValidation();" type="submit" id="btn-submit" class="btn font-weight-bold btn-block btn-primary">
                        Update
                </button>
        </div>
        <div class="col-md-6">
                <a href="{{ route($route. '.index') }}" class="btn font-weight-bold btn-block btn-danger">Cancel</a>
        </div>
</div>

{!! Form::close() !!}

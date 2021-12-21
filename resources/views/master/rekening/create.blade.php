{!! Form::open(array('route' => $route . '.store','method'=>'POST','id' => 'MyForm')) !!}

{{ Form::inputText('Kode', 'code', null, null, ['placeholder' => '', 'required']) }}
{{ Form::inputText('Nomor Rekening', 'number', null, null, ['placeholder' => '', 'required']) }}
{{ Form::inputSelect('D/C', 'type', ['D' => 'Debit', 'C' => 'Credit'], null, [ 'required']) }}
{{ Form::inputSelect('Currency', 'currency', ['IDR' => 'IDR', 'USD' => 'USD'], null, [ 'required']) }}
{{ Form::inputTextarea('Deskripsi', 'desc', null, null, ['placeholder' => 'masukan deskripsi', 'required', 'rows' => '4']) }}

<button onclick="CheckValidation();" type="submit" id="btn-submit" class="btn font-weight-bold btn-block btn-primary">
        Submit
</button>

{!! Form::close() !!}

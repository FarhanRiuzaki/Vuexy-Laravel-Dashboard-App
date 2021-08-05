{!! Form::open(array('route' => $route . '.store','method'=>'POST','id' => 'MyForm')) !!}

{{ Form::inputText('Code: ', 'code', null, null, ['placeholder' => 'channel code', 'required']) }}

{{ Form::inputText('URL: ', 'url', null, null, ['placeholder' => 'channel name', 'required']) }}

{{ Form::inputTextarea('Description: ', 'description', null, null, ['placeholder' => 'page description', 'required', 'rows'=>'4','cols'=>'4']) }}

<button onclick="CheckValidation();" type="submit" id="btn-submit" class="btn font-weight-bold btn-block btn-primary">
        Submit
</button>

{!! Form::close() !!}

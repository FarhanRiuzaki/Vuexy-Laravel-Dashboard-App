{!! Form::open(array('route' => $route . '.store','method'=>'POST','id' => 'MyForm')) !!}

{{ Form::inputSelect('Channel: ', 'channel_id', $channel, null, [ 'required']) }}

{{ Form::inputText('Code: ', 'code', null, null, ['placeholder' => 'merchant code', 'required']) }}

{{ Form::inputText('Name: ', 'name', null, null, ['placeholder' => 'merchant name', 'required']) }}

{{ Form::inputTextarea('Description: ', 'description', null, null, ['placeholder' => 'merchant description', 'required', 'rows'=>'4','cols'=>'4']) }}

<button onclick="CheckValidation();" type="submit" id="btn-submit" class="btn font-weight-bold btn-block btn-primary">
        Submit
</button>

{!! Form::close() !!}

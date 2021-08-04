{!! Form::model($merchant_edit, ['method' => 'PATCH','route' => [$route . '.update', $merchant_edit->id], 'id' => 'MyForm']) !!}

{{ Form::inputSelect('Channel: ', 'channel_id', $channel, null, [ 'required']) }}

{{ Form::inputText('Code: ', 'code', null, null, ['placeholder' => 'merchant code', 'required']) }}

{{ Form::inputText('Name: ', 'name', null, null, ['placeholder' => 'merchant name', 'required']) }}

{{ Form::inputTextarea('Description: ', 'description', null, null, ['placeholder' => 'merchant description', 'required', 'rows'=>'4','cols'=>'4']) }}

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

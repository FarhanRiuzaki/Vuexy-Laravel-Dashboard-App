{!! Form::model($page_edit, ['method' => 'PATCH','route' => [$route . '.update', $page_edit->id], 'id' => 'MyForm']) !!}

{{ Form::inputText('Code: ', 'code', null, null, ['placeholder' => 'channel code', 'required']) }}

{{ Form::inputText('URL: ', 'url', null, null, ['placeholder' => 'channel url', 'required']) }}

{{ Form::inputTextarea('Description: ', 'description', null, null, ['placeholder' => 'channel description', 'required', 'rows'=>'4','cols'=>'4']) }}

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

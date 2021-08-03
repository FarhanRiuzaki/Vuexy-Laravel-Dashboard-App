{!! Form::model($permission_edit, ['method' => 'PATCH','route' => ['permissions.update', $permission_edit->id], 'id' => 'MyForm']) !!}

{{ Form::inputText('Permission: ', 'name', null, null, ['placeholder' => 'permission name', 'required']) }}

<div class="row">
        <div class="col-md-6">
                <button onclick="CheckValidation();" type="submit" id="btn-submit" class="btn font-weight-bold btn-block btn-primary">
                        Update Permission
                </button>
        </div>
        <div class="col-md-6">
                <a href="{{ route($route. '.index') }}" class="btn font-weight-bold btn-block btn-danger">Cancel</a>
        </div>
</div>

{!! Form::close() !!}

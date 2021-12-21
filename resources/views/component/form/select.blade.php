<div class="form-group">
    @php
        $cek = 'form-control ' . $class . ' ' . $name;
        if($errors->has($name)){
            $cek = 'form-control ' . $class . \isValid($errors->has($name)) ;
        }
    @endphp
    <strong class="{{$name}}">{{$label}}</strong>
    {!! Form::select($name,$value,$default,array_merge(['class'=>$cek,'id'=>$name],$attributes)); !!}
    <p class="invalid-feedback">{{ $errors->first($name) }}</p>
</div>

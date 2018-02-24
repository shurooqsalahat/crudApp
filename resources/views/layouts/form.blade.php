{{ csrf_field() }}
<fieldset>

    <div class="form-group">
        {{ Form::label('firstname', 'First Name', ['class' => 'col-md-2 control-label'])}}


        <div class="col-md-10">
            {{ Form::text('firstname', $student->first_name, ['class' => 'form-control'])}}


        </div>
    </div>

    <div class="form-group">
        {{ Form::label('lastname', 'Last Name', ['class' => 'col-md-2 control-label'])}}

        <div class="col-md-10">
            {{ Form::text('lastname', $student->last_name, ['class' => 'form-control'])}}

        </div>
    </div>

    <div class="form-group">
        {{ Form::label('inputEmail', 'Email', ['class' => 'col-md-2 control-label'])}}
        <div class="col-md-10">
            {{ Form::email('email', $student->email, ['class' => 'form-control' , 'id'=>'inputEmail'])}}

        </div>
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone Number', ['class' => 'col-md-2 control-label'])}}
        <div class="col-md-10">
            {{ Form::text('phone', $student->phone, ['class' => 'form-control'])}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
            {{Form::button('Cancel' ,['class' => 'btn btn-default'])}}


        </div>
    </div>
</fieldset>
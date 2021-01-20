
<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('sharks') }}">View All sharks</a></li>
            <li><a href="{{ URL::to('sharks/create') }}">Create a shark</a>
        </ul>
    </nav>

    <h1>Create a shark</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}


    {{ Form::open(array('url' => 'suppliers')) }}

    <div class="form-group">
        {{ Form::label('name', 'Supplier Name') }}
        {{ Form::text('name', Request::old('supplier_name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Supplier Contact') }}
        {{ Form::text('name', Request::old('supplier_contact'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Supplier Address') }}
        {{ Form::text('name', Request::old('supplier_address'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Request::old('email'), array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Create the shark!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>
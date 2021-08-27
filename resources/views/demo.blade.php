<body>
    <h1>My Article</h1>
    
    @foreach($data as $item)
    {{$item}}
    @endforeach
</body>
<h1>Hello</h1>
<form name="form" method="post">
    @csrf
<input type="text" name="name">
<button type="submit" name="submit">Submit</button>
</form>

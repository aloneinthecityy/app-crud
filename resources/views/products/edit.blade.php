<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product:</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
        @endif
    </div>

    <form method="post" action="{{route('product.update', ['product' => $product])}}">
    <!-- 
        O atributo action está definido com uma expressão do Laravel para gerar a URL do endpoint onde os 
        dados do formulário serão enviados. 

        product.store é o nome da rota 
        definida no arquivo de rotas do Laravel. 
    -->

        @csrf
        @method('put')

        <!--
         * @csrf
         * Esta é uma diretiva do Laravel que gera um campo de token CSRF (Cross-Site Request Forgery) no formulário. 
         * O token CSRF é usado para proteger o aplicativo contra ataques de falsificação de solicitação entre sites. 
         * O Laravel verifica se o token CSRF está presente e corresponde ao token armazenado no servidor antes de processar a solicitação.
         * 
         * @method('post')
         * Esta é outra diretiva do Laravel que gera um campo oculto no formulário para especificar o método HTTP a ser usado na solicitação. 
         * Neste caso, o método é definido como "post". Isso é útil quando você precisa enviar um formulário usando um método HTTP diferente do padrão (GET).
         * Em resumo, esse trecho gera um token CSRF para proteção contra ataques de falsificação de solicitação entre sites e especifica o método HTTP como "post".
        -->

        <div>
            <label>Name:</label>
            <input type="text" name="name" placeholder="name" value="{{$product->name}}"/>

            <label>Qty:</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}"/>

            <label>Price:</label>
            <input type="text" name="price" placeholder="price" value="{{$product->price}}"/>

            <label>Description:</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}"/>
        </div>
        <div>
            <input type="submit" value="Update"/>
        </div>

    </form>
</body>
</html>
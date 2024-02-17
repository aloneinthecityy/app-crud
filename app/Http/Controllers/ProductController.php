<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index(){
        $products = Products::all(); /*chama o método estático all() da classe Products.
        O método all() retorna todos os produtos existentes.
        Os produtos são armazenados na variável $products.
        Resumindo, esse trecho de código recupera todos os produtos existentes e os armazena na variável $products.*/
        
        // return view('products.index'); //esse é o nome da rota que definimos lá no arquivo web.php em routes.

        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $newProduct = Products::create($data);
        // dd($request);
        return redirect(route('product.index'));
    
    }
     /*
     A função store() é responsável por lidar com a criação de um novo produto.

     A validação é feita usando regras definidas para cada campo. 
     Por exemplo, o campo 'name' é obrigatório, deve ser uma string e ter no máximo 255 caracteres. 
     O campo 'qty' é obrigatório, deve ser um número inteiro e ter um valor mínimo de 1. 
     O campo 'price' é obrigatório, deve ser um número e ter um valor mínimo de 0. 
     O campo 'description' é opcional e deve ser uma string.

    Se os dados passarem na validação, um novo objeto Products é criado usando o método create 
    e os dados validados são passados como argumento. O método create é responsável por salvar os dados no banco de dados.

     * A função dd($request) é usada para fazer um dump (imprimir) dos dados do objeto $request e encerrar a execução do programa. 
     * O dump exibe todas as informações contidas no objeto, como os cabeçalhos da requisição, os parâmetros enviados, os cookies, entre outros.
     * Essa função é comumente usada durante o desenvolvimento para depurar e verificar os dados recebidos em uma requisição. 
     * No entanto, é importante lembrar de remover ou substituir o dd($request) por código funcional adequado, 
     * uma vez que o dd é apenas uma função de depuração temporária e não deve ser usado em produção.

     */

     public function edit(Products $product){
        // dd($product);
        return view('products.edit', ['product' => $product]);

     }

     public function update(Products $product, Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $product->update($data);
        return redirect(route('product.index'))-> with('success', 'Product updated succesffuly');

     }

     public function destroy(Products $product){
        $product->delete();
        return redirect(route('product.index'))-> with('success', 'Product deleted succesffuly');

     }
    
}

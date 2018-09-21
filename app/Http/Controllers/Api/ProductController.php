<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreUpdateProductFormRequest;

class ProductController extends Controller
{

    protected $product, $totalPage = 10;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    public function index(Request $request)
    {
        $products = $this->product->getResults($request->all(), $this->totalPage);

        return response()->json($products);
    }

   
    public function store(StoreUpdateProductFormRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            //A função  kebab_case faz o tratamento de caracteres especiais
            $name = Kebab_case($request->name);
            //pegar a extensão do arquivo
            $extension = $request->image->extension();
            //Pegar o nome do arquvo e concatena com a extensão
            $nameFile = "{$name}.{$extension}";

            $data['image'] = $nameFile;

            //iniciar o upload
            $upload = $request->image->storeAs('products', $nameFile);


            if(!$upload)
            {
                return response()->json(['error' => 'Fail_Upload'], 500);
            }            
        }

        $product = $this->product->create($data);

        return response()->json($product, 201);
    }

   

    public function show($id)
    {
        if(!$product = $this->product->find($id))
        {
            return response()->json(['error' => 'Not Found'], 404);
        }

        return response()->json($product);
    }   

    


    public function update(StoreUpdateProductFormRequest $request, $id)
    {        

        if(!$product = $this->product->find($id))
        {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $product->update($request->all());

        return response()->json($product, 200);
    }

    

    public function destroy($id)
    {
        if(!$product = $this->product->find($id))
        {
            return response()->json(['error' => 'Not Found'], 404);
        }
        $product->delete();

        return response()->json(['success' => true], 204);
    }
}

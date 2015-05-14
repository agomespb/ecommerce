<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;
use AGCommerce\Http\Requests\ProductImageRequest;
use AGCommerce\Product;
use AGCommerce\Http\Requests\produto\ProductRequest;
use AGCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller {

    private $produtos;

    public function __construct(Product $produtos){
        $this->produtos = $produtos;
    }

    /**
     * Lista todos os produtos de database.sqlite
     *
     * @return Response
     */
    public function index()
    {
        $produtos = $this->produtos->paginate(8);
        return view('produto.index', compact('produtos'));
    }

    /**
     * Insere um novo produto em database.sqlite
     *
     * @return Response
     */
    public function create(Category $categoria)
    {
        $categorias = $categoria->lists('name', 'id');
        return view('produto.create', compact('categorias'));
    }

    /**
     * Consulta um produto em database.sqlite
     *
     * @return Response
     */
    public function show($id)
    {
        $produto = $this->produtos->find($id);
        return view('produto.show', compact('produto'));
    }

    /**
     * Insere uma produto em database.sqlite
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $Input = $request->all();
        $categoria = $this->produtos->fill($Input);
        $categoria->save();

        return redirect()->route('products');
    }

    /**
     * Exclui um produto em database.sqlite
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoria = $this->produtos->find($id)->delete();
        return redirect()->route('products');
    }

    /**
     * Editar/Alualizar um produto em database.sqlite
     *
     * @return Response
     */
    public function edit($id, Category $categoria)
    {
        $produto = $this->produtos->find($id);
        $categorias = $categoria->lists('name', 'id');
        return view('produto.edit', compact('produto', 'categorias'));
    }

    /**
     * Editar/Alualizar um produto em database.sqlite
     *
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {

        $this->produtos->find($id)->update($request->all());
        return redirect()->route('products');
    }

    public function images($id)
    {
        $produto = $this->produtos->find($id);
        return view('produto.images', compact('produto'));
    }

    public function createImage($id)
    {
        $produto = $this->produtos->find($id);
        return view('produto.create_image', compact('produto'));
    }

    public function storeImage($id, ProductImage $productImage, ProductImageRequest $request)
    {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products_images', $id);
    }

    public function destroyImage($id, ProductImage $productImage)
    {
        $image = $productImage->find($id);
        $fileName = $image->id . '.' . $image->extension;

        if(file_exists(public_path() . '/uploads/' . $fileName)) {
            Storage::disk('public_local')->delete($fileName);
        }

        $produto = $image->product;
        $image->delete();

        return redirect()->route('products_images', ['id'=>$produto->id]);
    }

}

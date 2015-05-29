<?php namespace AGCommerce\Http\Controllers;

use AGCommerce\Category;
use AGCommerce\Http\Requests\ProductImageRequest;
use AGCommerce\Http\Requests\produto\ProductRequest;
use AGCommerce\Product;
use AGCommerce\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{

    private $produtos;
    private $page;

    public function __construct(Product $produtos)
    {
        $this->produtos = $produtos;
        $this->page = (isset($_GET['page'])) ? $_GET['page'] : 1;

    }

    /**
     * Lista todos os produtos de database.sqlite
     *
     * @return Response
     */
    public function index()
    {

        $produtos = $this->produtos->paginate(6);
        return view('produto.index', compact('produtos'));
    }

    /**
     * Insere um novo produto em database.sqlite
     *
     * @return Response
     */
    public function create(Category $categoria)
    {
        $categorias = $categoria->list_all;
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
        $createTags = array_map('trim', explode(',', $Input['tags']));

        unset($Input['tags']);

        $produto = $this->produtos->fill($Input);
        $produto->save();

        if (count($createTags)) {
            $syncTag = $produto->tags()->ofCheckTags($createTags);
            $produto->tags()->sync($syncTag);
        }

        return redirect()->route('products');
    }

    /**
     * Exclui um produto em database.sqlite
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produto = $this->produtos->find($id);

        if (count($produto->images)):

            foreach ($produto->images as $image) {

                $this->deleteImage($image->imageFileName);
                $image->delete();
            }

        endif;

        $produto->delete();

        return redirect()->route('products');
    }

    /**
     * Editar/Alualizar um produto em database.sqlite
     *
     * @return Response
     */
    public function edit($id, Category $categoria)
    {
        $textareaTag = '';

        $page = $this->page;
        $produto = $this->produtos->find($id);

        if (count($produto->tags)) {
            $tags = $produto->tags->lists('name');
            $textareaTag = implode(', ', $tags);
        }

        $categorias = $categoria->list_all;
        return view('produto.edit', compact('produto', 'categorias', 'textareaTag', 'page'));
    }

    /**
     * Editar/Alualizar um produto em database.sqlite
     *
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {
        $updateProduto = $request->all();
        $updateTags = array_map('trim', explode(',', $updateProduto['tags']));

        unset($updateProduto['tags']);

        $syncTag = $this->produtos->tags()->ofCheckTags($updateTags);

        $this->produtos->find($id)->update($updateProduto);
        $this->produtos->find($id)->tags()->sync($syncTag);

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

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products_images', $id);
    }

    public function destroyImage($id, ProductImage $productImage)
    {
        $image = $productImage->find($id);
        $this->deleteImage($image->imageFileName);

        $produto = $image->product;
        $image->delete();

        return redirect()->route('products_images', ['id' => $produto->id]);
    }

    private function deleteImage($fileName)
    {
        $pathFile = public_path() . '/uploads/' . $fileName;
        if (file_exists($pathFile)) {
            Storage::disk('public_local')->delete($fileName);
            return true;
        }
        return false;
    }

}

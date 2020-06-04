<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Exibe a tela do carrinho
     */
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : array();
        return view('cart', compact('cart'));
    }

    /**
     * Adiciona o produto ao carrinho
     * @param Request request
     */
    public function add(Request $request)
    {
        $product = $request->get('product');
        
        // Se existe uma sessão para os produtos, adiciono esse produto na sessão existente
        if (session()->has('cart'))
        {
            $products = session()->get('cart');
            $productsSlugs = array_column($products, 'slug');

            // Caso o produto a ser adicionado já exista no carrinho, ele incrementa sua quantidade
            if (in_array($product['slug'], $productsSlugs))
            {
                $products = $this->productIncrement($product['slug'], $product['amount'], $products);
                session()->put('cart', $products);
            }
            // Senão, adiciona o produto no carrinho normalmente 
            else {
                session()->push('cart', $product);
            }
        }
        // Não existindo, eu crio esta sessão com o primeiro produto
        else
        {
            $products[] = $product;
            session()->put('cart', $products);
        }

        flash('Produto adicionado no carrinho!')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }

    /**
     * Remove o produto do carrinho
     * @param slug do produto
     */
    public function remove($slug)
    {
        if (!session()->has('cart')) {
            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');
        $products = array_filter($products, function($line) use($slug) {
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);
        return redirect()->route('cart.index');
    }

    /**
     * Cancela a compra toda, excluindo todos os itens do carrinho
     */
    public function cancel()
    {
        session()->forget('cart');
        flash('Desistência da compra realizada com sucesso!')->success();
        return redirect()->route('cart.index');
    }

    /**
     * Este método permite incrementar a quantidade de um produto, caso ele já
     * exista no carrinho no momento de sua adição
     */
    private function productIncrement($slug, $amount, $products)
    {
        $products = array_map(function($line) use($slug, $amount) {
            if ($slug == $line['slug']) {
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;

class FrontController extends Controller
{
    public function index()
    {
        return view(('front.index'));
    }
    public function menu()
    {
        $products = Menu::all();
        //dd($products);
        return view('front.menu', compact('products'));
    }
    public function about()
    {
        return view(('front.about'));
    }
    public function cart()
    {
        return view('front.cart');
    }
    public function addToCart($id)
    {
        $product = Menu::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "prise" => $product->prise,
                    "image" => $product->image
                ]
            ];

            session()->put('cart', $cart);

            $htmlCart = view('front.includes._header')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            $htmlCart = view('front.includes._header')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "prise" => $product->prise,
            "image" => $product->image
        ];

        session()->put('cart', $cart);

        $htmlCart = view('front.includes._header')->render();

        return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('front.includes._header')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('front.includes._header')->render();

            return response()->json(['msg' => 'Product removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }
    public function createOrder()
    {
        return view('front.order');
    }
    public function  sendTelegramMessage($message)
    {
        // сюда нужно вписать токен вашего бота
        define('TELEGRAM_TOKEN', '1711605687:AAGf3z98_C6kPFtmEDY7T9efpWWGDpyifmM');
        // сюда нужно вписать ваш внутренний айдишник
        define('TELEGRAM_CHATID', '-514543687');
        //$message='Привет!';
            $ch = curl_init();
            curl_setopt_array(
                $ch,
                array(
                    CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_POSTFIELDS => array(
                        'chat_id' => TELEGRAM_CHATID,
                        'text' => $message,
                    ),
                )
            );
            curl_exec($ch);

    }
    public function ordering(Request $request)
    {
        $input = $request->all();
        $input['status_id'] = 1;
        $neworder = Order::create($input);
        $cart = session()->get('cart');
        foreach($cart as $id => $details) {
            $saleFields['order_id'] = $neworder->id;
            $saleFields['menu_id'] = $id;
            $saleFields['quantity'] = $details['quantity'];

            $sale = Sale::create($saleFields);
        }
        $request->session()->forget('cart');

        //отправить заказ в телеграм
        $this->sendTelegramMessage('Поступил новый заказ №'.$neworder->id);

        return view('front.order-finish');
    }
    private function getCartTotal()
    {
        $total = 0;
        $cart = session()->get('cart');
        foreach($cart as $id => $details) {
            $total += $details['prise'] * $details['quantity'];
        }
        return number_format($total, 2);
    }
}
//todo
//      1. mind about top product
//      2. add chart or any grapf in the main admin page
//      3. etc)

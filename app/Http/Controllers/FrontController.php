<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Email;

class FrontController extends Controller
{
    public function index()
    {
        $hitMenu = $this->topSales(4);
        //dd($topSales);
        return view('front.index',compact('hitMenu'));
    }
    public function topSales($limit)
    {
        $topSales = DB::table('sales')
            ->select('menus.id as id',
                'menus.name as name', 'menus.image as image',
                'menus.description as description',
                'menus.prise as prise',
                DB::raw('SUM(quantity) AS data'))
            ->leftJoin('menus', 'menus.id', '=', 'sales.menu_id')
            ->groupBy('menu_id')
            ->orderBy('data', 'desc')
            ->limit($limit)
            ->get();
        return $topSales;
    }
    public function menu()
    {
        $products = Menu::all();
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

            return response()->json(['msg' => 'Товар добавлен в карзину!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            $htmlCart = view('front.includes._header')->render();

            return response()->json(['msg' => 'Товар добавлен в карзину!', 'data' => $htmlCart]);

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

        return response()->json(['msg' => 'Товар добавлен в карзину!', 'data' => $htmlCart]);

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

            return response()->json(['msg' => 'Корзина обновлена', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

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

            return response()->json(['msg' => 'Товар удалён успешно', 'data' => $htmlCart, 'total' => $total]);

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
        //dd($input);
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
        //$this->sendTelegramMessage('Поступил новый заказ №'.$neworder->id);

        //return view('front.order-finish');
        return response()->json(['msg' => 'Ваш заказ оформлен!']);
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


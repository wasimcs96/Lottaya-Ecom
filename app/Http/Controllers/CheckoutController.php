<?php

namespace App\Http\Controllers;

use App\Utility\PayfastUtility;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\InstamojoController;
use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PublicSslCommerzPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\PaytmController;
use App\Order;
use App\BusinessSetting;
use App\Coupon;
use App\CouponUsage;
use App\User;
use App\Address;
use Session;
use App\Utility\PayhereUtility;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{

    public function __construct()
    {
        //
    }

    //check the selected payment gateway and redirect to that controller accordingly
    public function checkout(Request $request)
    {
        if ($request->payment_option != null) {

            $orderController = new OrderController;
            $orderController->store($request);

            $request->session()->put('payment_type', 'cart_payment');

            if ($request->session()->get('order_id') != null) {
                if ($request->payment_option == 'paypal') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $paypal = new PaypalController;
                    return $paypal->getCheckout();
                } elseif ($request->payment_option == 'stripe') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $stripe = new StripePaymentController;
                    return $stripe->stripe();
                } elseif ($request->payment_option == 'sslcommerz') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $sslcommerz = new PublicSslCommerzPaymentController;
                    return $sslcommerz->index($request);
                } elseif ($request->payment_option == 'instamojo') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $instamojo = new InstamojoController;
                    return $instamojo->pay($request);
                } elseif ($request->payment_option == 'razorpay') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $razorpay = new RazorpayController;
                    return $razorpay->payWithRazorpay($request);
                } elseif ($request->payment_option == 'paystack') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $paystack = new PaystackController;
                    return $paystack->redirectToGateway($request);
                } elseif ($request->payment_option == 'voguepay') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $voguePay = new VoguePayController;
                    return $voguePay->customer_showForm();
                } elseif ($request->payment_option == 'twocheckout') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $twocheckout = new TwoCheckoutController;
                    return $twocheckout->index($request);
                } elseif ($request->payment_option == 'payhere') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $order = Order::findOrFail($request->session()->get('order_id'));
                    $order_id = $order->id;
                    $amount = $order->grand_total;
                    $first_name = json_decode($order->shipping_address)->name;
                    $last_name = 'X';
                    $phone = json_decode($order->shipping_address)->phone;
                    $email = json_decode($order->shipping_address)->email;
                    $address = json_decode($order->shipping_address)->address;
                    $city = json_decode($order->shipping_address)->city;

                    return PayhereUtility::create_checkout_form($order_id, $amount, $first_name, $last_name, $phone, $email, $address, $city);
                } elseif ($request->payment_option == 'payfast') {
                    $order = Order::findOrFail($request->session()->get('order_id'));
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $order_id = $order->id;
                    $amount = $order->grand_total;

                    return PayfastUtility::create_checkout_form($order_id, $amount);
                } else if ($request->payment_option == 'ngenius') {
                    $ngenius = new NgeniusController();
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    return $ngenius->pay();
                } else if ($request->payment_option == 'iyzico') {
                    $iyzico = new IyzicoController();
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);

                    return $iyzico->pay();
                } else if ($request->payment_option == 'flutterwave') {
                    $flutterwave = new FlutterwaveController();
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);

                    return $flutterwave->pay();
                } else if ($request->payment_option == 'mpesa') {
                    $mpesa = new MpesaController();
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);

                    return $mpesa->pay();
                } elseif ($request->payment_option == 'paytm') {
                    $paytm = new PaytmController;
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);

                    return $paytm->index();
                } elseif ($request->payment_option == 'cash_on_delivery') {
                    $orders = Order::findOrFail($request->session()->get('order_id'));
                    $shiping_detaails= $this->ship($orders);
                    $request->session()->put('cart', Session::get('cart')->where('owner_id', '!=', Session::get('owner_id')));
                    $request->session()->forget('owner_id');
                    $request->session()->forget('delivery_info');
                    $request->session()->forget('coupon_id');
                    $request->session()->forget('coupon_discount');
                    flash(translate("Your order has been placed successfully"))->success();
                    return redirect()->route('order_confirmed');
                } elseif ($request->payment_option == 'wallet') {
                    $user = Auth::user();
                    $order = Order::findOrFail($request->session()->get('order_id'));
                    if ($user->balance >= $order->grand_total) {
                        $user->balance -= $order->grand_total;
                        $user->save();
                        return $this->checkout_done($request->session()->get('order_id'), null);
                    }
                } else {
                    $order = Order::findOrFail($request->session()->get('order_id'));
                    $order->manual_payment = 1;
                    $order->save();

                    $request->session()->put('cart', Session::get('cart')->where('owner_id', '!=', Session::get('owner_id')));
                    $request->session()->forget('owner_id');
                    $request->session()->forget('delivery_info');
                    $request->session()->forget('coupon_id');
                    $request->session()->forget('coupon_discount');

                    flash(translate('Your order has been placed successfully. Please submit payment information from purchase history'))->success();
                    return redirect()->route('order_confirmed');
                }
            }
        } else {
            flash(translate('Select Payment Option.'))->warning();
            return back();
        }
    }


   public function ship($orders){
       try {
        $details = [];
        foreach ($orders->orderDetails as $key => $value) {
            // dd($value->product->category->name);
            $arr = [
                "service_id" => 1,
                "tracking_no" => $value->order_id,
                "shipper_order_id" => $value->order_id,
                "order_length" => 12,
                "order_width" => 12,
                "order_height" => 12,
                "order_weight" => 12,
                "payment_type" => "cod",
                "cod_amt_to_collect" => 40.5,
                "incoterm" => "DDP",
                "consignee_name" => auth()->user()->name ?? '',
                "consignee_number" => auth()->user()->phone ?? '9779309900',
                "consignee_country" => 'Indonesia',
                "consignee_address" => auth()->user()->address ?? 'Demo Address',
                "consignee_postal" => auth()->user()->postal_code ?? '80671',
                "consignee_state" => auth()->user()->address ?? 'Demo Address',
                "consignee_city" => auth()->user()->city ?? 'In',
                "consignee_province" => "Cilandak",
                "consignee_email" => auth()->user()->email ?? '',
                "pickup_contact_name" => auth()->user()->name ?? '',
                "pickup_contact_number" => auth()->user()->phone ?? '9779309900',
                "pickup_country" => 'Singapore',
                "pickup_address" => auth()->user()->address ?? 'Demo Address',
                "pickup_postal" => auth()->user()->postal_code ?? '80671',
                "pickup_state" => auth()->user()->address ?? '',
                "pickup_city" => null,
                "pickup_province" => null,
                "items" => [
                    [
                        "item_desc" => $value->product->name ?? '',
                        "item_category" => 'Fashion Apparel',
                        "item_product_id" => $value->product->id,
                        "item_sku" => "ITEMSKU123",
                        "item_quantity" => 3,
                        "item_price_value" => $value->price,
                        "item_price_currency" => "IDR"
                    ]
                ]
            ];
            array_push($details, $arr);
        }
        $shipping_info = [
            'secret_key' => 'mVa0Rlset4pP89G6NBRK3fdpQrhmZPRt',
            "blocking" => false,
            "orders" => $details
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.int.janio.asia/api/order/orders/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($shipping_info),
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "content-type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            // echo "cURL Error #:" . $err;
            return $err;
        } else {
            // dd(json_decode($response));
            return $response;
        }
       } catch (\Throwable $th) {
           return "not done";
       }
 
   }

    //redirects to this method after a successfull checkout
    public function checkout_done($order_id, $payment)
    {
        $order = Order::findOrFail($order_id);
        $order->payment_status = 'paid';
        $order->payment_details = $payment;
        $order->save();

        if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated) {
            $affiliateController = new AffiliateController;
            $affiliateController->processAffiliatePoints($order);
        }

        if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated) {
            $clubpointController = new ClubPointController;
            $clubpointController->processClubPoints($order);
        }
        if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() == null || !\App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
            if (BusinessSetting::where('type', 'category_wise_commission')->first()->value != 1) {
                $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $orderDetail->payment_status = 'paid';
                    $orderDetail->save();
                    if ($orderDetail->product->user->user_type == 'seller') {
                        $seller = $orderDetail->product->user->seller;
                        $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price * (100 - $commission_percentage)) / 100 + $orderDetail->tax + $orderDetail->shipping_cost;
                        $seller->save();
                    }
                }
            } else {
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $orderDetail->payment_status = 'paid';
                    $orderDetail->save();
                    if ($orderDetail->product->user->user_type == 'seller') {
                        $commission_percentage = $orderDetail->product->category->commision_rate;
                        $seller = $orderDetail->product->user->seller;
                        $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price * (100 - $commission_percentage)) / 100 + $orderDetail->tax + $orderDetail->shipping_cost;
                        $seller->save();
                    }
                }
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {
                $orderDetail->payment_status = 'paid';
                $orderDetail->save();
                if ($orderDetail->product->user->user_type == 'seller') {
                    $seller = $orderDetail->product->user->seller;
                    $seller->admin_to_pay = $seller->admin_to_pay + $orderDetail->price + $orderDetail->tax + $orderDetail->shipping_cost;
                    $seller->save();
                }
            }
        }

        $order->commission_calculated = 1;
        $order->save();

        Session::put('cart', Session::get('cart')->where('owner_id', '!=', Session::get('owner_id')));
        Session::forget('owner_id');
        Session::forget('payment_type');
        Session::forget('delivery_info');
        Session::forget('coupon_id');
        Session::forget('coupon_discount');


        flash(translate('Payment completed'))->success();
        return view('frontend.order_confirmed', compact('order'));
    }

    public function get_shipping_info(Request $request)
    {
        if (Session::has('cart') && count(Session::get('cart')) > 0) {
            $categories = Category::all();
            return view('frontend.shipping_info', compact('categories'));
        }
        flash(translate('Your cart is empty'))->success();
        return back();
    }

    public function store_shipping_info(Request $request)
    {
        if (Auth::check()) {
            if ($request->address_id == null) {
                flash(translate("Please add shipping address"))->warning();
                return back();
            }
            $address = Address::findOrFail($request->address_id);
            $data['name'] = Auth::user()->name;
            $data['email'] = Auth::user()->email;
            $data['address'] = $address->address;
            $data['country'] = $address->country;
            $data['city'] = $address->city;
            $data['postal_code'] = $address->postal_code;
            $data['phone'] = $address->phone;
            $data['checkout_type'] = $request->checkout_type;
        } else {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['country'] = $request->country;
            $data['city'] = $request->city;
            $data['postal_code'] = $request->postal_code;
            $data['phone'] = $request->phone;
            $data['checkout_type'] = $request->checkout_type;
        }

        $shipping_info = $data;
        $request->session()->put('shipping_info', $shipping_info);

        $subtotal = 0;
        $tax = 0;
        $shipping = 0;
        foreach (Session::get('cart') as $key => $cartItem) {
            $subtotal += $cartItem['price'] * $cartItem['quantity'];
            $tax += $cartItem['tax'] * $cartItem['quantity'];
            $shipping += $cartItem['shipping'] * $cartItem['quantity'];
        }

        $total = $subtotal + $tax + $shipping;

        if (Session::has('coupon_discount')) {
            $total -= Session::get('coupon_discount');
        }

        return view('frontend.delivery_info');
        // return view('frontend.payment_select', compact('total'));
    }

    public function store_delivery_info(Request $request)
    {
        $request->session()->put('owner_id', $request->owner_id);

        if (Session::has('cart') && count(Session::get('cart')) > 0) {
            $cart = $request->session()->get('cart', collect([]));
            $cart = $cart->map(function ($object, $key) use ($request) {
                if (\App\Product::find($object['id'])->user_id == $request->owner_id) {
                    if ($request['shipping_type_' . $request->owner_id] == 'pickup_point') {
                        $object['shipping_type'] = 'pickup_point';
                        $object['pickup_point'] = $request['pickup_point_id_' . $request->owner_id];
                    } else {
                        $object['shipping_type'] = 'home_delivery';
                    }
                }
                return $object;
            });

            $request->session()->put('cart', $cart);

            $cart = $cart->map(function ($object, $key) use ($request) {
                if (\App\Product::find($object['id'])->user_id == $request->owner_id) {
                    $object['shipping'] = getShippingCost($key);
                } else {
                    $object['shipping'] = 0;
                }
                return $object;
            });

            $request->session()->put('cart', $cart);

            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            foreach (Session::get('cart') as $key => $cartItem) {
                $subtotal += $cartItem['price'] * $cartItem['quantity'];
                $tax += $cartItem['tax'] * $cartItem['quantity'];
                $shipping += $cartItem['shipping'] * $cartItem['quantity'];
            }

            $total = $subtotal + $tax + $shipping;

            if (Session::has('coupon_discount')) {
                $total -= Session::get('coupon_discount');
            }

            return view('frontend.payment_select', compact('total'));
        } else {
            flash(translate('Your Cart was empty'))->warning();
            return redirect()->route('home');
        }
    }

    public function get_payment_info(Request $request)
    {
        $subtotal = 0;
        $tax = 0;
        $shipping = 0;
        foreach (Session::get('cart') as $key => $cartItem) {
            $subtotal += $cartItem['price'] * $cartItem['quantity'];
            $tax += $cartItem['tax'] * $cartItem['quantity'];
            $shipping += $cartItem['shipping'] * $cartItem['quantity'];
        }

        $total = $subtotal + $tax + $shipping;

        if (Session::has('coupon_discount')) {
            $total -= Session::get('coupon_discount');
        }

        return view('frontend.payment_select', compact('total'));
    }

    public function apply_coupon_code(Request $request)
    {
        //dd($request->all());
        $coupon = Coupon::where('code', $request->code)->first();

        if ($coupon != null) {
            if (strtotime(date('d-m-Y')) >= $coupon->start_date && strtotime(date('d-m-Y')) <= $coupon->end_date) {
                if (CouponUsage::where('user_id', Auth::user()->id)->where('coupon_id', $coupon->id)->first() == null) {
                    $coupon_details = json_decode($coupon->details);

                    if ($coupon->type == 'cart_base') {
                        $subtotal = 0;
                        $tax = 0;
                        $shipping = 0;
                        foreach (Session::get('cart') as $key => $cartItem) {
                            $subtotal += $cartItem['price'] * $cartItem['quantity'];
                            $tax += $cartItem['tax'] * $cartItem['quantity'];
                            $shipping += $cartItem['shipping'] * $cartItem['quantity'];
                        }
                        $sum = $subtotal + $tax + $shipping;

                        if ($sum >= $coupon_details->min_buy) {
                            if ($coupon->discount_type == 'percent') {
                                $coupon_discount = ($sum * $coupon->discount) / 100;
                                if ($coupon_discount > $coupon_details->max_discount) {
                                    $coupon_discount = $coupon_details->max_discount;
                                }
                            } elseif ($coupon->discount_type == 'amount') {
                                $coupon_discount = $coupon->discount;
                            }
                            $request->session()->put('coupon_id', $coupon->id);
                            $request->session()->put('coupon_discount', $coupon_discount);
                            flash(translate('Coupon has been applied'))->success();
                        }
                    } elseif ($coupon->type == 'product_base') {
                        $coupon_discount = 0;
                        foreach (Session::get('cart') as $key => $cartItem) {
                            foreach ($coupon_details as $key => $coupon_detail) {
                                if ($coupon_detail->product_id == $cartItem['id']) {
                                    if ($coupon->discount_type == 'percent') {
                                        $coupon_discount += $cartItem['price'] * $coupon->discount / 100;
                                    } elseif ($coupon->discount_type == 'amount') {
                                        $coupon_discount += $coupon->discount;
                                    }
                                }
                            }
                        }
                        $request->session()->put('coupon_id', $coupon->id);
                        $request->session()->put('coupon_discount', $coupon_discount);
                        flash(translate('Coupon has been applied'))->success();
                    }
                } else {
                    flash(translate('You already used this coupon!'))->warning();
                }
            } else {
                flash(translate('Coupon expired!'))->warning();
            }
        } else {
            flash(translate('Invalid coupon!'))->warning();
        }
        return back();
    }

    public function remove_coupon_code(Request $request)
    {
        $request->session()->forget('coupon_id');
        $request->session()->forget('coupon_discount');
        return back();
    }

    public function order_confirmed()
    {
        $order = Order::findOrFail(Session::get('order_id'));
        return view('frontend.order_confirmed', compact('order'));
    }
}

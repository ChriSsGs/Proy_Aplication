<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Delivery;

class MercadopagoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createOrder()
    {
        $collection_id = $_GET['collection_id'];
        $collection_status = $_GET['collection_status'];
        $payment_id = $_GET['payment_id'];
        $status = $_GET['status'];
        $external_reference = $_GET['external_reference'];
        $payment_type = $_GET['payment_type'];
        $merchant_order_id = $_GET['merchant_order_id'];
        $preference_id = $_GET['preference_id'];
        $site_id = $_GET['site_id'];
        $processing_mode = $_GET['processing_mode'];
        $merchant_account_id = $_GET['merchant_account_id'];
        $correo = Session::get('clientecarrito')[0][0];
        $direccion = Session::get('clientecarrito')[0][1];

        if($collection_status == 'approved'){
            Delivery::create([
                'collection_id' => $collection_id,
                'collection_status' => $collection_status,
                'payment_id' => $payment_id,
                'status' => $status,
                'external_reference' => $external_reference,
                'payment_type' => $payment_type,
                'merchant_order_id' =>$merchant_order_id,
                'preference_id' => $preference_id,
                'site_id' => $site_id,
                'processing_mode' => $processing_mode,
                'merchant_account_id' => $merchant_account_id,
                'correo' => $correo,
                'direccion' => $direccion
            ]);
            return redirect('/');
        }
    }

    public function guardarusuario(Request $request)
    {
        if(empty(Session::get('clientecarrito'))){
            Session::push('clientecarrito',[$request->correo,
            $request->direccion]);
        }
        return view('web/checkout');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}

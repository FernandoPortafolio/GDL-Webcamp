<?php

namespace App\Http\Controllers;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use App\Models\Registro;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_CLIENT_SECRET')
            )
        );
    }

    public function payWithPayPal(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2',
            'apellido' => 'required|min:2',
            'email' => 'required|email',
            'regalo' => 'required'
        ]);
        $data = $request->all();
        //pedido
        $boletos = $data['boletos'];
        $camisas = $data['pedido_extra']['camisas']['cantidad'];
        $etiquetas = $data['pedido_extra']['etiquetas']['cantidad'];

        //Eventos seleccionados
        $registro = $data['registro'];

        $newRegistro = Registro::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'total' => $data['total'],
            'regalo_id' => $data['regalo'],
        ]);
        $newRegistro->pedido()->create([
            'camisas' => $camisas,
            'etiquetas' => $etiquetas,
            'boletos_un_dia' => $boletos['un_dia']['cantidad'],
            'boletos_dos_dias' => $boletos['dos_dias']['cantidad'],
            'boletos_completo' => $boletos['completo']['cantidad'],
            'regalo_id' => $data['regalo'],
        ]);
        $newRegistro->eventos()->attach($registro);

        //pagar con Paypal
        //Se crea la entidad comprador
        $compra = new Payer();
        $compra->setPaymentMethod('paypal');

        //Agregar los articulos a una lista
        $listaArticulos = new ItemList();

        //Se crean tantos articulos como se necesiten
        foreach ($data['boletos'] as $key => $value) {
            if ((int) $value['cantidad'] > 0) {
                $articulo = new Item();
                $articulo->setName('Pase: ' . $key)
                    ->setCurrency('MXN')
                    ->setQuantity((int) $value['cantidad'])
                    ->setPrice($value['precio'] - $value['precio'] * 0.16);
                $listaArticulos->addItem($articulo);
            }
        }
        foreach ($data['pedido_extra'] as $key => $value) {
            if ((int) $value['cantidad'] > 0) {
                $precio = $value['precio'];
                $precio -= $precio * 0.16;
                $precio = $key == 'camisas' ? $precio * 0.93 : (float) $precio;

                $articulo = new Item();
                $articulo->setName('Extra: ' . $key)
                    ->setCurrency('MXN')
                    ->setQuantity((int) $value['cantidad'])
                    ->setPrice($precio);
                $listaArticulos->addItem($articulo);
            }
        }

        //detalles de la compra
        $impuestos = $data['total'] * 0.16;
        $subtotal = round($data['total'] - $impuestos, 2);

        $detalles = new Details();
        $detalles->setSubtotal($subtotal)
            ->setTax($impuestos);

        //total a pagar con todo y desgloce
        $cantidad = new Amount();
        $cantidad->setCurrency('MXN')
            ->setTotal($data['total'])
            ->setDetails($detalles);

        //Crear una transaccion que junta todo lo anterior
        $transaccion = new Transaction();
        $transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago a GDLWebcamp')
            ->setInvoiceNumber($newRegistro->id);

        //Definir las rutas de direccion. Son requeridas
        $redireccionar = new RedirectUrls();
        $redireccionar->setReturnUrl(url("/paypal/status/$newRegistro->id"))
            ->setCancelUrl(url("/paypal/status/$newRegistro->id"));

        //Procesar el pago
        $pago = new Payment();
        $pago->setPayer($compra)
            ->setIntent('sale')
            ->setRedirectUrls($redireccionar)
            ->setTransactions([$transaccion]);

        try {
            $pago->create($this->apiContext);
            return redirect()->away($pago->getApprovalLink());
        } catch (PayPalConnectionException $e) {
            echo '<pre>';
            print_r(json_decode($e->getData()));
            echo '</pre>';
            die();
        }
    }

    public function payPalStatus(Request $request, $registro = null)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');
        $registro = Registro::find($registro);

        if (!$paymentId || !$payerId || !$token) {
            $registro->delete();
            return redirect()->route('pago_finalizado')
                ->with('estado', 'error')
                ->with('message', 'Lo sentimos! El pago a través de PayPal ha sido cancelado o no se ha podido realizar.');
        }

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {

            $registro->pagado = true;
            $registro->save();

            return redirect()->route('pago_finalizado')
                ->with('estado', 'correcto')
                ->with('message', 'Gracias! El pago a través de PayPal se ha realizado correctamente.')
                ->with('payment_id', $paymentId);
        }

        return redirect()->route('pago_finalizado')
            ->with('estado', 'error')
            ->with('message', 'Lo sentimos! El pago a través de PayPal no se pudo realizar.');
    }
}

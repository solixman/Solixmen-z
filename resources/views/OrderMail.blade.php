<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thank You for Your Order | ELEGANCE</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #44403c; background-color: #fafaf9;">
    <!-- Main Table -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
            <td align="center" style="padding: 40px 0;">
                <!-- Content Table -->
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; max-width: 600px;">
                    <!-- Logo -->
                    <tr>
                        <td align="center" style="padding-bottom: 30px;">
                            <img src="{{ asset('img/elegance-logo.png') }}" alt="ELEGANCE" width="180" style="display: block; border: 0;" />
                        </td>
                    </tr>
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="padding-bottom: 30px;">
                            <h1 style="margin: 0; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 28px; font-weight: normal; color: #292524;">Thank You for Your Order</h1>
                        </td>
                    </tr>
                    
                    <!-- Main Content -->
                    <tr>
                        <td style="background-color: #ffffff; border: 1px solid #e7e5e4; border-radius: 8px; padding: 40px 30px;">
                            <!-- Thank You Message -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td align="center" style="padding-bottom: 25px;">
                                        <p style="margin: 0 0 15px 0;">Dear {{ $order->customer_name }},</p>
                                        <p style="margin: 0 0 15px 0;">Thank you for trusting ELEGANCE with your recent purchase. We are honored to have you as our customer and truly appreciate your support.</p>
                                        <p style="margin: 0;">Your order has been received and is being prepared with the utmost care and attention to detail that our brand is known for.</p>
                                    </td>
                                </tr>
                                
                                <!-- Divider -->
                                <tr>
                                    <td style="padding: 20px 0;">
                                        <hr style="border: 0; height: 1px; background-color: #e7e5e4; margin: 0;" />
                                    </td>
                                </tr>
                                
                                <!-- Order Details -->
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tr>
                                                <td width="50%" style="padding-bottom: 10px; color: #78716c; font-size: 14px;">Order Number:</td>
                                                <td width="50%" align="right" style="padding-bottom: 10px; font-weight: 600; font-size: 14px;">#{{ $order->id }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding-bottom: 10px; color: #78716c; font-size: 14px;">Order Date:</td>
                                                <td width="50%" align="right" style="padding-bottom: 10px; font-weight: 600; font-size: 14px;">{{ $order->orderDate }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding-bottom: 10px; color: #78716c; font-size: 14px;">Total Amount:</td>
                                                <td width="50%" align="right" style="padding-bottom: 10px; font-weight: 600; font-size: 14px;">${{ number_format($order->total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding-bottom: 10px; color: #78716c; font-size: 14px;">Estimated Delivery:</td>
                                                <td width="50%" align="right" style="padding-bottom: 10px; font-weight: 600; font-size: 14px;">{{ $order->orderDate }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <!-- Divider -->
                                <tr>
                                    <td style="padding: 20px 0;">
                                        <hr style="border: 0; height: 1px; background-color: #e7e5e4; margin: 0;" />
                                    </td>
                                </tr>
                                
                                <!-- Next Steps -->
                                <tr>
                                    <td align="center" style="padding-bottom: 30px;">
                                        <p style="margin: 0 0 25px 0;">We will notify you once your order has been shipped. You can also track your order status by clicking the button below.</p>
                                        
                                        <!-- Button -->
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; border-radius: 4px;">
                                            <tr>
                                                <td align="center" bgcolor="#292524" style="border-radius: 4px;">
                                                    <a href="{{ url('/account/orders/' . $order->id) }}" target="_blank" style="border: 1px solid #292524; border-radius: 4px; color: #ffffff; display: inline-block; font-size: 14px; font-weight: 500; padding: 12px 24px; text-decoration: none;">View Order Details</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Order Summary -->
                    <tr>
                        <td style="padding: 30px 0 0 0;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: #ffffff; border: 1px solid #e7e5e4; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 20px 30px; border-bottom: 1px solid #e7e5e4;">
                                        <h2 style="margin: 0; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px; font-weight: normal; color: #292524;">Order Summary</h2>
                                    </td>
                                </tr>
                                
                                <!-- Order Items -->
                                @foreach($order->order_products as $item)
                                <tr>
                                    <td style="padding: 20px 30px; @if(!$loop->last) border-bottom: 1px solid #f5f5f4; @endif">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tr>
                                                <td width="60" valign="top">
                                                    <img src="{{ $item->product->image ?? asset('img/placeholder.jpg') }}" alt="{{ $item->product->title }}" width="60" height="60" style="display: block; border: 0; border-radius: 4px; object-fit: cover;" />
                                                </td>
                                                <td valign="top" style="padding-left: 15px;">
                                                    <p style="margin: 0 0 5px 0; font-weight: 500; font-size: 14px;">{{ $item->product->title }}</p>
                                                    <p style="margin: 0 0 5px 0; color: #78716c; font-size: 12px;">Qty: {{ $item->quantity }}</p>
                                                </td>
                                                <td width="80" valign="top" align="right">
                                                    <p style="margin: 0; font-weight: 500; font-size: 14px;">${{ number_format($item->subtotal, 2) }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                
                                <!-- Order Totals -->
                                <tr>
                                    <td style="padding: 20px 30px; background-color: #f8f8f7; border-radius: 0 0 8px 8px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tr>
                                                <td width="50%" style="padding-bottom: 8px; color: #78716c; font-size: 14px;">Subtotal:</td>
                                                <td width="50%" align="right" style="padding-bottom: 8px; font-size: 14px;">${{ number_format($order->subtotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding-bottom: 8px; color: #78716c; font-size: 14px;">Shipping:</td>
                                                <td width="50%" align="right" style="padding-bottom: 8px; font-size: 14px;">${{ number_format($order->shipping, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding-bottom: 8px; color: #78716c; font-size: 14px;">Tax:</td>
                                                <td width="50%" align="right" style="padding-bottom: 8px; font-size: 14px;">${{ number_format($order->tax, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding-top: 8px; border-top: 1px solid #e7e5e4; font-weight: 600; font-size: 14px;">Total:</td>
                                                <td width="50%" align="right" style="padding-top: 8px; border-top: 1px solid #e7e5e4; font-weight: 600; font-size: 14px;">${{ number_format($order->total, 2) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Shipping Info -->
                    <tr>
                        <td style="padding: 30px 0 0 0;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: #ffffff; border: 1px solid #e7e5e4; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 20px 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tr>
                                                <td width="50%" valign="top" style="padding-right: 15px;">
                                                    <h3 style="margin: 0 0 10px 0; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 16px; font-weight: normal; color: #292524;">Shipping Address</h3>
                                                    <p style="margin: 0; font-size: 14px; color: #57534e; line-height: 1.5;">
                                                        {{ $order->customer_name }}<br />
                                                        {{ $order->address }}<br />
                                                        @if($order->address2){{ $order->address2 }}<br />@endif
                                                        {{ $order->city }}, {{ $order->state }} {{ $order->zip }}<br />
                                                        {{ $order->country }}
                                                    </p>
                                                </td>
                                                <td width="50%" valign="top" style="padding-left: 15px;">
                                                    <h3 style="margin: 0 0 10px 0; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 16px; font-weight: normal; color: #292524;">Shipping Method</h3>
                                                    <p style="margin: 0; font-size: 14px; color: #57534e;">{{ $order->shipping_method ?? 'Standard Shipping' }}</p>
                                                    <p style="margin: 5px 0 0 0; font-size: 14px; color: #78716c;">Estimated delivery: {{ $order->orderDate}}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 30px 0;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td align="center" style="padding-bottom: 20px; color: #78716c; font-size: 14px;">
                                        <p style="margin: 0 0 10px 0;">If you have any questions about your order, please contact our customer service team.</p>
                                        <p style="margin: 0;">
                                            <a href="mailto:support@elegance.com" style="color: #292524; text-decoration: underline;">support@elegance.com</a> | 
                                            <a href="tel:+15551234567" style="color: #292524; text-decoration: underline;">(555) 123-4567</a>
                                        </p>
                                    </td>
                                </tr>
                                
                                <!-- Social Links -->
                                <tr>
                                    <td align="center" style="padding-bottom: 20px;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                            <tr>
                                                <td style="padding: 0 10px;">
                                                    <a href="#" target="_blank">
                                                        <img src="{{ asset('img/icon-facebook.png') }}" alt="Facebook" width="24" height="24" style="display: block; border: 0;" />
                                                    </a>
                                                </td>
                                                <td style="padding: 0 10px;">
                                                    <a href="#" target="_blank">
                                                        <img src="{{ asset('img/icon-instagram.png') }}" alt="Instagram" width="24" height="24" style="display: block; border: 0;" />
                                                    </a>
                                                </td>
                                                <td style="padding: 0 10px;">
                                                    <a href="#" target="_blank">
                                                        <img src="{{ asset('img/icon-pinterest.png') }}" alt="Pinterest" width="24" height="24" style="display: block; border: 0;" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <!-- Copyright -->
                                <tr>
                                    <td align="center" style="color: #78716c; font-size: 12px;">
                                        <p style="margin: 0 0 5px 0;">&copy; {{ date('Y') }} ELEGANCE. All rights reserved.</p>
                                        <p style="margin: 0;">123 Fashion Avenue, New York, NY 10001</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
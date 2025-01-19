<?php

return [

    'order_status' => [
        'pending' => [
            'status' => 'pending',
            'details' => 'Your order is currently pending',
        ],
        'processed_and_ready_to_ship' => [
            'status' => 'processed_and_ready_to_ship',
            'details' => 'Your package has been processed and will be with our delivery partner soon',
        ],
        'dropped_off' => [
            'status' => 'dropped_off',
            'details' => 'Your package has been dropped off by the seller',
        ],
        'shipped' => [
            'status' => 'shipped',
            'details' => 'Your package has arrived at our logistics facilities',
        ],
        'out_for_delivery' => [
            'status' => 'out_for_delivery',
            'details' => 'Our delivery partner will attempt to deliver your product',
        ],
        'delivered' => [
            'status' => 'delivered',
            'details' => 'Delivered',
        ],
    ]

];
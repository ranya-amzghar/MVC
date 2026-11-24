<?php

function calculateTotal(array $items, float $unitPrice): float
{
    $quantity = count($items);
    $discount = 0.1;
    $total = $quantity * $unitPrice * (1 - $discount);

    return $total;
}

function buildReceipt(string $customerName, array $items, float $unitPrice): array
{
    $subtotal = calculateTotal($items, $unitPrice);

    return [
        'customer' => $customerName,
        'items' => $items,
        'subtotal' => $subtotal,
    ];
}

$customer = 'Debug visitor';
$items = ['notebook', 'pen'];
$unitPrice = 4.5;
$receipt = buildReceipt($customer, $items, $unitPrice);

echo json_encode($receipt, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR), PHP_EOL;

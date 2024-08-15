<?php
require_once '../db-connection.php';

$order_time = $_GET['order_time'] ?? null;
$response = ['success' => false, 'meals' => [
    'main_meals' => [],
    'desserts' => [],
    'side_dishes' => [],
    'beverages' => []
]];

if ($order_time) {
    $tables = [
        'menuitems' => 'main_meals',
        'desserts' => 'desserts',
        'sidedishes' => 'side_dishes',
        'beverages' => 'beverages'
    ];

    foreach ($tables as $table => $category) {
        $stmt = $conn->prepare("SELECT id, name, price FROM $table WHERE time = ?");
        $stmt->bind_param('s', $order_time);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $response['meals'][$category][] = $row;
        }

        $stmt->close();
    }

    $response['success'] = true;
}

$conn->close();

echo json_encode($response);
?>

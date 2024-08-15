<?php
// Include database connection file
include '../../assets/database/db-connection.php';

// Check if connection is successful
if ($conn) {
    // Query to select only lunch items
    $sql_menu = "SELECT * FROM MenuItems WHERE time = 'Lunch'";
    $result_menu = $conn->query($sql_menu);

    // Query to select only lunch beverages
    $sql_beverages = "SELECT * FROM Beverages WHERE time = 'Lunch'";
    $result_beverages = $conn->query($sql_beverages);

    // Query to select only lunch desserts
    $sql_desserts = "SELECT * FROM Desserts WHERE time = 'Lunch'";
    $result_desserts = $conn->query($sql_desserts);

    // Query to select only lunch side dishes
    $sql_sidedishes = "SELECT * FROM Sidedishes WHERE time = 'Lunch'";
    $result_sidedishes = $conn->query($sql_sidedishes);

    // Query to select only lunch Special Meals
    $sql_specialmeals = "SELECT * FROM SpecialMeals WHERE time = 'Lunch'";
    $result_specialmeals = $conn->query($sql_specialmeals);

    // Combine results
    $menu_items = array();

    $special_items = array();

    // Fetch MenuItems
    if ($result_menu) {
        while ($row = $result_menu->fetch_assoc()) {
            $menu_items[] = $row;
        }
    } else {
        echo "Error fetching MenuItems: " . $conn->error;
    }

    // Fetch Beverages
    if ($result_beverages) {
        while ($row = $result_beverages->fetch_assoc()) {
            $menu_items[] = $row;
        }
    } else {
        echo "Error fetching Beverages: " . $conn->error;
    }

    // Fetch Desserts
    if ($result_desserts) {
        while ($row = $result_desserts->fetch_assoc()) {
            $menu_items[] = $row;
        }
    } else {
        echo "Error fetching Desserts: " . $conn->error;
    }

    // Fetch Side Dishes
    if ($result_sidedishes) {
        while ($row = $result_sidedishes->fetch_assoc()) {
            $menu_items[] = $row;
        }
    } else {
        echo "Error fetching Side Dishes: " . $conn->error;
    }

    // Fetch Special Foods
    if ($result_specialmeals) {
        while ($row = $result_specialmeals->fetch_assoc()) {
            $special_items[] = $row;
        }
    } else {
        echo "Error fetching Special Meals: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
}

// Return the combined array
return $menu_items;

return $special_items;
?>


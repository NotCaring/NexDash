
$tkse = $game_db->prepare('SELECT COUNT(*) AS expirad FROM tokens WHERE EndDate < ? AND UID2 = ? AND Vendedor=?');
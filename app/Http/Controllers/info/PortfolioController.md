
In the context of the **Portfolio** model and the **purchase_price** and **current_value** fields:

### **Explanation of Fields**
1. **`purchase_price`**:
   - Represents the price per unit of the cryptocurrency at the time the user purchased it.
   - Example:
     - If the user bought 10 units of Bitcoin at $30,000 each, the `purchase_price` would be `30000`.

2. **`current_value`**:
   - Represents the **current total value** of the user's holdings for that specific cryptocurrency.
   - It is calculated by multiplying the **current price of the cryptocurrency** by the **quantity of the cryptocurrency owned** by the user.
   - Example:
     - If the user owns 10 units of Bitcoin and the current price of Bitcoin is $30,000, the `current_value` would be:
       ```plaintext
       current_value = quantity * current_price
       current_value = 10 * 30000 = 300000
       ```

---

### **Calculation in Code**

When storing or updating a portfolio entry, the `current_value` is automatically calculated based on the `current_price` of the cryptocurrency and the `quantity` owned by the user.

#### **Store Method Example**:
```php
public function store(Request $request)
{
    $request->validate([
        'crypto_id' => 'required|exists:crypto_prices,id',
        'quantity' => 'required|numeric|min:0',
        'purchase_price' => 'required|numeric|min:0',
    ]);

    // Fetch the current price of the cryptocurrency
    $crypto = CryptoPrice::find($request->crypto_id);
    $currentValue = $crypto->current_price * $request->quantity;

    $portfolio = Portfolio::create([
        'user_id' => Auth::id(),
        'crypto_id' => $request->crypto_id,
        'quantity' => $request->quantity,
        'purchase_price' => $request->purchase_price,
        'current_value' => $currentValue, // Automatically calculated
    ]);

    return response()->json($portfolio, 201);
}
```

#### **Update Method Example**:
```php
public function update(Request $request, $id)
{
    $portfolio = Portfolio::where('user_id', Auth::id())->find($id);

    if (!$portfolio) {
        return response()->json(['message' => 'Portfolio not found'], 404);
    }

    $request->validate([
        'quantity' => 'sometimes|numeric|min:0',
        'purchase_price' => 'sometimes|numeric|min:0',
    ]);

    $crypto = CryptoPrice::find($portfolio->crypto_id);
    $currentValue = $crypto->current_price * ($request->quantity ?? $portfolio->quantity);

    $portfolio->update([
        'quantity' => $request->quantity ?? $portfolio->quantity,
        'purchase_price' => $request->purchase_price ?? $portfolio->purchase_price,
        'current_value' => $currentValue, // Automatically updated
    ]);

    return response()->json($portfolio, 200);
}
```

---

### **Example Scenario**
#### Input:
- Cryptocurrency: Bitcoin
- Quantity: 10 units
- Purchase Price: $30,000 per unit
- Current Price: $40,000 per unit (retrieved from `crypto_prices` table)

#### Calculation:
- **Purchase Price** (per unit): `$30,000`
- **Total Purchase Price**: 
  ```plaintext
  purchase_price * quantity = 30000 * 10 = 300,000
  ```
- **Current Value**:
  ```plaintext
  current_price * quantity = 40000 * 10 = 400,000
  ```

#### Response:
```json
{
    "id": 1,
    "user_id": 1,
    "crypto_id": 1,
    "quantity": 10,
    "purchase_price": 30000,
    "current_value": 400000,
    "created_at": "2024-12-24T12:00:00.000Z",
    "updated_at": "2024-12-24T12:00:00.000Z"
}
```

---

### **Key Takeaways**
- **`purchase_price`** is a static value recorded during the initial purchase (user's purchase history).
- **`current_value`** is dynamic and reflects the **current market value** of the user's holdings.


<?php

class UserCart extends Model
{
    protected $table = 'user_carts';
    public $errors = [];

    protected $allowedColumns = [
        'user_id',
        'book_id',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['user_id'])) {
            $this->errors['user_id'] = "User ID is required";
        }
        if (empty($data['book_id'])) {
            $this->errors['book_id'] = "Book ID is required";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function insertCartItem($userId, $bookId)
    {
        $data = [
            'user_id' => $userId,
            'book_id' => $bookId,
        ];

        if (!$this->validate($data)) {
            return false;
        }

        $query = "INSERT INTO {$this->table} (user_id, book_id) VALUES (:user_id, :book_id)";
        $this->query($query, $data);

        return true;
    }

    public function removeCartItem($userId, $bookId)
    {
        $query = "DELETE FROM {$this->table} WHERE user_id = :user_id AND book_id = :book_id";
        $this->query($query, ['user_id' => $userId, 'book_id' => $bookId]);
    }

    public function getUserCartItems($userId)
    {
        $query = "SELECT c.*, b.title, b.book_image FROM {$this->table} c JOIN books b ON c.book_id = b.id WHERE c.user_id = :user_id";
        $res = $this->query($query, ['user_id' => $userId]);
        return $res;
    }

    public function getUserCartItem($userId, $bookId)
    {
        $query = "SELECT * FROM {$this->table} WHERE user_id = :user_id AND book_id = :book_id";
        $res = $this->query($query, ['user_id' => $userId, 'book_id' => $bookId]);

        if ($res && count($res) > 0) {
            return $res[0]; // Assuming it's a single row result
        }
        return false;
    }

    public function getCartItemCount($userId)
    {
        $query = "SELECT COUNT(*) AS cartCount FROM {$this->table} WHERE user_id = :user_id";
        $result = $this->query($query, ['user_id' => $userId]);
        return $result[0]['cartCount'];
    }
}


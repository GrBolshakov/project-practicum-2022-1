<?php

class User
{
    public $id;
    public $firstName;
    public $lastName;
    public $balance;
    public $discount;

    /**
     * @param $id
     * @param $firstName
     * @param $lastName
     * @param $balance
     * @param $discount
     */
    public function __construct($id, $firstName, $lastName, $balance, $discount)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->balance = $balance;
        $this->discount = $discount;
    }

}

class Product
{
    public $id;
    public $name;
    public $category;
    public $price;
    public $image;

    /**
     * @param $id
     * @param $name
     * @param $category
     * @param $price
     * @param $image
     */
    public function __construct($id, $name, $category, $price, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->image = $image;
    }

    public function printInformation()
    {
        echo $this->id . " " . $this->name . " " . $this->category . " " . $this->price . " " . $this->image . "\n";
    }
}

class UsedProduct extends Product
{
    public $explotationTime;
    public $condition;

    public function __construct($id, $name, $category, $price, $image, $explotationTime, $condition)
    {
        parent::__construct($id, $name, $category, $price, $image);
        $this->explotationTime = $explotationTime;
        $this->condition = $condition;
    }

    public function printInformation()
    {
        echo $this->id . " " . $this->name . " " . $this->category . " " . $this->price . " " . $this->image . " " . $this->explotationTime . " " . $this->condition . "\n";
    }
}

class Basket
{
    public $userId;
    public $products;

    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->products = array();
    }

    public function addProduct(Product $product, $amount = 1)
    {
        $this->products[$product->id] = [
            'product' => $product,
            'amount' => $amount
        ];
    }

    public function getAmountByProductId($id)
    {
        return $this->products[$id]['amount'];
    }

    public function setAmountByProductId($id, $amount)
    {
        $this->products[$id]['amount'] = $amount;
    }

    public function removeProductById($id)
    {
        unset($this->products[$id]);
    }

    public function printAll()
    {
        print("User id = ".$this->userId."\n");
        foreach ($this->products as $pr) {
            $pr['product']->printInformation();
        }
    }

}

class Review
{
    public $id;
    public $userId;
    public $articleId;
    public $rating;
    public $text;

    /**
     * @param $id
     * @param $userId
     * @param $articleId
     * @param $rating
     * @param $text
     */
    public function __construct($id, $userId, $articleId, $rating, $text)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->articleId = $articleId;
        $this->rating = $rating;
        $this->text = $text;
    }
}



class UserComplaint
{
    public $id;
    public $theme;
    public $content;
    public $date;

    /**
     * @param $id
     * @param $theme
     * @param $content
     * @param $date
     */
    public function __construct($id, $theme, $content, $date)
    {
        $this->id = $id;
        $this->theme = $theme;
        $this->content = $content;
        $this->date = $date;
    }
}

print("Lesson1\n");
$p1 = new Product(0, "Broom", "Household goods", "100", "some_img");
$p2 = new UsedProduct(1, "Vacuum cleaner (used)", "Household goods", "400", "some_img", "2", "great");
$usr = new User(0, "John", "Wick", 500, 15);
$basket = new Basket($usr->id);
$basket->addProduct($p1);
$basket->addProduct($p2);
$basket->printAll();

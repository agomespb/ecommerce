<?php namespace AGCommerce;


class Cart {

    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price, $image)
    {
        $this->items += [
            $id => [
                'name' => $name,
                'price' => $price,
                'qtde' => (isset($this->items[$id]['qtde'])) ? $this->items[$id]['qtde']++ : 1,
                'image' => $image
            ]
        ];

        return $this->items;
    }

    public function minus($id)
    {
        $qtde = ($this->items[$id]['qtde'] > 1) ? $this->items[$id]['qtde']-1 : 1;
        $this->items[$id]['qtde'] = $qtde;

        return $this->items;
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;

        foreach($this->items as $items)
        {
            $total += $items['qtde'] * $items['price'];
        }

        return $total;
    }

    public function clear()
    {
        $this->items = [];
    }
}
<?php

namespace Tnt\Ecommerce\Model;

use Tnt\Ecommerce\Contracts\StorableInterface;

class Cart extends \dry\orm\Model implements StorableInterface
{
	const TABLE = 'cart';

	public static $special_fields = [];

	public function get_items()
	{
		return $this->has_many(CartItem::class, 'cart');
	}

	public function delete()
	{
		foreach ($this->items as $item) {
			$item->delete();
		}

		parent::delete();
	}

    public function getIdentifier()
    {
        return $this->id;
    }
}
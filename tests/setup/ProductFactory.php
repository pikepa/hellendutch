<?php

namespace Tests\Setup;

use App\Models\Product;
use App\Models\User;

class ProductFactory
{
    /**
     * The owner of the project.
     *
     * @var User
     */
    protected $user;

    /**
     * Set the owner of the new product.
     *
     * @param  User $user
     * @return $this
     */
    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Arrange the world.
     *
     * @return Product
     */
    public function create()
    {
        $product = factory(Product::class)->create([
            'owner_id' => $this->user ?? factory(User::class),
        ]);

        return $product;
    }
}

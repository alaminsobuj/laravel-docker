<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user type',
        'model' => User::class, // Optional Eloquent model
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The ID of the user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of the user',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The creation date of the user',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The last update date of the user',
            ],
        ];
    }
}

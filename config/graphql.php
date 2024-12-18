<?php

use App\GraphQL\Queries\UsersQuery;
use App\GraphQL\Mutations\CreateUserMutation;
use App\GraphQL\Types\UserType;

return [
    'route' => [
        'prefix' => 'graphql', // This determines the base URL, e.g., http://localhost/graphql
        'controller' => \Rebing\GraphQL\GraphQLController::class . '@query',
        'middleware' => ['api'], // You can add 'auth:api' if authentication is required
        'group_attributes' => [],
        'playground' => true, // Set this to true to enable the Playground
     ],
    'default_schema' => 'default',
    'schemas' => [
        'default' => [
            'query' => [
                'users' => UsersQuery::class,
            ],
            'mutation' => [
                'createUser' => CreateUserMutation::class,
            ],
            'middleware' => [], // Additional middleware if required
            'method' => ['GET', 'POST'], // Allowable HTTP methods
        ],
    ],
    'types' => [
        'User' => UserType::class,
    ],
    'lazyload_types' => true,
    'error_formatter' => [\Rebing\GraphQL\GraphQL::class, 'formatError'],
    'errors_handler' => [\Rebing\GraphQL\GraphQL::class, 'handleErrors'],
    'security' => [
        'query_max_complexity' => 100,
        'query_max_depth' => 10,
        'disable_introspection' => false,
    ],
    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,
    'simple_pagination_type' => \Rebing\GraphQL\Support\SimplePaginationType::class,
];

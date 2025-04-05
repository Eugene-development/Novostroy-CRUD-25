<?php

declare(strict_types=1);

namespace App\GraphQL\Resolvers;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;

class CategoryResolver
{
    public function resolveProducts($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) 
    {
        return $root->product()->orderBy('created_at', 'DESC')->get();
    }
}
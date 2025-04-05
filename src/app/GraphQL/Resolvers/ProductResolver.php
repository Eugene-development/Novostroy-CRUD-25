<?php

declare(strict_types=1);

namespace App\GraphQL\Resolvers;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;

class ProductResolver
{
    public function resolveImages($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return $root->image()->orderBy('created_at', 'ASC')->get();
    }
}

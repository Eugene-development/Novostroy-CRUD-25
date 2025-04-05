<?php

declare(strict_types=1);

namespace App\GraphQL\Resolvers;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;

class RubricResolver
{
    public function resolveCategories($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) 
    {
        return $root->category()->orderBy('created_at', 'ASC')->get();
    }
}
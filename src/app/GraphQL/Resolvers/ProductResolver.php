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

    public function deleteProduct($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $product = \App\Models\Product::findOrFail($args['id']);
        // Каскадное удаление связанных сущностей
        $product->image()->delete();
        $product->video()->delete();
        $product->price()->delete();
        $product->unit()->delete();
        $product->text()->delete();
        $product->metaTitle()->delete();
        $product->metaDescription()->delete();
        $product->taggables()->delete();
        // Удаление самого продукта
        $product->delete();
        return $product;
    }
}

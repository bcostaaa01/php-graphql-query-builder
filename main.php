<?php

require_once 'query-builder.php';
require_once 'query-field.php';

// Example usage:

// Create a new query builder
$queryBuilder = new GraphQLQueryBuilder('query');

// Add fields to the query
$userField = new GraphQLField('user');
$userField->addArgument('id', 1);

// Add subfields to the user field
$postField = new GraphQLField('posts', 'post');
$postField->addSubfield(new GraphQLField('title'));
$postField->addSubfield(new GraphQLField('body'));
$postField->addArgument('limit', 5);

// Build the query
$query = $queryBuilder
    ->addField($userField)
    ->addField($postField)
    ->build();

// Print the query
echo $query;

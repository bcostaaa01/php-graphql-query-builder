# GraphQL Query Builder for PHP 🚀

A flexible and modular GraphQL query builder for PHP projects. Easily construct GraphQL queries with a clean and organized syntax.

## Features 🌟

- **Modular Design:** Use different classes for building queries, fields, and arguments.
- **Clean and Maintainable:** Easily extend and adapt for project-specific requirements.
- **Example Usage:** Provided examples for quick integration.

## Getting Started 🏁

1. Clone the repository:

   ```bash
   git clone https://github.com/bcostaaa01/graphql-query-builder-php.git
   ```
   
2. Include the required files in your PHP project:

```php
require_once 'path/to/GraphQLQueryBuilder.php';
require_once 'path/to/GraphQLField.php';
```

3. Start building GraphQL queries in your project:

```php
$queryBuilder = new GraphQLQueryBuilder('query');
// ... add fields, arguments, and subfields
$query = $queryBuilder->build();
```

# Example Usage 🚧

```php
// Create a GraphQL query for fetching user details and their posts

$queryBuilder = new GraphQLQueryBuilder('query');

$userField = new GraphQLField('user');
$userField->addArgument('id', 1);

$postField = new GraphQLField('posts', 'post');
$postField->addSubfield(new GraphQLField('title'));
$postField->addSubfield(new GraphQLField('body'));
$postField->addArgument('limit', 5);

$query = $queryBuilder
    ->addField($userField)
    ->addField($postField)
    ->build();

echo $query;
```

# Contributions 🤝

Contributions are welcome! Feel free to open issues and pull requests.

License 📄
This project is licensed under the MIT License - see the LICENSE file for details.

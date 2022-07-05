# Laravel GraphQL API

## How to use
```shellscript
sail composer install
sail artisan migrate
sail up -d
```

## Important directories
Any modifications to any of the elements presented must be made in their respective directories.

### App/GraphQL
Contains the Mutations, Queries and Types directories. Unlike traditional queries, GraphQL is a query language that aims to improve their performance, offering a simple and understandable language.

#### Mutations
Mutations are one of the two types of queries made in GraphQL, it is responsible for post, update and delete in the database.

#### Queries
The second type of GraphQL request that is only responsible for querying the information, without modifying anything in the database.

#### Types
Similar to defining a type of a variable for example, here classes are created for each type of table in the database.

### App/Models
Models are models used to indicate how database data should behave in the application. When creating a new table, create its respective model and migration with the command ```sail artisan make:model -m ModelName``` and edit the file to fit with the newly created table, replace the ModelName with the Model name.

### Database
Contains Factories, Migrations and Seeders directories. Laravel takes advantage of this data to create the database structure with tables and populate them automatically. Any new table added to the GraphQL directory must be added to Factories and Migrations, and the Seeders file must also be updated to generate a database with the new information.

#### Factories
Factories are used to create random values that meet the requirements of the database tables, thus they are used to populate the database with information. Run ```sail artisan make:factory ModelNameFactory --model=ModelName``` replacing ModelName with the base model name.

#### Migrations
Migrations are necessary to create the structure of tables and relationships in the database, they are created together with the models with the command specified above.

#### Seeders
The seeders contain a single file that the factories will use to create random values in the database, when creating a new table remember to add it to the seeds file.

### Config
In this directory there is a file called graphql.php where it is necessary to import the files of queries and mutations

# Laravel GraphQL API

## Como usar
```shellscript
sail composer install
sail artisan migrate
sail up -d
```

## Diretórios importantes
Quaisquer modificações em algum dos elementos apresentados devem ser feitas em seus respectivos diretórios.

### App/GraphQL
Contém os diretórios das Mutations, Queries e Types.
Diferente das queries trdicionais o GraphQL é uma linguagem de consulta que visa melhorar o desempenho das mesmas, oferecendo uma linguagem simples e entendivél.

#### Mutations
Mutations são um dos dois tipos de consulta feitos no GraphQL, ele é responsável pelo post, update e delete no banco de dados.

#### Queries
O segundo tipo de requisição do GraphQL que é responsável apenas pela consula a informação, sem modificar nada no banco de dados.

#### Types
Semelhante a definição de um tipo de uma variável por exemplo, aqui são criadas classes para cada tipo de tabela no banco de dados.

### App/Models
Models são modelos usados para indicar como os dados do banco devem se comportar na aplicação.
Ao criar uma nova tabela, crie seu respectivo model e migration com o comando ```php artisan make:model -m ModelName``` e edite o arquivo para se encaixar com a tabela recém criada, substitua o ModelName pelo nome do Model.

### Database
Contém os diretórios das Factories, Migrations e Seeders.
O Laravel se aproveita desses dados para criar a estrutura do banco com tabelas e popular as mesmas de forma automática.
Qualquer nova tabela adicionada no diretório do GraphQL deve ser adicionada aos Factories e Migrations, também deve se atualizar o arquivo das Seeders para gerar um banco com as novas informações.

#### Factories
Factories são utilizadas para criar valores aleatórios mas que atendam aos requisitos das tabelas do banco de dados, com isso são utilizadas para popular o banco com informações. Execute o comando ```artisan make:factory ModelNameFactory --model=ModelName``` substituindo os ModelName pelo nome do modelo base.

#### Migrations
As migrations são necessárias pra criar a estrutura de tabelas e relacionamentos no banco, são criadas junto dos models com o comando especificado mais acima.

#### Seeders
As seeders contém um único arquivo que vai usar as factories pra criar valores aleatórios no banco de dados, quando criar uma nova tabela lembre-se de adicioná-la ao arquivo dos seeds.

### Config
Nesse diretório existe um arquivo chamado graphql.php onde é necessário fazer a importação dos arquivos das queries e das mutations

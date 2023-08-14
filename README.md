## English

For Portuguese documentation, scroll down.

## The challenge

The challenge is to create a shopping list API in PHP.

Features:
- Create a shopping list.
- Add and remove products to the list.
- Get data from a list.
- Increase and decrease quantities of a product.
- Duplicate a list.

Entities:
- Shopping List: A list with title and product listing.
- Product: A product with name and quantity of items in the list.

What will be evaluated:
- Good use of object orientation
- Design Patterns
- Application architecture
- Installation documentation
- Bonus: Postman collection with endpoint calls
- Bonus: Optimization of the relationship between entities

Rules:
- The use of any framework or microframework is free. In addition to any library.
- There is no need to build an infrastructure, the API can be served by PHP's built-in web server
- It is not necessary to deliver all the functionalities. It is important to understand the time available to carry out the challenge and that we can evaluate the points that were requested.

## Installation

- Clone the [project](https://github.com/danilosuzuki/aztec_test.git) into a directory in you computer.
- Make sure you have composer installed on your machine. If you do not have it, download [here](https://getcomposer.org/download/). Then access the folder and run the command `composer install`.
- Rename the file `.env.example` to `.env`. Then create a database according to `.env` and run the command `php artisan migrate`. Optionally you can run the command `php artisan migrate:fresh --seed` to create and seed the database.
- Generate the Application Key with `php artisan generate:key`.
- Tests were generated for each feature with Pest, and you can run them using `php artisan test`.
- Now you can serve your appliction with `php artisan serve`
- To use the Postman to test, you can import the `Aztec.postman_collection.json` into your application (I used global varibables to use the tests: "productID", "shoppingListID" and "quantity", make sure to have those or change "{ {variable} }" to the value desired).

## Português

## O desafio 

O desafio é criar uma API de lista de compras em PHP.

Características:
- Crie uma lista de compras.
- Adicionar e remover produtos da lista.
- Obter dados de uma lista.
- Aumentar e diminuir quantidades de um produto.
- Duplicar uma lista.

Entidades:
- Lista de Compras: Uma lista com título e listagem de produtos.
- Produto: Um produto com nome e quantidade de itens na lista.

O que será avaliado:
- Bom uso da orientação a objetos
- Padrões de design
- Arquitetura do aplicativo
- Documentação de instalação
- Bônus: coleta de carteiro com chamadas de endpoint
- Bônus: Otimização do relacionamento entre entidades

Regras:
- O uso de qualquer framework ou microframework é gratuito. Além de qualquer biblioteca.
- Não há necessidade de construir uma infraestrutura, a API pode ser atendida pelo servidor web integrado do PHP
- Não é necessário entregar todas as funcionalidades. É importante entender o tempo disponível para realizar o desafio e que possamos avaliar os pontos que foram solicitados.

## Instalação

- Clone o [projeto](https://github.com/danilosuzuki/aztec_test.git) em um diretório em seu computador.
- Certifique-se de ter o composer instalado em sua máquina. Caso não tenha, baixe [aqui](https://getcomposer.org/download/). Em seguida, acesse a pasta e execute o comando `composer install`.
- Renomeie o arquivo `.env.example` para `.env`. Em seguida, crie um banco de dados de acordo com `.env` e execute o comando `php crafts migration`. Opcionalmente, você pode executar o comando `php artisan migration:fresh --seed` para criar e propagar o banco de dados.
- Gere a chave do aplicativo com `php artisan generate:key`.
- Testes foram gerados para cada recurso com o Pest, e você pode executá-los usando `php artisan test`.
- Agora você pode servir sua aplicação com `php artisan serve`
- Para usar o Postman para testar, você pode importar o `Aztec.postman_collection.json` para o seu aplicativo (eu usei variáveis ​​globais para usar os testes: "productID", "shoppingListID" e "quantity", certifique-se de ter esses ou altere "{ {variavel} }" para o valor desejado).
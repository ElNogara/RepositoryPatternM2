# Hibrido/RepositoryPa
Módulo criado com o objetivo de utilizar o conceito de Repository Pattern no Magento 2 para listar todos os produtos na loja. 

<h3>Repository Pattern</h3>

- [Instalação](#instalação)
- [Utilizando](#utilizando)

## Instalação

Siga esses passos para instalar o módulo:

1. Copie os arquivos do módulo para o diretório `app/code/Hibrido`.
2. Habilite o módulo usando o comando: `php bin/magento module:enable Hibrido_RepositoryPa`.
3. Execute a atualização do setup: `php bin/magento setup:upgrade`.
4. Em seguida é necessário compilar os arquivos: `php bin/magento setup:di:compile`
5. E também: `php bin/magento setup:static-content:deploy -f`

## Utilizando
Esse módulo cria um novo comando dentro do terminal do Magento 2(bin/magneto), então para utilizar o mesmo basta acessar a raiz da sua loja e digitar o comando:
`bin/magento hibrido:repository:test`
Que ele vai retornar todos os produtos cadastrados na loja.


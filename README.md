# Hibrido_ConsoleButton_MultiSite
Módulo criado com o objetivo de alterar as cores dos botões da loja através do console do Magento. 

<h3>Desafio Hibrido - Teste #2 - Meta Tag em Multi-site</h3>

- [Instalação](#instalação)
- [Utilizando](#utilizando)

## Instalação

Siga esses passos para instalar o módulo:

1. Copie os arquivos do módulo para o diretório `app/code`.
2. Habilite o módulo usando o comando: `php bin/magento module:enable Hibrido_ConsoleButton`.
3. Execute a atualização do setup: `php bin/magento setup:upgrade`.
4. Em seguida é necessário compilar os arquivos: `php bin/magento setup:di:compile`
5. E também: `php bin/magento setup:static-content:deploy -f`

## Utilizando
Através da raiz do seu Magento2 execute o comando `./bin/magento hibrido:button:change` e passar dois parâmetros sendo o primeiro a **cor** em hexadecimal e o segundo o **storeview** que será 
Exemplo: ./bin/magento hibrido:button:change fff333 1


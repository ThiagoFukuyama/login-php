
# Login PHP

**Sistema de login e registro de usuários em PHP Orientado a Objetos.**

Projeto baseado no vídeo tutorial de Dani Krossing, incrementado com melhor estrutura de projeto, Composer e validação client-side.

## Página de login

![Página principal da aplicação](https://user-images.githubusercontent.com/99801948/235281498-068e9bf6-3702-4ad5-8bf8-f0c638d76bce.png)

## Página do usuário

![Página do usuário quando logado](https://user-images.githubusercontent.com/99801948/235281503-9d18834f-780b-4b93-84c5-2467df6242fa.png)

# Instalação e Configuração

Clone o repositório no diretório utilizado pelo servidor: 

```
git clone https://github.com/ThiagoFukuyama/login-php.git
```

A aplicação necessita do [Composer](https://getcomposer.org/) para autoload de classes e configuração. Execute o comando:

```
composer install
```

Carregue o banco de dados disponível em `sql/login_php_oop.sql`, e então insira ou substitua as configurações necessárias em `src/Config.php`.

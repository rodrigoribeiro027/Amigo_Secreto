# Amigo Secreto


![Homepage image](https://github.com/rodrigoribeiro027/Amigo_Secreto/blob/main/image/desafio_amigo_secreto.png)

## Requisitos

- PHP >= 8.2
- Composer
- Laravel >= 8.x
- Banco de Dados (MySQL)

## Instalação

1. **Clone o repositório**:

    ```bash
    git clone https://github.com/rodrigoribeiro027/Amigo_Secreto
    cd Amigo_Secreto
    ```

2. **Instale as dependências**:

    ```bash
    composer install
    ```

3. **Configure o arquivo `.env`**:

    Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, especialmente as configurações do banco de dados:

    ```bash
    cp .env.example .env
    ```

    Atualize as variáveis de banco de dados no arquivo `.env`:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_do_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```


4. **Execute as migrações**:

    ```bash
    php artisan migrate
    ```

## Inicializando o Projeto

Para iniciar o servidor de desenvolvimento do Laravel, execute:

```bash
php artisan serve
```


A aplicação estará disponível em [http://localhost:8000](http://localhost:8000).

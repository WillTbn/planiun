# Passo a passo

**Dependencias**

1. Cópia conteúdo do arquivo .env.exemple para um novo arquivo .env
2. Cria banco de dados com o nome platium(igual encontrado dentro de .env/ DB_DATABASE)
3. Roda no terminal dentro da pasta Back 

```
composer install
```

**Banco de dados**

4. Após término do processo composer install, roda
```
php artisan migrate
```
5. Agora é roda o back-end, agora basta da um
```
php artisan serve
```

>Após sabe do problema, rodei nessa seguencia entrou maquina com sistema operacional diferente.
>O erro foi proveniente da falta de atualização do conteudo do .env.exemple que estava sem os parâmentros reais para rodar.
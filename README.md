# Rodando o sistemaa
- composer install
- composer update
- php artisan key:generate
- Crie uma copia do arquivo .env.example chamada de .env e configure nela seu banco de dados para rodar o proximo comando
- php artisan migrate
- php artisan serve

# Acesso Admin
- Cadastre-se no sistema como um usuário comum
- Em seu banco de dados edite o campo 'admin' desse usuário cadastrado, este campo por padrão estará como NULL (vazio), mude para 1, pronto, agora o seu usuário tem acesso admin na aplicação
  

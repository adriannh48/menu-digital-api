#!/bin/bash

# Aguarda o MySQL estar pronto
echo "Aguardando o MySQL ficar disponível..."
until nc -z -v -w30 mysql 3306
do
  echo "Aguardando o banco de dados..."
  sleep 5
done

# Executa comandos Laravel
echo "Rodando migrations..."
php artisan migrate --force

# Inicia o servidor do PHP-FPM (ou qualquer comando padrão do container)
exec "$@"

cd /var/www/html/

echo "----------------------"
echo "Db Migration"
php artisan migrate --force

echo "----------------------"
echo "Db Seed"
php artisan db:seed --force

echo "All is done"
echo "----------------------"
echo "Server Start"
php artisan serve --host=127.0.0.1 --port=8000 &

echo "Waiting for server to start..."
sleep 5  # Attendre quelques secondes pour que le serveur démarre
# bash entrypoint.sh

# Ouvrir la page dans le navigateur sur votre machine locale

# systeme windows
start http://localhost:8000

# systeme mac
# open http://localhost:8000

echo "Running npm run dev"
npm run dev &

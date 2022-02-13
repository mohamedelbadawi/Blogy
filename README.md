
# Blogy

it's a simple blog with admin panel, admin can publish articles with images.
each article has one category and more one tag



## Deployment

To deploy this project run

```bash
  # install dependencies
composer install
npm install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

# build CSS and JS assets
npm run dev
# or, if you prefer minified files
npm run prod

# database
php artisan migrate --seed
```




## to launch the server
```bash
php artisan serve
```
The  project is now up and running! Access it at http://localhost:8000.
